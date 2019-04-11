@extends('layouts.app', ['title' => __('Adicionar Ônibus Intermunicipal')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Ônibus Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('onibus_intermunicipal.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Ônibus Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $errors }}
                        <form method="post" action="{{ route('onibus_intermunicipal.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do ônibus') }}</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label" for="input-chassi">{{ __('Chassi') }}</label>
                                    <div class="form-group{{ $errors->has('chassi') ? ' has-danger' : '' }}">
                                        <input type="text" name="chassi" id="input-chassi" class="form-control form-control-alternative{{ $errors->has('chassi') ? ' is-invalid' : '' }}" placeholder="{{ __('Informe o chassi... Ex: 0A1B2C3D4E5F6G789') }}" value="{{ old('chassi') }}" required autofocus>

                                        @if ($errors->has('chassi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Placa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label" for="input-placa">{{ __('Placa') }}</label>
                                    <div class="form-group{{ $errors->has('placa') ? ' has-danger' : '' }}">
                                        <input type="text" name="placa" id="input-placa" class="form-control form-control-alternative{{ $errors->has('placa') ? ' is-invalid' : '' }}" placeholder="{{ __('Informe a placa... Ex: ABC1234') }}" value="{{ old('placa') }}" required>

                                        @if ($errors->has('placa'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Placa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="pl-lg-4"> --}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('marca') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-marca">{{ __('Marca') }}</label>
                                            <input type="text" name="marca" id="input-password" class="form-control form-control-alternative{{ $errors->has('marca') ? ' is-invalid' : '' }}" placeholder="{{ __('Informe a marca... Ex: Mercedes Bens, Volkswagem, Volvo') }}" value="{{ old('marca') }}" required>

                                            @if ($errors->has('marca'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Marca') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="input-modelo">{{ __('Modelo') }}</label>
                                        <div class="form-group{{ $errors->has('modelo') ? ' has-danger' : '' }}">
                                            <input type="text" name="modelo" id="input-modelo" class="form-control form-control-alternative{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="{{ __('Informe o modelo... Ex: IO123, UI321') }}" value="{{ old('modelo') }}" required>

                                            @if ($errors->has('modelo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Modelo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="input-data-compra">{{ __('Data da Compra') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="data_compra" class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="{{ old('data_compra') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="input-data-fabricacao">{{ __('Data da Fabricação') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="data_fabricacao" class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="{{ old('data_fabricacao') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <label for="form-control-label"> {{__('Possui acessibilidade?')}} </label>
                                        {{-- Check 1 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="acessibilidade" class="custom-control-input" id="acessibilidade" type="radio" value="1" {{ old('acessibilidade') == "1" ? 'checked="checked"' : "" }} required>
                                            <label class="custom-control-label" for="acessibilidade">Sim</label>
                                        </div>
                                        {{-- Check 2 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="acessibilidade" class="custom-control-input" id="acessibilidade2" type="radio" value="0" {{ old('acessibilidade') == "0" ? 'checked="checked"' : "" }}>
                                            <label class="custom-control-label" for="acessibilidade2">Não</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="form-control-label"> {{__('Possui banheiro?')}} </label>
                                        {{-- Check 1 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="banheiro" class="custom-control-input" id="banheiro" type="radio" value="1" {{ old('banheiro') == "1" ? 'checked="checked"' : "" }} required>
                                            <label class="custom-control-label" for="banheiro">Sim</label>
                                        </div>
                                        {{-- Check 2 --}}
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="banheiro" class="custom-control-input" id="banheiro2" type="radio" value="0" {{ old('banheiro') == "0" ? 'checked="checked"' : "" }}>
                                            <label class="custom-control-label" for="banheiro2">Não</label>
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
