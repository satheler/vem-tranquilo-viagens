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
            <input type="text" name="tipo" id="input-tipo" class="form-control form-control-alternative" value="{{ $item->tipo->nome }}"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-tipo">{{ __('Local') }}</label>
            <input type="text" name="tipo" id="input-password" class="form-control form-control-alternative" value="{{ $item->local->nome }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-tipo">{{ __('Cidade') }}</label>
            <input type="text" name="tipo" id="input-tipo" class="form-control form-control-alternative" value="{{ $item->cidade->nome }}"  readonly>
        </div>
    </div>
</div>
