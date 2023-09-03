  <label class="block">
      <div class="text-gray-700 font-semibold">{{ __($name) }} @if (isset($required) && $required)
              <span class="text-red-500">*</span>
          @endif
      </div>
      <input class="input-md mt-1 sm:mt-2 @error($slug) invalid @enderror" placeholder="{{ $placeholder }}"
          wire:model.debounce.500ms="{{ $slug }}" type="{{ isset($type) ? $type : 'text' }}"
          value="{{ $value }}" required />
      @error($slug)
          <span class="error">{{ $message }}</span>
      @enderror
  </label>
