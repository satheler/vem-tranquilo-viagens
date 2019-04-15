@extends('layouts.app', ['title' => $title])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/select.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    @include('layouts.headers.guest')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    @yield('infos')
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.html5.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.flash.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.print.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.select.min.js"></script>
<script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.js"></script>

<script>

let table;
let url = window.location.pathname;

$(document).ready( function () {
    table = $('#datatable-basic').DataTable();
});

$('[data-remove-id]').on('click', async function () {
    let id = $(this).data('remove-id');

    let response = await Swal.fire({
        title: 'Você tem certeza que deseja remover esta categoria de passageiros?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, tenho certeza!',
        cancelButtonText: 'Não, cancelar'
    })

    if(response.value){
        axios.delete(`${url}/${id}`)
        .then(data => {
            table.row(`[data-table-row-id="${id}"]`).remove();
            table.draw();
            Swal.fire('Categoria de passageiros removida com sucesso!', '', 'success')
            console.log(data);
        })
        .catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado...', '', 'error' )
        })
    }
})
</script>
@endpush
