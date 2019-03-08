@extends('layouts.app')
@section('contenido')
  		@if(!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        @if(!empty($doc))
		<iframe width=100% height=100% src="{{ asset("storage/silabus/$doc")}}" ></iframe>
		@endif
@endsection
