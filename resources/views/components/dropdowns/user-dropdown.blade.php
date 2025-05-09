<div x-data="{ open: false }" class="relative">
  <a href="#" @click.prevent="open = !open"
     class="text-blueGray-500 block">
    <div class="items-center flex">
      <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
        <img
          alt="..."
          class="w-full rounded-full align-middle border-none shadow-lg"
          src="{{ asset('assets/img/team-1-800x800.jpg') }}"
        />
      </span>
    </div>
  </a>

  <div x-show="open" @click.away="open = false"
       class="absolute left-0 z-50 bg-white text-base float-left py-2 list-none text-left rounded shadow-lg min-w-48">
    <a href="#" class="text-sm py-2 px-4 block text-blueGray-700 hover:bg-blueGray-100" @click.prevent>
      Action
    </a>
    <a href="#" class="text-sm py-2 px-4 block text-blueGray-700 hover:bg-blueGray-100" @click.prevent>
      Another action
    </a>
    <a href="#" class="text-sm py-2 px-4 block text-blueGray-700 hover:bg-blueGray-100" @click.prevent>
      Something else here
    </a>
    <div class="h-0 my-2 border border-solid border-blueGray-100" />
    <a href="#" class="text-sm py-2 px-4 block text-blueGray-700 hover:bg-blueGray-100" @click.prevent>
      Separated link
    </a>
  </div>
</div>
