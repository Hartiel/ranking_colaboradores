<x-layout>
    <x-slot name="title">
        Lista Unidades
    </x-slot>
    <div class="d-flex justify-content-between">
        {{ $unidades->links() }}
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="{{ route('unidades.create') }}" class="btn btn-primary btn-lg">Criar Unidade</a>
        </div>
    </div>
    <ul class="list-group my-2">
        @foreach ($unidades as $uni)
            <li class="list-group-item">
                <strong>Nome Fantasia:</strong> {{ $uni['nome_fantasia'] }} | <strong>CNPJ:</strong> {{ $uni['cnpj'] }} | <strong>Razão Social:</strong> {{ $uni['razao_social'] }} | <strong>Total de Colaboradores:</strong> {{ count($uni['colaboradores']) }}
            </li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {{ $unidades->links() }}
    </div>
</x-layout>