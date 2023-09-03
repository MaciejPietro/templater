  @php
      // $hamburger_bar_class = 'w-full border-b-2 border-gray-900';
      // $user = Auth::user();
      // $route = Route::currentRouteName();
      // $route_name = str_replace(['-', '_'], ' ', substr($route, strrpos($route, '.') + 1));
  @endphp

  <header class="top-0 bg-white md:relative flex gap-6 px-4 md:pl-0 xl:pr-24 z-30 bg-opacity-80">
      {{-- headerasty --}}
      {{-- <div
      class="fixed shadow-xl md:shadow-none top-0 left-0 bg-white md:bg-gray-100 w-2/3 h-full md:w-1/3 xl:w-full xl:max-w-sm logo  md:relative lg:-ml-0.5 xl:ml-0">

      <div class="transform origin-right scale-75 lg:scale-100">@include("icons.logo")</div>
    </div>
    <div class="flex justify-between items-center w-full py-4 md:py-10 border-b border-gray-400">
      <div class="md:hidden items-centerflex items-center">

        <button class="w-10 h-10 flex flex-col justify-center px-2 -ml-2" id="openMenu">
          <span class="{{ $hamburger_bar_class }}"></span>
          <span class="{{ $hamburger_bar_class }} my-1"></span>
          <span class="{{ $hamburger_bar_class }}"></span>
        </button>

      </div>
      <div class="text-base md:text-xl font-light">

        @if ($route_name === 'dashboard' || $route === 'home')
          Welcome, <span class="font-bold">{{ explode(' ', $user)[0] }}</span>
        @else
          <span class="block capitalize transform md:translate-y-8">{{ $route_name }}</span>
        @endif

      </div>
      <div class="flex items-center gap-6 text-gray-600 text-md">
        <span class="hidden md:block">{{ $user }}</span>
        <span
          class="inline-flex justify-center items-center rounded-full bg-gray-700 text-gray-600 font-semibold w-8 h-8 md:w-14 md:h-14">

          @if ($user && $user->avatar)
            <img class="w-full h-full object-cover rounded-full" src="{{ asset($user->avatar) }}" alt="">
          @else
            {{ substr($user, 0, 1) }}
          @endif

        </span>
      </div>
    </div> --}}
  </header>
