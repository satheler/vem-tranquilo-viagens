{{-- <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-chassi">{{ __('Onibus') }}</label>
            <input type="text" name="chassi" id="input-chassi" class="form-control form-control-alternative" value="{{ $item }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="input-placa">{{ __('Placa') }}</label>
            <input type="text" name="placa" id="input-placa" class="form-control form-control-alternative" value="{{ $item}}"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-marca">{{ __('Marca') }}</label>
            <input type="text" name="marca" id="input-password" class="form-control form-control-alternative" value="{{ $item}}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-modelo">{{ __('Modelo') }}</label>
            <input type="text" name="modelo" id="input-modelo" class="form-control form-control-alternative" value="{{ $item }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-custoManutencao">{{ __('Custo Manutenção') }}</label>
            <input type="number" name="custoManutencao" id="input-custoManutencao" class="form-control form-control-alternative" value="{{ $item }}" readonly>
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
                <input class="form-control datepicker" type="text" value="{{ $item }}" readonly>
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
                <input class="form-control datepicker" type="text" value="{{ $item }}" readonly>
            </div>
        </div>
    </div>
</div> --}}
@foreach ($item->onibus as $item)
<div class = "col-md-6">
    <div>Placa: {{ $item->placa }}</div>
    <div>Marca: {{ $item->marca }}</div>
    <div>Chassi: {{ $item->chassi }}</div>
    <div>Modelo: {{ $item->modelo }}</div>
    <div>Data Compra: {{ $item->data_compra }}</div>
    <div>Tipo:  {{$item->description_type}} </div>
</div>

@endforeach
