<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
  <div class="rounded-t mb-0 px-4 py-3 border-0">
    <div class="flex flex-wrap items-center">
      <div class="relative w-full px-4 max-w-full flex-grow flex-1">
        <h3 class="font-semibold text-lg text-blueGray-700">Card Tables</h3>
      </div>
    </div>
  </div>
  <div class="block w-full overflow-x-auto">
    <table class="items-center w-full bg-transparent border-collapse">
      <thead>
        <tr>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Project</th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Budget</th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Status</th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Users</th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Completion</th>
          <th class="px-6 bg-blueGray-50 border-blueGray-100"></th>
        </tr>
      </thead>
      <tbody>
        {{-- Copy isi <tr> satu-satu dari versi JS ke HTML biasa --}}
        <tr>
          <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
            <img src="{{ asset('assets/img/bootstrap.jpg') }}" class="h-12 w-12 bg-white rounded-full border" alt="..." />
            <span class="ml-3 font-bold text-blueGray-600">Argon Design System</span>
          </th>
          <td class="border-t-0 px-6 align-middle text-xs p-4">$2,500 USD</td>
          <td class="border-t-0 px-6 align-middle text-xs p-4"><i class="fas fa-circle text-orange-500 mr-2"></i> pending</td>
          <td class="border-t-0 px-6 align-middle text-xs p-4">
            <div class="flex">
              <img src="{{ asset('assets/img/team-1-800x800.jpg') }}" class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow" />
              <img src="{{ asset('assets/img/team-2-800x800.jpg') }}" class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4" />
              <img src="{{ asset('assets/img/team-3-800x800.jpg') }}" class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4" />
              <img src="{{ asset('assets/img/team-4-470x470.png') }}" class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow -ml-4" />
            </div>
          </td>
          <td class="border-t-0 px-6 align-middle text-xs p-4">
            <div class="flex items-center">
              <span class="mr-2">60%</span>
              <div class="relative w-full">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                  <div style="width: 60%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                </div>
              </div>
            </div>
          </td>
          <td class="border-t-0 px-6 align-middle text-xs p-4 text-right">
            {{-- Kamu bisa ganti TableDropdown dengan dropdown statis / blade komponen nanti --}}
            <x-dropdowns.table-dropdown />
          </td>
        </tr>
        {{-- Lanjutkan tr lain di sini --}}
      </tbody>
    </table>
  </div>
</div>