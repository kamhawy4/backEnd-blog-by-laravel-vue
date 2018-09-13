'use strict';
const express = require('express');
const http    = require('http');
const socket  = require('socket.io');
const SocketServer = require('./socket');
class Server{
	constructor()
	{
		this.port = 2000;
		this.host = 'localhost';
		this.app = express();
		this.http = http.Server(this.app); // Node Js Server 
		this.socket = socket(this.http);  // Here Run a Socket io Module
	}
	runServer()
	{
		new SocketServer(this.socket).socketConnection(); // This Is socket Class		
			this.socket.on("connection",function(vistor){
			   vistor.on("newMessage",function(data){
			       this.socket.emit("ClientMessage",data);
			   });
			});
		this.http.listen(this.port,this.host,()=>{
			console.log(`the server is runing at http://${this.host}:${this.port}`);
		});
	}
}
const app = new Server();
app.runServer(); // Run The Server Class