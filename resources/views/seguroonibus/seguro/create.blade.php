@extends('layouts.app', ['title' => __('Adicionar Seguro')])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/lou-multi-select/css/multi-select.min.css" rel="stylesheet">
@endpush

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

                            <h6 class="heading-small text-muted mb-4">{{ __('Insira as informações para adicionar o seguro') }}</h6>
                            <div class="pl-lg-4">
                                <div class="ms-container">
                                        <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <label class="form-control-label text-right" for="input-empresa">{{ __('LISTA DE ÔNIBUS') }}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label text-right" for="input-empresa">{{ __('LISTA DE ÔNIBUS ASSEGURADOS') }}</label>
                                                </div>
                                            </div>

                                    <select multiple="multiple" name="onibus[]">
                                        @foreach ($lista["onibus"] as $item)
                                            <option value="{{ $item->id }}"><div class = "col-md-4">Placa: {{ $item->placa}} - Marca: {{ $item->marca }} - Chassi: {{ $item->chassi }} - Modelo: {{ $item->modelo }} - Data Compra: {{ $item->data_compra }} - Tipo: {{$item->description_type}} </div></option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('onibus'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('onibus') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row mt-3">
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
                                                <input type="text" money name="valor" maxlength="10" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o valor...') }}" value="{{ old('valor') }}" required>
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

    <script src="{{ asset('argon') }}/vendor/lou-multi-select/js/jquery.multi-select.js"></script>

    <script>
        $('[multiple=multiple]').multiSelect();
    </script>

    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[money]').mask('###0.00', {reverse: true});
        })
    </script>

@endpush
