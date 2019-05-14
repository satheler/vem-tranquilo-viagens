<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-nome">{{ __('Nome') }}</label>
            <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative" value="{{ $item->nome }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-tipo">{{ __('Função') }}</label>
            <input type="text" name="nome" id="input-tipo" class="form-control form-control-alternative" value="{{ $item->tipo->nome }}"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-local">{{ __('Local de trabalho') }}</label>
            <input type="text" name="local" id="input-local" class="form-control form-control-alternative" value="{{ $item->local->logradouro }}"  readonly>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="form-control-label" for="input-local">{{ __('Número') }}</label>
            <input type="text" name="local" id="input-local" class="form-control form-control-alternative" value="{{ $item->local->numero }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-cidade">{{ __('Bairro') }}</label>
            <input type="text" name="cidade" id="input-cidade" class="form-control form-control-alternative" value="{{ $item->local->bairro }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-tipo">{{ __('CEP') }}</label>
            <input type="text" name="nome" id="input-tipo" class="form-control form-control-alternative" value="{{ $item->local->cep }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-cidade">{{ __('Telefone') }}</label>
            <input type="text" name="cidade" id="input-cidade" class="form-control form-control-alternative" value="{{ $item->local->telefone }}"  readonly>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="form-control-label" for="input-ativa">Status</label>
            <div>
                <button disabled type="button" class="btn col-md-12 {{ $item->status ? ' btn-success' : ' btn-danger' }}">{{ $item->status ? 'Ativo' : 'Inativo' }}</button>
            </div>
        </div>
    </div>
</div>
