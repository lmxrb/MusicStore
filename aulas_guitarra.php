<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Aulas de Guitarra</title>
    <link rel="stylesheet" href="css/style.css">
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
    <h1 class="margin">Aulas de Guitarra</h1>
	<p class="margin">Aulas à quarta-feira</p>
    <table>
        <tr>
            <th><img class="imground" src="img/img (2).jpg"></th>
            <th>Professora Ana<br>
            8€/Hora<br>
            Olá sou a Professora Ana, toco guitarra há 5 anos e, após 3 anos, decidi começar a dar aulas e portanto, dou aulas há 2 anos.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
                <input type="hidden" name="tipo_aula" value="Guitarra"/>
                <button type="submit" name="professor" value="Ana" class="button">Inscrever</button>
			</form>
        </tr>
        <tr>
            <th><img class="imground" src="img/img (3).jpg"></th>
            <th>Professor Carlos<br>
            9,5€/Hora<br>
            Olá sou o Professor Carlos, toquei guitarra numa banda durante 9 anos e comecei a dar aulas este ano porque adoro guitarra.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
                <input type="hidden" name="tipo_aula" value="Guitarra"/>
                <button type="submit" name="professor" value="Carlos" class="button">Inscrever</button>
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