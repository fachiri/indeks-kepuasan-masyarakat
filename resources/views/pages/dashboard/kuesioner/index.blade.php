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
          <x-form.search />
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
                <td scope="row" class="break-all px-6 py-4 text-gray-900 dark:text-white">
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

        <div class="mt-5">
          {{ $kuesioner->links() }}
        </div>
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
