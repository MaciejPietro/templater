<p class="py-2 border-b-2 border-blue-400 mb-4 absolute top-0 left-0 ">
  @auth
    <a href="{{ route('panel.dashboard') }}" class="pr-2 font-bold uppercase">Dashboard</a>
    <a href="{{ route('panel.new-application') }}" class="pr-2 font-bold uppercase">New application</a>
    <a href="{{ route('user.logout') }}" class="pr-2 font-bold uppercase">Log out</a>
  @endauth
  @guest()
    <a href="{{ route('dashboard') }}" target="_blank" class="pr-2 font-bold uppercase">Admin dashboard</a> |
    <a href="{{ route('user.login-form') }}" class="px-2 font-bold uppercase">Log in</a> |
    <a href="{{ route('register') }}" class="px-2 font-bold uppercase">Sign in</a> |
    <a href="{{ route('password.reset-form') }}" class="px-2 font-bold uppercase">Password reset</a>
  @endguest
</p>
