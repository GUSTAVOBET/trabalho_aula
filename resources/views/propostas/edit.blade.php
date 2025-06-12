<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Proposta</h1>

        <form action="{{ route('propostas.update', $proposta) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="prp_numero_proposta">Nº Proposta</label>
                <input type="text" name="prp_numero_proposta" id="prp_numero_proposta" value="{{ old('prp_numero_proposta', $proposta->prp_numero_proposta) }}" required>
                @error('prp_numero_proposta') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="prp_numero_contrato">Nº Contrato</label>
                <input type="text" name="prp_numero_contrato" id="prp_numero_contrato" value="{{ old('prp_numero_contrato', $proposta->prp_numero_contrato) }}" required>
                @error('prp_numero_contrato') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="prp_numero_contrato_seguradora">Nº Contrato Seguradora</label>
                <input type="text" name="prp_numero_contrato_seguradora" id="prp_numero_contrato_seguradora" value="{{ old('prp_numero_contrato_seguradora', $proposta->prp_numero_contrato_seguradora) }}" required>
                @error('prp_numero_contrato_seguradora') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="id_cor">Corretor</label>
                <select name="id_cor" id="id_cor" required>
                    <option value="">Selecione</option>
                    @foreach($corretores as $corretor)
                        <option value="{{ $corretor->id }}" {{ old('id_cor', $proposta->id_cor) == $corretor->id ? 'selected' : '' }}>{{ $corretor->cor_nome }}</option>
                    @endforeach
                </select>
                @error('id_cor') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="id_seg">Seguradora</label>
                <select name="id_seg" id="id_seg" required>
                    <option value="">Selecione</option>
                    @foreach($seguradoras as $seguradora)
                        <option value="{{ $seguradora->id }}" {{ old('id_seg', $proposta->id_seg) == $seguradora->id ? 'selected' : '' }}>{{ $seguradora->seg_nome }}</option>
                    @endforeach
                </select>
                @error('id_seg') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="id_prd">Produto</label>
                <select name="id_prd" id="id_prd" required>
                    <option value="">Selecione</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" {{ old('id_prd', $proposta->id_prd) == $produto->id ? 'selected' : '' }}>{{ $produto->prd_nome }}</option>
                    @endforeach
                </select>
                @error('id_prd') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="prp_numero_proposta_hequitar">Hectares</label>
                <input type="number" name="prp_numero_proposta_hequitar" id="prp_numero_proposta_hequitar" value="{{ old('prp_numero_proposta_hequitar', $proposta->prp_numero_proposta_hequitar) }}" required>
                @error('prp_numero_proposta_hequitar') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Valor da Proposta</label>
                <input type="text" value="R$ {{ number_format($proposta->prp_valor_proposta, 2, ',', '.') }}" disabled>
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('propostas.index') }}" class="btn gray">Voltar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
