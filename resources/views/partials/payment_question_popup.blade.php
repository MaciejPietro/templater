<div class="popup-wrapper {{ $show_question ?: 'hide' }}">
  <div class="popup-box">
    <h2 class="popup-title popup-title--dark leading-normal text-center mt-6">Last question before you pay</h2>
    <p class="p-4 text-gray-900 text-md font-normal leading-normal text-center">
      In the future, will you need help registering a company or incorporated trustee with CAC?
    </p>

    <div class="flex mt-8 justify-between">
      <button type="payAction" class="btn btn--gray px-8"
        wire:click="$set('need_help_registering_company_with_cac', false)">
        No
      </button>

      <button type="payAction" class="btn px-8" wire:click="$set('need_help_registering_company_with_cac', true)">
        Yes
      </button>
    </div>
  </div>
</div>
