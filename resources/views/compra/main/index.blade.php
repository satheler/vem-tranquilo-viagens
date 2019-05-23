@extends('compra.index', ['title' => __('Compra da Passagens')])

@section('infos')

    <div class="card-header border-0" style="padding: 0.25rem 0.5rem;">
        <div class="row align-cidades-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Quer passagem pra outro lugar?') }}</h3>
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

    <div class="card-body py-4" style="padding-bottom: 0.3rem!important; padding-top: 0.3rem!important;">
        <form action="{{ route('venda_intermunicipal.search') }}" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-3 form-group{{ $errors->has('origem') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('origem') ? ' text-warning' : '' }} text-lighter" for="form-control-label"> {{__('ORIGEM')}}</label>
                    <select bootstrapSelect name="origem"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a origem...</option>
                        @foreach ($cidades as $cidade)
                            <option @if($errors->has('origem') && ($errors->first('origem') == $cidade->id) || old('origem', $origem ?? Auth::user()->rodoviaria->cidade_id) == $cidade->id) selected @endif value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('origem'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('origem') }} </label>
                    @endif

                </div>
                <div class="col-lg-3 form-group{{ $errors->has('destino') ? ' has-danger' : '' }}">
                    <label class="form-control-label{{ $errors->has('destino') ? ' text-warning' : '' }} text-lighter" for="form-control-label"> {{__('DESTINO')}}</label>
                    <select bootstrapSelect name="destino"  data-size="4" data-live-search="true" required>
                        <option value="" disabled selected>Selecione a destino...</option>
                        @foreach ($cidades as $cidade)
                            <option @if($errors->has('destino') && ($errors->first('destino') == $cidade->id) || old('destino', $destino ?? null) == $cidade->id) selected @endif value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('destino'))
                        <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('destino') }} </label>
                    @endif
                </div>
                <div class="col-md-2">
                    <label class="form-control-label text-lighter" for="input-data">{{ __('DATA IDA') }}</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data', $data ?? null) }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-control-label text-lighter" for="input-data">{{ __('DATA VOLTA') }}</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input data name='data' class="form-control datepicker" placeholder="__/__/____" type="text" value="{{ old('data', $data ?? null) }}" >
                        </div>
                    </div>
                </div>
                <div class="text-center justify-content-center">
                    <div>
                        <label class="form-control-label">&nbsp;</label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 2px"><i class="fas fa-search"></i> {{ __('Pesquisar') }}</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0" style="padding: 0.25rem 0.5rem;">
                        <div class="row align-items-center">
                            <!-- <div class="col-8">
                                {{-- <a href="{{ route('onibus_urbano.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a> --}}
                            </div> -->
                            <div class="col-12 text-center">
                                <h3 class="mb-0">{{ __('Origem → Destino') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0.2rem;">
                        <div class="table-responsive py-4">
                            <table id="datatable-manutencao" class="table align-items-center table-flush dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >{{ __('Partida') }}</th>
                                        <th scope="col">{{ __('Chegada') }}</th>
                                        <th scope="col">{{ __('Tipo') }}</th>
                                        <th scope="col">{{ __('Data de Saída') }}</th>
                                        <th scope="col">{{ __('Valor') }}</th>
                                        <th scope="col">{{ __('Quantidade') }}</th>
                                        <th scope="col" style="width: 10%!important;">
                                            <button type="submit" class="btn btn-primary" >{{ __('Selecionar') }}</button>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

