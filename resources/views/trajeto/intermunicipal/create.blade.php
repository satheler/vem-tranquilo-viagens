@extends('layouts.app', ['title' => __('Adicionar Trajeto Intermunicipal')])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/lou-multi-select/css/multi-select.min.css" rel="stylesheet">
@endpush

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Trajeto Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('trajeto_intermunicipal.create.prepare') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Trajeto Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('trajeto_intermunicipal.store') }}" autocomplete="off">
                            @csrf

                                <h3 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h3>

                                @for ($i = 0; $i < $lista["qntTrechos"]; $i++)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="trechos[{{ $i }}]">TRECHO</label>
                                        <select bootstrapSelect name="trechos[{{ $i }}]" data-size="4" data-live-search="true" required="required">
                                            <option value="{{ old('trechos[$i]') }}" disabled @if(!$errors->has('trechos['.$i.']')) selected @endif>Selecione o trecho...</option>
                                            @foreach ($lista["trechos"] as $item)
                                                <option @if($errors->has('trechos['.$i.']') && ($errors->first('trechos['.$i.']') == $item->id)) selected @endif value="{{ $item->id }}">{{ $item->origem->nome }} ⇒ {{ $item->destino->nome }} ({{ sprintf('%.2f km', $item->quilometragem) }})</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('trechos['.$i.']'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('trechos['.$i.']') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="horarioSaida[{{ $i }}]">HORÁRIO DE SAÍDA</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioSaida[{{ $i }}]' placeholder="__:__" class="form-control" type="text" value="{{ old('horarioSaida['. $i .']') }}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label" for="horarioChegada[{{ $i }}]">HORÁRIO DE CHEGADA</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioChegada[{{ $i }}]' placeholder="__:__" class="form-control" type="text" value="{{ old('horarioChegada['. $i .']') }}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor

                            {{-- END FORM --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>

    let currentTrechoID = 0;

    $(document).ready(function(){
        $('[time]').mask('00:00');
    })

    $("#addTrecho").on('click', function() {
        let $listTrechos = $('#listTrechos');

        $listTrechos.append('<div class="row"> //conteudo </div>');
        currentTrechoID += 1;
    })
    </script>
@endpush
