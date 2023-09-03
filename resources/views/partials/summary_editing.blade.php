@php
$box_heading_class = 'sticky top-0 bg-white pb-4 pt-16 z-20 text-gray-600 text-xl mb-8';

@endphp

<div class="{{ $edit_mode ? 'popup-wrapper' : 'hidden' }} py-24">
  <div class="bg-white px-5 md:px-12  xl:px-24 pb-16 w-11/12 max-w-4xl max-h-full overflow-y-scroll">
    @switch($edit_step)
      @case(2)
        <h2 class="{{ $box_heading_class }}">Edit Basic Profile</h2>
        @include('livewire.application.basic')
      @break
      @case(3)
        <div>
          <h2 class="{{ $box_heading_class }}">Edit Trustee Info</h2>
          @include('partials.trustees_list', ['summary ' => true])
        </div>
      @break
      @case(4)
        <div>
          <h2 class="{{ $box_heading_class }}">Edit Documents</h2>
          @include('livewire.application.documents', ['display_instruction' => false ])
        </div>
      @break
      @default
    @endswitch
    <div class="flex justify-between mt-8 gap-4">
      @include('partials.back_btn', ['fn' => 'stopEditing(true)', 'name' => $edit_step === 4 ? 'Back' : 'Cancel'])

      <button class="btn px-10 w-1/2 sm:w-auto {{ $edit_step === 4 ? 'opacity-0 invisible' : '' }}"
        wire:click="saveEditing">Save</button>
    </div>

  </div>
</div>
