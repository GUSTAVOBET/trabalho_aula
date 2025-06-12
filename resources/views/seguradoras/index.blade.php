<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <div class="container">
        <div class="header">
            <h1>Seguradoras</h1>
            <a href="{{ route('seguradoras.create') }}" class="btn">Nova Seguradora</a>
        </div>

        {{-- session('success') = Verifica se existe uma mensagem de sucesso na sessão, se existir, exibe a mensagem --}}
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- forelse para seguradoras --}}
                @forelse ($seguradoras as $seguradora)
                    <tr>
                        <td>{{ $seguradora->seg_nome }}</td>
                        <td>{{ $seguradora->seg_cnpj }}</td>
                        <td>{{ $seguradora->seg_email }}</td>
                        <td>{{ $seguradora->seg_telefone }}</td>
                        <td>{{ $seguradora->seg_endereco_completo }}</td>
                        <td>
                            <a href="{{ route('seguradoras.show', $seguradora) }}" class="link blue">Ver</a>
                            <a href="{{ route('seguradoras.edit', $seguradora) }}" class="link yellow">Editar</a>
                            <form action="{{ route('seguradoras.destroy', $seguradora) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <a class="link red" onclick="excluirSeguradora('{{ $seguradora->seg_nome }}')">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma seguradora cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>