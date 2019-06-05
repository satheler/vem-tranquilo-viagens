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
                    </div>
                </div>
    
                <ul class="navbar-nav ml-lg-auto">
                    <a href="#" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</a>                                
                </ul>
    
            </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-5">
        <div class="container">
            <div class="header-bodys">
                <div class="row justify-content-center">
                    <div class="card col-md-6">
                        <img class="card-img-top" src="{{ asset('argon') }}/img/brand/logo.png" alt="Pesquisar Passagens" style="transform: scale(0.8);margin-top:50px">
                        <div class="card-body">
                            <div class="form-group">
                                <h3>Origem</h3>
                                <div class="input-group-prepend">
                                    <select bootstrapSelect name="origem"  data-size="4" data-live-search="true" required>
                                        <option value="" disabled selected><i class="fas fa-map-marker-alt"></i> Selecione a Origem...</option>
                                        @foreach ($lista as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <h3>Destino</h3>
                                <div class="input-group mb-2 input-group-prepend">
                                    <select bootstrapSelect name="destino"  data-size="4" data-live-search="true" required>
                                        <option value="" disabled selected><i class="fas fa-map-marker-alt"></i> Selecione o Destino...</option>
                                        @foreach ($lista as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="row cleanfix">
                                    <div class="col-lg-6">
                                        <h3>Data de Ida</h3>
                                        <div class="input-group mb-2">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data', $data ?? null) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h3>Data de Ida</h3>
                                        <div class="input-group mb-2">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data', $data ?? null) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix justify-content-right">
                                <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</a>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-pricing bg-gradient-success border-0 text-center mb-2">
                            <div class="card-header bg-transparent">
                                <h4 class="text-uppercase ls-1 text-white py-3 mb-0">ESTUDANTES NA VEM TRANQUILO, PAGA MENOS!</h4>
                            </div>
                            <div class="card-body">
                                <span class="">Viaje</span>
                                <div class="display-4 text-white">{{$lista[0]->nome}} <i class="fas fa-arrow-right"> </i> {{$lista[6]->nome}}</div>
                                <div class="display3 ">por apenas</div>
                                <div class="display-2 text-white">R$ 100,00</div>
                                <div class=" text-white">*Comprovantes serão solicitados no embarque.</div>
                                <ul class="list-unstyled my-4">
                                    <li>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <div class="icon icon-xs icon-shape bg-white shadow rounded-circle">
                                                    <i class="fas fa-bus"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="pl-2 text-sm text-white">Viaje com segurança e conforto</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <div class="icon icon-xs icon-shape bg-white shadow rounded-circle">
                                                    <i class="fas fa-wifi"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="pl-2 text-sm text-white">Navegue pelas suas redes sociais enquanto viaja</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <div class="icon icon-xs icon-shape bg-white shadow rounded-circle">
                                                    <i class="far fa-clock"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="pl-2 text-sm text-white">Tempo de chegada estimada com precisão</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary mb-3">SAIBA MAIS</button>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="#" class=" text-white">Consulte nosso regularmento de descontos</a>
                            </div>
                        </div>
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

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>

const url = window.location.pathname;
$(document).ready(function(){
    $('[time]').mask('00:00');
})

$('[data-show-id]').on('click', function() {
    const id = $(this).data('show-id');

    axios.get(`${url}/${id}`)
    .then(response => {
        $(".modal-body").html(response.data)
        $("#modal-infos").modal('show');
    })
})
</script>
@endpush

