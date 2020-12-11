<div id="response">
<?php 
    if($anamnese):
        foreach($anamnese as $anamn): 
?>
    <ul style="list-style-type: none">
        <li><strong>Anamnese:       <?= $anamn->created_at ?></strong></li>
        <li>QP:                     <?= $anamn->qp ?></li>
        <li>HDA:                    <?= $anamn->hda ?></li>
        <li>Antecedentes Pessoais:  <?= $anamn->antecedentesPessoais ?></li>
        <li>Antecedentes Familiares: <?= $anamn->antecedentesFamiliares ?></li>
        <li>Hábitos:                <?= $anamn->habitos ?></li>
        <li>Revisão Sistemas:       <?= $anamn->revisaoSistemas ?></li>
    </ul>
<?php   
        endforeach; 
    endif;
?>
</div>