<?php $v->layout("_bootstrap"); ?>

<h1>Pesquisa de Pacientes</h1>

<label for="nome">Pesquisa por Nome: </label>
<input type="search" name="nome" id="nome">

<label for="cpf">Pesquisa por Cpf: </label>
<input type="search" name="cpf" id="cpf">

<input type="button" value="Pesquisar" data-search="<?= $router->route("user.procuraPaciente"); ?>">

<div id="resultado" style="border: 1px solid #555;">

</div>
<?php $v->start("scripts"); ?>
    <script>
        $(document).ready(function(){
            $("[data-search]").on("click", function(e){
                e.preventDefault();
                var data = $(this).data();
                var nome = $("#nome").val();
                var cpf = $("#cpf").val();
                pesquisar(data, nome, cpf);
            });

            $(document).on('keypress',function(e) {
                if(e.which == 13) {
                    var data = $("[data-search]").data();
                    var nome = $("#nome").val();
                    var cpf = $("#cpf").val();
                    pesquisar(data, nome, cpf);
                }
            });

        });

        function pesquisar(data, nome, cpf){
            $.post(data.search, { nome: nome, cpf: cpf})
                .done(function( data ) {
                    $("#resultado").replaceWith(data);
                });
        }

        //Limpa os campos
        $("#nome").focus(function(){
            $("#cpf").val(null);
        });
        $("#cpf").focus(function(){
            $("#nome").val(null);
        });

    </script>
<?php $v->end(); ?>