@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Kuesioner' => '#',
    ],
])
@section('title', 'Kuesioner')
@section('content')
  <x-card>
    <div class="relative overflow-x-auto sm:rounded-lg p-5">
      <form action="{{ route('kuesioner.checks') }}" method="POST">
        @csrf
        <div class="flex items-center justify-between pb-4">
          <div>
            <x-button.create text="Tambah Kuesioner" :href="route('kuesioner.create')" />
            <x-button.submit text="Hapus" id="deleteMany" class="hidden" color="red" icon="trash" name="action" value="delete" />
          </div>
          <div class="flex space-x-5">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" id="table-search"
                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for items">
            </div>
          </div>
        </div>
  
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="p-4">
                <input id="checkbox-table-all" type="checkbox"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-all" class="sr-only">checkbox</label>
              </th>
              <th scope="col" class="px-6 py-3">
                Pertanyaan
              </th>
              <th scope="col" class="px-6 py-3">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kuesioner as $item)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                  <div class="flex items-center">
                    <input id="checkbox-table-{{ $item->uuid }}" type="checkbox" name="checks[]"
                      value="{{ $item->uuid }}" onchange="updateButtonVisibility()"
                      class="checkbox-item w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-{{ $item->uuid }}" class="sr-only">checkbox</label>
                  </div>
                </td>
                <td scope="row" class="break-all px-6 py-4 font-medium text-gray-900 dark:text-white">
                  {{ $item->question }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex space-x-3">
                  <a href="{{ route('kuesioner.edit', $item->uuid) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  <x-button.delete :route="route('kuesioner.destroy', $item->uuid)" />
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </x-card>

  <script>
    const checkAll = document.getElementById('checkbox-table-all')
    const checkboxes = document.querySelectorAll(".checkbox-item")
    checkAll.addEventListener('change', (e) => {
      checkboxes.forEach(checkbox => checkbox.checked = e.target.checked)
      updateButtonVisibility()
    })

    const updateButtonVisibility = () => {
      const deleteMany = document.getElementById("deleteMany")
      let checked = false;

      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          checked = true;
          break;
        }
      }

      if (checked) {
        deleteMany.classList.add('inline-flex')
        deleteMany.classList.remove('hidden')
      } else {
        deleteMany.classList.add('hidden')
        deleteMany.classList.remove('inline-flex')
      }
    }
  </script>
@endsection
