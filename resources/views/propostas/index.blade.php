<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <div class="container">
        <div class="header">
            <h1>Propostas</h1>
            <a href="{{ route('propostas.create') }}" class="btn">Nova Proposta</a>
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
                    <th>Nº Proposta</th>
                    <th>Contrato</th>
                    <th>Corretor</th>
                    <th>Seguradora</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Hectares</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- forelse para propostas --}}
                @forelse ($propostas as $proposta)
                    <tr>
                        <td>{{ $proposta->prp_numero_proposta }}</td>
                        <td>{{ $proposta->prp_numero_contrato }}</td>
                        <td>{{ $corretores->find($proposta->id_cor)?->cor_nome ?? '-' }}</td>
                        <td>{{ $seguradoras->find($proposta->id_seg)?->seg_nome ?? '-' }}</td>
                        <td>{{ $produtos->find($proposta->id_prd)?->prd_nome ?? '-' }}</td>
                        <td>R$ {{ number_format($proposta->prp_valor_proposta, 2, ',', '.') }}</td>
                        <td>{{ $proposta->prp_numero_proposta_hequitar }}</td>
                        <td>
                            <a href="{{ route('propostas.show', $proposta) }}" class="link blue">Ver</a>
                            <a href="{{ route('propostas.edit', $proposta) }}" class="link yellow">Editar</a>
                            <form action="{{ route('propostas.destroy', $proposta) }}" method="POST" class="inline" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link red" onclick="return confirm('Tem certeza que deseja excluir esta proposta?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Nenhuma proposta cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>