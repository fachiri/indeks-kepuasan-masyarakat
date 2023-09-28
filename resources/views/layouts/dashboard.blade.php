@php
    $menus = [
      (object) [
          'name' => 'Dasbor',
          'link' => route('dasbor'),
          'icon' => 'dasbor.svg',
      ],
      (object) [
          'name' => 'Indeks',
          'link' => '#',
          'icon' => 'indeks.svg',
      ],
      (object) [
          'name' => 'Kuesioner',
          'link' => route('kuesioner.index'),
          'icon' => 'kuesioner.svg',
      ],
  ]
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} - @yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <x-navbar.dashboard :app-name="config('app.name')" />
  <x-sidebar :menus="$menus" />
  <main>
    <div class="p-4 sm:ml-64">
      <div class="p-4 mt-14">
        <x-card>
          <div class="flex justify-between items-center px-5 py-4">
            <h2 class="text-xl font-bold text-gray-700">@yield('title')</h2>
            <x-breadcrumb :$breadcrumbs />
          </div>
        </x-card>
        @yield('content')
      </div>
    </div>
  </main>

  <script>
    const isError = @json($errors->any());
    const errors = @json($errors->all());
    const isSuccess = @json(session('success'));

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3500,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    if (isSuccess) {
      Toast.fire({
        icon: 'success',
        title: isSuccess
      })
    }

    if (isError) {
      errors.forEach(error => {
        Toast.fire({
          icon: 'error',
          title: error
        })
      })
    }
  </script>
</body>

</html>
