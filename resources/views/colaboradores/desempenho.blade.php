<x-layout>
    <x-slot name="title">
        Editar Desempenho
    </x-slot>
    <div class="d-flex justify-content-end">
        <div>
            <a href="{{ route('colaboradores.index') }}" class="btn btn-primary btn-lg">Lista de Colaboradores</a>
        </div>
    </div>
    <form method="post" action="{{ route('colaboradores.desempenho.store', ['id' => $desempenho->id]) }}">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ $nome }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="nota_desempenho">Desempenho</label>
            <input type="number" id="nota_desempenho" name="nota_desempenho" max="10" min="0" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>