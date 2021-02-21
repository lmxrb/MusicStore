<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Registo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleRegisto.css">
    <link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
	<?php
    include './php/commonLayout.php';
	if (!empty($_SESSION['post_data'])){
	$_POST = $_SESSION['post_data'];}
	?>
	<h1 class="margin">Registo</h1> 
        <div class="containerSubmissao"> 
            <form action="php/registar.php" method="post">
                <label for="name">&nbsp&nbspNome&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" id="name" name="name" placeholder="O teu nome..."/> 
				<br>
                <br>
				<label for="username">&nbsp&nbspUser&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" id="username" value="<?php if (!empty($_SESSION['post_data'])){echo ($_POST["username"]);}?>" name="username" placeholder="O teu username..."/> 
				<br>
                <br>
                <label for="email">&nbsp&nbspEmail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" id="email" name="email" placeholder="O teu endereço de e-mail..."/>
				<br>
                <br>
                <label for="password">Password</label>
				<input type="password" id="password" name="password" value="<?php if (!empty($_SESSION['post_data'])){echo ($_POST["password"]);}?>" placeholder="A tua password..."/>
				<br>
                <br>
                <input type="submit" name="register" value="Registar"> 
            </form>             
        </div>         
	<br>
	
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>