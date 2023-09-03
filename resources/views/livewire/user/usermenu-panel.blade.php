@php
    
    function is_current($route)
    {
        // dd(route($route));
        return url()->current() === route($route) ? 'bg-blue-900 bg-opacity-25' : '';
    }
    
    $items = [
        [
            'label' => 'Dashboard',
            'icon' => 'home',
            'route' => 'dashboard.dashboard',
        ],
        [
            'label' => 'Create',
            'icon' => 'documents',
            'route' => 'create',
        ],
    ];
    
    // dd(route('dashboard.dashboard'));
    
    $user = Auth::user();
    
@endphp


@auth
    <div x-data="{ open: false }">
        {{-- MOBILE --}}
        <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true" x-show="open">

            <div class="fixed inset-0 bg-gray-900/80"></div>

            <div class="fixed inset-0 flex">

                <div class="relative mr-16 flex w-full max-w-xs flex-1">

                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" x-on:click="open = ! open">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-2 ring-1 ring-white/10">
                        <div class="flex h-16 shrink-0 items-center">
                            @include('icons.logo')
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                @foreach ($items as $item)
                                    <li>
                                        <a class="text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ is_current($item['route']) }}"
                                            href="{{ route($item['route']) }}">
                                            @include('icons.' . $item['icon'])
                                            {{ $item['label'] }}
                                        </a>
                                    </li>
                                @endforeach

                                <li class="pt-2 !mt-4 block border-t border-gray-800">
                                    <div>
                                        <button
                                            class="text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            wire:click='$set("logout_popup", true)'>
                                            Log out
                                        </button>
                                    </div>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- DESKTOP --}}
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6">
                <div class="pt-4">@include('icons.logo')</div>
                <nav class="flex flex-1 flex-col mt-6">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                @foreach ($items as $item)
                                    <li>

                                        <a class="text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ is_current($item['route']) }}"
                                            href="{{ route($item['route']) }}">
                                            @include('icons.' . $item['icon'])
                                            {{ $item['label'] }}
                                        </a>
                                    </li>
                                @endforeach

                                <li class="pt-2 !mt-4 block border-t border-gray-800">
                                    <div>
                                        <button
                                            class="text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            wire:click='$set("logout_popup", true)'>
                                            Log out
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="-mx-6 mt-auto">
                            <a href="{{ route('dashboard.profile') }}"
                                class="flex items-center gap-x-3 px-6 py-3 text-sm font-semibold leading-6 text-white hover:bg-gray-800">
                                <div
                                    class="h-8 w-8 rounded-full bg-gray-900 border border-gray-600 flex items-center justify-center text-white">
                                    {{ $user->first_name[0] . $user->last_name[0] }}
                                </div>
                                <span class="sr-only">Your profile</span>
                                <span aria-hidden="true">{{ $user->first_name . ' ' . $user->last_name }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div
            class="sticky top-0 z-40 flex items-center justify-between gap-x-6 bg-gray-900 px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-400 lg:hidden" x-on:click="open = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <a href="{{ route('dashboard.profile') }}"
                class="flex items-center gap-x-3 px-6 py-3 text-sm font-semibold leading-6 text-white hover:bg-gray-800">
                <div
                    class="h-8 w-8 rounded-full bg-gray-900 border border-gray-600 flex items-center justify-center text-white">
                    {{ $user->first_name[0] . $user->last_name[0] }}
                </div>
                <span class="sr-only">Your profile</span>
            </a>
        </div>



        @if ($logout_popup)
            <div class="popup-wrapper">
                <div class=" bg-white w-11/12 py-10 md:py-16 px-6 md:px-24 max-w-3xl mx-4">
                    <h2 class="text-gray-900 text-lg md:text-xl xl:text-2xl text-center leading-snug font-semibold">Are
                        you sure you
                        want to log out of
                        your dashboard?</h2>
                    <div class="mt-10 grid grid-cols-2 gap-6">
                        @include('partials.back_btn')
                        <a class="btn" href="{{ route('user.logout') }}">{{ __('Log out') }}</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endauth
