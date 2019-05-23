@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-default">
        <div class="container">
            <a class="navbar-brand" href="#">Vem Tranquilo Viagens</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../../index.html">
                                <img src="../../assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
    
                <ul class="navbar-nav ml-lg-auto">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></i></span>
                        </div>
                        <input class="form-control" placeholder="Login" type="text">
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></i></span>
                        </div>
                        <input class="form-control" placeholder="Senha" type="text">
                    </div>
                    <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</a>
                </ul>
    
            </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-bodys">
                <div class="row justify-content-center">
                    <div class="card col-md-6">
                        <img class="card-img-top" src="{{ asset('argon') }}/img/brand/logo.png" alt="Pesquisar Passagens" style="padding: 10%">
                        <div class="card-body">
                            <div class="form-group">
                                <h3>Origem</h3>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Origem" type="text">
                                </div>
                                <h3>Destino</h3>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Origem" type="text">
                                </div>
                                <h3>Data de Ida</h3>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Data de Ida" type="text">
                                </div>
                                <h3>Data de Volta (Opcional)</h3>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Data de Volta (Opcional)" type="text">
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h1 class="text-white">{{ __('Alguma coisa aqui, bb.') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
