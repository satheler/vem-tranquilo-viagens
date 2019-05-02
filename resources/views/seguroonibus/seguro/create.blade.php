@extends('layouts.app', ['title' => __('Adicionar Seguro')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Seguro')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('seguro.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Seguro') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('seguro.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Seguro') }}</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="onibus_id"> {{__('ONIBUS')}} </label>
                                        <select bootstrapSelect name="onibus_id" data_inicio-size="4" data_inicio-live-search="true" required>
                                            <option value="{{ old('onibus_id') }}" disabled selected>Selecione o onibus...</option>
                                            @foreach ($lista["onibus"] as $item)
                                            <option value="{{ $item->id }}">{{ $item->placa }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('onibus_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('onibus_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br />

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-empresa">{{ __('EMPRESA') }}</label>
                                        @if ($errors->has('empresa'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('empresa') }}</strong>
                                                </span>
                                            @endif
                                        <div class="form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
                                            <input type="text" km name="empresa" id="input-empresa" class="form-control form-control-alternative{{ $errors->has('empresa') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira a empresa...') }}" value="{{ old('empresa') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-valor">{{ __('VALOR') }}</label>
                                        @if ($errors->has('valor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('valor') }}</strong>
                                                </span>
                                            @endif
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <input type="text" km name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o valor...') }}" value="{{ old('valor') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-assegura">{{ __('ASSEGURA') }}</label>
                                        @if ($errors->has('assegura'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('assegura') }}</strong>
                                                </span>
                                            @endif
                                        <div class="form-group{{ $errors->has('assegura') ? ' has-danger' : '' }}">
                                            <input type="text" km name="assegura" id="input-assegura" class="form-control form-control-alternative{{ $errors->has('assegura') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o que a empresa assegura...') }}" value="{{ old('assegura') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label{{ $errors->has('data_inicio') ? ' text-warning' : '' }}" for="input-data_inicio">{{ __('DATA INICIAL DE VIGÊNCIA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="data_inicio" class="form-control datepicker" placeholder="Clique para selecionar a data inicial de vigência" type="text" value="{{ old('data_inicio') }}" required>
                                            </div>
                                            @if ($errors->has('data_inicio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('data_inicio') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label{{ $errors->has('data_vigencia') ? ' text-warning' : '' }}" for="input-data_vigencia">{{ __('DATA FINAL DE VIGÊNCIA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="data_vigencia" class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="{{ old('data_vigencia') }}" required>
                                            </div>
                                            @if ($errors->has('data_vigencia'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('data_vigencia') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label" for="tipo_id"> {{__('TIPO')}} </label>
                                    <select bootstrapSelect name="tipo_id" data_inicio-size="4" data_inicio-live-search="true" required>
                                        <option value="{{ old('tipo_id') }}" disabled selected>Selecione o tipo...</option>
                                        @foreach ($lista["tipo"] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipo_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tipo_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- END FORM --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
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

<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('[time]').mask('00:00');
        $('[km]').mask('###0.0', {reverse: true});
    })
    </script>
@endpush
