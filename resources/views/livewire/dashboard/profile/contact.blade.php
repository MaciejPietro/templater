@php
$label_class = 'text-gray-700 font-semibold ';
@endphp
<div class="max-w-xl mt-6 md:mt-0">
  <p class="text-black sm:text-md">If you have any problem, suggestions or questions with any of our services, please
    contact us.</p>
  <form wire:key="contact-form" wire:submit.prevent="sendMessage">

    <div class="mt-10">
      @include('partials.input_contact', ['applications' => $applications])
    </div>

    <div class="flex flex-col mt-6 mb-8">
      <label class="{{ $label_class }}">{{ __('Your message') }}</label>
      <textarea class="mt-2 h-40  @error('content') invalid @enderror"
        wire:model.defer="content">{{ $content }}</textarea>
      @error('content')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    @include('partials.next_btn', ['name' => 'Send message', 'type' => 'sendMessage', 'class' => 'w-full'])
  </form>

  {{-- TODO is that correct ? What if message won't be send, popup will appear ? --}}
  @if (session()->has('global_message') && $show_popup)
    <div class="popup-wrapper">
      <div class="popup-box text-center flex flex-col items-center  gap-2">
        @include('icons.tick_big')
        <h2 class="text-gray-900 font-semibold text-xl mt-4">Message sent succesfully</h2>
        <p class="text-gray-600 text-md font-normal mb-4">Thank you for your message. You would receive a response
          through
          your email, in 24 hours.</p>

        @include('partials.back_btn', ['name' => 'Back'])
      </div>
    </div>
  @endif
</div>
