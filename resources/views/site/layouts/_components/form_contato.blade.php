{{-- Um "component" é uma view normal, a diferença é a forma
     que esta view é incluinda dentro de outra view. --}}
{{-- O método "GET" envia as informações pela "url".
                     Para formar a "url", usa-se os campos "names" dos inputs: --}}
{{-- O láravel exige que todos os formulários enviados via
                     verbo http "POST"(rota no web.php), tenham um "token" --}}
<form action={{ route('site.contato') }} method="POST">
    @csrf {{-- token --}}
    <input name="nome" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contato" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="borda-preta">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
