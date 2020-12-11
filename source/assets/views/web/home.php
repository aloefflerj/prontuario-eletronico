<?php $v->layout("_bootstrap") ?>

<h2>Bem vindo</h2>

<a href="<?= $router->route("web.user") ?>">Login Usuário do Sistema</a>
<br>
<a href="<?= $router->route("web.profissional") ?>">Login Médicos</a>
