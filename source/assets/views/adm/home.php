<?php $v->layout("_bootstrap"); ?>
<style>
    .corpo {
        width: 100%;
    }
</style>
<div class="corpo">
    <div class="">
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Registro de Usuários do Sistema</h6>
                    <small class="text-muted">Clique no Botão para Registro</small>
                </div>
                <a href="<?= $router->route("adm.user"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-primary">Registro</button>
                    </span>
                </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Registro de Profissionais</h6>
                    <small class="text-muted">Clique no Botão para Registro</small>
                </div>
                <a href="<?= $router->route("adm.profissional"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-warning">Registro</button>
                    </span>
                </a>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Registro de Pacientes</h6>
                    <small class="text-muted">Clique no Botão para Registro</small>
                </div>
                <a href="<?= $router->route("adm.paciente"); ?>">
                    <span class="text-muted">
                        <button class="btn btn-danger">Registro</button>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Jpopper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>