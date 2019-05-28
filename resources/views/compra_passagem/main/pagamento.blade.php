@extends('compra_passagem.index', ['title' => __('Compra de Passagens')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0">{{ __('Informações da compra') }}</h3>
            </div>
        </div>
    </div>
@endsection

@section('infos-pag')
    <div class="card-header border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0">{{ __('Informe os dados para pagamento') }}</h3>
            </div>
        </div>
    </div>
    <div class="card-body border-0">
        <div class="row clearfix">
            <div class="col">
                <div class="form-group{{ $errors->has('nro') ? ' has-danger' : '' }}">
                    <label class="form-control-label text-white" for="input-nro"> {{ __('NÚMERO DO CARTÃO') }}</label>
                    <input type="text" name="nro" id="input-nro" class="form-control form-control-alternative{{ $errors->has('nro') ? ' is-invalid' : '' }}" placeholder="{{ __('Número do Cartão') }}" value="{{ old('nro') }}" required autofocus>

                    @if ($errors->has('nro'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nro') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6">
                <div class="form-group{{ $errors->has('mes') ? ' has-danger' : '' }}">
                    <label class="form-control-label text-white" for="input-mes">{{ __('MÊS DE VENCIMENTO') }}</label>
                    <input type="text" name="mes" id="input-mes" class="form-control form-control-alternative{{ $errors->has('mes') ? ' is-invalid' : '' }}" placeholder="{{ __('Mês de vencimento') }}" value="{{ old('mes') }}" required autofocus>

                    @if ($errors->has('mes'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mes') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                    <label class="form-control-label text-white" for="form-control-label"> {{__('ANO DE VENCIMENTO')}} </label>
                    <select bootstrapSelect name="ano"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione ano de vencimento</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                    </select>
                </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6">
                <label class="form-control-label text-white" for="form-control-label"> {{__('PARCELAS')}} </label>
                <select bootstrapSelect name="tipo"  data-size="4" data-live-search="true" required>
                    <option value="" disabled selected>À vista</option>
                        <option value="1">1x</option>
                        <option value="2">2x</option>
                        <option value="3">3x</option>
                        <option value="4">4x</option>
                        <option value="5">5x</option>
                        <option value="6">6x</option>
                        <option value="7">7x</option>
                        <option value="8">8x</option>
                        <option value="9">9x</option>
                        <option value="10">10x</option>
                        <option value="11">11x</option>
                        <option value="12">12x</option>
                </select>
            </div>
            <div class="col-lg-6">
                <div class="form-group{{ $errors->has('cod') ? ' has-danger' : '' }}">
                    <label class="form-control-label text-white" for="input-cod">{{ __('COD. SEGURANÇA') }}</label>
                    <input type="text" name="cod" id="input-cod" class="form-control form-control-alternative{{ $errors->has('cod') ? ' is-invalid' : '' }}" placeholder="{{ __('Cod. Segurança') }}" value="{{ old('cod') }}" required autofocus>

                    @if ($errors->has('cod'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cod') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8">
                <h6 class="text-white">Ao clicar em Comprar, você confirma que leu e concordou com o nosso <a href="#">Termo de Aceite</a>.</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="button" class="btn btn-primary mb-3">COMPRAR</button>
        </div>
    </div>

@endsection
