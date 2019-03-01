@extends('layouts.app')
@section('contenido')
<iframe width=100% height=100% src="{{ asset("storage/silabus/$doc")}}" ></iframe>
@endsection
