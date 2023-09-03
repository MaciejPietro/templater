    <div class="popup-wrapper {{ $show_terms_and_conditions && !$show_question ?: 'hide' }}">
        <div class="popup-box">
            <h2 class="popup-title popup-title--dark leading-normal text-center mt-6">Terms and conditions</h2>
            <div class="bg-gray-400 p-4 -mt-3 rounded">
                <p class="p-4 text-gray-900 text-base font-normal leading-normal text-center"> As a guide, all
                    applications
                    will
                    take
                    7 to 10 working days from the processing date.
                    All submitted applications are processed on the same day or the following working day.
                    In the event where the applicant is required by NiDCOM to edit and re-submit their application, upon
                    re-submission, the processing time is restarted.
                    Some applications may take longer than the stated time as a result of processing delays from NiDCOM
                    or any
                    other events that are out of our control.
                    In the event where applications are delayed as a result of events that are within our control, all
                    applicants are entitled to a refund.
                    In the event where applications are taking longer than the stipulated time, we will update all
                    relevant
                    applicants accordingly.
                    Applicants that want to cancel their applications can email us at ari@companyregistrationsng.com.
                    If we have not started processing the application, applicants will be refunded fully. However, once
                    we have
                    started processing, we cannot guarantee refunds

            </div>

            <div class="flex  mt-8 justify-between">
                <button type="button" wire:click="$set('show_terms_and_conditions', false)" class="btn btn--gray">Do no
                    accept</button>


                <button type="button" wire:click="$set('show_question', true)" class="btn">Accept and Pay
                    (${{ $application->price }}) >
                </button>
            </div>
        </div>
    </div>
