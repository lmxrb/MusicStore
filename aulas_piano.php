<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Aulas de Piano</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="styleAulas.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <script>
        document.getElementById("ulMenu").children.item(2).firstElementChild.classList.add("dropbtnActivo");
    </script>
    <br>
    <br>
    <h1 class="margin">Aulas de Piano</h1>
	<p class="margin">Aulas à segunda-feira</p>
    <table>
        <tr>
            <th><img class="imground" src="img/img (0).jpg"></th>
            <th>Professor Manuel<br>
            6,5€/Hora<br>
            Olá sou o Professor Manuel, fui pianista durante 10 anos e dou aulas do instrumento há 6 anos na MusicStore.
			<br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Piano"/>
			<button type="submit" name="professor" value="Manuel" class="button">Inscrever</button>
			</form>
        </tr>
        <tr>
            <th><img class="imground" src="img/img (1).jpg"></th>
            <th>Professor Rui<br>
            7,5€/Hora<br>
            Olá sou o Professor Rui, toco piano há 18 anos e dou aulas há 5 anos e adoro a minha profissão.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Piano"/>
			<button type="submit" name="professor" value="Rui" class="button">Inscrever</button>
			</form>
        </tr>
    </table>
    <br>
<br>

		

</body>
<footer>
    2020 Rubén Barbosa e Rui Moreira
</footer>
</html>