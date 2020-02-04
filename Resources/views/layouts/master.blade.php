@extends('admin.layouts.master')

@section('meta-content')
  @yield('seo-tags')
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ mix('css/inquiry.css') }}">
@endpush

@push('scripts')
	<script src="{{ mix('js/inquiry.js') }}"></script>
@endpush

@section('content')
	@yield('inquiry-content')
@endsection
