<?php $v->layout("_bootstrap"); ?>
<style>
    #corpo {
        margin-top: 2%;
    }
</style>
<form action="<?= $router->route("auth.profissionalRegister"); ?>" method="post">
    <div id="corpo" class="col-md-12">
        <div class="row">
            <div id="login" class="container-fluid border-rounded align-left col-md-6">
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
            </div>
            <div id="login" class="container-fluid border-rounded align-right col-md-6">
                <div>
                    <label for="inputEmail4" class="form-label">Especialização</label>
                    <input type="text" class="form-control" name="especializacao" id="especializacao" placeholder="Digite a Especialização">
                </div>
                <br>
                <div>
                    <label for="inputEmail4" class="form-label">Senha</label>
                    <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
                </div>
                <br>
                <div>
                    <label for="inputEmail4" class="form-label">Confirme a Senha</label>
                    <input type="text" class="form-control" name="confirmacao" id="confirmacao" placeholder="Confirme a Senha">
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </div>
        </div>
    </div>

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

<label for="especializacao">Especialização: </label>
<input type="text" name="especializacao" id="especializacao">

<label for="senha">Senha: </label>
<input type="password" name="senha" id="senha">

<label for="confirmacao">Confirme Sua Senha: </label>
<input type="password" name="confirmacao" id="confirmacao">

<input type="submit" value="Registrar"> -->
</form>