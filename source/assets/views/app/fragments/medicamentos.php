<div id="response">
<?php 
    if($medicamentos):
        foreach($medicamentos as $medicamento): 
?>
    <ul style="list-style-type: none">
        <li><strong>    <?= $medicamento->nome ?></strong></li>
        <li>Período:    <?= $medicamento->periodo ?></li>
        <li>Horário:    <?= $medicamento->horario ?></li>
        <li>Via:        <?= $medicamento->via ?></li>
    </ul>
<?php   
        endforeach; 
    endif;
?>
</div>