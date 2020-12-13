<?php $v->layout("_bootstrap"); ?>
<div class="container-fluid">
    <div class="row">

        <!-- Titulo -->
        <main class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4" role="main">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                <h1 class="h2">Bem Vindo, Dr. <?= $profissional->nome ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
        </main>

        <!-- Tabela de Pacientes -->
        <main class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4" role="main">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cpf</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <?php
                if ($pacientes) :
                    foreach ($pacientes as $paciente) :
                ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $paciente->id; ?> </th>
                                <td> <?= $paciente->nome; ?> </td>
                                <td> <?= $paciente->cpf; ?> </td>
                                <td>
                                    <button type="button" 
                                            onclick="location.href='<?= $router->route('app.detalhes', ['id' => $paciente->id]);?>'" 
                                            class="btn btn-light">Visualizar</button>
                                    <button type="button"
                                            onclick="location.href='<?= $router->route('app.atendimento', ['id' => $paciente->id]);?>'" 
                                            class="btn btn-light">Atender</button>
                                    <button type="button" class="btn btn-light">Deletar</button>
                                </td>
                            </tr>
                        </tbody>
                <?php
                    endforeach;
                endif;
                ?>
            </table>
        </main>

    </div>
</div>

<?php $v->start("scripts"); ?>
<script>

</script>
<?php $v->end(); ?>