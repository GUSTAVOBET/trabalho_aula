<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </head>
    <div class="container">
        <div class="form-container">
            <h1 class="form-section-title">Adicionar Proposta</h1>

            <form action="{{ route('propostas.store') }}" method="POST" id="propostaForm">
                @csrf
                <div class="form-group">
                    <label for="prp_numero_proposta">Número da Proposta</label>
                    <input type="text" name="prp_numero_proposta" id="prp_numero_proposta" value="{{ old('prp_numero_proposta') }}" required>
                    @error('prp_numero_proposta') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="prp_numero_contrato">Número do Contrato</label>
                    <input type="text" name="prp_numero_contrato" id="prp_numero_contrato" value="{{ old('prp_numero_contrato') }}" required>
                    @error('prp_numero_contrato') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="prp_numero_contrato_seguradora">Número do Contrato Seguradora</label>
                    <input type="text" name="prp_numero_contrato_seguradora" id="prp_numero_contrato_seguradora" value="{{ old('prp_numero_contrato_seguradora') }}" required>
                    @error('prp_numero_contrato_seguradora') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="id_cor">Corretor</label>
                    <select name="id_cor" id="id_cor" required>
                        <option value="">Selecione</option>
                        @foreach($corretores as $corretor)
                            <option value="{{ $corretor->id }}">{{ $corretor->nome ?? $corretor->id }}</option>
                        @endforeach
                    </select>
                    @error('id_cor') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="id_seg">Seguradora</label>
                    <select name="id_seg" id="id_seg" required>
                        <option value="">Selecione</option>
                        @foreach($seguradoras as $seguradora)
                            <option value="{{ $seguradora->id }}">{{ $seguradora->seg_nome ?? $seguradora->id }}</option>
                        @endforeach
                    </select>
                    @error('id_seg') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="id_prd">Produto</label>
                    <select name="id_prd" id="id_prd" required>
                        <option value="">Selecione</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}" data-sacas="{{ $produto->prd_sacas_garantia }}" data-valor-saco="{{ $produto->prd_sacas_valor }}">{{ $produto->prd_nome }}</option>
                        @endforeach
                    </select>
                    @error('id_prd') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="prp_numero_proposta_hequitar">Hectares (HA)</label>
                    <input type="number" name="prp_numero_proposta_hequitar" id="prp_numero_proposta_hequitar" value="{{ old('prp_numero_proposta_hequitar') }}" required>
                    @error('prp_numero_proposta_hequitar') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="sacas">Sacas por HA</label>
                    <input type="number" name="sacas" id="sacas" readonly>
                </div>
                <div class="form-group">
                    <label for="valor_saco">Valor do Saco</label>
                    <input type="number" name="valor_saco" id="valor_saco" readonly>
                </div>
                <div class="form-group">
                    <label for="prp_valor_proposta">Valor Segurado</label>
                    <input type="number" name="prp_valor_proposta" id="prp_valor_proposta" readonly required>
                </div>
                <div class="form-group">
                    <label for="premio">Valor Prêmio (5%)</label>
                    <input type="number" name="premio" id="premio" readonly>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ route('propostas.index') }}" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produtoSelect = document.getElementById('id_prd');
            const haInput = document.getElementById('prp_numero_proposta_hequitar');
            const sacasInput = document.getElementById('sacas');
            const valorSacoInput = document.getElementById('valor_saco');
            const valorSeguradoInput = document.getElementById('prp_valor_proposta');
            const premioInput = document.getElementById('premio');

            function calcular() {
                const ha = parseFloat(haInput.value) || 0;
                const sacas = parseFloat(sacasInput.value) || 0;
                const valorSaco = parseFloat(valorSacoInput.value) || 0;
                const valorSegurado = ha * sacas * valorSaco;
                valorSeguradoInput.value = valorSegurado.toFixed(2);
                premioInput.value = (valorSegurado * 0.05).toFixed(2);
            }

            produtoSelect.addEventListener('change', function() {
                const selected = produtoSelect.options[produtoSelect.selectedIndex];
                sacasInput.value = selected.getAttribute('data-sacas') || '';
                valorSacoInput.value = selected.getAttribute('data-valor-saco') || '';
                calcular();
            });

            haInput.addEventListener('input', calcular);
        });
    </script>
</x-layouts.app>