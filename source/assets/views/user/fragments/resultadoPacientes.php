<?php if(!empty($paciente->id)): ?>
    <div id="resultado" style="border: 1px solid #555;">
        <h2>Resultado pesquisa</h2>
        <p>Paciente:    <?= $paciente->nome ?></p>
        <p>Id:          <?= $paciente->id ?></p>
    </div>
<?php else: ?> 
    <div id="resultado">
        <h2>Resultado pesquisa</h2>
        <p>Paciente não encontrado</p>
    </div>
<?php endif; ?>
