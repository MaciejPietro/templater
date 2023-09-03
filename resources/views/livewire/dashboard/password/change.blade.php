@php
    $label_class = 'text-gray-700 text-xs sm:text-base font-semibold block';
    $is_error = $errors->has('old_password') || $errors->has('password') || $errors->has('password_confirmation');
@endphp


<div class="mt-10 w-full max-w-3xl">
    <div class="flex justify-between items-center p-4 sm:py-4 sm:px-6 bg-gray-900 rounded">
        <h1 class="font-medium text-white text-md sm:text-lg ">Password change</h1>
        @include('partials.edit', ['fn' => '$set("edit_mode", true)', 'icon' => ''])
    </div>

    <div class="mt-5 md:mt-8 mb-24 px-4 md:px-0">
        <h2 class="{{ $label_class }}">{{ __('Password') }}</h2>
        <span class="text-md sm:text-lg text-gray-600 font-medium">**********</span>
    </div>

    @include('partials.profile_password_popup')
</div>
