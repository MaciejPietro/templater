<div class="popup-wrapper {{ $edit_mode ? '' : 'hide' }}">
    @if (session()->has('global_message') && session('global_message') === 'Password changed.')
        <div wire:click="$set('edit_mode', false)" class="popup-box popup-box flex flex-col items-center gap-8 max-w-sm">
            <h2 class="text-green-500 text-xl font-semibold text-center">Password changed successfully</h2>
            @include('partials.back_btn', ['name' => 'Back'])
        </div>
    @else
        <form wire:submit.prevent="changePassword" class="popup-box">
            <h2 class="text-2xl font-bold">Change Password</h2>


            <div class="flex flex-col gap-4 mt-6">
                @include('partials.input', [
                    'name' => 'Old password',
                    'slug' => 'old_password',
                    'type' => 'password',
                    'placeholder' => '',
                    'value' => '',
                ])

                @include('partials.input', [
                    'name' => 'Password',
                    'slug' => 'password',
                    'type' => 'password',
                    'placeholder' => '',
                    'value' => '',
                ])
                @include('partials.input', [
                    'name' => 'Password repeat',
                    'slug' => 'password_confirmation',
                    'type' => 'password',
                    'placeholder' => '',
                    'value' => '',
                ])

            </div>

            <input wire:model="email" type="hidden" />
            <input wire:model="token" type="hidden" />

            <div class="mt-8 grid grid-cols-2 gap-4">
                @include('partials.back_btn')
                @include('partials.next_btn', ['name' => 'Change password', 'type' => 'changePassword'])
            </div>

            {{-- TODO Is it always be red message --}}
            @if (session()->has('global_message'))
                <div class="text-red-500 font-medium flex items-center gap-2 mt-8">
                    {{ session('global_message') }}
                </div>
            @endif
        </form>
    @endif
</div>
