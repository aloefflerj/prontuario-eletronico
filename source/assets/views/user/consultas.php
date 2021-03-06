<?php $v->layout("_bootstrap"); ?>

<br>
<h4>Pesquisa de Consultas</h4>
<form method="post" id="procura">
    <?php //SELECIONA PACIENTE 
    ?>
    <label for="idPaciente">Pesquisa por Paciente: </label>
    <select name="idPaciente" id="idPaciente" form="procura">
        <?php
        if ($pacientes) :
            foreach ($pacientes as $paciente) :
        ?>
                <option value="<?= $paciente->id ?>"><?= $paciente->nome ?></option>
        <?php
            endforeach;
        endif;
        ?>
    </select>
    <?php //SELECIONA PROFISSIONAL 
    ?>
    <label for="idProfissional">Pesquisa por Profissional: </label>
    <select name="idProfissional" id="idProfissional" form="consulta">
        <?php
        if ($profissionais) :
            foreach ($profissionais as $profissional) :
        ?>
                <option value="<?= $profissional->id ?>"><?= $profissional->nome ?></option>
        <?php
            endforeach;
        endif;
        ?>
    </select>
    <?php //SELECIONA DATA 
    ?>
    <label for="dataConsulta">Pesquisa por Data: </label>
    <input type="date" name="dataConsulta" id="dataConsulta">
    <br>
    <span class="text-muted">
        <input type="submit" class="btn btn-primary" 
        value="Consultar" data-search="<?= $router->route("user.procuraConsulta"); ?>">
    </span>



</form>
<br>


<div id="resultado" style="border: 1px solid #555;">

    <h4>Todas as Consultas: </h4>

    <?php
    if ($consultas) :
        foreach ($consultas as $consulta) :
            //if($consulta->finalizada != "n"):
    ?>
            <h4><?= $consulta->id; ?> </h4>
            <p>Consulta de:
                <?php
                foreach ($pacientes as $paciente) :
                    if ($paciente->id == $consulta->idPaciente) :
                        echo $paciente->nome;
                    endif;
                endforeach;
                ?>
            </p>
            <p>Com o Dr.
                <?php
                foreach ($profissionais as $profissional) :
                    if ($profissional->id == $consulta->idProfissional) :
                        echo $profissional->nome;
                    endif;
                endforeach;
                ?>
            </p>
            <p>Hora:
                <?php
                echo dataHoraFormat($consulta->dataConsulta);
                ?>
            </p>
            <p>Status: <?php if ($consulta->finalizada == "n") : echo "Aberta";
                        else : echo "Fechada";
                        endif; ?></p>
            <form action="<?= $router->route("auth.deletaConsulta"); ?>" method="post">
                <input type="hidden" name="id" id="id" value="<?= $consulta->id; ?>">
                <input type="submit" value="Deletar">
            </form>
    <?php
        //endif;
        endforeach;
    endif;
    ?>
</div>

<?php $v->start("scripts"); ?>
<script>
    $(document).ready(function() {
        $("[data-search]").on("click", function(e) {
            e.preventDefault();
            var data = $(this).data();
            var idPaciente = $("#idPaciente").val();
            var idProfissional = $("#idProfissional").val();
            var dataConsulta = $("#dataConsulta").val();
            pesquisar(data, idPaciente, idProfissional, dataConsulta);
        });

        $(document).on('keypress', function(e) {
            if (e.which == 13) {
                var data = $("[data-search]").data();
                var idPaciente = $("#idPaciente").val();
                var idProfissional = $("#idProfissional").val();
                var dataConsulta = $("#dataConsulta").val();
                pesquisar(data, idPaciente, idProfissional, dataConsulta);
            }
        });

        $("#idPaciente").val(null);
        $("#idProfissional").val(null);
        $("#dataConsulta").val(null);

    });

    function pesquisar(data, idPaciente, idProfissional, dataConsulta) {
        $.post(data.search, {
                idPaciente: idPaciente,
                idProfissional: idProfissional,
                dataConsulta: dataConsulta
            })
            .done(function(data) {
                $("#resultado").replaceWith(data);
            });
    }

    //Limpa os campos



    $("#idPaciente").focus(function() {
        $("#idProfissional").val(null);
        $("#dataConsulta").val(null);
    });
    $("#idProfissional").focus(function() {
        $("#idPaciente").val(null);
        $("#dataConsulta").val(null);
    });
    $("#dataConsulta").focus(function() {
        $("#idPaciente").val(null);
        $("#idProfissional").val(null);
    });
</script>
<?php $v->end(); ?>