<?php $v->layout("_bootstrap"); //var_dump($_SESSION["teste"]);?>

<h1>Atendimento ao Paciente: <?= $paciente->nome; ?> </h1>

<form action="<?= $router->route("app.concluir"); ?>" method="post">

    <?php /**Paciente */ ?>
    <input type="hidden" name="idPaciente" id="idPaciente" value="<?= $paciente->id; ?>">

    <?php /**Anamnese */ ?>
    <h3>Anamnese: </h3>
    <label for="qp">Queixa Principal (QP): </label>
    <input type="text" name="qp" id="qp">

    <label for="hda">História da Doença Atual (HDA): </label>
    <input type="text" name="hda" id="hda">

    <label for="antecedentesPessoais">Antecedentes Pessoais: </label>
    <input type="text" name="antecedentesPessoais" id="antecedentesPessoais">

    <label for="antecedentesFamiliares">Antecedentes Familiares: </label>
    <input type="text" name="antecedentesFamiliares" id="antecedentesFamiliares">

    <label for="habitos">Hábitos: </label>
    <input type="text" name="habitos" id="habitos">

    <label for="revisaoSistemas">Revisão Sistemas: </label>
    <input type="text" name="revisaoSistemas" id="revisaoSistemas">

    <?php /**Sinais Vitais */ ?>
    <h3>Sinais Vitais: </h3>

    <label for="pressao">Pressão: </label>
    <input type="text" name="pressao" id="pressao">

    <label for="batimentos">Batimentos: </label>
    <input type="text" name="batimentos" id="batimentos">

    <label for="saturacaoOxigenio">Saturação Oxigênio: </label>
    <input type="text" name="saturacaoOxigenio" id="saturacaoOxigenio">

    <label for="nivelDioxidoCarbono">Nível Dióxido de Carbono</label>
    <input type="text" name="nivelDioxidoCarbono" id="nivelDioxidoCarbono">

    <label for="temperatura">Temperatura: </label>
    <input type="text" name="temperatura" id="temperatura">
    
    
    <?php /**Medicamentos */ ?>
    <h3>Medicamentos a serem ministrados: </h3>

    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome">

    <label for="periodo">Período: </label>
    <input type="text" name="periodo" id="periodo">

    <label for="horario">Horário: </label>
    <input type="text" name="horario" id="horario">

    <label for="via">Via: </label>
    <input type="text" name="via" id="via">

    <?php /**Evolução */ ?>
    <h3>Evolução do paciente: </h3>

    <label for="situacao">Situação: </label>
    <input type="text" name="situacao" id="situacao">

    <label for="observacoes">Observações: </label>
    <input type="text" name="observacoes" id="observacoes">
    
    <?php /**FIM */ ?>
    <input type="submit" value="Finalizar Atendimento">

</form>

<style>
    h3{
        float:left;
        clear:both;
    }
    form label{
        float:left;
        clear: both;
    }
    form input{
        float:left;
        clear: both;
    }
</style>