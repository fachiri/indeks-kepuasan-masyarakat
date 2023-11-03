@php
	$genders = [
	    (object) [
	        'value' => 'Laki-laki',
	        'label' => 'Laki-laki',
	    ],
	    (object) [
	        'value' => 'Perempuan',
	        'label' => 'Perempuan',
	    ],
	];

	$ages = [
	    (object) [
	        'value' => 'Anak-anak',
	        'label' => 'Anak-anak',
	    ],
	    (object) [
	        'value' => 'Remaja',
	        'label' => 'Remaja',
	    ],
	    (object) [
	        'value' => 'Dewasa',
	        'label' => 'Dewasa',
	    ],
	    (object) [
	        'value' => 'Lansia',
	        'label' => 'Lansia',
	    ],
	];

	$educations = [
	    (object) [
	        'value' => 'SD',
	        'label' => 'Sekolah Dasar (SD)',
	    ],
	    (object) [
	        'value' => 'SMP',
	        'label' => 'Sekolah Menengah Pertama (SMP)',
	    ],
	    (object) [
	        'value' => 'SMA',
	        'label' => 'Sekolah Menengah Atas (SMA)',
	    ],
	    (object) [
	        'value' => 'SMK',
	        'label' => 'Sekolah Menengah Kejuruan (SMK)',
	    ],
	    (object) [
	        'value' => 'D3',
	        'label' => 'Diploma Tiga (D3)',
	    ],
	    (object) [
	        'value' => 'S1',
	        'label' => 'Sarjana (S1)',
	    ],
	    (object) [
	        'value' => 'S2',
	        'label' => 'Magister (S2)',
	    ],
	    (object) [
	        'value' => 'S3',
	        'label' => 'Doktor (S3)',
	    ],
	];

	$jobs = [
	    (object) [
	        'value' => 'Pelajar/Mahasiswa',
	        'label' => 'Pelajar/Mahasiswa',
	    ],
	    (object) [
	        'value' => 'Guru',
	        'label' => 'Guru',
	    ],
	    (object) [
	        'value' => 'PNS',
	        'label' => 'PNS',
	    ],
	    (object) [
	        'value' => 'TNI',
	        'label' => 'TNI',
	    ],
	    (object) [
	        'value' => 'Polisi',
	        'label' => 'Polisi',
	    ],
	    (object) [
	        'value' => 'Dosen',
	        'label' => 'Dosen',
	    ],
	    (object) [
	        'value' => 'Pedagang',
	        'label' => 'Pedagang',
	    ],
	    (object) [
	        'value' => 'Buruh',
	        'label' => 'Buruh',
	    ],
	    (object) [
	        'value' => 'Lainnya',
	        'label' => 'Lainnya',
	    ],
	];
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Responden' => '#',
    ],
])
@section('title', 'Responden')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto px-4 py-5 sm:rounded-lg">
			<form id="form-action" method="GET" action="{{ route('responden.index') }}">
				<div class="mb-4 grid grid-cols-2 gap-4">
					<div class="relative">
						<input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="date block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
						<label for="start_date" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Tanggal Mulai</label>
					</div>
					<div class="relative">
						<input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="date block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
						<label for="end_date" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Tanggal Selesai</label>
					</div>
				</div>
				<div class="mb-4 grid grid-cols-5 gap-4">
					<div class="relative">
						<label for="gender" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Jenis Kelamin</label>
						<select name="gender" id="gender" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="">Semua</option>
							@foreach ($genders as $item)
								<option value="{{ $item->value }}" {{ request('gender') == $item->value ? 'selected' : '' }}>{{ $item->label }}</option>
							@endforeach
						</select>
					</div>
					<div class="relative">
						<label for="age" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Umur</label>
						<select name="age" id="age" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="">Semua</option>
							@foreach ($ages as $item)
								<option value="{{ $item->value }}" {{ request('age') == $item->value ? 'selected' : '' }}>{{ $item->label }}</option>
							@endforeach
						</select>
					</div>
					<div class="relative">
						<label for="education" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Pendidikan</label>
						<select name="education" id="education" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="">Semua</option>
							@foreach ($educations as $item)
								<option value="{{ $item->value }}" {{ request('education') == $item->value ? 'selected' : '' }}>{{ $item->label }}</option>
							@endforeach
						</select>
					</div>
					<div class="relative">
						<label for="job" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Pekerjaan</label>
						<select name="job" id="job" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="">Semua</option>
							@foreach ($jobs as $item)
								<option value="{{ $item->value }}" {{ request('job') == $item->value ? 'selected' : '' }}>{{ $item->label }}</option>
							@endforeach
						</select>
					</div>
					<div class="relative">
						<label for="village" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Desa</label>
						<select name="village" id="village" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="">Semua</option>
							@foreach ($villages as $item)
								<option value="{{ $item->village }}" {{ request('village') == $item->village ? 'selected' : '' }}>{{ $item->village }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="mb-4 grid grid-cols-5 gap-4">
					<div class="relative">
						<label for="per_page" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Per Halaman</label>
						<select name="per_page" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							<option value="5">5</option>
							<option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
							<option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
							<option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
							<option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
						</select>
					</div>
					<div class="relative col-span-4">
						<label for="search" class="absolute -top-2 left-3 bg-white px-1 text-[.65rem] text-gray-400">Cari</label>
						<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
							<svg class="h-5 w-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
							</svg>
						</div>
						<input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="Cari...">
					</div>
				</div>
				<div>
					<button type="submit" class="mb-2 mr-2 flex w-full items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
						</svg>
						Filter
					</button>
				</div>
			</form>
		</div>
	</x-card>
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<div class="flex items-center justify-between pb-4">
				<div>
					<a href="{{ route('responden.export', request()->all()) }}" class="mr-2 inline-flex items-center rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
						</svg>
						Cetak
					</a>
					<a href="{{ route('responden.preview', request()->all()) }}" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
						</svg>
						Preview
					</a>
				</div>
			</div>

			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="p-4">
							#
						</th>
						<th scope="col" class="px-6 py-3">
							Nama
						</th>
						<th scope="col" class="px-6 py-3">
							Jenis Kelamin
						</th>
						<th scope="col" class="px-6 py-3">
							Umur
						</th>
						<th scope="col" class="px-6 py-3">
							Pendidikan
						</th>
						<th scope="col" class="px-6 py-3">
							Pekerjaan
						</th>
						<th scope="col" class="px-6 py-3">
							Desa
						</th>
						<th scope="col" class="px-6 py-3">
							Aksi
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($respondens as $responden)
						<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $respondens->firstItem() + $loop->index }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->name }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->gender }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->age }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->education }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->job }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $responden->village }}
							</td>
							<td class="flex space-x-3 whitespace-nowrap px-6 py-4">
								<a href="{{ route('responden.show', $responden->uuid) }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Detail</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="mt-5">
				{{ $respondens->onEachSide(1)->appends([
				        'start_date' => request('start_date'),
				        'end_date' => request('end_date'),
				        'gender' => request('gender'),
				        'age' => request('age'),
				        'education' => request('education'),
				        'job' => request('job'),
				        'village' => request('village'),
				        'search' => request('search'),
				        'per_page' => request('per_page'),
				        'filter' => request('filter'),
				        'filter_by' => request('filter_by'),
				    ])->links() }}
			</div>
		</div>
	</x-card>
@endsection
