@props(['absolute' => false])

<footer class="{{ $absolute ? 'absolute w-full bottom-0 bg-blueGray-800' : 'relative' }} pb-6">
  <div class="container mx-auto px-4">
    <hr class="mb-6 border-b-1 border-blueGray-600" />
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full text-center px-4">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          &copy; {{ date('Y') }} SIMBARANG – SAMSAT Kabupaten Kapuas.
        </div>
      </div>
    </div>
  </div>
</footer>