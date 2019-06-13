@extends('vendaPassagem.index', ['title' => __('Escolha de Assentos')])

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/seats.css" rel="stylesheet">
@endpush

@section('infos')
    <form method="POST" action="{{ route('vendaPassagem.pagamento') }}">
        <input type="hidden" name="trecho_origem_id" value="{{ $origem->id }}">
        <input type="hidden" name="trecho_destino_id" value="{{ $destino->id }}">
        <input type="hidden" name="alocacao_id" value="{{ $alocacao->id }}">
    <div class="row">
        <div class="col-8">
            <div class="card-header bg-default border-0">
                <div class="row align-cidades-center">
                    <div class="col-lg-8">
                        <h3 class="mb-0 text-white">Detalhes da venda</h3>
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
                                    <span>{{ $origem->cidade->nome }} <i class="fas fa-chevron-right"></i> {{ $destino->cidade->nome }}</span>
                                </div>
                            </div>
                            <div class="checklist-info">
                                <div class="col text-center">
                                    <h3 class="checklist-title">Tipo do ônibus</h3>
                                    <span class="badge badge-primary">{{  $alocacao->onibus->categoria->categoria }}</span>
                                </div>
                            </div>
                            <div class="checklist-info">
                                <div class="col text-center">
                                    <h3 class="checklist-title">Saída e Chegada</h3>
                                    <small><i class="fas fa-clock"></i>
                                        {{ $origem->horarioSaida }} <i class="fas fa-chevron-right"></i> {{ $destino->horarioChegada }}</small>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card-footer bg-default border-0">
                <div class="d-flex w-100 justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
                    <div class="d-flex justify-content-end" style="align-items: flex-end;">
                        <h4 class="checklist-title mb-0" style="color: #ccc;">Total Venda: R$ </h4>
                        <input name="totalVenda" type="hidden" value="0" id="totalVenda">
                        <h2 class="checklist-title mb-0 ml-1 text-white" id="totalVenda">0</h2>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-end">
                    <button type="submit" id="confirmarVenda" class="btn btn-success" disabled>Confirmar seleção de poltronas</button>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="bg-default card-header border-0">
                <div class="row align-cidades-center">
                    <div class="col-8">
                        <h3 class="mb-0 text-white">{{ __('Selecione a(s) poltrona(s)') }}</h3>
                    </div>
                </div>
            </div>

            <div class="card-body bg-white" style="padding-top: 0px;!important">
                <div class="row clearfix justify-content-center">
                    <div class="plane col-8">
                        <div class="cockpit">
                            <h1>Selecione</h1>
                            <div class="exit exit--front fuselage"></div>
                        </div>
                        <div class="exit exit--front fuselage">

                        </div>

                        <ol class="cabin fuselage mb-5">
                            @for ($i = 1; $i <= count($assentos); $i)
                            <li class="row" style="margin: 0%;!important">
                                <ol class="seats" type="A">
                                    @for ($j = 0; $j < 4; $j++)
                                    <li class="seat">
                                        <input type="checkbox" name="poltronas[]" seat value="{{ $i }}" id="P{{ $i }}"  @if ($i > count($assentos) || $assentos[$i] !== null) disabled @endif />
                                        <label for="P{{ $i }}">{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}</label>
                                    </li>

                                    <?php $i++ ?>
                                    @endfor
                                </ol>
                            </li>
                            @endfor
                        </ol>

                    </div>
                </div>
            </div>

            <div class="card-footer bg-default border-0"></div>
        </div>
    </div>
    </form>
@endsection

@push('js')
<script>
    $('[seat]').on('click', function() {
        let valor = {{ $valor }};
        let lugaresSelecionados = $('[seat]').filter(":checked");
        $('h2#totalVenda').html(valor*lugaresSelecionados.length)
        $('input#totalVenda').val(valor*lugaresSelecionados.length)
        $('#confirmarVenda').attr('disabled', lugaresSelecionados.length == 0)
    })
</script>
@endpush
