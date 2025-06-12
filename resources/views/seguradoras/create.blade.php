<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </head>
    <div class="container">
        <div class="form-container">
            <h1 class="form-section-title">Adicionar Seguradora</h1>

            <form action="{{ route('seguradoras.store') }}" method="POST">
                @csrf
                {{-- Token CSRF para segurança, é necessário para evitar ataques de falsificação de requisição entre sites --}}

                <div class="form-group">
                    <label for="seg_nome">Nome</label>
                    <input type="text" name="seg_nome" id="seg_nome" value="{{ old('seg_nome') }}" required>
                    @error('seg_nome') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="seg_cnpj">CNPJ</label>
                    <input type="text" name="seg_cnpj" id="seg_cnpj" value="{{ old('seg_cnpj') }}" maxlength="18" required>
                    @error('seg_cnpj') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="seg_telefone">Telefone</label>
                    <input type="tel" name="seg_telefone" id="seg_telefone" value="{{ old('seg_telefone') }}" placeholder="Ex: (11) 99999-9999" maxlength="15" required>
                    @error('seg_telefone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="seg_email">E-mail</label>
                    <input type="email" name="seg_email" id="seg_email" value="{{ old('seg_email') }}" placeholder="exemplo@email.com" required>
                    @error('seg_email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="seg_endereco_completo">Endereço Completo</label>
                    <input type="text" name="seg_endereco_completo" id="seg_endereco_completo" value="{{ old('seg_endereco_completo') }}" required>
                    @error('seg_endereco_completo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ route('seguradoras.index') }}" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>