<div>
    <div class="popup-wrapper {{ !$success_popup ?: 'hide' }}">
        <div class="popup-box">
            <h1 class="popup-title text-center">Create new password</h1>
            <p class="-mt-2 text-gray-600 font-normal text-center">Please enter a new password different from previously
                used
                passwords</p>
            <form class="mt-10 grid gap-5" wire:submit.prevent="resetPassword">
                <label>
                    <span class="sr-only">{{ __('Password') }}</span>
                    <input wire:model="password" type="password" placeholder="New password" />
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </label>
                <label>
                    <span class="sr-only">{{ __('Password confirm') }}</span>
                    <input wire:model="password_confirmation" type="password" placeholder="Retype new password" />
                    @error('password_confirmation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </label>
                <input wire:model="email" type="hidden" />
                <input wire:model="token" type="hidden" />
                <div class="grid grid-cols-2 gap-6 mt-4">
                    <a class="btn btn--gray" href="{{ route('user.login') }}">Cancel</a>
                    <button type="resetPassword" class="btn">{{ __('Reset') }}></button>
                </div>
            </form>
        </div>
    </div>

    <div class="popup-wrapper {{ $success_popup ?: 'hide' }}">
        <div class="popup-box flex flex-col items-center gap-4">
            @include('icons.tick_big')
            <h2 class="text-gray-900 font-semibold text-center text-xl">Password reset successful</h2>
            <p class="text-gray-600 text-center text-md">Awesome, you can now use your new password to log in to your
                account,
                anytime.</p>
            <button class="btn w-full mt-8" wire:click='redirect_to_login()'>Log in</button>
        </div>
    </div>

</div>
