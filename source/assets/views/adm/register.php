<?php $v->layout("_bootstrap");?>

<form action="<?= $router->route("auth.register"); ?>" method="post">

<label for="nome">Nome: </label>
<input type="text" name="nome" id="nome">

<label for="cpf">Cpf: </label>
<input type="text" name="cpf" id="cpf">

<label for="telefone">Telefone: </label>
<input type="text" name="telefone" id="telefone">

<label for="endereco">Endereço: </label>
<input type="text" name="endereco" id="endereco">

<label for="anoNasc">Ano de Nascimento: </label>
<input type="text" name="anoNasc" id="anoNasc">

<label for="especializacao">Especialização: </label>
<input type="text" name="especializacao" id="especializacao">

<label for="senha">Senha: </label>
<input type="password" name="senha" id="senha">

<label for="confirmacao">Confirme Sua Senha: </label>
<input type="password" name="confirmacao" id="confirmacao">

<input type="submit" value="Registrar">

</form>