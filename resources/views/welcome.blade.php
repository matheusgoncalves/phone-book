@extends('layouts.main')

@section('title', 'Contatos do Orion')

@section('content')

@foreach($contacts as $contact)
    <p>{{ $contact->name }} -- {{ $contact->cellnumber }}</p>
@endforeach

@endsection
