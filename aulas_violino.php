<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Aulas de Violino</title>
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
    <h1 class="margin">Aulas de Violino</h1>
	<p class="margin">Aulas à sexta-feira</p>
    <table>
        <tr>
            <th><img class="imground" src="img/img (4).jpg"></th>
            <th>Professor José<br>
            10,5€/Hora<br>
            Olá sou o Professor José, toco violino há 22 anos e dou aulas há mais de 10 anos.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Violino"/>
			<button type="submit" name="professor" value="José" class="button">Inscrever</button>
			</form>
        </tr>
        <tr>
            <th><img class="imground" src="img/img (5).jpg"></th>
            <th>Professor Leonardo<br>
            7,5€/Hora<br>
            Olá sou o Professor Leonardo, e toco violino há 8 anos, comecei a dar aulas na MusicStore recentemente.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Violino"/>
			<button type="submit" name="professor" value="Leonardo" class="button">Inscrever</button>
			</form>
        </tr>
    </table>
    <br>
    <br>
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>