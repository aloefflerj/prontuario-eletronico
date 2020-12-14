<?php $v->layout("_bootstrap"); ?>
<style>
    h4{
        margin-top: 2%;
    }
    .corpo{
        margin-top: 2%;
    }
</style>

<h4>Bem vindo, <?= $user->email ?> </h4>

<div class="corpo">
    <div class="">
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Pesquisar Consulta</h6>
                    <small class="text-muted">Clique no Botão para Pesquisar Consulta</small>
                </div>
                <a href="<?= $router->route("user.consultas"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-primary">Registro</button>
                    </span>
                </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Marcar Consulta</h6>
                    <small class="text-muted">Clique no Botão para Marcar Consulta</small>
                </div>
                <a href="<?= $router->route("user.novaConsulta"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-warning">Registro</button>
                    </span>
                </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Pesquisar Paciente</h6>
                    <small class="text-muted">Clique no Botão para Pesquisar Paciente</small>
                </div>
                <a href="<?= $router->route("user.pacientes"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-danger">Registro</button>
                    </span>
                </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Cadastrar paciente</h6>
                    <small class="text-muted">Clique no Botão para Cadastrar Paciente</small>
                </div>
                <!-- user.cadastro -->
                <a href="<?= $router->route("user.cadastro"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-danger">Registro</button>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>

<h4>Consultas para Hoje: </h4>

<?php
if ($consultas) :
    foreach ($consultas as $consulta) :
        $diaDaConsulta = dataFormat($consulta->dataConsulta);
        if ($diaDaConsulta == dataHoje() && $consulta->finalizada == "n") :
?>
            <h4><?= $consulta->id; ?> </h4>
            <p>Consulta de:
                <?php
                foreach ($pacientes as $paciente) :
                    if ($paciente->id == $consulta->idPaciente) :
                        echo $paciente->nome;
                    endif;
                endforeach;
                ?>
            </p>
            <p>Com o Dr.
                <?php
                foreach ($profissionais as $profissional) :
                    if ($profissional->id == $consulta->idProfissional) :
                        echo $profissional->nome;
                    endif;
                endforeach;
                ?>
            </p>
            <p>Hora:
                <?php
                echo horaFormat($consulta->dataConsulta);
                ?>
            </p>
<?php
        endif;
    endforeach;
endif;
?>