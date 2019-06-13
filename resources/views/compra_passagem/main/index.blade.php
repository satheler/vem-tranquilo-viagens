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
        <div class="row align-cidades-center justify-content-center">
            <div class="col-l">
                <ul class="card list-group list-group-flush list" >
                    <li class="list-group-item px-0" style="margin-left: 20px; margin-right: 20px">        
                        <div class="row align-items-center ">
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">01</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">02</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-primary">03</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">04</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0" style="margin-left: 20px; margin-right: 20px">        
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">05</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">06</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">07</button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-secondary">08</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
