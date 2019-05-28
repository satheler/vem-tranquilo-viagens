@extends('layouts.app', ['title' => __('Editar rodoviária')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar sinistro')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{route('sinistro.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Editar sinistro') }}</h3>
                            </div>
                        </div>
                    </div>
                  <div class="card-body">
                        <form method="post" action="{{ route('sinistro_ativas.store') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Sinistro') }}</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('tipo do sinistro) ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-tipo_causa">{{ __('TIPO DO SINISTRO') }}</label>
                                            <input type="text" name="tipo_causa" class="form-control form-control-alternative{{ $errors->has('tipo-causa') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira um tipo de sinistro') }}" value="{{ old('tipo_causa') }}" required autofocus>

                                            @if ($errors->has('Tipo de Sinistro'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Tipo de Sinistro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_causa">{{ __('DESCRIÇÃO DO SINISTRO') }}</label>
                                            <input type="text" name="descricao_causa" id="input-descricao_causa" class="form-control form-control-alternative{{ $errors->has('descricao_causa') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira uma descrição para o sinistro') }}" value="{{ old('descricao_causa') }}" required>

                                            @if ($errors->has('descricao sinistro'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('descricao sinistro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('envolvidos') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-envolvidos">{{ __('ENVOLVIDOS NO SINISTRO') }}</label>
                                            <input type="text" name="envolvidos" id="input-envolvidos" class="form-control form-control-alternative{{ $errors->has('envolvidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira os envolvidos no sinistro') }}" value="{{ old('envolvidos') }}" required>

                                            @if ($errors->has('envolvidos'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('envolvidos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3 form-group{{ $errors->has('onibus_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label{{ $errors->has('onibus_id') ? ' text-warning' : '' }}" for="form-control-label"> {{__('ONIBUS')}}</label>
                                        <select bootstrapSelect name="onibus"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o onibus envolvido no sinistro...</option>
                                            @foreach ($lista["onibus"] as $item)
                                                <option @if($errors->has('onibus') && ($errors->first('onibus') == $item->id) || old('onibus') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->placa }}>{{ $item->marca }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('onibus'))
                                                <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('onibus') }} </label>
                                            @endif

                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('custo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-custo">{{ __('CUSTO') }}</label>
                                            <input type="text" cep name="custo" id="input-custo" class="form-control form-control-alternative{{ $errors->has('custo') ? ' is-invalid' : '' }}" placeholder="{{__('Insira o custo do sinistro') }}" value="{{ old('custo') }}" required>

                                            @if ($errors->has('custo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('custo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('descricao_custo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_custo">{{ __('DESCRIÇÃO DO CUSTO') }}</label>
                                            <input type="text" phone name="descricao_custo" id="input-descricao_custo" class="form-control form-control-alternative{{ $errors->has('descricao_custo') ? ' is-invalid' : '' }}" placeholder="{{ __('Insita uma descrição para o custo do sinistro') }}" value="{{ old('descricao_custo') }}" required>

                                            @if ($errors->has('descricao_custo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('descricao_causa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <h3>Data do Sinistro </h3>
                                        <div class="input-group mb-2">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data', $data ?? null) }}" required>
                                            </div>
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

<script>

$(document).ready(function(){
    $('[cep]').mask('00000-000');
    $('[phone]').mask('(00) 0000-0000');
})
</script>
@endpush
