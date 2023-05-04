<div class="py-6 bg-fixed bg-cover"style="background-image: url('header7.png');">
  <div class="px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-col -mx-4 md:flex-row">
    <div class="px-4 md:flex-1">
  <div x-data="{ image: 'SHARK/shark-d-skwal-2-shigan-full-face-helmet.png' }" x-cloak>
    <div class="mb-4 rounded-lg h-96 md:h-80">
      <div x-show="image === 'SHARK/shark-d-skwal-2-shigan-full-face-helmet.png'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
        <span class=""><img class="h-52 w-52" src="SHARK/shark-d-skwal-2-shigan-full-face-helmet.png" alt=""></span>
      </div>

      <div x-show="image === 'SHARK/shark-evo-es-k-rozen-full-face-helmet.png'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
        <span class="text-5xl"><img class="h-52 w-52" src="SHARK/shark-evo-es-k-rozen-full-face-helmet.png" alt=""></span>
      </div>

      <div x-show="image === 'SHARK/shark-spartan-gt-carbon-full-face-helmet.png'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
        <span class="text-5xl"><img class="h-52 w-52" src="SHARK/shark-spartan-gt-carbon-full-face-helmet.png" alt=""></span>
      </div>

      <div x-show="image === 'SHARK/shark-spartan-gt-carbon-full-face-helmet__1.png'" class="flex items-center justify-center h-64 mb-4 border rounded-lg md:h-80">
        <span class="text-5xl"><img class="h-52 w-52" src="SHARK/shark-spartan-gt-carbon-full-face-helmet__1.png" alt=""></span>
      </div>
    </div>

    <div class="flex mb-4 -mx-2">
      <template x-for="i in ['SHARK/shark-d-skwal-2-shigan-full-face-helmet.png', 'SHARK/shark-evo-es-k-rozen-full-face-helmet.png', 'SHARK/shark-spartan-gt-carbon-full-face-helmet.png', 'SHARK/shark-spartan-gt-carbon-full-face-helmet__1.png']">
        <div class="flex-1 px-2">
          <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }"
            class="flex items-center justify-center w-full h-24 border rounded-lg focus:outline-none md:h-32">
            <span><img class="w-16 h-16" :src="i" alt=""></span>
          </button>
        </div>
      </template>
    </div>
  </div>
</div>

      <div class="px-4 md:flex-1">
        <h2 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-300 md:text-4xl">SHARK RHAD
HE0820BUS</h2>
        <p class="text-sm text-gray-500">By <a href="#" class="text-indigo-600 hover:underline">SHARK</a></p>

        <div class="flex items-center my-4 space-x-4">
          <div>
            <div class="flex px-1 py-0.5 bg-gray-300 rounded-lg">
              <span class="mt-2 mr-1 text-indigo-400">$</span>
              <span class="text-3xl font-bold text-indigo-600">47,000</span>
            </div>
          </div>
          <div class="flex-1">
            <p class="text-xl font-semibold text-red-500">SALE 10% OFF</p>
            <p class="text-sm text-gray-400">Free delivery</p>
          </div>
        </div>

        <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem porro
          saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.</p>

          <div class="mx-auto">
          <h2 class="mb-2 text-sm font-bold leading-tight tracking-tight text-gray-300 md:text-lg">Sizes:</h2>
                    <button type="button"
                        class="text-gray-300 hover:text-gray-300 border hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm min-[375px]:mr-1 px-5 py-2.5 text-center mr-2 mb-2">XS</button>
                    <button type="button"
                        class="text-gray-300 hover:text-gray-300 border hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm  min-[375px]:mr-1 px-5 py-2.5 text-center mr-2 mb-2">S</button>
                    <button type="button"
                        class="text-gray-300 hover:text-gray-300 border hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm min-[375px]:mr-1  px-5 py-2.5 text-center mr-2 mb-2">M</button>
                    <button type="button"
                        class="text-gray-300 hover:text-gray-300 border hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm min-[375px]:mr-1  px-5 py-2.5 text-center mr-2 mb-2">L</button>
                    <button type="button"
                        class="text-gray-300 hover:text-gray-300 border hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm  min-[375px]:mr-1 px-5 py-2.5 text-center mr-2 mb-2">XL</button>
                </div>
        <div class="flex py-4 space-x-4">
          <div class="relative">
            <div
              class="absolute left-0 right-0 block pt-2 text-xs font-semibold tracking-wide text-center text-gray-400 uppercase">
              Qty</div>
            <select
              class="flex items-center h-12 pt-4 pb-1 pl-8 bg-gray-300 border appearance-none cursor-pointer rounded-xl">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <button type="button"
            class="h-12 px-6 py-2 font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-500">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  </div>
</div>