var express     = require('express');
var socket      = require('socket.io');
var application = express();

var server      = application.listen('2000',function(){
	console.log('im here');
});

application.use(express.static('public_html'));

var sio = socket(server);

sio.on("connection",function(vistor){
   vistor.on("newMessage",function(data){
       sio.emit("ClientMessage",data);
   });
});