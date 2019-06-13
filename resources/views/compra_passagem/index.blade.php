@extends('layouts.appClient', ['title' => $title])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('argon') }}/vendor/datatables/dist/css/select.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
    @include('layouts.headers.guest')

    <div class="container-fluid mt--7">
        @yield('infos')
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
