@extends('layouts.appClientProfile', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 pt-lg-3 pb-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h2>{{ __('Perfil') }}</h2>

                        </div>
                        <div class="col-md-8">
                                <b> Nome: </b> {{$cliente->user->name}}
                            </div>
                            <div class="col-md-8">
                                    <b> Cpf: </b> {{$cliente->cpf}}
                                </div>
                        <div class="col-md-8">
                            <b> Pontos: </b> {{$cliente->pontos}}
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table id="datatable-basic" class="table align-items-center table-flush dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Data') }}</th>
                                        <th scope="col">{{ __('Valor') }}</th>
                                        <th scope="col">{{ __('Trajeto') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{  var_dump($compras) }} --}}
                                    @foreach ($compras as $item)
                                        <tr data-table-row-id={{ $item->id }}>
                                            <td>{{ $item->venda_id }}</td>
                                            @foreach ($item->venda as $m)
                                                <td>R$ {{ $m->pagamento->valor }}</td>
                                                <td>{{ $m->alocacaoIntermunicipal->trajeto->trechos[0]->cidade->nome }} → {{ $m->alocacaoIntermunicipal->trajeto->trechos[count($m->alocacaoIntermunicipal->trajeto->trechos) - 1]->cidade->nome }}</td>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>
$(document).ready(function(){
    $('[cpf]').mask('000.000.000-00', {reverse: true});
})
</script>
@endpush
