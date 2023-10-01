<div class="flex basis-full flex-col space-y-5 rounded-lg border border-gray-200 bg-white px-5 py-5 shadow dark:border-gray-700 dark:bg-gray-800">
	<h5 class="mb-5 text-center text-2xl font-medium tracking-tight text-gray-900 dark:text-white">
		Konfirmasi
	</h5>
	<form action="{{ route('result.store') }}" method="POST">
		@csrf
		<dl class="w-full divide-y divide-gray-200 text-gray-900 dark:divide-gray-700 dark:text-white">
			<div class="flex flex-col pb-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Nama Lengkap</dt>
				<dd class="text-lg font-semibold">{{ $data['name'] }}</dd>
        <input type="hidden" name="name" value="{{ $data['name'] }}">
			</div>
			<div class="flex flex-col py-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Jenis Kelamin</dt>
				<dd class="text-lg font-semibold">{{ $data['gender'] }}</dd>
        <input type="hidden" name="gender" value="{{ $data['gender'] }}">
			</div>
			<div class="flex flex-col py-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Umur</dt>
				<dd class="text-lg font-semibold">{{ $data['age'] }}</dd>
        <input type="hidden" name="age" value="{{ $data['age'] }}">
			</div>
			<div class="flex flex-col py-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Pendidikan</dt>
				<dd class="text-lg font-semibold">{{ $data['education'] }}</dd>
        <input type="hidden" name="education" value="{{ $data['education'] }}">
			</div>
			<div class="flex flex-col py-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Pekerjaan</dt>
				<dd class="text-lg font-semibold">{{ $data['job'] }}</dd>
        <input type="hidden" name="job" value="{{ $data['job'] }}">
			</div>

			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="p-4">
							#
						</th>
						<th scope="col" class="px-6 py-3">
							Pertanyaan
						</th>
						<th scope="col" class="px-6 py-3">
							Jawaban
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($kuesioner as $key => $item)
					@php
						$value = (object) [
						    'idKuesioner' => $item->id,
						    'kuesionerAnswer' => $data['question' . $key + 1],
						];
					@endphp
					<input type="hidden" name="answers[]" value="{{ json_encode($value) }}">
						<tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
								{{ $loop->iteration }}
							</td>
							<td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                {{ $item->question }}
              </td>
              <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white font-medium">
                {{ rateLabel($data['question' . $key + 1]) }}
              </td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="pt-5 text-center">
				<x-button.submit id="submit-result" text="Konfirmasi" />
			</div>
		</dl>
	</form>
</div>
