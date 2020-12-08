<?php $v->layout("_bootstrap"); ?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Página Inicial</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paciente</li>
                    </ol>
                </nav>
            </div>
            <main class="col-md-12 ml-sm-auto col-lg-12 pt-0 px-4" role="main">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                    <h1 class="h2">Dados Pessoais</h1>
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
            <div class="col-md-12 px-4">
                <p>ID:          <?= $paciente->id; ?></p>
                <p>Nome:        <?= $paciente->nome; ?></p>
                <p>Telefone:    <?= $paciente->telefone; ?></p>
                <p>Endereço:    <?= $paciente->endereco; ?></p>
            </div>
            <ul class="nav nav-tabs pt-2">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Medicamentos</a>
                    <?php 
                        if($medicamentos):
                            foreach($medicamentos as $medicamento): 
                    ?>
                        <ul style="list-style-type: none">
                            <li><strong>    <?= $medicamento->nome ?></strong></li>
                            <li>Período:    <?= $medicamento->periodo ?></li>
                            <li>Horário:    <?= $medicamento->horario ?></li>
                            <li>Via:        <?= $medicamento->via ?></li>
                        </ul>
                    <?php   
                            endforeach; 
                        endif;
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Evolução</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sinais Vitais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Anamnese</a>
                </li>
            </ul>
        </div>
    </div>