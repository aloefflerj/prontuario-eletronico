<!DOCTYPE html>
<html lang="<?= site("language"); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= site(); ?></title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>
    <!-- NavBar -->
    <?php
    if($v->section("navbar")):
        echo $v->section("navbar");
    else:?>
        <nav class="navbar navbar-dark bg-dark">
            <a  class="navbar-brand" 
                href="
                    <?php 
                        if(!empty($_SESSION["user"])):
                            echo $router->route("user.home"); 
                        elseif(!empty($_SESSION["profissional"])):
                            echo $router->route("app.home");
                        elseif(!empty($_SESSION["adm"])):
                            echo $router->route("adm.home"); 
                        else:
                            echo $router->route("web.home");
                        endif;
                    ?>
                ">Sistema de Prontuário Eletrônico</a>
            <form class="form-inline">
                <!--<span class="nav-link">Sign Out</span>-->
                
            </form>

            <?php if(!empty($_SESSION["profissional"]) || !empty($_SESSION["user"]) || !empty($_SESSION["adm"])): ?>

                <a href="<?php 
                    if(!empty($_SESSION["profissional"])): 
                        echo $router->route("auth.profissionalLogout");
                    elseif(!empty($_SESSION["user"])):
                        echo $router->route("auth.userLogout");
                    elseif(!empty($_SESSION["adm"])):
                        echo $router->route("auth.admLogout");
                    else:
                        echo $router->route("web.home");
                    endif; 
                ?>">Logout</a>
                
            <?php endif; ?>
        </nav>
    <?php
    endif;
    ?>

    <!-- Corpo da pagina -->

    <main class="main_content">
        <?= $v->section("content");?>
    </main>

    

    <!-- Jpopper -->
    <footer class="main_footer">
    <?= site("name")?> - Todos os direitos reservados
    </footer>
    <script src="<?= url("/source/assets/js/jquery.js") ?>"></script>
    <script src="<?= js("/jquery.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <?= $v->section("scripts");?>
</body>

</html>