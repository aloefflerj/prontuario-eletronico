<?php $v->layout("_bootstrap"); ?>

<h1>Bem vindo, <?= $user->email ?> </h1>

<a href="<?= $router->route("user.consultas"); ?>">Pesquisar Consulta</a>
<br>
<a href="<?= $router->route("user.novaConsulta"); ?>">Marcar Consulta</a>
<br>
<a href="<?= $router->route("user.pacientes"); ?>">Pesquisar Paciente</a>
<br>
<a href="<?= $router->route("user.cadastro"); ?>">Cadastrar Paciente</a>

<h1>Consultas para Hoje: </h1>

<?php
    if($consultas):
        foreach($consultas as $consulta):
            $diaDaConsulta = dataFormat($consulta->dataConsulta);
            if($diaDaConsulta == dataHoje() && $consulta->finalizada == "n"):
?>
                <h4><?= $consulta->id; ?> </h4>
                <p>Consulta de: 
                    <?php 
                        foreach($pacientes as $paciente):
                            if($paciente->id == $consulta->idPaciente):
                                echo $paciente->nome;
                            endif;
                        endforeach;
                    ?>
                </p>
                <p>Com o Dr.    
                    <?php 
                        foreach($profissionais as $profissional):
                            if($profissional->id == $consulta->idProfissional):
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




