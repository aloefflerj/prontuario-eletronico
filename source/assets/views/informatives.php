<?php $v->layout("_theme");?>

<h1>Informativos</h1>

<?php 
    if($informatives):
        foreach($informatives as $informative): 
            if($informative->idInformativo == $id):
?>
                <h1><?= $informative->titulo ?></h1>
                <p><?= $informative->texto ?></p>
<?php
            endif;
        endforeach;
    endif;
?>

<?php
        foreach($informatives as $informative):
            if($id != null):
?>
                <a href="<?=$informative->idInformativo?>"><?= $informative->titulo ?></a><br>
<?php
            else:
?>
                <a href="<?= url("informatives/") . $informative->idInformativo?>"><?= $informative->titulo ?></a><br>
<?php
            endif;
        endforeach;
?>
