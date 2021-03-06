@extends('layouts.app', ['title' => __('Adicionar Tarifa urbano')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Tarifa Urbano')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('tarifa_urbano.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Tarifa Urbano') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tarifa_urbano.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="form-control-label"> {{__('CIDADE')}} </label>
                                        <select bootstrapSelect name="cidade_id"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione uma cidade...</option>
                                            @foreach ($lista as $item)
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('licitacao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-licitacao">{{ __('LICITAÇÃO') }}</label>
                                            <input type="text" name="licitacao" id="input-licitacao" class="form-control form-control-alternative{{ $errors->has('licitacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Licitação') }}" value="{{ old('Licitação') }}" required autofocus>

                                            @if ($errors->has('licitacao'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('licitacao') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valorEspecial">{{ __('VALOR NORMAL') }}</label>
                                            <input type="text" money name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valorEspecial') ? ' is-invalid' : '' }}" placeholder="{{ __('valor') }}" value="{{ old('valor') }}" required autofocus>

                                            @if ($errors->has('valor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('valor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('valorEspecial') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valorEspecial">{{ __('VALOR ESPECIAL') }}</label>
                                            <input type="text" money name="valorEspecial" id="input-valorEspecial" class="form-control form-control-alternative{{ $errors->has('valorEspecial') ? ' is-invalid' : '' }}" placeholder="{{ __('Valor Especial') }}" value="{{ old('valorEspecial') }}" required autofocus>

                                            @if ($errors->has('valorEspecial'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('valorEspecial') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-control-label" for="input-data">{{ __('DATA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input data name='data' class="form-control datepicker" placeholder="Data" type="text" value="">
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
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data]').mask('dd/mm/yyyy', {placeholder: "__/__/____"});
            $('[money]').mask('###0.00', {reverse: true});
        })
    </script>
@endpush
