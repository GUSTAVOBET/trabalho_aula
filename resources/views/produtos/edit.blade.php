<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </head>
    <div class="container">
        <div class="form-container">
            <h1 class="form-section-title">Editar Produto</h1>

            <form action="{{ route('produtos.update', $produto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="prd_nome">Nome</label>
                    <input type="text" name="prd_nome" id="prd_nome" value="{{ old('prd_nome', $produto->prd_nome) }}" required>
                    @error('prd_nome') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="prd_tipos_cobertos">Tipos Cobertos</label>
                    <select name="prd_tipos_cobertos" id="prd_tipos_cobertos" onchange="toggleFields(this.value)" required>
                        <option value="">Selecione um tipo de cobertura</option>
                        <option value="Multirrisco" {{ old('prd_tipos_cobertos', $produto->prd_tipos_cobertos) == 'Multirrisco' ? 'selected' : '' }}>Multirrisco</option>
                        <option value="Risco Nomeado" {{ old('prd_tipos_cobertos', $produto->prd_tipos_cobertos) == 'Risco Nomeado' ? 'selected' : '' }}>Risco Nomeado</option>
                    </select>
                    @error('prd_tipos_cobertos') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="id_seg">Selecione Seguradora</label>
                    <select name="id_seg" id="id_seg" required>
                        <option value="">Selecione uma seguradora</option>
                        @foreach($seguradoras as $seguradora)
                            <option value="{{ $seguradora->id }}" {{ old('id_seg', $produto->id_seg) == $seguradora->id ? 'selected' : '' }}>
                                {{ $seguradora->seg_nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_seg') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group risco-nomeado-fields" style="display: none;">
                    <label for="prd_valor_segurado_por_ha">Valor Segurado por Hectare</label>
                    <div class="input-group">
                        <input type="text" placeholder="R$ 0.00" name="prd_valor_segurado_por_ha" id="prd_valor_segurado_por_ha" value="{{ old('prd_valor_segurado_por_ha', $produto->prd_valor_segurado_por_ha) ? 'R$ '.number_format(old('prd_valor_segurado_por_ha', $produto->prd_valor_segurado_por_ha), 2, ',', '.') : '' }}" required>
                    </div>
                    @error('prd_valor_segurado_por_ha') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group risco-nomeado-fields" style="display: none;">
                    <label for="prd_risco_nomeado_geada">Risco Nomeado Geada</label>
                    <select name="prd_risco_nomeado_geada" id="prd_risco_nomeado_geada" required>
                        <option value="">Selecione uma opção</option>
                        <option value="sim" {{ old('prd_risco_nomeado_geada', $produto->prd_risco_nomeado_geada) == 'sim' ? 'selected' : '' }}>Sim</option>
                        <option value="nao" {{ old('prd_risco_nomeado_geada', $produto->prd_risco_nomeado_geada) == 'nao' ? 'selected' : '' }}>Não</option>
                    </select>
                    @error('prd_risco_nomeado_geada') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group risco-nomeado-fields" style="display: none;">
                    <label for="prd_risco_nomeado_granizo">Risco Nomeado Granizo</label>
                    <select name="prd_risco_nomeado_granizo" id="prd_risco_nomeado_granizo" required>
                        <option value="">Selecione uma opção</option>
                        <option value="sim" {{ old('prd_risco_nomeado_granizo', $produto->prd_risco_nomeado_granizo) == 'sim' ? 'selected' : '' }}>Sim</option>
                        <option value="nao" {{ old('prd_risco_nomeado_granizo', $produto->prd_risco_nomeado_granizo) == 'nao' ? 'selected' : '' }}>Não</option>
                    </select>
                    @error('prd_risco_nomeado_granizo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group multirrisco-fields" style="display: none;">
                    <label for="prd_sacas_garantia">Sacas Garantia</label>
                    <input type="text" name="prd_sacas_garantia" id="prd_sacas_garantia" value="{{ old('prd_sacas_garantia', $produto->prd_sacas_garantia) }}" required>
                    @error('prd_sacas_garantia') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group multirrisco-fields" style="display: none;">
                    <label for="prd_sacas_valor">Sacas Valor</label>
                    <input type="number" name="prd_sacas_valor" id="prd_sacas_valor" value="{{ old('prd_sacas_valor', $produto->prd_sacas_valor) }}" required>
                    @error('prd_sacas_valor') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group descricao-field" style="display: none;">
                    <label for="prd_descricao">Descrição</label>
                    <textarea name="prd_descricao" id="prd_descricao" required>{{ old('prd_descricao', $produto->prd_descricao) }}</textarea>
                    @error('prd_descricao') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Atualizar</button>
                    <a href="{{ route('produtos.index') }}" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
