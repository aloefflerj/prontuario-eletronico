<?php $v->layout("_bootstrap"); ?>
<h2>Perfil Admin: </h2>
<a href="<?= $router->route("adm.user"); ?>">Registro de Usuários do Sistema</a>
<br>
<a href="<?= $router->route("adm.profissional"); ?>">Registro de Profissionais</a>
<br>
<a href="<?= $router->route("adm.paciente"); ?>">Registro de Pacientes</a>