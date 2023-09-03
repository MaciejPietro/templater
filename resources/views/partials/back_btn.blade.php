    <button type="button" class="btn btn--gray px-16 sm:w-auto"
      wire:click="{{ isset($fn) ? $fn : 'stopEditing()' }}">{{ isset($name) ? $name : 'Cancel' }}</button>
