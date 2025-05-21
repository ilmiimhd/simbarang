<div x-data="{ collapseShow: false }">
  <nav class="md:left-0 md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">

      {{-- Toggler --}}
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
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
      <a href="{{ route('staff.dashboard') }}" class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
        SIMBARANG
      </a>

      {{-- Collapse --}}
      <div
        :class="collapseShow ? 'block bg-white m-2 py-3 px-6' : 'hidden'"
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
      >

      {{-- Collapse Header (mobile only) --}}
      <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
        <div class="flex flex-wrap">
          <div class="w-6/12">
            <a href="{{ route('staff.dashboard') }}" class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
                SIMBARANG
              </a>
          </div>
          <div class="w-6/12 flex justify-end">
            <button
              class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
              @click="collapseShow = false"
            >
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>

        {{-- Divider --}}
        <hr class="my-4 md:min-w-full" />

        {{-- Menu Staff --}}
        <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Menu Staff
        </h6>
        <ul class="md:flex-col md:min-w-full flex flex-col list-none">

          {{-- Dashboard --}}
          <li class="items-center">
            <a href="{{ route('staff.dashboard') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('staff.dashboard') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-tv mr-2 text-sm {{ request()->routeIs('staff.dashboard') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Dashboard
            </a>
          </li>

          {{-- Barang --}}
          <li class="items-center">
            <a href="{{ route('staff.barang.index') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('staff.barang.index') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-boxes mr-2 text-sm {{ request()->routeIs('staff.barang.index') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Barang
            </a>
          </li>

          {{-- Kerusakan --}}
          <li class="items-center">
            <a href="{{ route('staff.kerusakan.index') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('staff.kerusakan.index') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-tools mr-2 text-sm {{ request()->routeIs('staff.kerusakan.index') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Kerusakan
            </a>
          </li>

          {{-- Pengadaan --}}
          <li class="items-center">
            <a href="{{ route('staff.pengadaan.index') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('staff.pengadaan.index') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-money-bill-wave mr-2 text-sm {{ request()->routeIs('staff.pengadaan.index') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Pengadaan
            </a>
          </li>

          {{-- Notice Pajak --}}
          <li class="items-center">
            <a href="{{ route('staff.notice.index') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('staff.notice.index') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-file-invoice mr-2 text-sm {{ request()->routeIs('staff.notice.index') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Notice Pajak
            </a>
          </li>

          {{-- Profil --}}
          <li class="items-center">
            <a href="{{ route('profile.edit') }}"
              class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('profile.edit') ? 'text-lightBlue-500 hover:text-lightBlue-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
              <i class="fas fa-user mr-2 text-sm {{ request()->routeIs('profile.edit') ? 'opacity-75' : 'text-blueGray-300' }}"></i>
              Profil
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</div>