@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Indek Kepuasan Masyarakat' => '#',
    ],
])
@section('title', 'Indek Kepuasan Masyarakat')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
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
            <td scope="row" colspan="4" class="px-6 py-4 text-gray-900 dark:text-white border-r">
              IKM
            </td>
            <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
              {{ number_format($IKM, 2) }}
            </td>
          </tr>
          <tr class="border-b bg-gray-50 font-bold">
            <td scope="row" colspan="4" class="px-6 py-4 text-gray-900 dark:text-white border-r">
              Konversi IKM
            </td>
            <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
              {{ number_format($konversiIKM, 2) }}
            </td>
          </tr>
          <tr class="border-b bg-gray-50 font-bold">
            <td scope="row" colspan="4" class="px-6 py-4 text-gray-900 dark:text-white border-r">
              Mutu Pelayanan
            </td>
            <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
              {{ nilaPersepsi($konversiIKM)->mutu }}
            </td>
          </tr>
          <tr class="border-b bg-gray-50 font-bold">
            <td scope="row" colspan="4" class="px-6 py-4 text-gray-900 dark:text-white border-r">
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
