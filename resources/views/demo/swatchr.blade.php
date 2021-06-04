@inject('str', \Illuminate\Support\Str::class)

<div class="relative">
  @if (empty($swatch))
  <x-container>
    <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
      <div class="px-4 py-5 sm:px-8 sm:py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-gray-500">
          <div class="text-center">
            <x-heroicon-o-color-swatch class="w-16 h-16 mb-4 mx-auto text-purple-600"/>
            <h3 class="text-xl p-2 text-purple-400">Sophisticated Swatch Generation</h3>
            <p class="text-sm">We use sophisticated AI algorithms based on blockchain technology to meet your swatch needs.</p>
          </div>
          <div class="text-center">
            <x-heroicon-o-globe-alt class="w-16 h-16 mb-4 mx-auto text-blue-500"/>
            <h3 class="text-xl p-2 text-blue-400">Just-In-Time Swatch Delivery</h3>
            <p class="text-sm">Never worry about excess swatches again. Our JIT delivery system ensures you only have what you need.</p>
          </div>
          <div class="text-center">
            <x-heroicon-o-map class="w-16 h-16 mb-4 mx-auto text-green-300"/>
            <h3 class="text-xl p-2 text-green-400">On-Demand Swatch Syncronicity</h3>
            <p class="text-sm">Our tools put you and your team in complete control of your swatch demands, no matter the industry lifecyle.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gradient-to-l from-green-300 via-blue-500 to-purple-600 overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6 flex justify-between items-center">
        <p class="text-gray-100 text-2xl">Just Swatch Me Already!</p>
        <button
          type="button"
          class="inline-flex items-center px-4 py-2 border border-transparent text-xl font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
          wire:click="generateSwatch"
        >
          Go
          <x-heroicon-s-arrow-sm-right class="w-6 h-6 ml-1"/>
        </button>
      </div>
    </div>
  </x-container>
  @else
  <x-container>
    <div class="bg-white overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6">
        <div class="flex justify-center flex-wrap mb-8">
          @foreach($swatch as $hex)
          <div class="text-center">
            <div class="w-24 h-24 sm:w-40 sm:h-40 relative border border-gray-400 m-4 rounded" style="background-color: {{ $hex }}"></div>
            <p>{{ $hex }}</p>
          </div>
          @endforeach
        </div>
        <div class="flex flex-col items-center">
          <div class="mb-2">
            <button
              type="button"
              class="inline-flex items-center px-4 py-2 border border-transparent text-xl font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
              wire:click="generateSwatch"
            >
              <x-heroicon-s-color-swatch class="w-6 h-6 mr-1"/>
              Again!
            </button>
          </div>
          <div class="flex items-center text-gray-500 space-x-2">
            @if ($count < 6)
            <button wire:click="incrementCount" title="More shades!">
              <x-heroicon-s-plus class="w-6 h-6" />
            </button>
            @endif
            <span>{{ $count }} {{ $str->plural('shade', $count)}}</span>
            @if ($count > 1)
            <button wire:click="decrementCount" title="Fewer shades!">
              <x-heroicon-s-minus class="w-6 h-6"/>
            </button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </x-container>
  @endif
</div>
