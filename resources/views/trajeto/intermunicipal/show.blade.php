<h3>Rota do trajeto</h3>
<ul class="list-group list-group-flush">
    @foreach ($item->trechos as $trecho)
    <div class="divider"></div>
        <li class="checklist-entry list-group-item flex-column align-items-start py-2">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="checklist-title">Cidade de origem: <span> {{ $trecho->origem->nome }} </span></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="checklist-title">Horário de saida: <span> {{ $trecho->pivot->horarioSaida }} </span></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5 class="checklist-title">Cidade de destino: <span> {{ $trecho->destino->nome }} </span></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="checklist-title">Horário de chegada: <span> {{ $trecho->pivot->horarioChegada }} </span></h5>
                </div>
            </div>
        </li>
    <div class="divider"></div>
    @endforeach
</ul>
