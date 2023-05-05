<div class="py-6 bg-fixed bg-cover" style="background-image: url('header7.png');">
  <div class="px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-col -mx-4 md:flex-row">
      <div class="px-4 md:flex-1">
        <div x-data="{ image: 'assets/images/sample_product/front.webp' }" x-cloak>
          <div class="mb-4 rounded-lg h-full md:h-full">
            <div x-show="image === 'assets/images/sample_product/front.webp'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
              <span class=""><img class="h-56 w-52" src="assets/images/sample_product/front.webp" alt=""></span>
            </div>

            <div x-show="image === 'assets/images/sample_product/side.webp'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
              <span class="text-5xl"><img class="h-full w-56" src="assets/images/sample_product/side.webp" alt=""></span>
            </div>

            <div x-show="image === 'assets/images/sample_product/back.webp'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
              <span class="text-5xl"><img class="h-full w-56" src="assets/images/sample_product/back.webp" alt=""></span>
            </div>


          </div>

          <div class="flex mb-4 -mx-2">
            <template x-for="i in ['assets/images/sample_product/front.webp', 'assets/images/sample_product/side.webp', 'assets/images/sample_product/back.webp']">
              <div class="flex-1 px-2">
                <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="flex items-center justify-center w-full h-24 border rounded-lg focus:outline-none md:h-32">
                  <span><img class="w-16 h-16" :src="i" alt=""></span>
                </button>
              </div>
            </template>
          </div>
        </div>
      </div>

      <div class="px-4 md:flex-1">
        <h2 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-300 md:text-4xl">Shark Helmet
          D-Skwal 2 Shigan</h2>
        <p class="text-lg text-gray-500">By <a href="#" class="text-blue-500  hover:underline">SHARK
            Helmet's</a></p>

        <div class="flex items-center my-4 space-x-4">
          <div>
            <div href="#_" class="relative inline-block px-4 py-2 font-medium group">
              <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
              <span class="absolute inset-0 text-xl  w-full h-full bg-white border-2 border-black group-hover:bg-black  group-hover:text-white">₱</span>
              <span class="relative text-black group-hover:text-white">47,000</span>
            </div>
          </div>
          <div class="flex-1">
            <p class="text-xl font-semibold text-red-500">SALE 10% OFF</p>
            <p class="text-sm text-gray-400">Free delivery</p>
          </div>
        </div>

        <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem
          porro
          saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.</p>

        <div class="mx-auto">
          <h2 class="mb-2 text-sm font-bold leading-tight tracking-tight text-gray-300 md:text-lg">Sizes:</h2>
          <a href="#_" class="relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">XS</span>
          </a>
          <a href="#_" class="relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">S</span>
          </a>
          <a href="#_" class="relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">M</span>
          </a>
          <a href="#_" class="relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">L</span>
          </a>
          <a href="#_" class="relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">XL</span>
          </a>
        </div>
        <div class="flex py-4 space-x-4">
          <div class="relative">
            <div class="absolute left-0 right-0 block pt-2 text-xs font-semibold tracking-wide text-center text-black uppercase">
              Qty</div>
            <select class="flex items-center h-12 pt-4 pb-1 pl-8 bg-white border-2 border-black group-hover:bg-black appearance-none cursor-pointer">
              <option class="hover:bg-black hover:">1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <a href="#" class="flex justify-center relative inline-block px-4 py-2 font-medium group">
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">Add to Cart</span>
          </a>

        </div>
      </div>
    </div>
  </div>
</div>