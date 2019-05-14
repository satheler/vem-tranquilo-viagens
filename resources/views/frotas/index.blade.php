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

    <div class="modal fade" id="modal-infos" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title-default">Informações detalhadas do ônibus</h3>
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
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.html5.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.flash.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/buttons.print.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables/dist/js/dataTables.select.min.js"></script>
<script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>

let table;
let url = window.location.pathname;

$(document).ready( function () {
    table = $('#datatable-basic').DataTable();
});

$('[data-remove-id]').on('click', async function () {
    let id = $(this).data('remove-id');

    let { value } = await Swal.fire({
        title: 'Você tem certeza que deseja inativar esse ônibus?',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        inputPlaceholder: 'Informe o ocorrido...',
        inputValidator: (value) => {
            if (!value) {
            return 'Este campo não pode ser vazio!'
            }
        },
        text: "Atenção: Esta ação não poderá ser desfeita!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, tenho certeza!',
        cancelButtonText: 'Cancelar'
    })

    if(value){
        axios.delete(`${url}/${id}`, { data: { observacao: value } })
        .then(data => {
            table.row(`[data-table-row-id="${id}"]`).remove();
            table.draw();
            Swal.fire('Ônibus inativado com sucesso!','','success')
            console.log(data);
        })
        .catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado...','','error')
        })
    }
})


$('[data-available-id][data-manutencao=true]').on('click', vaiParaManutencao)

async function vaiParaManutencao() {
    let id = $(this).data('available-id');
    const t = {}

const {value: formValues} = await Swal.fire({
    onOpen: () => {
         $('[money]').mask('###0.00', { reverse: true });
     },
     title: 'Valor',
     text: 'Insira o valor total da  manutenção?',
     input: 'text',
    inputAttributes: {
        autocapitalize: 'off',
        money: ''
    },
    inputPlaceholder: '0,00',
    inputValidator: (value) => {
        t.motivo = document.getElementById('swal-input1').value;
        t.oficina = document.getElementById('swal-input2').value;
        t.data = document.getElementById('swal-input3').value;

        const now = new Date();
        const then = new Date(t.data);
        if (now < then) {
            return 'Data inválida!'
        }

        const {motivo, oficina, data} = t

        if (!value || motivo === "" || oficina === "" || data === "") {
            return 'Todos os campos devem ser preenchidos!'
        }
    },
    html:
        '<div class="text-left">' +
        '<label><b>Motivo:</b></label>' +
        '</div>' +
        '<input id="swal-input1" class="swal2-input" placeholder="O que aconteceu?">' +
        '<div class="text-left">' +
        '<label><b>Oficina:</b></label>' +
        '</div>' +
        '<input id="swal-input2" class="swal2-input" placeholder="Nome da oficina">' +
        '<div class="text-left">' +
        '<label><b>Data de entrada:</b></label>' +
        '</div>' +
        '<input type="date" id="swal-input3" class="swal2-input" max="2019-12-31" min="2010-01-01">' +
        '<div class="text-left">' +
        '<label><b>Valor do Orçamento:</b></label>' +
        '</div>',
    focusConfirm: false,
}).then(data => {

    if(data.dismiss) {
        return
    }
    axios.put(`${url}/${id}`,  {
        goManutencao: true,
        valorOrcamento: data.value,
        motivo: t.motivo,
        oficina: t.oficina,
        data: t.data

    })
        .then(data => {
            Swal.fire('Estado do Ônibus alterado com sucesso!', '', 'success')
            $(this).attr("data-manutencao", false)
            $(this).attr("onclick", "sairDaManutencao()")

            $(`[data-badge-available-id="${id}"]`).attr('class').includes('badge-warning') ?
            $(`[data-badge-available-id="${id}"]`).removeClass('badge-warning').addClass('badge-success').text('Disponivel') :
            $(`[data-badge-available-id="${id}"]`).removeClass('badge-success').addClass('badge-warning').text('Em manutenção')
        })
        .then(data => {
            setTimeout(() => {
                location.reload();
            }, 1000);
        })
        .catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado....', '', 'error' )
        })

  }).catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado...', '', 'error' )
        })
}

$('[data-available-id][data-manutencao=false]').on('click', sairDaManutencao)

async function sairDaManutencao() {

    let id = $(this).attr('data-available-id');
    const t = {}

    const {value: formValues} = await Swal.fire({
    onOpen: () => {
         $('[money]').mask('###0.00', { reverse: true });
     },
     title: 'Valor',
     text: 'Insira o valor total da  manutenção?',
     input: 'text',
     showCancelButton: true,
     confirmButtonColor: '#28a745',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Ok',
     cancelButtonText: 'Cancelar',
    inputAttributes: {
        autocapitalize: 'off',
        money: ''
    },
    inputPlaceholder: '0,00',
    inputValidator: (value) => {
        t.obs = document.getElementById('swal-input1').value;
        t.data = document.getElementById('swal-input2').value;

        const now = new Date();
        const then = new Date(t.data);
        if (now < then) {
            return 'Data inválida!'
        }
        const {obs, data} = t

        if (!value || data === "") {
            return 'Valor e data são campos obrigatórios!'
        }
    },
    html:
        '<div class="text-left">' +
        '<label><b>Observação:</b></label>' +
        '</div>' +
        '<input id="swal-input1" class="swal2-input" placeholder="Alguma observação?">' +
        '<div class="text-left">' +
        '<label><b>Data de Saída:</b></label>' +
        '</div>' +
        '<input type="date" id="swal-input2" class="swal2-input" max="2019-12-31" min="2010-01-01">' +
        '<div class="text-left">' +
        '<label><b>Valor Total da Manutenção:</b></label>' +
        '</div>',
    focusConfirm: false,
    width: '800px'
}).then(data => {

    if(data.dismiss) {
        return
    }
        axios.put(`${url}/${id}`, {
            valorTotal: data.value,
            observacao: t.obs,
            data: t.data
        })
        .then(data => {

            Swal.fire('Estado do Ônibus alterado com sucesso!', '', 'success')
            $(this).attr("data-manutencao", true)
            $(this).attr("data-available-id", id)
            $(this).attr("onclick", "vaiParaManutencao()")

            $(`[data-badge-available-id="${id}"]`).attr('class').includes('badge-warning') ?
            $(`[data-badge-available-id="${id}"]`).removeClass('badge-warning').addClass('badge-success').text('Disponivel') :
            $(`[data-badge-available-id="${id}"]`).removeClass('badge-success').addClass('badge-warning').text('Em manutenção')
        })
        .then(data => {
            setTimeout(() => {
                location.reload();
            }, 1000);
        })
        .catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado...', '', 'error' )
        })
    }).catch((error) => {
            console.error(error);
            Swal.fire('Aconteceu um erro inesperado...', '', 'error' )
        })
}

$('[data-show-id]').on('click', function() {
    let id = $(this).data('show-id');

    axios.get(`${url}/${id}`)
    .then(data => {
        $(".modal-body").html(data.data)
        $("#modal-infos").modal('show');
    })
})

$('[data-register-id]').on('click', function(){

    let id = $(this).data('register-id');
    console.log(id);

    axios.get(`${url}/${id}`)
})

</script>
@endpush


