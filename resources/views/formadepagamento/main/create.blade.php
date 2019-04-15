@extends('layouts.app', ['title' => __('Forma de Pagamento')])

@section('content')
    @include('users.partials.header', ['title' => __('Forma de Pagamento')])


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('pagamento.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Forma de Pagamento') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('pagamento.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Forma de Pagamento') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <label class="form-control-label{{ $errors->has('forma') ? ' text-warning' : '' }}" for="input-forma">
                                            {{ __('DESCRIÇÃO') }}
                                            @if ($errors->has('forma'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('forma') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                        <div class="form-group{{ $errors->has('forma') ? ' has-warning' : '' }}">
                                            <input type="text" name="forma" id="input-forma" class="form-control{{ $errors->has('forma') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex.: Boleto bancário, Cartão de Crédito...') }}" value="{{ old('forma') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label{{ $errors->has('intermunicipal') ? ' text-warning' : '' }}" for="form-control-label"> {{__('SELECIONE O TIPO DE FROTA')}}
                                        @if ($errors->has('intermunicipal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('intermunicipal') }}</strong>
                                            </span>
                                        @endif
                                        </label>
                                        {{-- Check 1 --}}
                                        <div class="form-group{{ $errors->has('forma') ? ' is-invalid' : '' }}">
                                            <div class="custom-control custom-radio mb-3{{ $errors->has('forma') ? ' has-warning' : '' }}">
                                                <input name="intermunicipal" class="custom-control-input{{ $errors->has('intermunicipal') ? ' is-invalid' : '' }}" id="intermunicipal1" type="radio" value="1" {{ old('intermunicipal') == "1" ? 'checked="checked"' : "" }} required>
                                                <label class="custom-control-label" for="intermunicipal1">Intermunicipal</label>
                                            </div>
                                            {{-- Check 2 --}}
                                            <div class="custom-control custom-radio mb-3{{ $errors->has('forma') ? ' has-warning' : '' }}">
                                                <input name="intermunicipal" class="custom-control-input{{ $errors->has('intermunicipal') ? ' is-invalid' : '' }}" id="intermunicipal2" type="radio" value="0" {{ old('intermunicipal') == "0" ? 'checked="checked"' : "" }}>
                                                <label class="custom-control-label" for="intermunicipal2">Urbano</label>
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
