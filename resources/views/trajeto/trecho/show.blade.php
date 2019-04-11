<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-chassi">{{ __('CHASSI') }}</label>
            <input type="text" name="chassi" id="input-chassi" class="form-control form-control-alternative" value="{{ $info->description->chassi }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-placa">{{ __('Placa') }}</label>
            <input type="text" name="placa" id="input-placa" class="form-control form-control-alternative" value="{{ $info->description->placa }}"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-marca">{{ __('Marca') }}</label>
            <input type="text" name="marca" id="input-password" class="form-control form-control-alternative" value="{{ $info->description->marca }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-modelo">{{ __('Modelo') }}</label>
            <input type="text" name="modelo" id="input-modelo" class="form-control form-control-alternative" value="{{ $info->description->modelo }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-custoManutencao">{{ __('Custo Manutenção') }}</label>
            <input type="number" name="custoManutencao" id="input-custoManutencao" class="form-control form-control-alternative" value="{{ $info->description->custoManutencao }}" readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label class="form-control-label" for="input-data-compra">{{ __('Data da Compra') }}</label>
        <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" type="text" value="{{ $info->description->dataCompra }}" readonly>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-control-label" for="input-data-fabricacao">{{ __('Data da Fabricação') }}</label>
        <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" type="text" value="{{ $info->description->dataFabricacao }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="row text-center">
    <div class="col-md-6">
            <label for="form-control-label"> {{__('Possui banheiro?')}} </label>
            <div>
                @if ($info->description->banheiro)
                    <span class="badge badge-success">Possui</span>
                @else
                    <span class="badge badge-warning">Não possui</span>
                @endif
            </div>
        </div>

    <div class="col-md-6">
        <label for="form-control-label"> {{__('Status do Ônibus')}} </label>
        <div>
            @if ($info->description->disponivel)
                <span class="badge badge-success">Disponivel</span>
            @else
                <span class="badge badge-warning">Em manutenção</span>
            @endif
        </div>
    </div>
</div>
