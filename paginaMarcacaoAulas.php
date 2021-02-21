<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Marcação de Aulas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleContactos.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
	<?php include './php/commonLayout.php'; ?>
	    <h1 class="margin">Marcação de aula</h1>
	<?php
        if (!empty($_POST["tipo_aula"])){
            echo('<p class="margin">Aula de '.$_POST["tipo_aula"].' com o professor '.$_POST["professor"].'</p>');
        }
        if(!isset($_SESSION["userid"])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        if (!empty($_POST)){
        echo('
            <div class="containerSubmissao"> 
                <form action="./php/marcarAula.php" method="post">
                    <label for="name">&nbsp&nbspNome</label>
                    <input type="text" id="name" name="name" placeholder="O teu nome..."/>
                    <br>
                    <br>	
                    <label for="horario">&nbsp&nbspHorário</label>
                    <select id="horario" name="horario">
                        <option value="0">Manhã</option>
                        <option value="1">Tarde</option>
                        <option value="2">Noite</option>
                    </select>
                    <br>
                    <br>
                    <label for="nif">&nbsp&nbspNIF</label>
                    <input type="number" id="nif" name="nif" minlength=9 maxlength=9 placeholder="O teu número de contribuinte..."/> 
                    <br>
                    <br>
                    <label for="nascimento">&nbsp&nbspData de nascimento</label>
                    <input type="date" id="nascimento" name="nascimento" placeholder="A tua data de nascimento..."/>
                    <br>
                    <br>
                    <label for="contacto">&nbsp&nbspContacto preferêncial</label>
                    <input type="text" id="contacto" name="contacto" placeholder="Indica um contacto..."/>
                    <br>
                    <br>
                    <input type="hidden" name="tipo_aula" value="'.$_POST["tipo_aula"].'"/>
                    <input type="hidden" name="professor" value="'.$_POST["professor"].'"/>
                    <input type="submit" name="register">
                </form>             
            </div>         
            <br>'
            );
        }
	?>
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>