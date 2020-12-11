<?php $v->layout("_bootstrap") ?>

<h2>Login Usuário</h2>

<form action="<?= $router->route("auth.userLogin"); ?>" method="post">

    <label for="email">Login: </label>
    <input type="text" name="email" id="email">

    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha">

    <input type="submit" value="Login">

</form>