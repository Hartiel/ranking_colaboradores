<x-layout>
    @push('scripts')
        <script>
            $(document).ready(function(){
                $('#cnpj').mask('00.000.000/0000-00');
            });
        </script>
    @endpush
    <x-slot name="title">
        Criar Unidade
    </x-slot>
    <div class="d-flex justify-content-end">
        <div>
            <a href="{{ route('unidades.index') }}" class="btn btn-primary btn-lg">Lista de Unidades</a>
        </div>
    </div>
    <form method="post" action="{{ route('unidades.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="razao_social">Razão Social</label>
            <input type="text" id="razao_social" name="razao_social" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</x-layout>