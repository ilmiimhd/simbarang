<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
  <div class="rounded-t bg-white mb-0 px-6 py-6">
    <div class="text-center flex justify-between">
      <h6 class="text-blueGray-700 text-xl font-bold">My account</h6>
      <button
        class="bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
        type="button"
      >
        Settings
      </button>
    </div>
  </div>
  <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    <form>
      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        User Information
      </h6>
      <div class="flex flex-wrap">
        @foreach ([
          ['label' => 'Username', 'type' => 'text', 'value' => 'lucky.jesse'],
          ['label' => 'Email address', 'type' => 'email', 'value' => 'jesse@example.com'],
          ['label' => 'First Name', 'type' => 'text', 'value' => 'Lucky'],
          ['label' => 'Last Name', 'type' => 'text', 'value' => 'Jesse'],
        ] as $index => $field)
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                {{ $field['label'] }}
              </label>
              <input
                type="{{ $field['type'] }}"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                value="{{ $field['value'] }}"
              />
            </div>
          </div>
        @endforeach
      </div>

      <hr class="mt-6 border-b-1 border-blueGray-300" />

      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Contact Information
      </h6>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
              Address
            </label>
            <input
              type="text"
              value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            />
          </div>
        </div>
        @foreach ([
          ['label' => 'City', 'value' => 'New York'],
          ['label' => 'Country', 'value' => 'United States'],
          ['label' => 'Postal Code', 'value' => 'Postal Code'],
        ] as $field)
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                {{ $field['label'] }}
              </label>
              <input
                type="text"
                value="{{ $field['value'] }}"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              />
            </div>
          </div>
        @endforeach
      </div>

      <hr class="mt-6 border-b-1 border-blueGray-300" />

      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        About Me
      </h6>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
              About me
            </label>
            <textarea
              rows="4"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            >A beautiful UI Kit and Admin for React & Tailwind CSS. It is Free and Open Source.</textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>