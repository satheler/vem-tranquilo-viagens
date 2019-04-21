@extends('layouts.app', ['title' => __('Adicionar Trecho')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Trecho')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('trajeto_trecho.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Trecho') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('trajeto_trecho.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do trecho') }}</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="origem"> {{__('ORIGEM')}} </label>
                                        <select bootstrapSelect name="origem" data-size="4" data-live-search="true" required>
                                            <option value="{{ old('origem') }}" disabled @if(!$errors->has('origem')) selected @endif>Selecione a origem...</option>
                                            @foreach ($lista as $item)
                                            <option @if($errors->has('origem') && ($errors->first('origem') == $item->id)) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('origem'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('origem') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-control-label" for="destino"> {{__('DESTINO')}} </label>
                                        <select bootstrapSelect name="destino" data-size="4" data-live-search="true" required>
                                            <option value="{{ old('destino') }}" disabled @if(!$errors->has('destino')) selected @endif>Selecione o destino...</option>
                                            @foreach ($lista as $item)
                                            <option @if($errors->has('destino') && ($errors->first('destino') == $item->id)) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('destino'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('destino') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-quilometragem">{{ __('QUILOMETRAGEM') }}</label>
                                        @if ($errors->has('quilometragem'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('quilometragem') }}</strong>
                                                </span>
                                            @endif
                                        <div class="form-group{{ $errors->has('quilometragem') ? ' has-danger' : '' }}">
                                            <input type="text" km name="quilometragem" id="input-quilometragem" class="form-control form-control-alternative{{ $errors->has('quilometragem') ? ' is-invalid' : '' }}" placeholder="{{ __('Insira a quilometragem...') }}" value="{{ old('quilometragem') }}" required>
                                        </div>
                                    </div>

                                </div>

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
    $(document).ready(function(){
        $('[time]').mask('00:00');
        $('[km]').mask('###0.0', {reverse: true});
    })
    </script>
@endpush
