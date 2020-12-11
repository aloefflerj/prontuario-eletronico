<h1>Registro de Usuário</h1>

<?php $v->layout("_bootstrap");?>

<form action="<?= $router->route("auth.userRegister"); ?>" method="post">

<label for="email">Email: </label>
<input type="text" name="email" id="email">

<label for="senha">Senha: </label>
<input type="password" name="senha" id="senha">

<label for="confirmacao">Confirmação: </label>
<input type="password" name="confirmacao" id="confirmacao">

<input type="submit" value="Registrar">

</form>