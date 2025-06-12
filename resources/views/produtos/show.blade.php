<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes do Produto</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $produto->prd_nome }}</p>
            </div>
            <div class="card-section">
                <h2>Tipos Cobertos:</h2>
                <p>{{ $produto->prd_tipos_cobertos }}</p>
            </div>
            <div class="card-section">
                <h2>ID Seguradora:</h2>
                <p>{{ $produto->id_seg }}</p>
            </div>
            <div class="card-section">
                <h2>Sacas Garantia:</h2>
                <p>{{ $produto->prd_sacas_garantia }}</p>
            </div>
            <div class="card-section">
                <h2>Sacas Valor Mínimo:</h2>
                <p>{{ $produto->prd_sacas_valor_minimo }}</p>
            </div>
            <div class="card-section">
                <h2>Sacas Valor Máximo:</h2>
                <p>{{ $produto->prd_sacas_valor_maximo }}</p>
            </div>
            <div class="card-section">
                <h2>Descrição:</h2>
                <p>{{ $produto->prd_descricao }}</p>
            </div>
            <div class="form-actions">
                <a href="{{ route('produtos.edit', $produto) }}" class="btn yellow">Editar</a>
                <a href="{{ route('produtos.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>