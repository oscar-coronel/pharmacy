@extends('layouts.app')

@section('content')

	@if(Auth::user()->isAdmin())
		@include('transaction._admin')
	@else
		@include('transaction._supervisor_seller')
	@endif

@endsection