<?php $v->layout("_bootstrap"); ?>
<form action="<?= $router->route("auth.pacienteRegister");?>" method="post">
    <div id="corpo" class="col-md-12">
        <div class="row">
            <div id="login" class="container-fluid border-rounded align-middle col-md-4">
                <div>
                    <label for="inputEmail4" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
                </div>
                <br>
                <div>
                    <label for="inputAddress" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite o CPF">
                </div>
                <br>
                <div>
                    <label for="inputAddress" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Digite o Telefone">
                </div>
                <br>
                <div>
                    <label for="inputEmail4" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o Endereço">
                </div>
                <br>
                <div>
                    <label for="inputEmail4" class="form-label">Ano Nascimento</label>
                    <input type="text" class="form-control" name="anoNasc" id="anoNasc" placeholder="Digite o Ano de Nascimento">
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </div>
        </div>
    </div>
    <!-- Codigo base -->
    <!-- <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome">

    <label for="cpf">Cpf: </label>
    <input type="text" name="cpf" id="cpf">

    <label for="telefone">Telefone: </label>
    <input type="text" name="telefone" id="telefone">

    <label for="endereco">Endereço: </label>
    <input type="text" name="endereco" id="endereco">

    <label for="anoNasc">Ano de Nascimento: </label>
    <input type="text" name="anoNasc" id="anoNasc">

    <input type="submit" value="Cadastrar"> -->
</form>