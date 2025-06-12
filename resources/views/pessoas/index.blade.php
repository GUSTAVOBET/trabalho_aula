<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Pessoas</h1>
            <a href="{{ route('pessoas.create') }}" class="btn">Nova Pessoa</a>
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
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- forelse = Ele também é usado para percorrer, muito parecido com o foreach ele apenas simplifica o uso do if e else juntos, ja tratando com o empty caso não encontre nenhuma informação  --}}
                @forelse ($pessoas as $pessoa) 
                    <tr>
                        <td>{{ $pessoa->pes_nome }}</td>
                        <td>{{ $pessoa->pes_email }}</td>
                        <td>{{ $pessoa->pes_telefone }}</td>
                        <td>{{ $pessoa->pes_endereco_completo }}</td>
                        <td>{{ $pessoa->pes_cpf }}</td>
                        <td>
                            <a href="{{ route('pessoas.show', $pessoa) }}" class="link blue">Ver</a> {{-- Para acessar a rota Show, é necessario passar o ID da avaliação --}}
                            <a href="{{ route('pessoas.edit', $pessoa) }}" class="link yellow">Editar</a> {{-- Para acessar a rota Edit, é necessario passar o ID da avaliação --}}
                            <form action="{{ route('pessoas.destroy', $pessoa) }}" method="POST" class="inline"> {{-- Para acessar a rota destroy, é necessario passar o ID da avaliação --}}
                                @csrf
                                @method('DELETE')
                                <!-- <a class="link red" onclick="excluirPessoa('{{ $pessoa->pes_nome }}')">Excluir</a> -->
                                <button type="button" class="btn-excluir btn-red" data-nome="{{ $pessoa->pes_nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma pessoa cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>