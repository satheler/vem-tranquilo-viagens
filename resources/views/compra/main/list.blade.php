<div class="card-body py-4">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <h1>IDA <i class="fas fa-angle-right"></i> <small> {{ $origem->nome }} → {{ $destino->nome }} </small></h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush list my--3">
                        @foreach ($trajetos as $trajeto)

                            <li class="list-group-item px-0" style="background-color: transparent;">
                                <form method="POST" action="{{ route('page_compra.poltrona') }}">
                                    @foreach ($trajeto['info'] as $encontrado)
                                       <input type="hidden" name="alocacao_id" value="{{ $encontrado->id }}">
                                        <input type="hidden" name="trecho_origem_id" value="{{ $encontrado->origem->id }}">
                                        <input type="hidden" name="trecho_destino_id" value="{{ $encontrado->destino->id }}">
                                        <input type="hidden" name="valor" value="{{ $trajeto["valor"] }}">
                                        <div class="row align-items-center text-center">
                                            <div class="col">
                                                <h3 class="mb-0" data-toggle="tooltip" data-placement="top" title="Horário da partida">{{ $encontrado->origem->horarioSaida }}</h3>
                                                <h3 class="mb-0" data-toggle="tooltip" data-placement="bottom" title="Hora da Chegada. Esta informação é apenas para efeito de orientação e não deve ser utilizada para compromissos agendados, pois, trata-se de apenas uma previsão de chegada ao destino.">{{ $encontrado->destino->horarioSaida }}</h3>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-0" data-toggle="tooltip" data-placement="top" title="Tipo de ônibus">{{ $trajeto['onibus']->categoria->categoria }}</h5>
                                                <h5 class="mb-0">{{ str_pad($trajeto["assentos"], 2, 0, STR_PAD_LEFT) }} assentos livres</h5>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col pr-1 text-right"><small class="mb-0" style="vertical-align: bottom;">R$ </small></div>
                                                    <div class="col p-0 text-left"><h3 class="mb-0">  {{ $trajeto["valor"] }}</h3></div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary" >{{ __('SELECIONAR') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>

                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

                    {{-- <div class="table-responsive py-4">
                        <table id="datatable" class="table align-items-center table-flush dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Tipo') }}</th>
                                    <th scope="col">{{ __('Data de Saída') }}</th>
                                    <th scope="col">{{ __('Valor') }}</th>
                                    <th scope="col">{{ __('Quantidade') }}</th>
                                    <th scope="col">{{ __('') }}</th>
                                </tr>
                            </thead>

                            <tbody class="thead-light">

                                {{ var_dump($trajetos) }}
                                <tr>
                                    <td scope="col">{{ __('Tipo') }}</td>
                                    <td scope="col">{{ __('Data de Saída') }}</td>
                                    <td scope="col">{{ __('Valor') }}</td>
                                    <td scope="col">{{ __('Quantidade') }}</td>
                                    <td scope="col" style="width: 10%!important;">
                                        <button type="submit" class="btn btn-primary" >{{ __('Selecionar') }}</button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div> --}}

                    {{-- {{ var_dump($trajetos) }} --}}
