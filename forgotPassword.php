<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Password Reset</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleRegisto.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <h1 class="margin">Password Reset</h1>
    <div class="containerSubmissao" style="width:30%; margin-left: auto; margin-right: auto; margin-top: 120px;">
        <form action="mail/passwordReset.php" method="post">
            <label for="email">Email</label>
            <br>
            <input type="email" minlength="5" id="email" name="email" placeholder="O teu endereço de e-mail..."/>
            <br>
            <br>
            <input type="submit" name="forgot" value="Enviar Email">
        </form>
    </div>
    <br>
</body>
<footer style="margin-top: 320px;">
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>