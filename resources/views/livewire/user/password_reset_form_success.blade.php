<div class="popup-wrapper">
  <div class="popup-box flex flex-col items-center">
    @include('icons.tick_big')
    <h2 class="text-gray-700 text-lg md:text-xl font-semibold mt-8 max-w-md text-center">Password reset link sent to your
      mailbox
    </h2>
    <div class="mt-12">
      @include('partials.back_btn', ['name' => 'Back', 'fn' => '$emitUp("close_pass")'])
    </div>
  </div>
</div>
