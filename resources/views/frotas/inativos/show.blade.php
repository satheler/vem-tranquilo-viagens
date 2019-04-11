<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-chassi">{{ __('CHASSI') }}</label>
            <input type="text" name="chassi" id="input-chassi" class="form-control form-control-alternative" value="{{ $item->chassi }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-placa">{{ __('Placa') }}</label>
            <input type="text" name="placa" id="input-placa" class="form-control form-control-alternative" value="{{ $item->placa }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-marca">{{ __('Marca') }}</label>
            <input type="text" name="marca" id="input-password" class="form-control form-control-alternative" value="{{ $item->marca }}"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-modelo">{{ __('Modelo') }}</label>
            <input type="text" name="modelo" id="input-modelo" class="form-control form-control-alternative" value="{{ $item->modelo }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-control-label" for="input-data-compra">{{ __('Data da Compra') }}</label>
        <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" type="text" value=" {{ (new DateTime($item->data_compra))->format('d/m/Y') }}" readonly>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-control-label" for="input-data-fabricacao">{{ __('Data da Fabricação') }}</label>
        <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" type="text" value=" {{ (new DateTime($item->data_fabricacao))->format('d/m/Y') }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="row">
</div>

<div class="row text-center">
    <label for="form-control-label"> {{__('Observação')}} </label>
    <div class="col-md-12">
        <textarea class="form-control" rows="4" disabled>{{ $item->observacao }}</textarea>
    </div>
</div>
