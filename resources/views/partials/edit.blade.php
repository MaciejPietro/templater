 <button wire:click="{{ $fn }}"
     class="h-8 flex items-center gap-2 px-3 py-0 bg-white rounded-full cursor-pointer hover:bg-gray-200 font-bold shadow-2xl transition-colors {{ isset($class) ? $class : '' }}">
     {{-- @if (isset($icon) && $icon)
     @include('icons.pen')
   @endif --}}
     <span class="text-xs uppercase text-gray-700">{{ isset($btn_name) ? $btn_name : 'Edit' }}</span>
 </button>
