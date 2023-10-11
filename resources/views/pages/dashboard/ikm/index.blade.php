@php
	$villages = [
	    (object) [
	        'name' => 'Moodulio',
	        'route' => route('ikm.index', ['filter' => 'Moodulio', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Muara Bone',
	        'route' => route('ikm.index', ['filter' => 'Muara Bone', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Masiaga',
	        'route' => route('ikm.index', ['filter' => 'Masiaga', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Taludaa',
	        'route' => route('ikm.index', ['filter' => 'Taludaa', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Permata',
	        'route' => route('ikm.index', ['filter' => 'Permata', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Inogaluma',
	        'route' => route('ikm.index', ['filter' => 'Inogaluma', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Molamahu',
	        'route' => route('ikm.index', ['filter' => 'Molamahu', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Sogitia',
	        'route' => route('ikm.index', ['filter' => 'Sogitia', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Cendana Putih',
	        'route' => route('ikm.index', ['filter' => 'Cendana Putih', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Monano',
	        'route' => route('ikm.index', ['filter' => 'Monano', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Tumbuh Mekar',
	        'route' => route('ikm.index', ['filter' => 'Tumbuh Mekar', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Waluhu',
	        'route' => route('ikm.index', ['filter' => 'Waluhu', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Ilohuuwa',
	        'route' => route('ikm.index', ['filter' => 'Ilohuuwa', 'filter_by' => 'village']),
	    ],
	    (object) [
	        'name' => 'Bilolantunga',
	        'route' => route('ikm.index', ['filter' => 'Bilolantunga', 'filter_by' => 'village']),
	    ],
	];
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Indek Kepuasan Masyarakat' => '#',
    ],
])
@section('title', 'Indek Kepuasan Masyarakat')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<div class="mb-5 flex items-center justify-between">
				<div>
					<a href="{{ route('ikm.export', request()->all()) }}" class="mr-2 inline-flex items-center rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
						</svg>
						Cetak
					</a>
					<a href="{{ route('ikm.preview', request()->all()) }}" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
						</svg>
						Preview
					</a>
				</div>
				<x-form.filter action="#" :options="[
				    (object) [
				        'name' => 'Semua',
				        'route' => route('ikm.index', ['filter' => 'Semua', 'filter_by' => 'village']),
				    ],
						...$villages
				]" />
			</div>
			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							Pertanyaan
						</th>
						<th scope="col" class="px-6 py-3">
							Jumlah Nilai/Unsur
						</th>
						<th scope="col" class="px-6 py-3">
							NRR/Unsur
						</th>
						<th scope="col" class="px-6 py-3">
							Bobot Nilai Tertimbang
						</th>
						<th scope="col" class="px-6 py-3">
							NRR Tertimbang/Unsur
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $item)
						<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $item->question }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ number_format($item->totalNilaiPersepsiPerUnit, 2) }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ number_format($item->NRRPerUnsur, 2) }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ number_format($bobotNilaiTertimbang, 2) }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ number_format($item->NRRTertimbangUnsur, 2) }}
							</td>
						</tr>
					@endforeach
					<tr class="border-b bg-gray-50 font-bold">
						<td scope="row" colspan="4" class="border-r px-6 py-4 text-gray-900 dark:text-white">
							IKM
						</td>
						<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
							{{ number_format($IKM, 2) }}
						</td>
					</tr>
					<tr class="border-b bg-gray-50 font-bold">
						<td scope="row" colspan="4" class="border-r px-6 py-4 text-gray-900 dark:text-white">
							Konversi IKM
						</td>
						<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
							{{ number_format($konversiIKM, 2) }}
						</td>
					</tr>
					<tr class="border-b bg-gray-50 font-bold">
						<td scope="row" colspan="4" class="border-r px-6 py-4 text-gray-900 dark:text-white">
							Mutu Pelayanan
						</td>
						<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
							{{ nilaPersepsi($konversiIKM)->mutu }}
						</td>
					</tr>
					<tr class="border-b bg-gray-50 font-bold">
						<td scope="row" colspan="4" class="border-r px-6 py-4 text-gray-900 dark:text-white">
							Kinerja Unit Pelayanan
						</td>
						<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
							{{ nilaPersepsi($konversiIKM)->kinerja }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</x-card>
@endsection
