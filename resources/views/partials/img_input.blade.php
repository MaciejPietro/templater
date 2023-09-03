 <div>
   <div class="relative rounded-full mx-auto md:mx-0 {{ isset($class) ? $class : '' }}">
     @if ($file)
       <img class="w-full h-full object-cover rounded-full" src="{{ asset($file) }}" alt="{{ $name }} image">
     @elseif($name !== 'signature')
       @include('icons.' . $name)
     @endif
     <div
       class="flex overflow-hidden justify-center items-center absolute -top-1.5 -right-3 w-9 h-9 bg-cyan rounded-full border-2 border-white">
       @include('icons.pen_alt')
       <input class="opacity-0 absolute top-0 left-0 w-9 h-9 cursor-pointer" type="file" id="{{ $model }}"
         name="{{ $model }}" wire:model="{{ $model }}" @if ($name == 'signature') wire:change="uploadDocumentSignature" @endif
         accept="image/jpeg, image/png">
     </div>
   </div>
 </div>
