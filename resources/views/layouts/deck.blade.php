<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @hasSection('title')
    <title>@yield('title')</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="@version('css/app.css')">
  <livewire:styles />

  <!-- Scripts -->
  <script src="@version('/js/app.js')" defer></script>
</head>

<body class="font-sans antialiased" style="background-image: url('{{ asset('img/halftone.png') }}">
  <div class="h-screen bg-blue-gray-50 dark:bg-nord-0">
    <main class='h-screen'>
      <div
        x-data="{
          page: parseInt(new URLSearchParams(location.search).get('slide')) || 1,
          total: $el.querySelectorAll('template').length,
          moveTo(page) {
            if (page > this.total) {
              page = this.total
            }
            if (page < 1) {
              page = 1
            }
            if (page == this.page) {
              return
            }
            this.page = page
            this.display()
          },
          display() {
            var template = $el.querySelectorAll('template')[this.page - 1]
            this.$refs.container.classList.add('opacity-0')

            setTimeout(() => {
              this.$refs.container.innerHTML = template.innerHTML
              this.$refs.container.classList.remove('opacity-0')
            }, 300)
          }
        }"
        x-init="$watch('page', (value) => {
          const url = new URL(window.location.href);
          url.searchParams.set('slide', value);
          history.pushState(null, document.title, url.toString());
        }); display()"
        x-on:keydown.arrow-right.window="moveTo(page + 1)"
        x-on:keydown.arrow-left.window="moveTo(page - 1)"
        x-on:keydown.home.window="moveTo(1)"
        x-on:keydown.end.window="moveTo(total)"
      >
        {{ $slot }}

        <div id="logo" class="absolute bottom-4 left-4">
          <a href="/"><img src="{{ url(asset('img/deck_logo.png')) }}" alt="Stage Right Labs Logo" /></a>
        </div>
        <div id="controls" class="absolute bottom-4 right-4 space-x-2 flex">
          <button @click="moveTo(page - 1)" class="bg-gray-100 hover:bg-gray-200 border border-gray-400 font-mono px-1 py-1 rounded text-sm text-gray-600">
            <x-heroicon-s-arrow-left class="w-3 h-3"/>
          </button>
          <button @click="moveTo(1)" class="bg-gray-100 hover:bg-gray-200 border border-gray-400 font-mono px-1 rounded text-sm text-gray-600">Home</button>
          <button @click="moveTo(total)" class="bg-gray-100 hover:bg-gray-200 border border-gray-400 font-mono px-1 rounded text-sm text-gray-600">End</button>
          <button @click="moveTo(page + 1)" class="bg-gray-100 hover:bg-gray-200 border border-gray-400 font-mono px-1 py-1 rounded text-sm text-gray-600">
            <x-heroicon-s-arrow-right class="w-3 h-3"/>
          </button>
        </div>
        <div
          x-ref="container"
          class="w-full h-screen transition-opacity duration-300 ease-in-out text-5xl p-32 flex flex-col items-center justify-center leading-normal text-gray-700"
        ></div>
        <div class="absolute bottom-0 w-full text-center"><span x-text="page"></span> / <span x-text="total"></span></div>
      </div>
    </main>
  </div>
  <livewire:scripts />
</body>

</html>
