<?php $v->layout("_bootstrap"); ?>

<h1>Bem vindo, <?= $user->email ?> </h1>

<a href="<?= $router->route("user.consultas"); ?>">Pesquisar Consulta</a>
<br>
<a href="<?= $router->route("user.novaConsulta"); ?>">Marcar Consulta</a>
<br>
<a href="<?= $router->route("user.pacientes"); ?>">Pesquisar Paciente</a>
<br>
<a href="<?= $router->route("user.cadastro"); ?>">Cadastrar Paciente</a>




