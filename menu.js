const audioMenu = document.createElement('audio');
audioMenu.volume=audioMenu.volume*0.175;
//menu 0-5 dropdown 6-9
const songs = ["do", "re", "mi", "fa", "sol", "la", "si", "mi_guitarra", "violino", "saxofone"];

var playing = false;

function playSong(id) {
    const m = parseInt(id);
    //se estiver a tocar, parar a musica
    if(playing){
        audioMenu.pause();
    }
    //carregar musica
    audioMenu.src = "music/" + songs[m] + ".mp3";
    //tocar a musica
    audioMenu.load();
    audioMenu.play();
    //executar quando o evento "onended" ativar (quando acaba a musica)
    audioMenu.onended = function() {
        audioMenu.pause();
        playing = false;
    };
}