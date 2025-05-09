<footer class="block py-4">
  <div class="container mx-auto px-4">
    <hr class="mb-4 border-b-1 border-blueGray-200" />
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4">
        <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
          Copyright © {{ date('Y') }}
          <a href="https://www.creative-tim.com?ref=nr-footer-admin"
             class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
            Creative Tim
          </a>
        </div>
      </div>
      <div class="w-full md:w-8/12 px-4">
        <ul class="flex flex-wrap list-none md:justify-end justify-center">
          @foreach([
              ['Creative Tim', 'https://www.creative-tim.com?ref=nr-footer-admin'],
              ['About Us', 'https://www.creative-tim.com/presentation?ref=nr-footer-admin'],
              ['Blog', 'http://blog.creative-tim.com?ref=nr-footer-admin'],
              ['MIT License', 'https://github.com/creativetimofficial/notus-react/blob/main/LICENSE.md?ref=nr-footer-admin']
          ] as [$label, $url])
            <li>
              <a href="{{ $url }}"
                 class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                {{ $label }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</footer>
