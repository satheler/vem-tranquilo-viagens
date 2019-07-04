@extends('layouts.app', ['title' => __('Adicionar Tarifa Intermunicipal')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Tarifa Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('tarifa_intermunicipal.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Tarifa Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tarifa_intermunicipal.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label{{ $errors->has('data') ? ' text-warning' : '' }}" for="input-data">{{ __('DATA INICIAL DE VIGÊNCIA') }}</label>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="data" class="form-control datepicker" placeholder="Clique para selecionar a data" type="text" value="{{ old('data') }}" required>
                                            </div>
                                            @if ($errors->has('data'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('data') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-valor">{{ __('VALOR (km)') }}</label>
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <input type="text" money name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Informe o valor por km rodado...') }}" value="{{ old('valor') }}" required>
                                        </div>
                                        @if ($errors->has('valor'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('valor') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                    <div class="checklist-info">
                                        <div class="row">
                                            <h3 class="checklist-title mt-2 mb-0">TIPO</h3>
                                            <select name="categoria_id[]" bootstrapSelect  data-size="4" data-live-search="true" required>
                                                @foreach ($categoria as $categoria)
                                                    <option for = "option" name="categoria" value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[money]').mask('###0.00', {reverse: true});
        })
    </script>
@endpush
