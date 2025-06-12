<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </head>
    <div class="container">
        <div class="form-container">
            <h1 class="form-section-title">Adicionar Corretores</h1>

            <form action="{{ route('corretores.store') }}" method="POST">
                @csrf
                {{-- Token CSRF para segurança, é necessário para evitar ataques de falsificação de requisição entre sites --}}

                <div class="form-group">
                    <label for="cor_nome">Nome</label>
                    <input type="text" name="cor_nome" id="cor_nome" value="{{ old('cor_nome') }}" required>
                    @error('cor_nome') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="cor_tipo_pessoa">Tipo de Pessoa</label>
                    <select name="cor_tipo_pessoa" id="cor_tipo_pessoa" required>
                        <option value="F" {{ old('cor_tipo_pessoa') == 'F' ? 'selected' : '' }}>Física</option>
                        <option value="J" {{ old('cor_tipo_pessoa') == 'J' ? 'selected' : '' }}>Jurídica</option>
                    </select>
                    @error('cor_tipo_pessoa') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="cor_documento">Documento</label>
                    <input type="text" name="cor_documento" id="cor_documento" value="{{ old('cor_documento') }}" maxlength="18" required>
                    @error('cor_documento') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="cor_telefone">Telefone</label>
                    <input type="tel" name="cor_telefone" id="cor_telefone" value="{{ old('cor_telefone') }}" placeholder="Ex: (11) 99999-9999" maxlength="15" required>
                    @error('cor_telefone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="cor_email">E-mail</label>
                    <input type="email" name="cor_email" id="cor_email" value="{{ old('cor_email') }}" placeholder="exemplo@email.com" required>
                    @error('cor_email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="cor_endereco_completo">Endereço Completo</label>
                    <input type="text" name="cor_endereco_completo" id="cor_endereco_completo" value="{{ old('cor_endereco_completo') }}" required>
                    @error('cor_endereco_completo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ route('corretores.index') }}" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>