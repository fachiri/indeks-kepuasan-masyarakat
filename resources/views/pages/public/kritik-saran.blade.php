@extends('layouts.public')
@section('title', 'Kritik dan Saran')
@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto flex max-w-screen-lg px-4 py-8">
			<x-form.kritik-dan-saran />
		</div>
	</section>
@endsection
