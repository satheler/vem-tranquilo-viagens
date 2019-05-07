@extends('layouts.app', ['title' => __('Editar Seguro')])

@section('content')
    {{-- @include('seguros.partials.header', ['title' => __('Editar seguro')]) --}}

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('seguro') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('seguro.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('seguro.update', $lista['seguro']->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('seguro information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-empresa">{{ __('empresa') }}</label>
                                    <input type="text" empresa="empresa" id="input-empresa" class="form-control form-control-alternative{{ $errors->has('empresa') ? ' is-invalid' : '' }}" placeholder="{{ __('empresa') }}" value="{{ old('empresa', $lista['seguro']->empresa) }}" required autofocus>

                                    @if ($errors->has('empresa'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('empresa') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-valor">{{ __('valor') }}</label>
                                    <input type="valor" empresa="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="{{ __('valor') }}" value="{{ old('valor', $lista['seguro']->valor) }}" required>

                                    @if ($errors->has('valor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('valor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('assegura') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-assegura">{{ __('assegura') }}</label>
                                    <input type="assegura" empresa="assegura" id="input-assegura" class="form-control form-control-alternative{{ $errors->has('assegura') ? ' is-invalid' : '' }}" placeholder="{{ __('assegura') }}" value="">

                                    @if ($errors->has('assegura'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('assegura') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
