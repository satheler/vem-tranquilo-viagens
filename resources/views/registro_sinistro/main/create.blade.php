@extends('layouts.app', ['title' => __('Adicionar Sinistro')])

@section('content')
@include('users.partials.header', ['title' => __('Registro de Sinistro')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <a href="{{ route('sinistro.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                        </div>
                        <div class="col-4 text-right">
                            <h3 class="mb-0">{{ __('Adicionar Sinistro') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sinistro.store') }}" autocomplete="off">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">{{ __('Informações do Sinistro') }}</h6>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('tipo_causa') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipo_causa">{{ __('TIPO DE SINISTRO') }}</label>
                                    <input type="text" name="tipo_causa" class="form-control form-control-alternative{{ $errors->has('tipo_causa') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o tipo do sinistro') }}" value="{{ old('tipo_causa') }}" required autofocus>

                                    @if ($errors->has('tipo_causa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_causa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group{{ $errors->has('descricao_causa') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-descricao_causa">{{ __('DESCRIÇÃO DO SINISTRO') }}</label>
                                    <input type="text" name="descricao_causa" id="input-descricao_causa" class="form-control form-control-alternative{{ $errors->has('descricao_causa') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira a descrição para o sinistro') }}" value="{{ old('descricao_causa') }}" required>

                                    @if ($errors->has('descricao_causa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descricao_causa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('envolvidos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-envolvidos">{{ __('ENVOLVIDOS') }}</label>
                                    <input type="text" name="envolvidos" id="input-envolvidos" class="form-control form-control-alternative{{ $errors->has('envolvidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira os envolvidos no sinistro') }}" value="{{ old('envolvidos') }}" required>

                                    @if ($errors->has('envolvidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('envolvidos') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 form-group{{ $errors->has('onibus') ? ' has-danger' : '' }}">
                                <label class="form-control-label{{ $errors->has('onibus') ? ' text-warning' : '' }}" for="form-control-label"> {{__('PLACA DO ONIBUS')}}</label>
                                <select bootstrapSelect name="onibus" data-size="4" data-live-search="true" required>
                                    <option value="" disabled selected>Selecione o onibus...</option>
                                    @foreach ($lista["onibus"] as $item)
                                    <option @if($errors->has('onibus') && ($errors->first('onibus') == $item->id) || old('onibus') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->placa }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('onibus'))
                                <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('onibus') }} </label>
                                @endif

                            </div>


                            <div class="col-md-3">
                                <label class="form-control-label" for="input-data">{{ __('DATA') }}</label>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('custo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-custo">{{ __('CUSTO') }}</label>
                                    <input type="number" cep name="custo" id="input-custo" class="form-control form-control-alternative{{ $errors->has('custo') ? ' is-invalid' : '' }}" placeholder="{{ __('custo do sinistro') }}" value="{{ old('custo') }}" required>

                                    @if ($errors->has('custo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('custo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group{{ $errors->has('descricao_custo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-descricao_custo">{{ __('DESCRIÇÃO DO CUSTO') }}</label>
                                    <input type="text" phone name="descricao_custo" id="input-descricao_custo" class="form-control form-control-alternative{{ $errors->has('descricao_custo') ? ' is-invalid' : '' }}" placeholder="{{ __('descrição do custo do sinistro') }}" value="{{ old('descricao_custo') }}" required>

                                    @if ($errors->has('descricao_custo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descricao_custo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>


@endpush