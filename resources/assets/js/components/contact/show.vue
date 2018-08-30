<template>
	<div v-loading="isLoading" >
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="row">
            <div class="col-md-12 col-sm-12">
                        <div class="portlet blue-hoki box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-inbox"></i>{{name}}</div>
                                <div class="actions">
                                    <a onclick="window.print();" href="javascript:;" class="btn btn-default btn-sm">
                                        <i  class="fa fa-pencil"></i> print </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Email: </div>
                                    <div class="col-md-7 value"> {{email}} </div>
                                </div>
                                
                                  <div class="row static-info">
                                    <div class="col-md-5 name"> Phone: </div>
                                    <div class="col-md-7 value"> {{phone}} </div>
                                </div>
                                
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Date: </div>
                                    <div class="col-md-7 value"> {{created_at  | moment("from", "now", true)  }} </div>
                                </div>
                                
                               <div class="row static-info">
                                    <div class="col-md-5 name"> Subject: </div>
                                    <div class="col-md-7 value"> {{subject}} </div>
                                </div>

                                <div class="row static-info">
                                    <div class="col-md-5 name"> Message content: </div>
                                    <div class="col-md-7 value"> {{message}} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
           </div>
        </div>
       </div>
</template>

<script>
    export default {
    	props:['message_id'],
    	data(){
         return {
         	 isLoading:false,
         	 name:'',
         	 phone:'',
         	 email:'',
         	 subject:'',
         	 message:'',
         	 created_at:'',
         }
    	},mounted() {
            this.getData();
        },methods:{
          getData:function(){
			  this.isLoading = true;
			  this.$http.get('/api/contact/us/'+this.message_id).then(response => {
			    var data      = response.body;
			    console.log(response.body);
				this.name     = data.name
				this.email    = data.email
				this.phone    = data.phone
				this.subject  = data.subject
				this.message    = data.message
				this.created_at  = data.created_at
			    this.isLoading = false
			  }, response => {
                  this.flash('Something went wrong', 'error',{timeout:3000});
			  });
			}
        }
    }
</script>
