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
        html, body, main, #copro{
            min-height: 100%;
            margin: 0;
            padding: 0;
            background-color: #E9ECEF;
        }

        #corpo{
            height: 80vh;
            margin: 0;
        }
        footer{
            height: 15vh;
        } 
    </style>
    <?php $v->section("css"); //Injeta o css?>

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
                "> <img src="source\assets\img\icon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy" style="margin-right:10px">Sistema de Prontuário Eletrônico
            </a>

            <?php if(!empty($_SESSION["profissional"]) || !empty($_SESSION["user"]) || !empty($_SESSION["adm"])): ?>

                <a 
                style="text-decoration:none; color:#fff"  
                href="<?php 
                    if(!empty($_SESSION["profissional"])): 
                        echo $router->route("auth.profissionalLogout");
                    elseif(!empty($_SESSION["user"])):
                        echo $router->route("auth.userLogout");
                    elseif(!empty($_SESSION["adm"])):
                        echo $router->route("auth.admLogout");
                    else:
                        echo $router->route("web.home");
                    endif; 
                ?>"><span class="nav-link">Logout</span></a>
                
            <?php endif; ?>
        </nav>
    <?php
    endif;
    ?>
    
    
    <!-- Corpo da pagina -->

    <main class="main_content">
        <?= $v->section("content");?>
    </main>
    <img src="" alt="">

    
    
    
    <!-- Jpopper -->
    <script src="<?= url("/source/assets/js/jquery.js") ?>"></script>
    <script src="<?= js("/jquery.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <?= $v->section("scripts");?>
</body>

</html>