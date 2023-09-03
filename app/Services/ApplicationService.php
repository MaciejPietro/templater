<?php

namespace App\Services;

use DOMDocument;
use Exception;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;
use Huddle\Zendesk\Facades\Zendesk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicationService{

    public function getPaginateByAuthUser(int $per_page): LengthAwarePaginator
    {
        return Application::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getAll(int $per_page): LengthAwarePaginator
    {
        return Application::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getAllByAuthUser(): Collection
    {
        return Application::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    }

    protected function createZendeskHTMLBody(Application $application): string
    {
        $html = "<h1>Application from {$application->user}</h1>";

        $html .= "<p>
        Name of associaton: {$application->name_of_diaspora_organisation}<br/>
        E-mail address: {$application->email_address}</p>";

        $html .= "<p>
        Need help? ".($application->need_help ? 'true' : 'false')."</p>";

        $html .= "<p>
        Pricing: {$application->pricing} USD{$application->price}<br/>
        Status: {$application->status}</p>";

        $html .= "<h2>Trustees</h2>";
        $no = 1;
        $html .= "<p>";
        foreach($application->trustees as $trustee){
            $html .= "
            Name: {$trustee->name}<br/>
            Phone: {$trustee->phone}<br/>
            Gender: {$trustee->gender}<br/>
            Date of birth: {$trustee->date_of_birth}<br/>
            Dial Code: {$trustee->dial_code}<br/>
            Country of residence: {$trustee->country_of_residence}<br/>
            Address: {$trustee->address}<br/>
            Diaspora resident: ".($trustee->diaspora_resident ? 'Yes' : 'No')."<br/>
            <hr/>";
            $no++;
        }
        $html .= "</p>";

        $html .= "<h2>Payment</h2>";
        $html .= "<p>{$application->payment_service} id: {$application->payment_id}</p>";

        //remove tabs
        return preg_replace('/\s+/S', " ", $html);
    }

    public function addZendeskTicket(Application $application): void
    {
        $user = auth()->user();

        if(!$user->zendesk_requester_id){
            //create_new_user
            try{
                $userZendesk = Zendesk::users()->create(array(
                    'name' => $user->getFullName(),
                    'email' => $user->email
                ));

                $zendesk_requester_id = $userZendesk->user->id;

                $user->update(['zendesk_requester_id' => $zendesk_requester_id]);

            } catch(Exception $ex){

            }
        }

        // Create a new ticket
        $data = [
            'subject' => "Application from {$application->user}",
            'comment' => [
                'html_body' => $this->createZendeskHTMLBody($application)
            ],
            'priority' => 'normal'
        ];

        if($user->zendesk_requester_id) $data['requester_id'] = $user->zendesk_requester_id;

        //files
        $upload_files = [];
        foreach($application->documents as $document){
            $attachment = Zendesk::attachments()->upload([
                'file' => $document->getFilePath(),
                'type' => 'application/pdf',
                'name' => $document->type // Optional parameter, will default to filename.ext
            ]);
            if($attachment) array_push($upload_files, $attachment->upload->token);
        }

        if(count($upload_files) > 0) $data['comment']['uploads'] = $upload_files;

        $check = Zendesk::tickets()->create($data);

        if(isset($check->ticket->id)) $application->update(['zendesk_ticket_id' => $check->ticket->id]);
    }

    public function editZendeskTicket(Application $application): void
    {
        // Edit ticket
        if($application->zendesk_ticket_id){
            Zendesk::tickets()->update($application->zendesk_ticket_id, [
                'comment' => [
                    'html_body' => $this->createZendeskHTMLBody($application)
                ],
            ]);
        }
    }

    public function createPdfFromTemplate(string $field_value, array $signatures = []): ?string
    {
        if(isset($signatures['chairman'])){

            $doc = new DOMDocument();
            $doc->loadHTML($field_value);
            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tag->setAttribute('src', $signatures['chairman']->getRealPath());
            }

            $field_value = $doc->saveHTML();
        }

        $pdf = \PDF::loadView('pdf.application_template', [
            'field_value' => $field_value
        ]);

        $random_name = Str::random(20);
        $file_name = "{$random_name}.pdf";

        $path = storage_path("app/tmp_templates");
        $file_path = "{$path}/{$file_name}";
        File::ensureDirectoryExists($path);

        $pdf->save($file_path);

        return $file_name;
    }

    public static function createUniqueToken()
    {
        do {
            $token = Str::random(32);
        } while (Application::where('token', $token)->count() > 0);

        return $token;
    }

}
