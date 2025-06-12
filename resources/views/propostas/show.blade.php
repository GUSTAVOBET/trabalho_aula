<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes da Proposta</h1>

        <div class="card">
            <div class="card-section">
                <h2>Número da Proposta:</h2>
                <p>{{ $proposta->prp_numero_proposta }}</p>
            </div>

            <div class="card-section">
                <h2>Número do Contrato:</h2>
                <p>{{ $proposta->prp_numero_contrato }}</p>
            </div>

            <div class="card-section">
                <h2>Número do Contrato Seguradora:</h2>
                <p>{{ $proposta->prp_numero_contrato_seguradora }}</p>
            </div>

            <div class="card-section">
                <h2>Corretor:</h2>
                <p>{{ $corretores->find($proposta->id_cor)?->cor_nome ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Seguradora:</h2>
                <p>{{ $seguradoras->find($proposta->id_seg)?->seg_nome ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Produto:</h2>
                <p>{{ $produtos->find($proposta->id_prd)?->prd_nome ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Valor da Proposta:</h2>
                <p>R$ {{ number_format($proposta->prp_valor_proposta, 2, ',', '.') }}</p>
            </div>

            <div class="card-section">
                <h2>Hectares:</h2>
                <p>{{ $proposta->prp_numero_proposta_hequitar }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('propostas.edit', $proposta) }}" class="btn yellow">Editar</a>
                <a href="{{ route('propostas.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>