<div id="response">
<?php 
    if($anamnese):
        foreach($anamnese as $anamn): 
?>
    <ul style="list-style-type: none">
        <li><strong>Anamnese:       <?= $anamn->created_at ?></strong></li>
        <li>QP:                     <?= $anamn->qp ?></li>
        <li>HDA:                    <?= $anamn->hda ?></li>
        <li>Antecedentes Pessoais:  <?= $anamn->qp ?></li>
        <li>Antecedentes Familiares: <?= $anamn->hda ?></li>
        <li>Hábitos:                <?= $anamn->qp ?></li>
        <li>Revisão Sistemas:       <?= $anamn->hda ?></li>
    </ul>
<?php   
        endforeach; 
    endif;
?>
</div>