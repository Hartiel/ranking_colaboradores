<x-layout>
    @push('scripts')
        <script>
            $(document).ready(function(){
                $('#cpf').mask('000.000.000-00');
            });
        </script>
    @endpush
    <x-slot name="title">
        Criar Colaborador
    </x-slot>
    <div class="d-flex justify-content-end">
        <div>
            <a href="{{ route('colaboradores.index') }}" class="btn btn-primary btn-lg">Lista de Colaboradores</a>
        </div>
    </div>
    <form method="post" action="{{ route('colaboradores.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unidade">Unidade</label>
            <select id="unidade" name="unidade" class="form-control" required>
                @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}">{{ $unidade->razao_social }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cargo">Cargo</label>
            <select id="cargo" name="cargo" class="form-control" required>
                @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</x-layout>