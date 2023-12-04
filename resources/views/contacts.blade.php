@extends('layouts.main')

@section('title', 'Contatos do Orion')

@section('content')

@foreach ($contacts as $contact)
    <p>{{ $contacts->id }}</p>
@endforeach

@endsection