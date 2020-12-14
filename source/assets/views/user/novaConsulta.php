<?php $v->layout("_bootstrap"); ?>

<h1>Nova consulta</h1>

<form action="<?= $router->route("auth.novaConsulta"); ?>" method="post" id="consulta">
    <?php //SELECIONA PACIENTE ?>
    <label for="idPaciente">Paciente: </label>
    <select name="idPaciente" id="idPaciente" form="consulta">
        <?php
            if($pacientes):
                foreach($pacientes as $paciente):
        ?>
                    <option value="<?= $paciente->id ?>"><?= $paciente->nome ?></option>
        <?php
                endforeach;
            endif;       
        ?>
    </select>
    <?php //SELECIONA PROFISSIONAL ?>
    <label for="idProfissional">Profissional: </label>
    <select name="idProfissional" id="idProfissional" form="consulta">
        <?php
            if($profissionais):
                foreach($profissionais as $profissional):
        ?>
                    <option value="<?= $profissional->id ?>"><?= $profissional->nome ?></option>
        <?php
                endforeach;
            endif;       
        ?>
    </select>
    <label for="queixa">Queixa: </label>
    <input type="text" name="queixa" id="queixa">
    <?php //SELECIONA DATA ?>
    <label for="dataConsulta">Data: </label>
    <input type="datetime-local" name="dataConsulta" id="dataConsulta">

    <input type="submit" value="Marcar Consulta">

</form>