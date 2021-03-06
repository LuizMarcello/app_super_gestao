{{-- Um "component" é uma view normal, a diferença é a forma
     que esta view é incluinda dentro de outra view. --}}
{{-- O método "GET" envia as informações pela "url".
                     Para formar a "url", usa-se os campos "names" dos inputs: --}}
{{-- O láravel exige que todos os formulários enviados via
                     verbo http "POST"(rota no web.php), tenham um "token" --}}

{{-- Variável "$slot": Adiciona neste local, neste "componente", os parâmetros
     adicionais que estão entre as tags "@component" da view blade específica. --}}
{{ $slot }}
{{-- Variável "$classe": adiciona no local, neste componente, os parâqmetros
     na "chamada do componente", na view blade especifica. --}}
{{-- Importante: O request usa como chave do input lá no back-end,
     o campo "name" do formulário.Por este campo que os parâmetros são associados. --}}
<form action={{ route('site.contato') }} method="POST">
    @csrf {{-- token --}}
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    {{-- Método "has()": verifica se tem algum êrro na variável "$errors" associado a "nome" --}}
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
        class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>

    {{-- {{ print_r($motivo_contatos) }} --}}

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
        {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- No contexto das views, existe a variável "$errors", que fica dísponível
     de modo automático, para qualquer view. O próprio laravel faz o input
     automático desta variável nas views --}}
{{-- método any(): Somente se houver algum êrro --}}
@if ($errors->any())
    <div style="position: absolute; top:0px; left:0px; width:100%; background:red">

        {{-- método all(): O êrro de cada um dos índices, se houver --}}
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach

    </div>
@endif
