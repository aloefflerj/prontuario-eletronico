<?php $v->layout("_bootstrap"); ?>
<h2>ADM LOGIN</h2>


<form action="<?= $router->route("auth.admLogin"); ?>" method="post">

    <label for="email">E-mail: </label>
    <input type="text" name="email" id="email">

    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha">

    <input type="submit" value="Login">

</form>