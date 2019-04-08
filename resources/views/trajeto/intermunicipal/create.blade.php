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
                        <form method="post" action="{{ route('trajeto_urbano.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('terminal') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('terminal') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-qntParadas">{{ __('Quantidade de Paradas') }}</label>
                                            <input type="number" name="qntParadas" id="input-qntParadas" class="form-control form-control-alternative{{ $errors->has('Quantidade de Paradas') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantidade de Paradas') }}" value="{{ old('Quantidade de Paradas') }}" required autofocus>
        
                                            @if ($errors->has('qntParadas'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('qntParadas') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-horarioSaida">{{ __('Horário de saída') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input name='horarioSaida' class="form-control timepicker" placeholder="Selecione o horário de saída" type="time" value="">
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
