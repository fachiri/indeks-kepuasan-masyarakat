@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Kritik & Saran' => '#',
    ],
])
@section('title', 'Kritik & Saran')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<div class="flex items-center justify-between pb-4">
				<button id="dropdownLaporanTabelButton" data-dropdown-toggle="dropdownLaporanTabel" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
					Laporan Tabel
					<svg class="ml-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
					</svg>
				</button>
				<div id="dropdownLaporanTabel" class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
					<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLaporanTabelButton">
						<li>
							<a href="{{ route('feedback.export.table') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
								Cetak
							</a>
						</li>
						<li>
							<a href="{{ route('feedback.preview.table') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
								Preview
							</a>
						</li>
					</ul>
				</div>
			</div>
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
							Kritik & Saran
						</th>
					</tr>
				</thead>
				<tbody>
					@if (count($data) == 0)
						<tr>
							<td colspan="8" class="py-5 text-center italic text-red-500">Data Kosong</td>
						</tr>
					@else
						@foreach ($data as $item)
							<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $loop->iteration }}
								</td>
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $item->responden->name }}
								</td>
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $item->feedback }}
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>

			<div class="mt-5">
				{{ $data->links() }}
			</div>
		</div>
	</x-card>

	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							#
						</th>
						<th scope="col" class="px-6 py-3">
							Keyword
						</th>
						<th scope="col" class="px-6 py-3">
							Jumlah
						</th>
					</tr>
				</thead>
				<tbody>
					@if (count($topKeywords) == 0)
						<tr>
							<td colspan="8" class="py-5 text-center italic text-red-500">Data Kosong</td>
						</tr>
					@else
						@foreach ($topKeywords as $word => $count)
							<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $loop->iteration }}
								</td>
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $word }}
								</td>
								<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
									{{ $count }}
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</x-card>
@endsection
