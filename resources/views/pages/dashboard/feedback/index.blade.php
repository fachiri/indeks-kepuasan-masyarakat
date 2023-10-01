@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Kritik & Saran' => '#',
    ],
])
@section('title', 'Kritik & Saran')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							#
						</th>
						<th scope="col" class="px-6 py-3">
							Nama
						</th>
						<th scope="col" class="px-6 py-3">
							Email
						</th>
						<th scope="col" class="px-6 py-3">
							No. HP
						</th>
						<th scope="col" class="px-6 py-3">
							Kritik & Saran
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $item)
						<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $loop->iteration }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $item->name }}
							</td>
              <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $item->email }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $item->telp }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $item->feedback }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="mt-5">
				{{ $data->links() }}
			</div>
		</div>
	</x-card>
@endsection
