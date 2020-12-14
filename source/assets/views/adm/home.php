<?php $v->layout("_bootstrap"); ?>

<?php $v->start("css"); ?>
    <style>
        body{
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
        #corpo {
            margin-top: 5%;
        }
    </style>
<?php $v->end(); ?>

<h2>Perfil Admin: </h2>
<a href="<?= $router->route("adm.user"); ?>">Registro de Usuários do Sistema</a>
<br>
<a href="<?= $router->route("adm.profissional"); ?>">Registro de Profissionais</a>
<br>
<a href="<?= $router->route("adm.paciente"); ?>">Registro de Pacientes</a>

