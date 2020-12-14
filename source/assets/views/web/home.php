<?php $v->layout("_bootstrap");  ?>

<div id = "corpo" class="jumbotron vertical-center">
    <div class="row"><img class="container-fluid align-middle text-center" src="<?= img("icon-2.png"); ?>" alt="logo" style="width:100px;margin-bottom:20px"></div>
    <div class="row" style="margin-bottom:50px;">
        <h2 id="h2" class="container-fluid align-middle col-md-4 display-4 text-center">Bem Vindo</h2>
    </div>
    <div class="row">
        <div id = "login" class="container-fluid border-rounded align-middle col-md-4" action="<?= $router->route("auth.userLogin"); ?>" method="post">
            <div>
            <a style="text-decoration:none"  href="<?= $router->route("web.user") ?>"><button class="btn btn-outline-primary btn-lg btn-block">Login Usuário do Sistema</button></a>
            </div>
            <br>
            <div>
            <a style="text-decoration:none" href="<?= $router->route("web.profissional") ?> ?>"><button class="btn btn-outline-primary btn-lg btn-block">Login Médicos</button></a>
            </div>
        </div>
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
