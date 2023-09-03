@if(isset($errors->getMessages()['trustees']))
    <div class="popup-wrapper">
        <div class="popup-box">
            <div class="flex flex-col items-center">
                @include('icons.tick_red')
                <h1 class="popup-title popup-title--dark leading-normal text-center mt-6">Error</h1>
                <div class="bg-gray-400 p-4 -mt-3 rounded">
                    @foreach ($errors->getMessages()['trustees'] as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                <a class="btn btn--gray mt-8 cursor-pointer" wire:click="resetError('trustees')">Close</a>
            </div>
        </div>
    </div>
@endif

@foreach ($trustees as $key => $trustee)
    <div class="w-full h-0.5 bg-gray-300 mb-8 mt-10 {{ $key > 0 ?: 'hidden' }}"></div>
    @include('livewire.application.trustee', ['i' => $loop->index, 'trustee' => $trustee])
@endforeach
