<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <div class="container">
        <div class="header">
            <h1>Corretores</h1>
            <a href="{{ route('corretores.create') }}" class="btn">Novo Corretor</a>
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
                    <th>Tipo Pessoa</th>
                    <th>Documento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- forelse = Ele também é usado para percorrer, muito parecido com o foreach ele apenas simplifica o uso do if e else juntos, ja tratando com o empty caso não encontre nenhuma informação  --}}
                @forelse ($corretores as $corretor) 
                    <tr>
                        <td>{{ $corretor->cor_nome }}</td>
                        <td>{{ $corretor->cor_tipo_pessoa == 'F' ? 'Física' : 'Jurídica' }}</td>
                        <td>{{ $corretor->cor_documento }}</td>
                        <td>{{ $corretor->cor_email }}</td>
                        <td>{{ $corretor->cor_telefone }}</td>
                        <td>{{ $corretor->cor_endereco_completo }}</td>
                        <td>
                            <a href="{{ route('corretores.show', $corretor) }}" class="link blue">Ver</a> {{-- Para acessar a rota Show, é necessario passar o ID da avaliação --}}
                            <a href="{{ route('corretores.edit', $corretor) }}" class="link yellow">Editar</a> {{-- Para acessar a rota Edit, é necessario passar o ID da avaliação --}}
                            <form action="{{ route('corretores.destroy', $corretor) }}" method="POST" class="inline"> {{-- Para acessar a rota destroy, é necessario passar o ID da avaliação --}}
                                @csrf
                                @method('DELETE')
                                <a class="link red" onclick="excluirCorretor('{{ $corretor->cor_nome }}')">Excluir</a>
                                <!-- <button type="button" class="btn-excluir" data-nome="{{ $corretor->cor_nome }}">Excluir</button> -->
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum corretor cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>