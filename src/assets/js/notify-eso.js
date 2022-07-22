const BASEURLNOTIFY = "http://localhost/eso-io/";


const socket = io('http://localhost:3000', { transports : ['websocket'] });
  
socket.on('show notify', (data)=> {
    
    var elementExists = document.getElementById("notifyEso");

    const title   = data.title ? `<h3>${data.title} <span onclick="this.parentNode.parentNode.remove()">X</span></h3><hr>` : '<h3><span onclick="this.parentNode.parentNode.remove()">X</span></h3>';
    const pulse = data.pulse && data.pulse == 1 ? 'pulse-eso' : '';
    const song  = data.shootSound && data.shootSound == 1 ? true : false;

    const message = `<p>${data.message}</p>`;
    const alert   = `<div class="${data.typeAlert} notify-eso ${pulse}">${title} ${message}</div>`;

    if (elementExists)
        elementExists.innerHTML +=  `${alert}`;
    else
        document.body.innerHTML += `<div id='notifyEso'>${alert}</div>`;

    /**
     * Se for para disparar audio
     */
    if (song){

        var alertSound = 'src/assets/songs/infos.wav';

        if(data.typeAlert == "SUCCESS-ESO") alertSound = 'src/assets/songs/success.wav';
        if(data.typeAlert == "WARNING-ESO") alertSound = 'src/assets/songs/warning.wav';
        if(data.typeAlert == "DANGER-ESO") alertSound = 'src/assets/songs/danger.wav';

        var audio = new Audio( BASEURLNOTIFY  + alertSound);
        audio.play();
    }

})
