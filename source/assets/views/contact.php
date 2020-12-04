<?php $v->layout("_theme");?>

<h1>Contato</h1>

<div>
    <h2>Fale Conosco</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora nam necessitatibus ipsa illum error sunt assumenda, voluptatibus temporibus eos eaque eligendi consectetur eveniet, ut quo tempore. Quos iusto harum quas?</p>


    <form action="<?=url("contact")?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Seu Nome:"/><br>
        <input type="text" name="email" placeholder="Seu E-mail:"/><br>
        <textarea name="message" id="" cols="30" rows="3" placeholder="Mensagem"></textarea><br>
        <button>Enviar Mensagem</button>
    </form>

</div>

<?php if ($name != null):?>
<h1>
    <p><?= $name ?></p><br>
    <p><?= $email ?></p><br>
    <p><?= $message ?></p><br>
</h1>
<?php endif; ?>
<?php $v->start("scripts"); ?>
<script>
    $(function(){
        $("button").after('<button type="reset">Limpar</button>');
    });
</script>
<?php $v->end(); ?>