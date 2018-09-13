<template>
 <div>
   <div style="text-align: center;" class="panel-heading"> Chat Messages </div>
    <div  class="col-sm-9  frame">
              <ul  class="ul-chat" >

              	<li v-for="message in messages" style="width:100%">
              		<div class="msj macro">
          				<div class="text text-l">
          					<p>{{ message.message }}</p>
          			    </div>
              		</div>
              	</li>
              	
              </ul>
                  
                    <div class="example"  >
                        <input v-model="messageText" @keyup.enter="sendMessage()" type="text" placeholder="Send.." name="search2">
                       <button @click="sendMessage()" type="submit"><i class="fa fa-send"></i></button>
                    </div>                 
          </div>
</div>

</template>

<script>
	var socket = io.connect('http://localhost:2000/');
    export default {
        data() {
        	return{
				messageText:'',
				messages:[],
        	}
        },mounted:function(){
		      socket.on("ClientMessage",function(data){
		      	this.messages.push(data); 
		      }.bind(this));
			},methods:{
				sendMessage:function(){
					var object = 
					{
						"message":this.messageText,
					};
					socket.emit('newMessage',object);
					this.messageText='';
				}
			}
        
    }
</script>

