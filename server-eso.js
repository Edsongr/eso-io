const app = require('express')();
const http = require('http').createServer(app);
const bparser = require('body-parser');
const io = require('socket.io')(http);

app.use(bparser.urlencoded({ extended:false }));

app.post('/', function(req, res)
{
    const data = req.body;
    
    io.emit('show notify', data);
    
    res.send({success:true, message:'Mensagem recebida com sucesso!'});
});

http.listen(3000, function()
{
    console.log("Listening :3000");
});

