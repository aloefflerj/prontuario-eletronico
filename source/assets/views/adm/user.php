<?php $v->layout("_bootstrap"); ?>
<style>
    body {
        width: 100%;
        height: 100%;
        margin: 0 auto;
    }

    #corpo {
        margin-top: 5%;
    }
</style>
<form action="<?= $router->route("auth.userRegister"); ?>" method="post">
    <!-- <h1>Registro de Usuário</h1> -->
    <!-- Corpo da pagina -->
    <div id="corpo" class="col-md-12">
        <div class="row">
            <div id="login" class="container-fluid border-rounded align-middle col-md-4">
                <div>
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Digite o Email">
                </div>
                <br>
                <div>
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
                </div>
                <br>
                <div>
                    <label class="form-label">Confirme a Senha</label>
                    <input type="password" class="form-control"  name="confirmacao" id="confirmacao" placeholder="Confirme a senha">
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                    <!-- <button type="submit" value= "Registrar" class="btn btn-primary">Cadastrar</button> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Jpopper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    </script>
</form>