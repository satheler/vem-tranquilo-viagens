@extends('venda_passagens_intermunicipal.index', ['title' => __('Venda de Passagens')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Venda de Passagens') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="card-body py-4">
        <form action="{{ route('venda_intermunicipal.create') }}" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-3 form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('cidade') ? ' text-warning' : '' }}" for="form-control-label"> {{__('ORIGEM')}}</label>
                    <select bootstrapSelect name="cidade"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a cidade...</option>
                        @foreach ($lista["cidade"] as $item)
                            <option @if($errors->has('cidade') && ($errors->first('cidade') == $item->id) || old('cidade') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('cidade'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('cidade') }} </label>
                    @endif

                </div>
                <div class="col-lg-3 form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('cidade') ? ' text-warning' : '' }}" for="form-control-label"> {{__('DESTINO')}}</label>
                    <select bootstrapSelect name="cidade"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a cidade...</option>
                        @foreach ($lista["cidade"] as $item)
                            <option @if($errors->has('cidade') && ($errors->first('cidade') == $item->id) || old('cidade') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('cidade'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('cidade') }} </label>
                    @endif
                </div>
                <div class="col-md-2">
                    <label class="form-control-label" for="input-data">{{ __('DATA') }}</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data') }}" required>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Pesquisar') }}</button>
                </div>
            </div>
        <form>
    </div>
@endsection
