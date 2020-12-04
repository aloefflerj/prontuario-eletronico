<?php $v->layout("_theme") ?>
<?php 
    if($produtos):
        foreach($produtos as $produto):
            if($produto->categoria == $category):
?>

    <a href="<?= $produto->categoria . "/" . $produto->tipo . "/" . $produto->idProduto?>"> <?=$produto->nomeProduto?> </a>
    <br>

<?php 
            endif;
        endforeach; 
    endif;
?>