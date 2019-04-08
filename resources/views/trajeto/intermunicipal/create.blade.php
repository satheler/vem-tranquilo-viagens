@extends('layouts.app', ['title' => __('Adicionar Trajeto Intermunicipal')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Trajeto Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('trajeto_intermunicipal.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Trajeto Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('trajeto_intermunicipal.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valor">{{ __('VALOR') }}</label>
                                            <input type="number" name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('Valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Valor') }}" value="{{ old('Valor') }}" required autofocus>
        
                                            @if ($errors->has('valor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Valor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-horarioSaida">{{ __('HORÁRIO DE SAÍDA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input name='horarioSaida' class="form-control timepicker" placeholder="Selecione o horário de saída" type="time" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-horarioChegada">{{ __('HORÁRIO DE CHEGADA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input name='horarioChegada' class="form-control timepicker" placeholder="Selecione o horário de chegada" type="time" value="">
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
@endpush
