<template>
 <div v-loading="isLoading" >
   <div style="text-align: center;" class="panel-heading"> Chat Messages </div>
    <div  class="col-sm-9  frame">
              <ul  class="ul-chat" >

              	<li v-for="message in messages" style="width:100%">
              		 <div v-bind:class="message.name === usersname ? 'auth ' : ''"  class="msj macro">
          				  <div class="text text-l">
          					<p> <span  style="color:#504949;font-size: 15px;font-family: cursive;" >{{ message.name }} :</span>    {{ message.message }}</p>
          			    </div>
              		 </div>
              	</li>
              	
              </ul>
              <div class="example">
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
          isLoading:false,
          usersname:'',
          usersname_id:'',
        	}
        },mounted:function(){
		      socket.on("ClientMessage",function(data){
		      	this.messages.push(data); 
		      }.bind(this));
          this.getdata();
			},methods:{         
         getdata:function(){
            this.$http.get('/api/dashboard/chat').then(response => {
            var data           = response.body;
            this.usersname     = data.name;
            this.usersname_id  = data.id;
          }, response => {
            this.flash('Something went wrong', 'error',{timeout:3000});
          });
         },
         sendMessage:function(){
					var object = 
					{
            "message":this.messageText,
            "name":this.usersname,
						"name_id":this.usersname_id,
					};
					socket.emit('newMessage',object);
					this.messageText='';

				}
			}
        
    }
</script>

