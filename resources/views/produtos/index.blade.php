<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Produtos</h1>
            <a href="{{ route('produtos.create') }}" class="btn">Novo Produto</a>
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
                    <th>Tipos Cobertos</th>
                    <th>ID Seguradora</th>
                    <th>Sacas Garantia</th>
                    <th>Valor Segurado por Hectare</th>
                    <th>Sacas Valor</th>
                    <th>Risco Nomeado Geada</th>
                    <th>Risco Nomeado Granizo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- forelse = Ele também é usado para percorrer, muito parecido com o foreach ele apenas simplifica o uso do if e else juntos, ja tratando com o empty caso não encontre nenhuma informação  --}}
                @forelse ($produtos as $produto) 
                    <tr>
                        <td>{{ $produto->prd_nome }}</td>
                        <td>{{ $produto->prd_tipos_cobertos }}</td>
                        <td>{{ $produto->id_seg }}</td>
                        <td>{{ $produto->prd_sacas_garantia }}</td>
                        <td>{{ $produto->prd_valor_segurado_por_ha }}</td>
                        <td>{{ $produto->prd_sacas_valor }}</td>
                        <td>{{ $produto->prd_risco_nomeado_geada }}</td>
                        <td>{{ $produto->prd_risco_nomeado_granizo }}</td>
                        <td>{{ $produto->prd_descricao }}</td>
                        <td>
                            <a href="{{ route('produtos.show', $produto) }}" class="link blue">Ver</a> {{-- Para acessar a rota Show, é necessario passar o ID da avaliação --}}
                            <a href="{{ route('produtos.edit', $produto) }}" class="link yellow">Editar</a> {{-- Para acessar a rota Edit, é necessario passar o ID da avaliação --}}
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline"> {{-- Para acessar a rota destroy, é necessario passar o ID da avaliação --}}
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-excluir btn-red" data-nome="{{ $produto->prd_nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>