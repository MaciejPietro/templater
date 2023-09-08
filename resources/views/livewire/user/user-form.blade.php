<form class="mt-10" wire:submit.prevent="{{ $method }}" wire:submit.prevent="cancel">
    <div class="grid md:grid-cols-2 gap-6 md:gap-8">
        @include('partials.input', [
            'name' => 'First name',
            'slug' => 'first_name',
            'placeholder' => '',
            'value' => '',
            'required' => true,
        ])

        @include('partials.input', [
            'name' => 'Last name',
            'slug' => 'last_name',
            'placeholder' => '',
            'value' => '',
            'required' => true,
        ])
    </div>

    <div class="grid md:grid-cols-2 gap-6 md:gap-8 mt-6">
        @include('partials.input', [
            'name' => 'Email',
            'slug' => 'email',
            'placeholder' => '',
            'value' => '',
            'type' => 'email',
            'required' => true,
        ])

        @include('partials.input', [
            'name' => 'Phone',
            'slug' => 'phone',
            'placeholder' => '',
            'value' => '',
            'type' => 'text',
        ])
    </div>

    <div class="grid md:grid-cols-2 gap-6 md:gap-8 mt-6">
        @include('partials.input', [
            'name' => 'Position',
            'slug' => 'position',
            'placeholder' => '',
            'value' => '',
            'type' => 'text',
        ])

        @include('partials.select', [
            'name' => 'Role',
            'slug' => 'role',
            'placeholder' => '',
            'value' => $role,
            'options' => ['admin', 'user'],
        ])
    </div>


    <div class="mt-6">
        <div class="{{ $user_id ?: 'hidden' }}">
            <button class="text-xs text-blue-500" type="button"
                wire:click="$set('change_password', {{ !$change_password }})">{{ $change_password ? "Don't change" : 'Change' }}
                password
            </button>
        </div>

        @if ($change_password)
            <div class="grid md:grid-cols-2 gap-6 md:gap-8 mt-2">
                @include('partials.input', [
                    'name' => 'Password',
                    'slug' => 'password',
                    'placeholder' => '',
                    'value' => '',
                ])
            </div>
        @endif
    </div>


    <div class="grid grid-cols-2 gap-8 mt-10">
        <button type="button" class="btn btn--gray" wire:click="closePopup">Cancel</button>
        <button type="resetPassword" class="btn">{{ $user_id ? 'Save' : 'Add user' }}</button>
    </div>
</form>
