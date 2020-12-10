<?php $v->layout("_bootstrap") ?>

<h2>Login Usuário</h2>

<form action="<?= $router->route("auth.login"); ?>" method="post">

    <label for="cpf">Login: </label>
    <input type="text" name="cpf" id="cpf">

    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha">

    <input type="submit" value="Login">

</form>