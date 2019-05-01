@extends('layouts.app', ['title' => __('Alocar funcionários em trajetos urbanos')])

@section('content')
    @include('users.partials.header', ['title' => __('Alocar funcionários em trajetos urbanos')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('funcionario.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Alocar funcionários em trajetos urbanos') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('funcionario.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações da alocação') }}</h6>
                            <div class="pl-lg-12">
                                <div class="row clearfix justify-content-center">
                                    <div class="col-md-2">
                                        <label class="form-control-label" for="horarioInicio">INICIO DO EXPEDIENTE</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioInicio' placeholder="__:__" class="form-control" type="text" value="{{ old('horarioInicio') }}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-control-label" for="horarioFim">FIM DO EXPEDIENTE</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input time name='horarioFim' placeholder="__:__" class="form-control" type="text" value="{{ old('horarioFim') }}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="form-control-label"> {{__('TRAJETOS')}} </label>
                                        <select bootstrapSelect name="tipo"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o trajeto...</option>
                                            @foreach ($lista["trajetos"] as $item) --}}
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-control-label" for="form-control-label"> {{__('MOTORISTA')}} </label>
                                        <select bootstrapSelect name="motorista"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o motorista...</option>
                                            @foreach ($lista["trajetos"] as $item) --}}
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-control-label" for="form-control-label"> {{__('COBRADOR')}} </label>
                                        <select bootstrapSelect name="cobrador"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o cobrador...</option>
                                            @foreach ($lista["trajetos"] as $item) --}}
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- END FORM --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
    $('[time]').mask('00:00');
})
</script>
