<div>
    <button type="button" wire:click="$set('is_open', true)"
        class="ml-auto block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
        user</button>

    @if ($is_open)
        <div class="popup-wrapper">
            <div class="popup-box">
                <h2 class="text-gray-700 text-xl font-semibold">Add new user</h2>

                @livewire('user.user-form', ['method' => 'addUser'])
            </div>
        </div>
    @endif

</div>
