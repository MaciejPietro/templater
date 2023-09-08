@php
    $cke_field_name = 'cke_' . $field_name_template;
    $signature_field_name = $field_name_template . '_signature';
    $default_value = $application_letter_template_tmp;
@endphp

<h2 class="popup-title">{{ $name }}</h2>
<span class="block text-gray-1100 font-semibold">Edit your Letter </span>

<div wire:ignore class="form-group row">
    <textarea wire:model="{{ $field_name_template }}" name="{{ $cke_field_name }}" id="{{ $cke_field_name }}"></textarea>
</div>



<div class="py-10">
    <div class="flex sm:flex-col lg:flex-row gap-3 sm:gap-4">
        @if ($this->{$signature_field_name} !== null)
            <button class="flex sm:justify-end lg:inline" wire:click="clearDocument('{{ $signature_field_name }}')">
                @include('icons.trash')
            </button>
        @endif
        <label class="file">
            @include('icons.arrow_up')
            <span>Upload Signature</span>
            <input type="file" wire:model="{{ $signature_field_name }}" />
        </label>
        @error($signature_field_name)
            <p><span class="error text-xs">{{ $message }}</span></p>
        @enderror
        @if ($this->{$signature_field_name} !== null)
            <img src="{{ $this->{$signature_field_name}->temporaryUrl() }}" alt="" class="h-16" />
        @endif
    </div>
</div>
