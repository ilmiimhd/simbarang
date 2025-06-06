<footer class="relative bg-blueGray-200 pt-8 pb-6">
  <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
       style="transform: translateZ(0)">
    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
         preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
      <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap text-center lg:text-left">
      <div class="w-full lg:w-6/12 px-4">
        <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
        <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
          Find us on any of these platforms, we respond 1-2 business days.
        </h5>
        <div class="mt-6 lg:mb-0 mb-6">
          @foreach ([
              ['fab fa-twitter', 'text-lightBlue-400'],
              ['fab fa-facebook-square', 'text-lightBlue-600'],
              ['fab fa-dribbble', 'text-pink-400'],
              ['fab fa-github', 'text-blueGray-800'],
          ] as [$icon, $color])
            <button type="button"
                    class="bg-white {{ $color }} shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2">
              <i class="{{ $icon }}"></i>
            </button>
          @endforeach
        </div>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">
              Useful Links
            </span>
            <ul class="list-unstyled">
              <li><a href="https://www.creative-tim.com/presentation?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">About Us</a></li>
              <li><a href="https://blog.creative-tim.com?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Blog</a></li>
              <li><a href="https://www.github.com/creativetimofficial?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Github</a></li>
              <li><a href="https://www.creative-tim.com/bootstrap-themes/free?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Free Products</a></li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">
              Other Resources
            </span>
            <ul class="list-unstyled">
              <li><a href="https://github.com/creativetimofficial/notus-react/blob/main/LICENSE.md?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">MIT License</a></li>
              <li><a href="https://creative-tim.com/terms?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Terms & Conditions</a></li>
              <li><a href="https://creative-tim.com/privacy?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Privacy Policy</a></li>
              <li><a href="https://creative-tim.com/contact-us?ref=nr-footer"
                     class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-6 border-blueGray-300" />
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Copyright © {{ date('Y') }} Notus React by
          <a href="https://www.creative-tim.com?ref=nr-footer"
             class="text-blueGray-500 hover:text-blueGray-800">Creative Tim</a>.
        </div>
      </div>
    </div>
  </div>
</footer>
