<div id="resultado">
    
<?php
    if($consultas != null):
        foreach($consultas as $consulta):
?>
    
        <p>Paciente:        <?= $consulta->idPaciente; ?></p>
        <p>Profissional:    <?= $consulta->idPaciente; ?></p>
        <p>Dia e Hora:      <?= $consulta->dataConsulta; ?></p>
    
<?php
        endforeach;
?>

</div>

<?php
    else:
?>
<div id="resultado">
    <p>Não há registro</p>
</div>
<?php
endif;
?>