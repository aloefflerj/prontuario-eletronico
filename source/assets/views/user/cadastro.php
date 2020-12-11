<?php $v->layout("_bootstrap"); ?>

<h1>Registro de Paciente</h1>

<form action="<?= $router->route("auth.pacienteRegister"); ?>" method="post">

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

<input type="submit" value="Cadastrar">

</form>