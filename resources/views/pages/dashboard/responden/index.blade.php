@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Responden' => '#',
    ],
])
@section('title', 'Responden')
@section('content')
	<x-card>
		<div class="relative overflow-x-auto p-5 sm:rounded-lg">
			<div class="flex items-center justify-between pb-4">
				<div class="flex space-x-5">
					<x-form.per-page :action="route('responden.index', ['page' => request('page'), 'filter' => request('filter'), 'filter_by' => request('filter_by')])" />
					<x-form.filter :action="route('responden.index')" :options="[
					    'Jenis Kelamin' => [
					        (object) [
					            'name' => 'Laki-laki',
					            'route' => route('responden.index', ['filter' => 'Laki-laki', 'filter_by' => 'gender']),
					        ],
					        (object) [
					            'name' => 'Perempuan',
					            'route' => route('responden.index', ['filter' => 'Perempuan', 'filter_by' => 'gender']),
					        ],
					    ],
					    'Pendidikan' => [
					        (object) [
					            'name' => 'SD',
					            'route' => route('responden.index', ['filter' => 'SD', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'SMP',
					            'route' => route('responden.index', ['filter' => 'SMP', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'SMA',
					            'route' => route('responden.index', ['filter' => 'SMA', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'SMK',
					            'route' => route('responden.index', ['filter' => 'SMK', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'D3',
					            'route' => route('responden.index', ['filter' => 'D3', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'S1',
					            'route' => route('responden.index', ['filter' => 'S1', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'S2',
					            'route' => route('responden.index', ['filter' => 'S2', 'filter_by' => 'education']),
					        ],
					        (object) [
					            'name' => 'S3',
					            'route' => route('responden.index', ['filter' => 'S3', 'filter_by' => 'education']),
					        ],
					    ],
					    'Pekerjaan' => [
					        (object) [
					            'name' => 'Pelajar/Mahasiswa',
					            'route' => route('responden.index', ['filter' => 'Pelajar/Mahasiswa', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Guru',
					            'route' => route('responden.index', ['filter' => 'Guru', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'PNS',
					            'route' => route('responden.index', ['filter' => 'PNS', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'TNI',
					            'route' => route('responden.index', ['filter' => 'TNI', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Polisi',
					            'route' => route('responden.index', ['filter' => 'Polisi', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Dosen',
					            'route' => route('responden.index', ['filter' => 'Dosen', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Pedagang',
					            'route' => route('responden.index', ['filter' => 'Pedagang', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Buruh',
					            'route' => route('responden.index', ['filter' => 'Buruh', 'filter_by' => 'job']),
					        ],
					        (object) [
					            'name' => 'Lainnya',
					            'route' => route('responden.index', ['filter' => 'Lainnya', 'filter_by' => 'job']),
					        ],
					    ],
					]" />
				</div>
				<x-form.search :action="route('responden.index')" />
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
								{{ $loop->iteration }}
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
				{{ 
					$respondens
						->onEachSide(1)
						->appends([
							'per_page' => request('per_page'),
							'filter' => request('filter'),
							'filter_by' => request('filter_by'),
						])
						->links() 
				}}
			</div>
		</div>
	</x-card>
@endsection
