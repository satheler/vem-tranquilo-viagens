<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label class="form-control-label" for="input-tipo_causa">{{ __('TIPO SINISTRO') }}</label>
            <input type="text" name="tipo_causa" id="input-tipo_causa" class="form-control form-control-alternative" value="{{ $item->tipo_causa }}"  readonly>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            <label class="form-control-label" for="input-descricao_causa">{{ __('DESCRIÇÃO SINISTRO') }}</label>
            <input type="text" name="descricao_causa" id="input-descricao_causa" class="form-control form-control-alternative" value="{{ $item->descricao_causa }}"  readonly>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label class="form-control-label" for="input-envolvidos">{{ __('ENVOLVIDOS') }}</label>
            <input type="text" name="envolvidos" id="input-envolvidos" class="form-control form-control-alternative" value="{{ $item->envolvidos }}"  readonly>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label class="form-control-label" for="input-custo">{{ __('CUSTO') }}</label>
            <input type="number" name="custo" id="input-custo" class="form-control form-control-alternative" value="{{ $item->custo }}"  readonly>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            <label class="form-control-label" for="input-descricao_custo">{{ __('DESCRIÇÃO DO CUSTO') }}</label>
            <input type="text" name="descricao_custo" id="input-descricao_custo" class="form-control form-control-alternative" value="{{ $item->descricao_custo }}"  readonly>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            <label class="form-control-label" for="input-responsavel_custo">{{ __('DESCRIÇÃO DO CUSTO') }}</label>
            <input type="text" name="responsavel_custo" id="input-responsavel_custo" class="form-control form-control-alternative" value="{{ $item->responsavel_custo }}"  readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="input-onibus">{{ __('ONIBUS') }}</label>
            <input type="text" name="onibus" id="input-onibus" class="form-control form-control-alternative" value="{{ $item->placa }}"  readonly>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-control-label" for="input-data">{{ __('DATA') }}</label>
        <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" type="text" value="{{$item->data }}" readonly>
            </div>
        </div>
    </div>
   
    
</div>
