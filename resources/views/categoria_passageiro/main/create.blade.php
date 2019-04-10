@extends('layouts.app', ['title' => __('Categoria de Passageiro')])

@section('content')
    @include('users.partials.header', ['title' => __('Categoria de Passageiro')])


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('categoria_passageiro.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Categoria de Passageiro') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('categoria_passageiro.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Categoria de Passageiro') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <label class="form-control-label{{ $errors->has('tipo') ? ' text-warning' : '' }}" for="input-tipo">
                                            {{ __('TIPO DE CATEGORIA') }}
                                            @if ($errors->has('tipo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tipo') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                        <div class="form-group{{ $errors->has('tipo') ? ' has-warning' : '' }}">
                                            <input type="text" name="tipo" id="input-tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex.: Estudante...') }}" value="{{ old('tipo') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label{{ $errors->has('desconto') ? ' text-warning' : '' }}" for="input-desconto">
                                            {{ __('DESCONTO (em %)') }}
                                            @if ($errors->has('desconto'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('desconto') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                        <div class="form-group{{ $errors->has('desconto') ? ' has-warning' : '' }}">
                                            <input type="text" percent name="desconto" id="input-desconto" class="form-control{{ $errors->has('desconto') ? ' is-invalid' : '' }}" placeholder="{{ __('Desconto') }}" value="{{ old('desconto') }}" required autofocus>
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
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[percent]').mask('000', {reverse: true});
        })
    </script>
@endpush