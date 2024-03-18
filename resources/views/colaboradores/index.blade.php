<x-layout>
    <x-slot name="title">
        Relatório Colaboradores
    </x-slot>
    <div class="d-flex justify-content-between">
        {{ $colaboradores->links() }}
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="{{ route('colaboradores.create') }}" class="btn btn-primary btn-lg">Criar Colaborador</a>
        </div>
    </div>
    <ul class="list-group my-2">
        @foreach ($colaboradores as $colab)
            <li class="list-group-item">
                <strong>Nome:</strong> {{ $colab['nome'] }} | <strong>CPF:</strong> {{ $colab['cpf'] }}</br>
                <strong>E-mail:</strong> {{ $colab['email'] }} | <strong>Unidade:</strong> {{ $colab['unidade']['razao_social'] }}</br>
                <strong>Cargos:</strong> {{ $colab['cargo'][0]['cargo'] }} | <strong><a href="{{ route('colaboradores.desempenho.edit', ['colaborador_id' => $colab['id']]) }}">Editar Desempenho</a></strong>
            </li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {{ $colaboradores->links() }}
    </div>
</x-layout>