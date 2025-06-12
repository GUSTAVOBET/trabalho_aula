<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </head>
    <div class="container">
        <div class="form-container">
            <h1 class="form-section-title">Adicionar Pessoa</h1>

            <form action="{{ route('pessoas.store') }}" method="POST">
                @csrf
                {{-- Token CSRF para segurança, é necessário para evitar ataques de falsificação de requisição entre sites --}}

                <div class="form-group">
                    <label for="pes_nome">Nome</label>
                    <input type="text" name="pes_nome" id="pes_nome" value="{{ old('pes_nome') }}" required>
                    @error('pes_nome') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="pes_cpf">CPF</label>
                    <input type="text" name="pes_cpf" id="pes_cpf" value="{{ old('pes_cpf') }}" maxlength="14" required>
                    @error('pes_cpf') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="pes_telefone">Telefone</label>
                    <input type="tel" name="pes_telefone" id="pes_telefone" value="{{ old('pes_telefone') }}" placeholder="Ex: (11) 99999-9999" maxlength="15" required>
                    @error('pes_telefone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="pes_email">E-mail</label>
                    <input type="email" name="pes_email" id="pes_email" value="{{ old('pes_email') }}" placeholder="exemplo@email.com" required>
                    @error('pes_email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="pes_endereco_completo">Endereço Completo</label>
                    <input type="text" name="pes_endereco_completo" id="pes_endereco_completo" value="{{ old('pes_endereco_completo') }}" required>
                    @error('pes_endereco_completo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ route('pessoas.index') }}" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>