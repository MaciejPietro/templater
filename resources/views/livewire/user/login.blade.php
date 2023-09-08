<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
        account</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" method="POST" action="{{ route('user.login') }}">
            {{ csrf_field() }}

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                    address</label>
                <div class="mt-2">
                    <input class="{{ $errors->has('email') ? 'invalid' : '' }}" id="email" name="email"
                        type="email" autocomplete="email" placeholder="Your email"
                        value="{{ getInputValFromSession('email') }}">
                    {!! Form::error($errors, 'email') !!}
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    {{-- <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500 text-sm"
                        wire:click="show_forgot_password()">
                        Forgot Password?
                    </button> --}}
                </div>
                <div class="mt-2">
                    <input class="{{ $errors->has('password') ? 'invalid' : '' }}" id="password" name="password"
                        type="password" placeholder="Your password" autocomplete="current-password" required>
                    {!! Form::error($errors, 'password') !!}
                </div>
            </div>

            <div>
                <button type="submit" class="btn">Sign
                    in</button>
            </div>
        </form>

        <div class="@if ($forgot_password === false) hidden @endif">
            <livewire:user.password-reset-form />
        </div>
    </div>
</div>
