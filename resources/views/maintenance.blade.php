@extends('layouts.app')

@section('content')
	@if(Auth::user()->isAdmin())
		@include('maintenance._admin-menu')
	@elseif(Auth::user()->isSupervisor())
		@include('maintenance._supervisor-menu')
	@elseif(Auth::user()->isSeller())
		@include('maintenance._seller-menu')
	@endif
@endsection