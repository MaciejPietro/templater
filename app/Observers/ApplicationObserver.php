<?php

namespace App\Observers;

use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Support\Facades\Storage;

class ApplicationObserver
{
    /**
     * Handle the Application "created" event.
     *
     * @param  \App\Models\Application  $application
     * @return void
     */
    public function created(Application $application)
    {
        //delete previous files
        Storage::deleteDirectory($application->getStoragePathRaw());

        //number
        $max_no = Application::max('no') ?? 0;
        $application->no = $max_no + 1;

        //token
        $application->token = (new ApplicationService())->createUniqueToken();



        $application->save();
    }

    /**
     * Handle the Application "updated" event.
     *
     * @param  \App\Models\Application  $application
     * @return void
     */
    public function updated(Application $application)
    {
        //zendesk
        /*if($application->zendesk_ticket_id){
            (new ApplicationService())->editZendeskTicket($application);
        }*/
    }

    /**
     * Handle the Application "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(Application $application)
    {
        Storage::deleteDirectory($application->getStoragePathRaw());
    }

}
