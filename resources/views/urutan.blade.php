@extends('layouts.app')

@section('title', 'Urutan')

@section('content')

@foreach ($numbers as $number)
    <h1> Urutan Ke - {{ $number['ke'] }} </h1>
    <h3> Nomor Ke - {{ $number['nomor'] }} </h3>
@endforeach
@endsection

