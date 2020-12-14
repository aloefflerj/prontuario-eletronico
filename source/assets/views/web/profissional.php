<?php $v->layout("_bootstrap") ?>

<div id = "corpo" class="jumbotron vertical-center" >
    <div class="row" id="title" style="margin-bottom: 20px;">
        <h2 id="h2" class="container-fluid align-middle col-md-4 display-4 text-center">Login Médicos</h2>
    </div>
    <div class="row">
        <form id = "login" class="container-fluid border-rounded align-middle col-md-4" action="<?= $router->route("auth.profissionalLogin"); ?>" method="post">
            <div>
                <label for="cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Cpf">
            </div>
            <div>
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control"name="senha" id="senha" placeholder="Senha">
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>

<!--CSS--------------------------------------------------------->
<?php $v->start("css"); ?>
<style>
    .vertical-center {
    min-height: 100%;  
    min-height: 100vh; 

    display: flex;
    align-items: center;
    }  
</style>
<?php $v->end(); ?>