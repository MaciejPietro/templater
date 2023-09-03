<div class="popup-wrapper " x-data="{ open: true }">
  <div :class="{'hidden': open}" class="popup-box text-center">
    <h2 class="text-gray-700 text-xl font-semibold">Password reset</h2>
    <div class="mt-6 text-gray-600">Enter the email address associated with your account, and we’ll email you a link
      to reset your password.</div>
    <form class="mt-10" wire:submit.prevent="resetPassword" wire:submit.prevent="cancel">
      <div>
        <label class="sr-only">
          {{ __('E-mail') }}
        </label>
        <input wire:model="email" type="email" placeholder="Your email"
          value="{{ getInputValFromSession('email') }}" />
        @error('email') <span class="error">{{ $message }}</span> @enderror
      </div>
      <div class="grid grid-cols-2 gap-8 mt-10">
        <button type="button" class="btn btn--gray" wire:click="$emitUp('close_pass')">{{ __('Cancel') }}</button>
        <button type="resetPassword" class="btn">{{ __('Send reset link') }}</button>
      </div>
    </form>
  </div>
</div>
