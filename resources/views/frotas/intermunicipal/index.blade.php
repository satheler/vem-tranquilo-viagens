@extends('layouts.app', ['title' => __('Ônibus Intermunicipal')])

@section('content')
    @include('layouts.headers.guest')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ônibus Intermunicipal') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('intermunicipal.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar ônibus"><i class="fas fa-plus"></i></a>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th align="center" scope="col">{{ __('#') }}</th>
                                    <th scope="col">{{ __('Placa') }}</th>
                                    <th scope="col">{{ __('Chassi') }}</th>
                                    <th scope="col">{{ __('Lotação') }}</th>
                                    <th scope="col">{{ __('Ar condicionado') }}</th>
                                    <th scope="col">{{ __('Disponibilidade') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaDeOnibus as $onibus)
                                    <tr>
                                        <td>
                                            <button class="btn btn-icon btn-2 btn-primary" type="button">
                                                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                            </button>
                                        </td>
                                        <td>{{ $onibus->description->placa }}</td>
                                        <td>{{ $onibus->description->chassi }}</td>
                                        <td>{{ $onibus->lotacao }}</td>
                                        <td>{{ $onibus->arCondicionado }}</td>
                                        <td>{{ $onibus->description->disponivel }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">{{ __('Em manutenção') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{-- {{ $users->links() }} --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
