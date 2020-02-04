@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Inquiry | @app_name Admin Portal</title>
@endsection

@section('content')
	<edit-inquiry-component :id="{{ $id }}"></edit-inquiry-component>
@endsection
