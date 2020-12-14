<div id="resultado">
<h1>Resultado: </h1>

<?php
    if($consultas != null):
        foreach($consultas as $consulta):
?>
    <div class="consultas">
        <h4><?= $consulta->id ?></h4>
        <p>Paciente: 
        <?php foreach($pacientes as $paciente): ?>    
            <?php 
            if ($consulta->idPaciente == $paciente->id): 
                echo $paciente->nome;
            endif;
            ?>
        <?php endforeach; ?>
        </p>
        <p>Profissional:
            <?php foreach($profissionais as $profissional): ?>    
                <?php 
                if ($consulta->idProfissional == $profissional->id): 
                    echo $profissional->nome;
                endif;
                ?>
            <?php endforeach; ?>
        </p>
        <p>Dia e Hora:      <?= (new DateTime($consulta->dataConsulta))->format("d/m/Y h:m"); ?></p>
        <p>Status: <?php if($consulta->finalizada == "n"): echo "Aberta"; else: echo "Fechada"; endif;?></p>
        <form action="<?= $router->route("auth.deletaConsulta"); ?>" method="post">
                <input type="hidden" name="id" id="id" value="<?= $consulta->id; ?>">
                <input type="submit" value="Deletar">
        </form>
    </div>
<?php
        endforeach;
?>

</div>

<?php
    else:
?>
<div id="resultado">
    <p>Não há registro</p>
</div>
<?php
endif;
?>