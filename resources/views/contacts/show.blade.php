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
                    <form id="searchbar" class="col-10 mx-auto" role="search">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Buscar contato..." aria-label="Search">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                        </div>
                    </form>

                </div>
                <div class="d-flex p-3 justify-content-between">
                    <p></p>
                    <a href="/new"><i class="bi bi-person-plus-fill"></i></a>
                </div>
                <div>
                    @foreach ($contacts as $c)
                        <div class="contact-card mb-1">
                            <a href="/contacts/{{ $c->id }}">{{ $c->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="show">
            <div>
                <div id="info-container">
                    <div id="edit-info">
                        <h5 class="px-3 py-2">{{ $contact->name }}</h5>
                        <a href="/contacts/edit" class="mb-2">Editar</a>
                    </div>
                    
                    <ul class="list-unstyled px-2">
                        <li class="active">
                            <p class="text-decoration-none px-2 d-block">
                                <i class="bi bi-telephone-fill"></i>&nbsp&nbsp{{ $contact->cellnumber }}
                            </p>
                        </li>
                        <li class="">
                            <p class="text-decoration-none px-2 d-block"><i
                                    class="bi bi-envelope-at-fill"></i>&nbsp&nbsp{{ $contact->email }}</p>
                        </li>
                        </li>
                        <li class="">
                            <p class="text-decoration-none px-2 d-block"><i
                                    class="bi bi-sticky-fill"></i>&nbsp&nbsp{{ $contact->note }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
