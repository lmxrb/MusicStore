<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Contactos</title>
    <link rel="stylesheet" href="css/styleContactos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
<?php include './php/commonLayout.php' ?>
<script>
    document.getElementById("ulMenu").children.item(4).firstElementChild.classList.add("activo");
</script>
<br>
<br>
<h1 class="margin">Contactos</h1>
<div class="containerSubmissao">
    <form action="php/form.php" method="post">

        <label>Nome</label>
        <input type="text" id="fname" name="firstname" placeholder="O teu nome...">
        <label>Email</label>

        <input type="text" id="fname" name="email" placeholder="O teu endereço de e-mail...">

        <label>Assunto</label>
        <textarea id="subject" name="subject" placeholder="Escrever aqui..." style="height:200px"></textarea>
        <input type="submit" value="Submeter">
    </form>
</div>
<h1 class="margin">Onde estamos</h1>
<br>
<div style="text-align: center;">
    <iframe class="responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.6728007672946!2d-8.625784284622235!3d41.119836479289546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24652cef362d7d%3A0x99f999b4ed3788d3!2sInstituto%20Superior%20Polit%C3%A9cnico%20Gaya!5e0!3m2!1spt-PT!2spt!4v1605544185256!5m2!1spt-PT!2spt" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<br>
<br>
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>