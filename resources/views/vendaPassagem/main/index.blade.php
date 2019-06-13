@extends('vendaPassagem.index', ['title' => __('Venda de Passagens')])

@section('infos')
    <div class="card-body py-2">
        <form action="{{ route('vendapassagem.search') }}" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-3 form-group{{ $errors->has('origem') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('origem') ? ' text-warning' : '' }} text-lighter" for="form-control-label"> {{__('De')}}</label>
                    <select bootstrapSelect name="origem"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a origem...</option>
                        @foreach ($cidades as $cidade)
                            <option @if($errors->has('origem') && ($errors->first('origem') == $cidade->id) || old('origem', $origem->id ?? null) == $cidade->id) selected @endif value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('origem'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('origem') }} </label>
                    @endif

                </div>
                <div class="col-lg-3 form-group{{ $errors->has('destino') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('destino') ? ' text-warning' : '' }} text-lighter" for="form-control-label"> {{__('Para')}}</label>
                    <select bootstrapSelect name="destino"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a destino...</option>
                        @foreach ($cidades as $cidade)
                            <option @if($errors->has('destino') && ($errors->first('destino') == $cidade->id) || old('destino', $destino->id ?? null) == $cidade->id) selected @endif value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('destino'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('destino') }} </label>
                    @endif
                </div>
                <div class="col-md-2">
                    <label class="form-control-label text-lighter" for="input-data">{{ __('Data da Ida') }}</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input data name='data_ida' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data_ida', $data_ida ?? '') }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-control-label text-lighter" for="input-data">{{ __('Data da Volta (Opcional)') }}</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input data name='data_volta' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data_volta', $data_volta ?? '') }}" >
                        </div>
                    </div>
                </div>
                <div class="text-center justify-content-center">
                    <div>
                        <label class="form-control-label">&nbsp;</label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 2px"><i class="fas fa-search"></i> {{ __('Pesquisar') }}</button>
                </div>
                
                @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
            </div>
        </form>
    </div>
@endsection


