@extends('layouts.appClient', ['title' => $title])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/select.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    @include('layouts.headers.guest')

    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow" style="background-color: transparent">
                    @yield('infos')
                </div>
            </div>
        </div>

        @includeWhen(isset($trajetos), 'vendaPassagem.main.list')

        @include('layouts.footers.auth')
    </div>

    <div class="modal fade" id="modal-infos" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title-default">Informações detalhadas</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>
<script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.js"></script>

<script>

const url = window.location.pathname;
$(document).ready(function(){
    $('[time]').mask('00:00');
})

$('[data-show-id]').on('click', function() {
    const id = $(this).data('show-id');

    axios.get(`${url}/${id}`)
    .then(response => {
        $(".modal-body").html(response.data)
        $("#modal-infos").modal('show');
    })
})
</script>
@endpush
