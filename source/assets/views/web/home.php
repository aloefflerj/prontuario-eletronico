<?php $v->layout("_theme") ?>
<h1><?= site("name"); ?></h1>

<?php 
    if($users):
        foreach($users as $user):          
?>
    <pre><?= "" ?> </pre>
    <p>Olá, <?= $user->name ?> </p>
<?php
        endforeach;
    endif;
?>