@extends('layouts.main')

@section('title', 'Contatos do Orion')

@section('content')

    <div class="main-container row d-flex" id="main-container">
        <div class="sidebar col-md-5" id="side_nav">
            <div class="header-box px-2 pt-4 pb-3 d-flex justify-content-evenly align-items-center">
                <img src="/img/logo_model_3.png" width="45" height="45" class="d-inline-block align-top" alt="Logo">
                <span>
                    <h1 class="ml-2">Contatos</h1>
                </span>
            </div>

            <div class="row">
                <h5 class="col mx-4"> Listas</h5>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a href="/" class="text-decoration-none px-3 py-2 d-block">
                        <i class="fal fa-home"></i> <i class="bi bi-people-fill"></i> Todos os contatos</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-list"></i>
                        <i class="bi bi-clock-history"></i> Frequentes</a></li>
                </li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fal fa-users"></i> <i class="bi bi-star-fill"></i> Favoritos</a></li>
            </ul>
        </div>

        <div class="content">
            <div>
                <div class="d-flex">
                    @csrf
                    <form action="/" method="get" id="searchbar" class="col-10 mx-auto" role="search">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Buscar contato..." aria-label="Search">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
                
                <div class="d-flex p-3 justify-content-between">
                    <p></p>
                    <a href="/new"><i id="add-icon" class="bi bi-person-plus-fill"></i></a>
                </div>
                <div>
                    @foreach ($contacts as $contact)
                        <div class="contact-card mb-1" id="long-name">
                            <a href="/contacts/{{ $contact->id }}">{{ $contact->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
