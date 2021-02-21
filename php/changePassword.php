<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Mudança de Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleRegisto.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <h1 class="margin">Mudança de Password</h1>
    <?php
        if (!isset($_SESSION["userid"])){
        echo('
            <div class="containerSubmissao" style="width:30%; margin: auto;">
                <form action="php/password.php" method="post">');
                    if(!isset($_GET["resetID"])){
                        echo('
                            <input type="hidden" id="resetID" name="resetID"/>
                        ');
                    }
                    else{
                    echo('
                    <label for="previous">Password Anterior</label>
                    <br>
                    <input type="password" id="previous" name="password" placeholder="Password anterior..."/>');
                    }
                    echo('
                    <br>
                    <br>
                    <label for="current">Nova Password</label>
                    <br>
                    <input type="password" id="current" name="newPassword" placeholder="A tua nova password..."/>
                    <br>
                    <br>
                    <label for="current">Confirmar Nova Password</label>
                    <br>
                    <input type="password" id="current" name="newPassword1" placeholder="Repete a tua nova password..."/>
                    <br>
                    <br>
                    <input type="submit" name="modify" value="Modificar">
                </form>
            </div>
        <br>');
        }
    ?>
</body>
<footer style="margin-top: 110px;">
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>