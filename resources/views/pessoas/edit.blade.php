
<x-layouts.app>
    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Pessoa</h1>

        <form action="{{ route('pessoas.update', $pessoa) }}" method="POST">
            @csrf

            {{-- Método PUT para indicar que estamos atualizando um recurso existente, html nao tem metodo put por padrao, por isso utilizamos no form o POST --}}
            @method('PUT')

            <div class="form-group">
                <label for="pes_nome">Nome</label>
                <input type="text" name="pes_nome" id="pes_nome" value="{{ old('pes_nome', $pessoa->pes_nome) }}" required>
                @error('pes_nome') <span class="error">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="pes_cpf">CPF</label>
                <input type="text" name="pes_cpf" id="pes_cpf" value="{{ old('pes_cpf', $pessoa->pes_cpf) }}" required>
                @error('pes_cpf') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="pes_email">E-mail</label>
                <input type="email" name="pes_email" id="pes_email" value="{{ old('pes_email', $pessoa->pes_email) }}" required>
                @error('pes_email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="pes_telefone">Telefone</label>
                <input type="text" name="pes_telefone" id="pes_telefone" value="{{ old('pes_telefone', $pessoa->pes_telefone) }}" required>
                @error('pes_telefone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="pes_endereco_completo">Endereço Completo</label>
                <textarea name="pes_endereco_completo" id="pes_endereco_completo" rows="3">{{ old('pes_endereco_completo', $pessoa->pes_endereco_completo) }}</textarea>
                @error('pes_endereco_completo') <span class="error">{{ $message }}</span> @enderror
            </div>


            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('pessoas.index') }}" class="btn gray">Voltar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
