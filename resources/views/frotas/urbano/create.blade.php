@extends('layouts.app', ['title' => __('Adicionar Ônibus')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Ônibus')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('urbano.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Ônibus') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('urbano.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do ônibus') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('chassi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-chassi">{{ __('CHASSI') }}</label>
                                    <input type="text" name="chassi" id="input-chassi" class="form-control form-control-alternative{{ $errors->has('chassi') ? ' is-invalid' : '' }}" placeholder="{{ __('chassi') }}" value="{{ old('chassi') }}" required autofocus>

                                    @if ($errors->has('chassi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Placa') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('placa') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-placa">{{ __('Placa') }}</label>
                                    <input type="text" name="placa" id="input-placa" class="form-control form-control-alternative{{ $errors->has('placa') ? ' is-invalid' : '' }}" placeholder="{{ __('Placa') }}" value="{{ old('placa') }}" required>

                                    @if ($errors->has('placa'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Placa') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('marca') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-marca">{{ __('Marca') }}</label>
                                            <input type="text" name="marca" id="input-password" class="form-control form-control-alternative{{ $errors->has('marca') ? ' is-invalid' : '' }}" placeholder="{{ __('Marca') }}" value="" required>
                                            
                                            @if ($errors->has('marca'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Marca') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('modelo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-modelo">{{ __('Modelo') }}</label>
                                            <input type="text" name="modelo" id="input-modelo" class="form-control form-control-alternative{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="{{ __('Modelo') }}" value="" required>
                                            
                                            @if ($errors->has('modelo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Modelo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('locacao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-lotacao">{{ __('Lotação') }}</label>
                                            <input type="number" name="lotacao" id="input-lotacao" class="form-control form-control-alternative{{ $errors->has('lotacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Lotação') }}" value="" required>
                                            
                                            @if ($errors->has('lotacao'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Lotação') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('custoManutencao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-custoManutencao">{{ __('Custo Manutenção') }}</label>
                                            <input type="number" name="custoManutencao" id="input-custoManutencao" class="form-control form-control-alternative{{ $errors->has('cor') ? ' is-invalid' : '' }}" placeholder="{{ __('Custo Manutenção') }}" value="" required>
                                            
                                            @if ($errors->has('custoManutencao'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('custoManutencao') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-data-compra">{{ __('Data da Compra') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-data-fabricacao">{{ __('Data da Fabricação') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="form-control-label"> {{__('Possui Ar-condicionado?')}} </label>
                                        {{-- Check 1 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="arCondicionado" class="custom-control-input" id="arCondicionado" type="radio" value=1>
                                            <label class="custom-control-label" for="arCondicionado">Sim</label>
                                        </div>
                                        {{-- Check 2 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="arCondicionado" class="custom-control-input" id="arCondicionado2" type="radio" value=0>
                                            <label class="custom-control-label" for="arCondicionado2">Não</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="form-control-label"> {{__('Possui acessibilidade?')}} </label>
                                        {{-- Check 1 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="acessibilidade" class="custom-control-input" id="acessibilidade" type="radio" value=1>
                                            <label class="custom-control-label" for="acessibilidade">Sim</label>
                                        </div>
                                        {{-- Check 2 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="acessibilidade" class="custom-control-input" id="acessibilidade2" type="radio" value=0>
                                            <label class="custom-control-label" for="acessibilidade2">Não</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="form-control-label"> {{__('Status do Ônibus')}} </label>
                                        {{-- Check 1 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="disponivel" class="custom-control-input" id="disponivel" type="radio" value=1>
                                            <label class="custom-control-label" for="disponivel">Disponível</label>
                                        </div>
                                        {{-- Check 2 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="disponivel" class="custom-control-input" id="disponivel2" type="radio" value=0>
                                            <label class="custom-control-label" for="disponivel2">Indisponível</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- END FORM --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush