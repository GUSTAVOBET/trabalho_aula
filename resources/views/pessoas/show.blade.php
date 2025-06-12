<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes da Pessoa</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $pessoa->pes_nome }}</p>
            </div>

            <div class="card-section">
                <h2>E-mail:</h2>
                <p>{{ $pessoa->pes_email }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $pessoa->pes_telefone }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $pessoa->pes_endereco_completo }}</p>
            </div>


            <div class="form-actions">
                <a href="{{ route('pessoas.edit', $pessoa) }}" class="btn yellow">Editar</a>
                <a href="{{ route('pessoas.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>