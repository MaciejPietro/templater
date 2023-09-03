<?php 

namespace App\Services;

use PDF;
use App\Mail\Receipt;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReceiptService{

    public function createPdf(Application $application)
    {
        $pdf = \PDF::loadView('pdf.receipt', [
            'application' => $application
        ]);

        //return $pdf->getMpdf()->Output('receipt.pdf', \Mpdf\Output\Destination::INLINE);
        return $pdf->getMpdf()->Output('receipt.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }

    public function createPdfAndSend(Application $application)
    {
        $pdf = \PDF::loadView('pdf.receipt', [
            'application' => $application
        ]);

        $path = $application->getReceiptPath();
        $pdf->save($path);

        //email with receipt
        Mail::to($application->user->email)->send(new Receipt($application->user, $application));
    }

}
