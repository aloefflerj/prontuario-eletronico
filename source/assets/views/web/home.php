<?php $v->layout("_theme") ?>
<h1><?= site("name"); ?></h1>

<?php 
    if($pacientes):
        foreach($pacientes as $paciente):          
?>
    <p><strong>Nome</strong> <?= $paciente->nome ?> </p>
    <p><strong>Sobrenome</strong> <?= $paciente->sobrenome ?> </p>
<?php
        endforeach;
    endif;
?>