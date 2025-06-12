<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Seguradora</h1>

        <form action="{{ route('seguradoras.update', $seguradora) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="seg_nome">Nome</label>
                <input type="text" name="seg_nome" id="seg_nome" value="{{ old('seg_nome', $seguradora->seg_nome) }}" required>
                @error('seg_nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="seg_cnpj">CNPJ</label>
                <input type="text" name="seg_cnpj" id="seg_cnpj" value="{{ old('seg_cnpj', $seguradora->seg_cnpj) }}" required>
                @error('seg_cnpj') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="seg_email">E-mail</label>
                <input type="email" name="seg_email" id="seg_email" value="{{ old('seg_email', $seguradora->seg_email) }}" required>
                @error('seg_email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="seg_telefone">Telefone</label>
                <input type="text" name="seg_telefone" id="seg_telefone" value="{{ old('seg_telefone', $seguradora->seg_telefone) }}" required>
                @error('seg_telefone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="seg_endereco_completo">Endereço Completo</label>
                <textarea name="seg_endereco_completo" id="seg_endereco_completo" rows="3">{{ old('seg_endereco_completo', $seguradora->seg_endereco_completo) }}</textarea>
                @error('seg_endereco_completo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('seguradoras.index') }}" class="btn gray">Voltar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
