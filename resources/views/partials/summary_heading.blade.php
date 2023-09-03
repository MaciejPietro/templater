  <div class="flex justify-between pb-4 border-b border-gray-500">
    <h2 class="font-semibold text-md text-gray-900">{{ __($title) }}</h2>
    @include('partials.edit', ['fn' => 'startEditing(' . $route . ')'])
  </div>
