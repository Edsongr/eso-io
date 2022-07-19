const socket = io('http://localhost:3000', { transports : ['websocket'] });
  
socket.on('show notify', (data)=> {
    
    var elementExists = document.getElementById("notifyEso");

    const title   = data.title ? `<h3>${data.title} <span onclick="this.parentNode.parentNode.remove()">X</span></h3><hr>` : '<h3><span onclick="this.parentNode.parentNode.remove()">X</span></h3>';

    const message = `<p>${data.message}</p>`;
    const alert   = `<div class="${data.typeAlert} notify-eso">${title} ${message}</div>`;

    if (elementExists)
        elementExists.innerHTML +=  `${alert}`;
    else
        document.body.innerHTML += `<div id='notifyEso'>${alert}</div>`;
})
