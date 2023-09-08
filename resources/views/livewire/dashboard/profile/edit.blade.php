@php
    $profile_data = [['key' => 'First name', 'value' => $first_name], ['key' => 'Last name', 'value' => $last_name], ['key' => 'Email', 'value' => $email], ['key' => 'Phone', 'value' => $phone], ['key' => 'Position', 'value' => $position]];
@endphp

<div class="w-full max-w-3xl">

    <div class="flex justify-between items-center p-4 sm:py-4 sm:px-6 bg-gray-900 rounded">
        <h1 class="font-medium text-white text-md sm:text-lg ">Profile details</h1>
        @include('partials.edit', ['fn' => '$set("edit_mode", true)', 'icon' => ''])
    </div>

    <div class="pt-5 px-4 md:px-0 md:pt-8 md:pb-10 grid grid-cols-2 gap-y-6 gap-x-4">
        @foreach ($profile_data as $data)
            <div>
                <h2 class="text-gray-700 text-xs sm:text-base font-semibold block">{{ __($data['key']) }}</h2>
                <span class="text-md sm:text-md text-gray-600 font-medium break-words">
                    {{ $data['value'] ?? '-' }}</span>
            </div>
        @endforeach
    </div>

    @include('partials.profile_peronal_popup')
</div>
