<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<meta charset="UTF-8">
	<title>MusicStore</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/vinyl.png">
	<meta name="viewport" content="width=device-width, initial-scale=0.86">
</head>
<body>
    <?php include './php/commonLayout.php' ?>
    <script>
        document.getElementById("ulMenu").children.item(0).firstElementChild.classList.add("activo");
    </script>
	<br>
	<br>
	<div class="slideshow-container">
		<div class="mySlides fade">
			<img alt="Pianista em concerto" src="img/1.jpg" style="width:100%">
		</div>
		<div class="mySlides fade">
			<img alt="Banda em concerto" src="img/2.jpg" style="width:100%">
		</div>
		<div class="mySlides fade">
			<img alt="Cantora em concerto" src="img/3.jpg" style="width:100%">
		</div>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot" id="dot1" onClick="dotClick(this.id)"></span>
		<span class="dot" id="dot2" onClick="dotClick(this.id)"></span>
		<span class="dot" id="dot3" onClick="dotClick(this.id)"></span>
	</div>
	<script src="js/slideshow.js"></script>
	<script src="js/script.js"></script>
	<div style="text-align: center;">
	<table>
		<tr>
			<th><h1 style="font-family: Photograph Signature; font-size: 35px">Top 10</h1></th>
		</tr>
		<tr>
			<th>
				<img class="imground" id="image1" onclick="onSongClick(this.id);" src="img/pic1.jpg" alt="Capa do album">
				<img class="imgPlay" id="play1" src="img/play.png" alt="Play/Pause">
				<h2>JERUSALEMA</h2>
				<p>MASTER KG FEAT. NOMCEBO ZIKODE</p>
				</th>
			<th>
				<img class="imground" id="image2" onclick="onSongClick(this.id);" src="img/pic2.jpg" alt="Capa do album">
				<img class="imgPlay" id="play2" src="img/play.png" alt="Play/Pause">
				<h2>RECOMEÇAR</h2>
				<p>FERNANDO DANIEL</p>
				</th>
			<th>
				<img class="imground" id="image3" src="img/pic3.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play3" src="img/play.png" alt="Play/Pause">
				<h2>SOME SAY</h2>
				<p>NEA</p>
				</th>
			<th>
				<img class="imground" id="image4" src="img/pic4.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play4" src="img/play.png" alt="Play/Pause">
				<h2>IN YOUR EYES</h2>
				<p>THE WEEKND</p>
				</th>
			<th>
				<img class="imground" id="image5" src="img/pic5.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play5" src="img/play.png" alt="Play/Pause">
				<h2>BRUISES</h2>
				<p>LEWIS CAPALDI</p>
				</th>
		</tr>
		<tr>
			<th>
				<img class="imground" id="image6" src="img/pic6.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play6" src="img/play.png" alt="Play/Pause">
				<h2>ASSOBIA PARA O LADO</h2>
				<p>CARLÃO</p>
				</th>
			<th>
				<img class="imground" id="image7" src="img/pic7.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play7" src="img/play.png" alt="Play/Pause">
				<h2>CONV. IN THE DARK</h2>
				<p>JOHN LEGEND</p>
				</th>
			<th>
				<img class="imground" id="image8" src="img/pic8.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play8" src="img/play.png" alt="Play/Pause">
				<h2>DYNAMITE</h2>
				<p>BTS</p>
				</th>
			<th>
				<img class="imground" id="image9" src="img/pic9.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play9" src="img/play.png" alt="Play/Pause">
				<h2>MOOD</h2>
				<p>24KGOLDN FEAT. IANN DIOR</p>
				</th>
			<th>
				<img class="imground" id="image10" src="img/pic10.jpg" onclick="onSongClick(this.id);" alt="Capa do album">
				<img class="imgPlay" id="play10" src="img/play.png" alt="Play/Pause">
				<h2>TARDE DEMAIS</h2>
				<p>NUNO RIBEIRO</p>
				</th>
		</tr>
	</table>
	</div>
	<br>
	<br>
</body>
<footer>
	© 2020 Rubén Barbosa e Rui Moreira
</footer>
</html>