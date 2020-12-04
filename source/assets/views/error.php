<?php $v->layout("_theme");?>

<h1><?= flash("error", "Ooops Error {$errcode}"); ?></h1>

<?php $v->start("navbar"); ?>
    <a href="<?= url(); ?>">Voltar</a> 
<?php $v->end();?>