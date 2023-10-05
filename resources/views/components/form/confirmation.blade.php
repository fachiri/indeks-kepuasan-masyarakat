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
			<div class="flex flex-col py-3">
				<dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Desa</dt>
				<dd class="text-lg font-semibold">{{ $data['village'] }}</dd>
				<input type="hidden" name="village" value="{{ $data['village'] }}">
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
							<td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
								{{ rateLabel($data['question' . $key + 1]) }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{-- Feedback --}}
			<div class="pt-5">
				<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
					<h2 id="accordion-flush-heading-2">
						<button type="button" class="flex w-full items-center justify-between border-b border-gray-200 py-5 text-left font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
							<h5 class="text-lg font-bold">Kritik dan Saran</h5>
							<svg data-accordion-icon class="h-3 w-3 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
							</svg>
						</button>
					</h2>
					<div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
						<div class="border-b border-gray-200 py-5 dark:border-gray-700">
							<div class="mb-5">
								<label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
								<input type="text" id="email" name="email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							</div>
							<div class="mb-5">
								<label for="telp" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. HP / Whatsapp</label>
								<input type="text" id="telp" name="telp" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
							</div>
							<div>
								<label for="feedback" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kritik dan Saran</label>
								<textarea id="feedback" rows="8" name="feedback" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"></textarea>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="pt-5 text-center">
				<x-button.submit id="submit-result" text="Konfirmasi" />
			</div>
		</dl>
	</form>
</div>
