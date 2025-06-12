<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Corretor</h1>

        <form action="{{ route('corretores.update', $corretor) }}" method="POST">
            @csrf

            {{-- Método PUT para indicar que estamos atualizando um recurso existente, html nao tem metodo put por padrao, por isso utilizamos no form o POST --}}
            @method('PUT')

            <div class="form-group">
                <label for="cor_nome">Nome</label>
                <input type="text" name="cor_nome" id="cor_nome" value="{{ old('cor_nome', $corretor->cor_nome) }}" required>
                @error('cor_nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cor_tipo_pessoa">Tipo Pessoa</label>
                <select name="cor_tipo_pessoa" id="cor_tipo_pessoa" required>
                    <option value="F" {{ old('cor_tipo_pessoa', $corretor->cor_tipo_pessoa) == 'F' ? 'selected' : '' }}>Física</option>
                    <option value="J" {{ old('cor_tipo_pessoa', $corretor->cor_tipo_pessoa) == 'J' ? 'selected' : '' }}>Jurídica</option>
                </select>
                @error('cor_tipo_pessoa') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cor_documento">Documento</label>
                <input type="text" name="cor_documento" id="cor_documento" value="{{ old('cor_documento', $corretor->cor_documento) }}" required>
                @error('cor_documento') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cor_email">E-mail</label>
                <input type="email" name="cor_email" id="cor_email" value="{{ old('cor_email', $corretor->cor_email) }}" required>
                @error('cor_email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cor_telefone">Telefone</label>
                <input type="text" name="cor_telefone" id="cor_telefone" value="{{ old('cor_telefone', $corretor->cor_telefone) }}" required>
                @error('cor_telefone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cor_endereco_completo">Endereço Completo</label>
                <textarea name="cor_endereco_completo" id="cor_endereco_completo" rows="3">{{ old('cor_endereco_completo', $corretor->cor_endereco_completo) }}</textarea>
                @error('cor_endereco_completo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('corretores.index') }}" class="btn gray">Voltar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
