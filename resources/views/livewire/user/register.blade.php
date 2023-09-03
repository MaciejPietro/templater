{{-- <div class="popup-wrapper bg-white">
    <div class="w-full max-w-xl flex flex-col items-center px-4 py-1">
        @include('icons.logo')

        @include('partials.login_heading', ['heading' => 'Register'])

        <form class="flex flex-col gap-5 mt-10" wire:submit.prevent="saveUser">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    </label>
                    <label class="sr-only">
                        {{ __('First name') }}
                    </label>
                    <input wire:model="first_name" type="text" placeholder="Your first name"
                        value="{{ getInputValFromSession('first_name') }}" />
                    @error('first_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="sr-only">
                        {{ __('Last name') }}
                    </label>
                    <input wire:model="last_name" type="text" placeholder="Your last name"
                        value="{{ getInputValFromSession('last_name') }}" />
                    @error('last_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label class="sr-only">
                    {{ __('E-mail') }}
                </label>
                <input wire:model="email" type="email" placeholder="Your email"
                    value="{{ getInputValFromSession('email') }}" />
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="sr-only">
                    {{ __('Password') }}
                </label>
                <input wire:model="password" type="password" placeholder="Your password" value="" />
                <p class="text-gray-500">Password must have at least eight characters</p>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="sr-only">
                    {{ __('Password confirm') }}
                </label>
                <input wire:model="password_confirmation" placeholder="Repeat your password" type="password"
                    value="" />
                @error('password_confirmation')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="saveUser" class="btn w-full mt-5">{{ __('Sign in') }}</button>
        </form>



        @include('partials.login_alt_suggestion', [
            'text' => ' Already have an account, ',
            'route' => route('login'),
            'link_text' => 'Log in',
        ])
    </div>
</div> --}}
