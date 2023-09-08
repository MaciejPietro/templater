@php
    $is_admin = auth()
        ->user()
        ->hasRole('admin');
    
@endphp

@if ($is_admin)
    <div>
        <livewire:user.add-user />

        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Position
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Role
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Added
                                    at</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" wire:poll="getUsers">
                            @foreach ($users as $user)
                                <tr
                                    class="{{ $user->id === auth()->user()->id ? 'opacity-50 pointer-events-none' : '' }}">
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        {{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $user->phone ?: '-' }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $user->position ?: '-' }}</td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @foreach ($user->getRoleNames() as $item)
                                            {{ $item }}
                                        @endforeach
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $user->created_at }}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <div class="flex gap-2">
                                            <button wire:click="openDeleteUserPopup({{ $user }})"
                                                class="text-red-600 hover:text-red-900">
                                                @include('icons.trash')
                                                <span class="sr-only">Delete , {{ $user->first_name }}
                                                    {{ $user->last_name }}</span>
                                            </button>
                                            <button wire:click="openEditUserPopup({{ $user }})"
                                                class="text-blue-600 hover:text-blue-900">
                                                @include('icons.pencil')
                                                <span class="sr-only">Edit , {{ $user->first_name }}
                                                    {{ $user->last_name }}</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if ($user_to_delete)
            <div class="popup-wrapper">
                <div class="popup-box text-center">
                    <h2 class="text-gray-700 text-xl font-semibold">Delete user</h2>
                    <div class="mt-6 text-gray-600">Do you really want to delete user
                        <b class="text-blue-500">{{ $user_to_delete['first_name'] }}
                            {{ $user_to_delete['last_name'] }}</b>?
                    </div>
                    <div class="grid grid-cols-2 gap-8 mt-10">
                        <button type="button" class="btn btn--gray"
                            wire:click="$set('user_to_delete', false)">Cancel</button>
                        <button type="resetPassword" class="btn btn--red" wire:click="deleteUser()">Delete</button>
                    </div>
                </div>
            </div>
        @endif


        @if ($user_to_edit)
            <div class="popup-wrapper">
                <div class="popup-box">
                    <h2 class="text-gray-700 text-xl font-semibold">Edit user {{ $user_to_edit['first_name'] }}
                        {{ $user_to_edit['last_name'] }}</h2>


                    @livewire('user.user-form', [
                        'method' => 'updateUser',
                        'user_id' => $user_to_edit['id'],
                        'first_name' => $user_to_edit['first_name'],
                        'last_name' => $user_to_edit['last_name'],
                        'email' => $user_to_edit['email'],
                        'phone' => $user_to_edit['phone'],
                        'position' => $user_to_edit['position'],
                        'role' => isset($user_to_edit['roles'][0]) ? $user_to_edit['roles'][0]['name'] : null,
                    ])
                </div>
            </div>
        @endif


    </div>
@else
    <p class="mt-10 text-base">Login as admin to view this list</p>
@endif
