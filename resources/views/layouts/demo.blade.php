<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="@version('css/app.css')">
  <livewire:styles />

  <!-- Scripts -->
  <script src="@version('/js/app.js')" defer></script>
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen">
    <img
      class="absolute inset-0 h-full w-full object-cover"
      srcset="{{ asset('img/zhang-xinxin-cWY499Ma1SQ-unsplash-sm.jpg') }} 640w, {{ asset('img/zhang-xinxin-cWY499Ma1SQ-unsplash-md.jpg') }} 1920w"
      src="{{ asset('img/zhang-xinxin-cWY499Ma1SQ-unsplash-md.jpg') }}"
      sizes="(max-width: 767px) 640px, 1920px"
      alt="Backround Image: Messy Paiter's Palette"
    >
    <div class="absolute inset-0 bg-gray-900 bg-opacity-95"></div>
    <x-container>
      <div class="relative mx-auto text-gray-100">
        <a href="/" class="flex items-center justify-center align-center">
          <x-logo class="w-16 h-16" />
          <h1 class="text-6xl ml-4"><em>Swatchr</em></h1>
        </a>
      </div>
    </x-container>
    <main>
      {{ $slot }}
    </main>
    <aside class="absolute bottom-0 right-0 px-4 py-2 text-gray-500">
      <p>Photo by <a href="https://unsplash.com/@starrynite?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText" class="underline">Zhang Xinxin</a> on <a href="https://unsplash.com/s/photos/paint-palette-swatch?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText" class="underline">Unsplash</a></p>
    </aside>

  </div>
  <livewire:scripts />
</body>

</html>
