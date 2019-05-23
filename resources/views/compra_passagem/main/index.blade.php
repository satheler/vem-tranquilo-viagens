@extends('compra_passagem.index', ['title' => __('Compra de Passagens')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0">{{ __('Compra de Passagens') }}</h3>
            </div>
        </div>
    </div>
@endsection

@section('infos-bus')
    <div class="card-header border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0">{{ __('Selecione sua poltrona') }}</h3>
            </div>
        </div>
    </div>

    <div class="card-body border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <ul class="card list-group list-group-flush list">
                    <li class="list-group-item px-0">        
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">01</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">02</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">03</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">        
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">01</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">02</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">03</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
