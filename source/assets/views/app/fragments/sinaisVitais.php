<div id="response">
<?php 
    if($sinaisVitais):
        foreach($sinaisVitais as $sinalVital): 
?>
    <ul style="list-style-type: none">
        <li><strong>Sinais Vitais: <?= $sinalVital->created_at ?></strong></li>
        <li>Pressão:               <?= $sinalVital->pressao ?></li>
        <li>Batimentos:            <?= $sinalVital->batimentos ?></li>
        <li>Saturação Oxigênio:    <?= $sinalVital->saturacaoOxigenio ?></li>
        <li>Nível de Dióxido de Carbono: <?= $sinalVital->nivelDioxidoCarbono ?></li>
        <li>Temperatura (ºC):      <?= $sinalVital->batimentos ?></li>
    </ul>
<?php   
        endforeach; 
    endif;
?>
</div>