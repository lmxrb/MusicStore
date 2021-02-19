//funcao para quando se carrega nos pontos das imagens do slideshow para mudar manualmente
var dotClick = function(elementId) {
	//fazer slice à string para ficar com o id (dot1 -> 1)
	const id = parseInt(elementId.slice(3)) - 1;

	//código identico à função showSlides em slideshow.js
	let i;
	let slides = document.getElementsByClassName("mySlides");
	let dots = document.getElementsByClassName("dot");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[id].style.display = "block";
	dots[id].className += " active";
	slideIndex = id;
};

//path default da musica
const song = "music/music";
var playing = false;
const audio = document.createElement('audio');

var elPlaying;

//array de timeStamps para guardar o tempo a que as musicas que estavam a tocar
//no caso de mudar de musica e voltar à inicial

var timeStamps = [0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0];

function onSongClick(elementId) {
	//ir buscar elemento que foi clicado
	const el = document.getElementById(elementId);
	if(el != elPlaying){
		if(playing == true){
			pauseAudio(elPlaying);
			timeStamps[parseInt(elPlaying.id.slice(5))-1] = audio.currentTime;
		}
	}
	//guardar disco que está a tocar caso se carregue noutro disco enquanto este toca (if statement anterior)
	elPlaying = el;

	//remover 1 do id visto que os elementos começam em 1 mas os arrays do javascript em 0
	//slice de 5 caracteres para remover "image" da string e ficar apenas o número (image1 -> 1)
	const id = parseInt(elementId.slice(5)) - 1;

	//verificar se não esta a tocar
	//começar a rodar e tocar musica
	if(playing == false){
		//exemplo de path das musicas
		//~/music/music#.mp3
		audio.src=song+(id+1)+".mp3";
		audio.load();
		playing = true;
		audio.currentTime=timeStamps[id];
		audio.play();
		document.getElementById("play" + (id+1)).src = "imgs/pause.png";
		//se possuir uma animacao fazer play
		if(el.getAnimations().length > 0){
			el.getAnimations()[0].play();
		}
		else {
			//criacao de animacao de rotacao de 360 graus
			el.animate([
				{transform: 'rotate(0deg)'},
				{transform: 'rotate(360deg)'}
			], {

				duration: 10000,
				iterations: Infinity
			});
		}
	}
	//parar de rodar o disco (carregando novamente nele)
	else{
		pauseAudio(el);
		timeStamps[id] = audio.currentTime;
	}

	//quando este evento é acionado o disco para de rodar
	audio.onended = function() {
		pauseAudio(el);
		timeStamps[id] = 0.0
	};

}

//funcao para parar audio e animacao do disco que está a tocar
function pauseAudio(elementId) {
	playing = false;
	elementId.getAnimations()[0].pause();
	audio.pause();
	document.getElementById("play" + elementId.id.slice(5)).src = "imgs/play.png";
}