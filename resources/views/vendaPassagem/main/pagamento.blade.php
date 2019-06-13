@extends('vendaPassagem.index', ['title' => __('Venda de Passagens')])

@section('infos')
<form method="POST" action="{{ route('vendapassagem.store') }}">
    <input type="hidden" name="alocacao_intermunicipal_id" value="{{ $alocacao->id }}">
 <div class="row">
            <div class="col-lg-6">
                <div class="card bg-gradient-default border-0 shadow">
    <div class="card-header bg-default border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0 text-white">Detalhes da venda</h3>
            </div>
        </div>
    </div>
    <div class="card-body bg-white border-0">
        <ul class="list-group list-group-flush" data-toggle="checklist">
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Viagem</h3>
                            <small>{{ $origem->cidade->nome }} <i class="fas fa-chevron-right"></i> {{ $destino->cidade->nome }}</small>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Saída e Chegada</h3>
                            <small><i class="fas fa-clock"></i> {{ $origem->horarioSaida }} <i class="fas fa-chevron-right"></i> {{ $destino->horarioChegada }}</small>
                        </div>
                    </div>
                </div>
            </li>

            @foreach ($poltronas as $poltrona)
            <li class="checklist-entry list-group-item flex-column align-items-center justify-content-center">
                <div class="d-flex w-100 justify-content-between align-items-center justify-content-center">
                    <div class="checklist-info">
                        <h3 class="checklist-title mb-0">POLTRONA</h3>
                        <div class="row justify-content-center">
                            <span class="badge badge-primary">{{ $poltrona }}</span>
                            <input name="poltronas[]" type="hidden" value="{{ $poltrona }}" required>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="row">
                            <h3 class="checklist-title mb-0">Nome</h3>
                            <input name="nomes[]" type="text" class="form-control form-control-alternative" placeholder="{{ __('Insira o nome completo...') }}" value="{{ old('nomes') }}" required>
                        </div>
                        <div class="row">
                            <h3 class="checklist-title mt-2 mb-0">CPF</h3>
                            <input name="cpf[]" cpf type="text" class="form-control form-control-alternative" placeholder="{{ __('Insira o CPF...') }}" value="{{ old('cpf') }}" required>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="row">
                            <h3 class="checklist-title mt-2 mb-0">TIPO</h3>
                            <select name="categoria_passageiro_id[]" bootstrapSelect  data-size="4" data-live-search="true" required>
                                @foreach ($categoria_passageiro as $categoria)
                                    <option value="{{ $categoria->id }}" restriction="{{ $categoria->descricao }}"> {{ $categoria->tipo }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <a href="{{ route('vendapassagem.index') }}" class="btn btn-warning">Cancelar</a>
                    <input type="hidden" name="valor" value={{ $valor }}>
                    <h1 class="checklist-title mb-0">Total R$ {{ $valor }}</h1>
                </div>
            </li>
        </ul>
    </div>

    <div class="card-footer bg-default border-0">
        <div class="row">
        </div>
    </div>
    </div>
    </div>

    <div class="col-lg-6">
            <div class="card bg-default border-0 shadow">
        <div class="card-header bg-default border-0">
            <div class="row align-cidades-center">
                <div class="col-lg-8">
                    <h3 class="mb-0 text-white ">{{ __('Informe os dados para pagamento') }}</h3>
                </div>
            </div>
        </div>

        <div class="card-body bg-white border-0">
            <div class="checklist-info">
                <div class="row">
                    <h3 class="checklist-title mt-2 mb-0">Forma de Pagamento</h3>
                        <select name="tipo_pagamento_id[]" bootstrapSelect  data-size="4" data-live-search="true" required>
                            @foreach ($tipo_pagamento as $pagamento)
                                <option value="{{ $pagamento->id }}" restriction="{{ $pagamento->forma }}"> {{ $pagamento->forma }} </option>
                            @endforeach
                        </select>
                </div>
            </div>
        </div>
        <div class="card-body bg-white border-0">    
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary mb-3">VENDER</button>
            </div>
        </div>
        <div class="card-footer bg-default border-0">
            <div class="row">
            </div>
        </div>
        </div>
        </div>

    </div>
</form>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[nro]').mask('0000.0000.0000.0000');
        })
        $(document).ready(function(){
            $('[cpf]').mask('000.000.000-00', {reverse: true});
        })
        $(document).ready(function(){
            $('[mes]').mask('00');
        })
        $(document).ready(function(){
            $('[cod]').mask('000');
        })

        $('[restriction]').on('click', function(e) {
            console.log(e);
        })
    </script>

@endpush
