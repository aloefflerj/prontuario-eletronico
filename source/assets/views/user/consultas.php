<?php $v->layout("_bootstrap"); ?>

<h1>Consultas</h1>

<?php
    if($pacientes):
        foreach($pacientes as $paciente):
?>
    <p><?= $paciente->nome ?></p>
<?php
        endforeach;
    endif;
?>