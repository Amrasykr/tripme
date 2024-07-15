<nav x-data="accordion(6)" class="fixed top-0 z-40 flex flex-wrap items-center justify-between w-full px-4 py-5 tracking-wideshadow-md bg-white bg-opacity-90 md:py-8 md:px-8 lg:px-20">
    <!-- Left nav -->
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-32 ">
    </div>
    <!-- End left nav -->

    <!-- Right nav -->
    <!-- Show menu sm,md -->
    <!-- Toggle button -->
    <div @click="handleClick()" x-data="{open : false}" class="block text-gray-600 cursor-pointer lg:hidden">
      <button @click="open = ! open" class="w-6 h-6 text-lg">
        <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" :clas="{'transition-full each-in-out transform duration-500':! open}">
          <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
          <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <!-- End toggle button -->

    <!-- Toggle menu -->
    <div x-ref="tab" :style="handleToggle()" class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
      <div class="flex flex-col mb-3 mt-7 space-y-2 text-lg hover:font-b text-gray-900">
        <a href="/" class="hover:text-purple-700"><span>Home</span></a>
        <hr>
        <a href="/destination" class="hover:text-purple-700"><span>Destination</span></a>
        <hr>
        <a href="/about" class="hover:text-purple-700"><span>About</span></a>
      </div>

      <div>
        <a href="/register" class="w-full flex items-center justify-center  px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-gray-900 bg-slate-900 hover:bg-slate-500 hover:text-purple-700">
          Sign up
        </a>
        <p class="mt-6 text-center text-base font-medium ">
          <a href="/login" class="text-gray-900 hover:text-purple-700">
            Sign in
          </a>
        </p>
      </div>
    </div>
    <!-- End toggle menu -->
    <!-- End show menu sm,md -->

    <!-- Show Menu lg -->
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
      <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-900 lg:pt-0 list-reset lg:flex">
        <div class="mr-3">
          <a href="/" class="inline-block px-4 py-2 no-underline hover:text-purple-700 text-gray-900">
            Home
          </a>
        </div>

        <div class="mr-3">
          <a href="/destination" class="inline-block px-4 py-2 no-underline hover:text-purple-700 text-gray-900">
            Destination
          </a>
        </div>

        <div class="mr-3">
            <a href="/about" class="inline-block px-4 py-2 no-underline hover:text-purple-700 text-gray-900">
              About
            </a>
          </div>

      </div>
    </div>
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
      <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-900 lg:pt-0 list-reset lg:flex">
        <a href="/login" class="whitespace-nowrap text-base font-medium text-gray-900 hover:text-purple-700">
          Sign in
        </a>
        <a href="/register" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-900 hover:bg-purple-700 ">
          Sign up
        </a>
      </div>
    </div>
    <!-- End show Menu lg -->
    <!-- End right nav -->
  </nav>
  <script>
    // Faq
    document.addEventListener('alpine:init', () => {
      Alpine.store('accordion', {
        tab: 0
      });
      Alpine.data('accordion', (idx) => ({
        init() {
          this.idx = idx;
        },
        idx: -1,
        handleClick() {
          this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
          return this.$store.accordion.tab === this.idx ? '-rotate-180' : '';
        },
        handleToggle() {
          return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
        }
      }));
    })
    //  end faq
  </script>