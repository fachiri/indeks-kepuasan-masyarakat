<div class="flex basis-full flex-col space-y-5 rounded-lg border border-gray-200 bg-white px-5 py-5 shadow dark:border-gray-700 dark:bg-gray-800">
	<h5 class="mb-5 text-center text-2xl font-medium tracking-tight text-gray-900 dark:text-white">
		Kritik dan Saran
	</h5>
	<form action="{{ route('kritik_saran') }}" method="POST">
		@csrf
		<div class="mb-5">
			<label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
			<input type="text" id="name" name="name" value="{{ old('name') }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
			@error('name')
				<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-5">
			<label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
			<input type="text" id="email" name="email" value="{{ old('email') }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
			@error('email')
				<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-5">
			<label for="telp" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. HP / Whatsapp</label>
			<input type="text" id="telp" name="telp" value="{{ old('telp') }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
			@error('telp')
				<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-5">
			<label for="feedback" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kritik dan Saran</label>
			<textarea id="feedback" rows="8" name="feedback" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('feedback') }}</textarea>
			@error('feedback')
				<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
			@enderror
		</div>
		<div class="mb-5 text-right">
			<x-button.submit text="Submit" id="submit-kritik-dan-saran" />
		</div>
	</form>
</div>
