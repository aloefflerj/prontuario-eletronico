
<?php
if($consultas != null):
    foreach($consultas as $consulta):
?>
    <div id="resultado">
        <p>Paciente:        <?= $consulta->idPaciente; ?></p>
        <p>Profissional:    <?= $consulta->idPaciente; ?></p>
        <p>Dia e Hora:      <?= $consulta->dataConsulta; ?></p>
    </div>
<?php
    endforeach;
else:
?>
<div id="resultado">
    <p>Não há registro</p>
</div>
<?php
endif;
?>