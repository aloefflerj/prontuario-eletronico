<!DOCTYPE html>
<html lang="<?= site("language"); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= site("name"); ?></title>

    <link rel="stylesheet" href="<?= url("/source/assets/css/style.css"); ?>"/>
</head>
<body>
    
    <nav class="main_nav">
    <?php 
    if($v->section("navbar")):
        echo $v->section("navbar");
    else:
        ?>
        <a title="" href="<?=url()?>">Home</a>
        <a title="" href="<?=url("teste")?>">Teste</a>
    <?php
    endif;?>
    </nav>

    <main class="main_content">
        <?= $v->section("content");?>
    </main>

    <footer class="main_footer">
    <?= site("name")?> - Todos os direitos reservados
    </footer>
<script src="<?= url("/source/assets/js/jquery.js") ?>"></script>
<?= $v->section("scripts");?>
</body>
</html>