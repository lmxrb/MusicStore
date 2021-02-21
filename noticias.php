<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicStore | Noticias</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/vinyl.png">
    <meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <script>
        document.getElementById("ulMenu").children.item(3).firstElementChild.classList.add("activo");
    </script>
	<br>
	<br>
	<h1 class="margin">Noticias</h1>
	<center>
	<table>
		<?php
			$url = "https://rss.impresa.pt/feed/latest/blitz.rss";
			$xml = simplexml_load_file($url);
			for($i = 0; $i < 10; $i++){
				$titulo = $xml->channel->item[$i]->title;
				$link = $xml->channel->item[$i]->link;
				$description = $xml->channel->item[$i]->description;
				$imagem = $xml->channel->item[$i]->enclosure->attributes()->url;
				$imagem = "https" . substr($imagem, 4);
				echo('
				<tr>
				<th><img style="width: 360px; height:203px" src="'.$imagem.'"/></th>
				<th><h2>'.$titulo.'</h2><p>'.$description.'...</p> <a href='.$link.' target="_blank">Ler+ </a></th>
				</tr>');
			}
		?>
	</table>
	</center>
	<br>
	<br>
</body>
<footer>
    © 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>