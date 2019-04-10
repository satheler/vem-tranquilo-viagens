@extends('frotas.index', ['title' => __('Ônibus Inativos')])

@section('infos')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">{{ __('Ônibus Inativos') }}</h3>
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
<div class="card-body">
    <div class="table-responsive py-4">
        <table id="datatable-basic" class="table align-items-center table-flush dataTable">
            <thead class="thead-light">
                <tr>
                    <th width="5%" scope="col"></th>
                    <th width="15%" scope="col">{{ __('Placa') }}</th>
                    <th width="20%" scope="col">{{ __('Chassi') }}</th>
                    <th width="75%" scope="col">{{ __('Observação') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista as $item)
                    <tr>
                        <td>
                            <button data-show-id={{ $item->id }} class="btn btn-icon btn-sm btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                            </button>
                        </td>
                        <td>{{ $item->placa }}</td>
                        <td>{{ $item->chassi }}</td>
                        <td>{{ $item->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
