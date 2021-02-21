<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Aulas de Saxofone</title>
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
    <h1 class="margin">Aulas de Saxofone</h1>
	<p class="margin">Aulas ao sábado</p>
    <table>
        <tr>
            <th><img class="imground" src="img/img (6).jpg"></th>
            <th>Professor Luís<br>
            5,5€/Hora<br>
            Olá sou o Professor Luís, toco saxofone desde o ensino secundário e adoro dar aulas do instrumento.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Saxofone"/>
			<button type="submit" name="professor" value="Luís" class="button">Inscrever</button>
			</form>
        </tr>
        <tr>
            <th><img class="imground" src="img/img (7).jpg"></th>
            <th>Professor Ricardo<br>
            7€/Hora<br>
            Olá sou o Professor Ricardo, o saxofone está comigo desde criança e adoro os meus alunos e dar aulas.<br>
            <br>
			<br>
			<form action="../paginaMarcacaoAulas.php" method="post">
			<input type="hidden" name="tipo_aula" value="Saxofone"/>
			<button type="submit" name="professor" value="Ricardo" class="button">Inscrever</button>
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