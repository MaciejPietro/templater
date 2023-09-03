@php
    $field_name_template = Str::snake($name) . '_template';
    $file_name = $file ? $file->getClientOriginalName() : 'Upload';
    $file_name_striped = strlen($file_name) > 12 ? substr($file_name, 0, 12) . '...' : $file_name;
    
    $is_trustee = isset($i) && $i !== null;
    $file_type = $is_trustee ? 'trustees.' . $i . '.' . $type : $type;
    $file = !$is_trustee ? $this->{$type} : (isset($this->{'trustees'}[$i][$type]) ? $this->{'trustees'}[$i][$type] : null);
@endphp


<div
    class="flex flex-col sm:flex-row gap-5 justify-between sm:items-center border border-gray-400 rounded px-3 py-6 sm:p-7">
    <div class="flex gap-5 items-center">

        <div class="flex items-center">
            @include('icons.' . $icon)
        </div>
        <span class="h-8 border-r border-gray-400"></span>
        <div class="flex flex-col text-gray-700 sm:pr-4">
            <h2 class="text-md font-medium">{{ __($name) }}</h2>
            @if ($display_instruction)
                <p class="text-xs font-normal">{{ $text }}</p>
            @endif


            @if (count($errors->get($file_type)))
                @error($file_type)
                    <span class="error text-xs">{{ $message }}</span>
                @enderror
            @elseif ($file !== null || ($template && $this->{$field_name_template}))
                <span class="success flex-nowrap sm:gap-2">{{ ucfirst(str_replace('_', ' ', $type)) }} has been uploaded
                    @include('icons.tick_green')</span>
            @endif
        </div>
    </div>

    <div class="flex sm:flex-col lg:flex-row gap-3 sm:gap-4">
        @if ($file !== null || ($template && $this->{$field_name_template}))
            <button class="flex sm:justify-end lg:inline"
                wire:click="clearDocument('{{ $type }}', {{ $is_trustee ? $i : null }})">
                @include('icons.trash')
            </button>
        @endif

        @if ($template)
            @switch(Str::snake($name))
                @case('application_letter')
                    <button wire:click="showTemplate('application_letter_template_show')"
                        class="py-1.5 px-3 sm:px-4 bg-gray-700 text-gray-400 uppercase text-xs sm:text-sm font-medium rounded-full">Use
                        Template</button>

                    <div class="popup-wrapper popup-wrapper--template {{ $application_letter_template_show ? '' : 'hide' }}">
                        <div class="popup-box">
                            @include('partials.template_popup', [
                                'field_name_template' => $field_name_template,
                                'name' => $name,
                            ])
                            <div class="mt-8 flex justify-between">
                                <button class="btn btn--gray"
                                    wire:click.defer="closeTemplate('application_letter_template', 'application_letter_template_show');">Cancel</button>
                                <button class="btn"
                                    wire:click="uploadTemplate('application_letter_template', 'application_letter_template_show')">Upload
                                    ></button>
                            </div>
                        </div>
                    </div>
                @break

                @default
            @endswitch
        @endif

        <label class="file">
            @if (!$file)
                @include('icons.arrow_up')
            @endif
            <span class="flex">{{ $file_name_striped }}</span>
            <input type="file" wire:model="{{ $file_type }}" />
            <span wire:loading wire:target="{{ $file_type }}">
                <img src="{{ asset('/images/Rolling-4.2s-18px.gif') }}" alt="Uploading..." /></span>
        </label>

    </div>

</div>
