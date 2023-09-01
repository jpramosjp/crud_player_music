
var audio = new Audio();
var isPlaying = false;
let progressBar = document.getElementsByClassName("progress")[0];
function audioPlayer(acao = 1) 
{
    if(acao == 1) {
        audio.play();

        isPlaying = true;
        $("#play").css("display", "none");
        $("#pause").css("display", "block");
        return;
    }
    audio.pause();
    isPlaying = false;
    $("#play").css("display", "block");
    $("#pause").css("display", "none");

    
}



audio.addEventListener("timeupdate", function() {
    if (isPlaying) {
      let progress = (audio.currentTime / audio.duration) * 100;
      progressBar.style.width = progress + "%";
    }
  });


function defineMusica(audioname) {
    let codigo = audioname.split("/")[1];


    var backgroundValor = $('#img_' + codigo).css('background-image');

    $('#img_div').css('background-image', backgroundValor);


    audio.src = audioname;
    audioPlayer(1);
}

function alteraVolume(objeto) {
  audio.volume = ($(objeto).val())/100;
}