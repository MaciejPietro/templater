<label class="block">
    <div class="text-gray-700 font-semibold">{{ __($name) }} @if (isset($required) && $required)
            <span class="text-red-500">*</span>
        @endif
    </div>
    <select class="input-md mt-1 sm:mt-2 @error($slug) invalid @enderror" wire:model.debounce.500ms="{{ $slug }}"
        required>
        @foreach ($options as $option)
            <option value="{{ $option }}" @if ($value === $option) selected @endif>{{ $option }}
            </option>
        @endforeach
    </select>
    @error($slug)
        <span class="error">{{ $message }}</span>
    @enderror
</label>
