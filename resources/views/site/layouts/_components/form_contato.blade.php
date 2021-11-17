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
<form action={{ route('site.contato') }} method="POST">
    @csrf {{-- token --}}
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>