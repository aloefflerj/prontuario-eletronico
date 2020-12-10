<div id="response">
<?php 
    if($evolucao):
        foreach($evolucao as $evo): 
?>
    <ul style="list-style-type: none">
        <li><strong>Evolucao:   <?= $evo->created_at ?></strong></li>
        <li>Situação:           <?= $evo->situacao ?></li>
        <li>Observações:        <?= $evo->observacoes ?></li>
    </ul>
<?php   
        endforeach; 
    endif;
?>
</div>