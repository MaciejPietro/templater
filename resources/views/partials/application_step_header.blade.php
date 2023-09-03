@php
$dot_class = 'w-2 h-2 md:w-3 md:h-3 rounded-full cursor-default ';

@endphp

<div class="mb-8">
  <div class="flex items-center justify-between gap-4 border-b-2 border-gray-400 mb-8">
    <h1 class="text-gray-900 font-semibold text-lg sm:text-xl md:text-2xl pb-2">{{ $title }}</h1>
    <div class="flex gap-2 md:gap-3">
      @for ($i = 1; $i < 6; $i++)
        <button
          class="{{ $dot_class }} {{ ($i < $step ? 'bg-gray-900 ' : 'bg-gray-300 ') . ($i !== $step ?: ' border border-gray-900 ') . ($i > $step && $step > 6 ?: ' cursor-pointer') }}"
          @if ($i < $step && $step < 6) wire:click="toStep({{ $i }})" @endif>
        </button>
      @endfor
    </div>
  </div>

  @if (isset($note) && $note)
    <div class="bg-gray-300 rounded py-4 px-6 text-gray-600">
      {{ $note }}
    </div>
  @endif

</div>
