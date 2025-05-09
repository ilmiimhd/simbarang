<nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
    {{-- Brand --}}
    <a href="#" onclick="event.preventDefault()"
       class="text-white text-sm uppercase hidden lg:inline-block font-semibold">
      Dashboard
    </a>

    {{-- Search Form --}}
    <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
      <div class="relative flex w-full flex-wrap items-stretch">
        <span
          class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
          <i class="fas fa-search"></i>
        </span>
        <input type="text" placeholder="Search here..."
          class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10" />
      </div>
    </form>

    {{-- User Dropdown Placeholder --}}
    <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
      <li class="relative">
        <a href="#" onclick="event.preventDefault();"
          class="text-blueGray-500 block">
          <div class="items-center flex">
            <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
              <img
                alt="..."
                class="w-full rounded-full align-middle border-none shadow-lg"
                src="{{ asset('img/team-1-800x800.jpg') }}" />
            </span>
          </div>
        </a>
        {{-- Optional dropdown logic here --}}
      </li>
    </ul>
  </div>
</nav>
