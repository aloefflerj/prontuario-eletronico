<?php $v->layout("_bootstrap"); ?>

<h1>Consultas</h1>

<?php
    if($consultas):
        foreach($consultas as $consulta):
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
    <p>Às           <?= $consulta->dataConsulta ?></p>
<?php
        endforeach;
    endif;
?>