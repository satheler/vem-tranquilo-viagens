@extends('compra.index', ['title' => __('Compra de Passagens')])

@section('infos')
<form method="POST" action="{{ route('page_compra.store') }}">
    <input type="hidden" name="alocacao_intermunicipal_id" value="{{ $alocacao->id }}">
 <div class="row">
            <div class="col-lg-6">
                <div class="card bg-gradient-default border-0 shadow">
    <div class="card-header bg-default border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0 text-white">Detalhes da compra</h3>
            </div>
        </div>
    </div>
    <div class="card-body bg-white border-0">
        <ul class="list-group list-group-flush" data-toggle="checklist">
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Viagem</h3>
                            <small>{{ $origem->cidade->nome }} <i class="fas fa-chevron-right"></i> {{ $destino->cidade->nome }}</small>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Saída e Chegada</h3>
                            <small><i class="fas fa-clock"></i> {{ $origem->horarioSaida }} <i class="fas fa-chevron-right"></i> {{ $destino->horarioChegada }}</small>
                        </div>
                    </div>
                </div>
            </li>

            @foreach ($poltronas as $poltrona)
            <li class="checklist-entry list-group-item flex-column align-items-center justify-content-center">
                <div class="d-flex w-100 justify-content-between align-items-center justify-content-center">
                    <div class="checklist-info">
                        <h3 class="checklist-title mb-0">POLTRONA</h3>
                        <div class="row justify-content-center">
                            <span class="badge badge-primary">{{ $poltrona }}</span>
                            <input name="poltronas[]" type="hidden" value="{{ $poltrona }}" required>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="row">
                            <h3 class="checklist-title mb-0">Nome</h3>
                            <input name="nomes[]" type="text" class="form-control form-control-alternative" placeholder="{{ __('Insira o nome completo...') }}" value="{{ old('nomes') }}" required>
                        </div>
                        <div class="row">
                            <h3 class="checklist-title mt-2 mb-0">CPF</h3>
                            <input name="cpf[]" cpf type="text" class="form-control form-control-alternative" placeholder="{{ __('Insira o CPF...') }}" value="{{ old('cpf') }}" required>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="row">
                            <h3 class="checklist-title mt-2 mb-0">TIPO</h3>
                            <select name="categoria_passageiro_id[]" bootstrapSelect  data-size="4" data-live-search="true" required>
                                @foreach ($categoria_passageiro as $categoria)
                                    <option for = "option" name="categoria" value="{{ $categoria->id }}" restriction="{{ $categoria->descricao }}"> {{ $categoria->tipo }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

            <li class="checklist-entry list-group-item flex-column align-items-center justify-content-center">
                <div class="d-flex w-100 justify-content-between align-items-center justify-content-center">
                    <div class="checklist-info">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" name="usarPontos" id="customCheckLogin" type="checkbox" {{ old('usarPontos') ? 'checked' : 'off' }}>
                            <label class="custom-control-label" for="customCheckLogin">
                                <span class="text-muted">{{ __('Você deseja utilizar seus pontos para está compra?') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <a href="{{ route('page_home.index') }}" class="btn btn-warning">Cancelar</a>
                    <input type="hidden" name="valor" value={{ $valor }}>
                    <h1 class="checklist-title mb-0">Total R$ {{ $valor }}</h1>
                </div>
            </li>
        </ul>
    </div>

    <div class="card-footer bg-default border-0">
        <div class="row">
        </div>
    </div>
    </div>
    </div>

    <div class="col-lg-6">
            <div class="card bg-default border-0 shadow">
        <div class="card-header bg-default border-0">
            <div class="row align-cidades-center">
                <div class="col-lg-8">
                    <h3 class="mb-0 text-white ">{{ __('Informe os dados para pagamento') }}</h3>
                </div>
            </div>
        </div>
        <div class="card-body bg-white border-0">
            <div class="row clearfix">
                <div class="col">
                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-nome"> {{ __('TITULAR DO CARTÃO') }}</label>
                        <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Titular do Cartão') }}" value="{{ old('nome') }}" required autofocus>

                        @if ($errors->has('nome'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col">
                    <div class="form-group{{ $errors->has('nro') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-nro"> {{ __('NÚMERO DO CARTÃO') }}</label>
                        <input nro type="text" name="nro" id="input-nro" class="form-control form-control-alternative{{ $errors->has('nro') ? ' is-invalid' : '' }}" placeholder="{{ __('Número do Cartão') }}" value="{{ old('nro') }}" required autofocus>

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
                        <label class="form-control-label" for="input-mes">{{ __('MÊS DE VENCIMENTO') }}</label>
                        <input mes type="text" name="mes" id="input-mes" class="form-control form-control-alternative{{ $errors->has('mes') ? ' is-invalid' : '' }}" placeholder="{{ __('Mês de vencimento') }}" value="{{ old('mes') }}" required autofocus>

                        @if ($errors->has('mes'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mes') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="form-control-label" for="form-control-label"> {{__('ANO DE VENCIMENTO')}} </label>
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
                    <label class="form-control-label" for="form-control-label"> {{__('PARCELAS')}} </label>
                    <select bootstrapSelect name="parcelas" data-size="4" data-live-search="true" required>
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
                        <label class="form-control-label  " for="input-cod">{{ __('COD. SEGURANÇA') }}</label>
                        <input cod type="text" name="cod" id="input-cod" class="form-control form-control-alternative{{ $errors->has('cod') ? ' is-invalid' : '' }}" placeholder="{{ __('Cod. Segurança') }}" value="{{ old('cod') }}" required autofocus>

                        @if ($errors->has('cod'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cod') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col">
                    <h4>Ao clicar em Comprar, você confirma que leu e concordou com o nosso <a href="#">Termo de Aceite</a>.</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary mb-3">COMPRAR</button>
            </div>
        </div>

        <div class="card-footer bg-default border-0">
            <div class="row">
            </div>
        </div>
        </div>
        </div>

    </div>
</form>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[nro]').mask('0000.0000.0000.0000');
            $('[cpf]').mask('000.000.000-00', {reverse: true});
            $('[mes]').mask('00');
            $('[cod]').mask('000');

            $('[restriction]').on('click', function(e) {
                console.log(e);
            })
        })

    </script>

@endpush
