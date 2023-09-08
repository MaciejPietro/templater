<div class="popup-wrapper {{ $edit_mode ? '' : 'hide' }}">
    <form wire:submit.prevent="editUser" class="popup-box">
        <h2 class="text-2xl font-bold">Edit Personal Information</h2>


        @if (session()->has('global_message'))
            <div class="text-green-500 font-medium flex items-center gap-2 mt-3">
                {{ session('global_message') }}
            </div>
        @endif

        <div class="mt-6 flex flex-col gap-4">
            <div class="grid grid-cols-2 gap-6">
                @include('partials.input', [
                    'name' => 'First Name',
                    'slug' => 'first_name',
                    'placeholder' => '',
                    'value' => '',
                ])
                @include('partials.input', [
                    'name' => 'Last name',
                    'slug' => 'last_name',
                    'placeholder' => '',
                    'value' => '',
                ])
            </div>
            <div class="grid grid-cols-2 gap-6">
                @include('partials.input', [
                    'name' => 'Email',
                    'slug' => 'email',
                    'placeholder' => '',
                    'value' => '',
                ])

                @include('partials.input', [
                    'name' => 'Phone',
                    'slug' => 'phone',
                    'placeholder' => '',
                    'value' => '',
                ])
            </div>
            <div class="grid grid-cols-2 gap-6">
                @include('partials.input', [
                    'name' => 'Position',
                    'slug' => 'position',
                    'placeholder' => '',
                    'value' => '',
                ])


            </div>
        </div>

        <div class=" mt-8 grid grid-cols-2 gap-4">
            @include('partials.back_btn')
            @include('partials.next_btn', ['name' => 'Save', 'type' => 'editUser'])
        </div>


    </form>
</div>
