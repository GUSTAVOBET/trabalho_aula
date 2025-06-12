<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes do Corretor</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $corretor->cor_nome }}</p>
            </div>

            <div class="card-section">
                <h2>Tipo Pessoa:</h2>
                <p>{{ $corretor->cor_tipo_pessoa == 'F' ? 'Física' : 'Jurídica' }}</p>
            </div>

            <div class="card-section">
                <h2>Documento:</h2>
                <p>{{ $corretor->cor_documento }}</p>
            </div>

            <div class="card-section">
                <h2>E-mail:</h2>
                <p>{{ $corretor->cor_email }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $corretor->cor_telefone }}</p>
            </div>

            <div class="card-section">
                <h2>Endereço:</h2>
                <p>{{ $corretor->cor_endereco_completo }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('corretores.edit', $corretor) }}" class="btn yellow">Editar</a>
                <a href="{{ route('corretores.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>