<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-logradouro">{{ __('RUA / AVENIDA') }}</label>
            <input type="text" name="logradouro" class="form-control form-control-alternative" value="{{ $lista["rodoviaria"]->logradouro }}" readonly>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label class="form-control-label" for="input-numero">{{ __('NÚMERO') }}</label>
            <input type="number" name="numero" id="input-numero" class="form-control form-control-alternative" placeholder="{{ __('Insira o número') }}" value="{{ $lista["rodoviaria"]->numero }}" readonly>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-bairro">{{ __('BAIRRO') }}</label>
            <input type="text" name="bairro" id="input-bairro" class="form-control form-control-alternative" placeholder="{{ __('Insira o bairro') }}" value="{{ $lista["rodoviaria"]->bairro }}" readonly>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-3 form-group">
        <label class="form-control-label" for="form-control-label"> {{__('CIDADE')}}</label>
        <input type="text" class="form-control form-control-alternative" value="{{ $lista["rodoviaria"]->cidade->nome }}" readonly>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
            <input type="text" class="form-control form-control-alternative" placeholder="{{ __('_____-___') }}" value="{{ $lista["rodoviaria"]->cep }}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-control-label" for="input-telefone">{{ __('TELEFONE') }}</label>
            <input type="text" id="input-telefone" class="form-control form-control-alternative" placeholder="{{ __('(__) ____-____') }}" value="{{$lista["rodoviaria"]->telefone }}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-control-label" for="input-ativa">&nbsp;</label>
            <div>
                <button disabled type="button" class="btn col-md-12 {{ $lista["rodoviaria"]->ativa ? ' btn-success' : ' btn-danger' }}">{{ $lista["rodoviaria"]->ativa ? 'Ativo' : 'Inativo' }}</button>
            </div>
        </div>
    </div>
</div>
