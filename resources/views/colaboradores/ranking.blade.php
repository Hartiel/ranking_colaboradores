<x-layout>
    <x-slot name="title">
        Ranking Colaboradores
    </x-slot>
    <div class="d-flex justify-content-center">
        {{ $colaboradores->links() }}
    </div>
    <ul class="list-group my-2">
        @foreach ($colaboradores as $colab)
            <li class="list-group-item">
                <strong>Nome:</strong> {{ $colab->nome }} | <strong>CPF:</strong> {{ $colab->cpf }}</br>
                <strong>E-mail:</strong> {{ $colab->email }} | <strong>Unidade:</strong> {{ $colab->nome_fantasia }}</br>
                <strong>Cargos:</strong> {{ $colab->cargo }} | <strong>Nota Desempenho:</strong> {{ $colab->nota_desempenho }}
            </li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {{ $colaboradores->links() }}
    </div>
</x-layout>