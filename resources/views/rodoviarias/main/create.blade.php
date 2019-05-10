@extends('layouts.app', ['title' => __('Adicionar rodoviária')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar rodoviária')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('rodoviarias_ativas.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar rodoviária') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('rodoviarias_ativas.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações da rodoviária') }}</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('logradouro') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-logradouro">{{ __('RUA / AVENIDA') }}</label>
                                            <input type="text" name="logradouro" class="form-control form-control-alternative{{ $errors->has('logradouro') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira uma rua/avenida') }}" value="{{ old('logradouro') }}" required autofocus>

                                            @if ($errors->has('logradouro'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('logradouro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-numero">{{ __('NÚMERO') }}</label>
                                            <input type="number" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o número') }}" value="{{ old('numero') }}" required>

                                            @if ($errors->has('numero'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('numero') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('bairro') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-bairro">{{ __('BAIRRO') }}</label>
                                            <input type="text" name="bairro" id="input-bairro" class="form-control form-control-alternative{{ $errors->has('bairro') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira o bairro') }}" value="{{ old('bairro') }}" required>

                                            @if ($errors->has('bairro'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bairro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3 form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                        <label class="form-control-label{{ $errors->has('cidade') ? ' text-warning' : '' }}" for="form-control-label"> {{__('CIDADE')}}</label>
                                        <select bootstrapSelect name="cidade"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione a cidade...</option>
                                            @foreach ($lista["cidade"] as $item)
                                                <option @if($errors->has('cidade') && ($errors->first('cidade') == $item->id) || old('cidade') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('cidade'))
                                                <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('cidade') }} </label>
                                            @endif

                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
                                            <input type="text" cep name="cep" id="input-cep" class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" placeholder="{{ __('_____-___') }}" value="{{ old('cep') }}" required>

                                            @if ($errors->has('cep'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cep') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-telefone">{{ __('TELEFONE') }}</label>
                                            <input type="text" phone name="telefone" id="input-telefone" class="form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="{{ __('(__) ____-____') }}" value="{{ old('telefone') }}" required>

                                            @if ($errors->has('telefone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('telefone') }}</strong>
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

<script>

$(document).ready(function(){
    $('[cep]').mask('00000-000');
    $('[phone]').mask('(00) 0000-0000');
})
</script>
@endpush
