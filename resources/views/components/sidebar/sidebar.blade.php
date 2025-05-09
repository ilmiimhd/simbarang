<div x-data="{ collapseShow: false }">
  <nav class="md:left-0 md:fixed md:top-0 md:bottom-0 md:w-64 md:overflow-y-auto bg-white shadow-xl z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">

      {{-- Toggler --}}
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
        type="button"
        @click="collapseShow = !collapseShow"
      >
        <template x-if="!collapseShow">
          <i class="fas fa-bars"></i>
        </template>
        <template x-if="collapseShow">
          <i class="fas fa-times"></i>
        </template>
      </button>

      {{-- Brand --}}
      <a href="{{ url('/') }}" class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
        Notus React
      </a>

      {{-- Collapse --}}
      <div
      :class="collapseShow ? 'block' : 'hidden'"
      class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 m-2 py-3 px-6 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded bg-white"
      >
        {{-- Collapse Header --}}
        <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <a href="{{ url('/') }}" class="md:block text-left md:pb-2 text-blueGray-600 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
                Notus React
              </a>
            </div>
            <div class="w-6/12 flex justify-end">
              <button
                type="button"
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                @click="collapseShow = false"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>

        {{-- Search Form (Mobile only) --}}
        <form class="mt-6 mb-4 md:hidden">
          <div class="mb-3 pt-0">
            <input
              type="text"
              placeholder="Search"
              class="border-0 px-3 py-2 h-12 border border-solid  border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
            />
          </div>
        </form>

        {{-- Divider --}}
        <hr class="my-4 md:min-w-full" />

        {{-- Admin Layout --}}
        <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Admin Layout Pages
        </h6>

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
          <a href="{{ url('/admin/dashboard') }}"
            class="text-sm py-2 px-4 font-semibold flex items-center hover:text-blue-500
                    {{ request()->is('admin/dashboard') ? 'text-blue-500 bg-blueGray-100 rounded-lg' : 'text-blueGray-700' }}">
            <i class="fas fa-tv mr-2 text-base"></i>
            Dashboard
          </a>
          </li>
          <li class="items-center">
            <a href="{{ url('/admin/settings') }}" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
              <i class="fas fa-tools mr-2 text-sm text-blueGray-300"></i>
              Settings
            </a>
          </li>
          <li class="items-center">
            <a href="{{ url('/admin/tables') }}" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
              <i class="fas fa-table mr-2 text-sm text-blueGray-300"></i>
              Tables
            </a>
          </li>
          <li class="items-center">
            <a href="{{ url('/admin/maps') }}" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
              <i class="fas fa-map-marked mr-2 text-sm text-blueGray-300"></i>
              Maps
            </a>
          </li>
        </ul>

        <hr class="my-4 md:min-w-full" />

        {{-- Auth Layout --}}
        <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Auth Layout Pages
        </h6>
        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <li class="items-center">
            <a href="{{ url('/auth/login') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
              <i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
              Login
            </a>
          </li>
          <li class="items-center">
            <a href="{{ url('/auth/register') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
              <i class="fas fa-clipboard-list text-blueGray-300 mr-2 text-sm"></i>
              Register
            </a>
          </li>
        </ul>

        <hr class="my-4 md:min-w-full" />

        {{-- No Layout --}}
        <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          No Layout Pages
        </h6>
        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <li class="items-center">
            <a href="{{ url('/landing') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
              <i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
              Landing Page
            </a>
          </li>
          <li class="items-center">
            <a href="{{ url('/profile') }}" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
              <i class="fas fa-user-circle text-blueGray-400 mr-2 text-sm"></i>
              Profile Page
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
