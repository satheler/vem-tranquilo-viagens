@extends('layouts.app', ['title' => __('Adicionar Tarifa Intermunicipal')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Tarifa Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('tarifa_intermunicipal.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Tarifa Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tarifa_intermunicipal.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('origem') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-origem">{{ __('ORIGEM') }}</label>
                                            <input type="text" name="origem_id" id="input-origem" class="form-control form-control-alternative{{ $errors->has('origem') ? ' is-invalid' : '' }}" placeholder="{{ __('Origem') }}" value="{{ old('Origem') }}" required autofocus>

                                            @if ($errors->has('origem'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Origem') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('destino') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-destino">{{ __('DESTINO') }}</label>
                                            <input type="text" name="destino_id" id="input-destino" class="form-control form-control-alternative{{ $errors->has('destino') ? ' is-invalid' : '' }}" placeholder="{{ __('Destino') }}" value="{{ old('Destino') }}" required autofocus>

                                            @if ($errors->has('destino'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Destino') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('terminal') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-terminal">{{ __('TERMINAL') }}</label>
                                            <input type="text" name="terminal" id="input-terminal" class="form-control form-control-alternative{{ $errors->has('terminal') ? ' is-invalid' : '' }}" placeholder="{{ __('Terminal') }}" value="{{ old('terminal') }}" required autofocus>

                                            @if ($errors->has('terminal'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Terminal') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valor">{{ __('VALOR') }}</label>
                                            <input type="text" money name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('Valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Valor') }}" value="{{ old('Valor') }}" required autofocus>

                                            @if ($errors->has('valor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Valor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('qntParadas') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-qntParadas">{{ __('QUANTIDADE DE PARADAS') }}</label>
                                            <input type="number" name="qntParadas" id="input-qntParadas" class="form-control form-control-alternative{{ $errors->has('Quantidade de Paradas') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantidade de Paradas') }}" value="{{ old('Quantidade de Paradas') }}" required autofocus>

                                            @if ($errors->has('qntParadas'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('qntParadas') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="input-horarioSaida">{{ __('HORÁRIO DE SAÍDA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioSaida' class="form-control timepicker" placeholder="Selecione o horário de saída" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="input-horarioChegada">{{ __('HORÁRIO DE CHEGADA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioChegada' class="form-control timepicker" placeholder="Selecione o horário de chegada" type="text" value="">
                                            </div>
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
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[time]').mask('00:00:00', {placeholder: "__:__:__"});
            $('[money]').mask('#.##0,00', {reverse: true});
        })
    </script>
@endpush
