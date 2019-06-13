<div class="col-12">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<div class="card-body py-4">
    @empty($trajetos)
        Ônibus não encontrado
    @endempty

    @foreach ($trajetos as $trajeto)
        <div>{{ $trajeto->trechos }}</div>
    @endforeach
</div>
