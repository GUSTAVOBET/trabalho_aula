<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes da Seguradora</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $seguradora->seg_nome }}</p>
            </div>

            <div class="card-section">
                <h2>CNPJ:</h2>
                <p>{{ $seguradora->seg_cnpj }}</p>
            </div>

            <div class="card-section">
                <h2>E-mail:</h2>
                <p>{{ $seguradora->seg_email }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $seguradora->seg_telefone }}</p>
            </div>

            <div class="card-section">
                <h2>Endereço Completo:</h2>
                <p>{{ $seguradora->seg_endereco_completo }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('seguradoras.edit', $seguradora) }}" class="btn yellow">Editar</a>
                <a href="{{ route('seguradoras.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>