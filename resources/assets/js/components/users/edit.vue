<template>
    <div v-loading="isLoading"  >
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" fa fa-users font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Edit  Users</span>
                        </div>
                        <router-link to="/dashboard/users" class="btn btn-primary pull-right">All Users</router-link>
                    </div>

                            <flash-message  class="myCustomClass"></flash-message>
                            <div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input v-model="name" type="text" class="form-control" name="name" id="form_control_1">
                                    <label for="form_control_1">Name</label>
                                <small class="text-danger"  v-if="errors.name" >{{errors.name[0]}}</small>
                                </div>
                             </div>

                            <div >
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input v-model="email" type="email" class="form-control" name="email" id="form_control_1">
                                    <label for="form_control_1">Email</label>
                                <small class="text-danger"  v-if="errors.email" >{{errors.email[0]}}</small>
                                </div>
                             </div>

                            <div  >
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input v-model="password" type="password" class="form-control" name="password" id="form_control_1">
                                    <label  for="form_control_1">Password</label>
                                <small class="text-danger"  v-if="errors.password" >{{errors.password[0]}}</small>
                                </div>
                             </div>

                            <div  >
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input v-model="phone" type="text" class="form-control" name="phone" id="form_control_1">
                                    <label for="form_control_1">Phone</label>
                                <small class="text-danger"  v-if="errors.phone" >{{errors.phone[0]}}</small>
                                </div>
                             </div>

                            <div style="margin-bottom: 20px" class="text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button v-on:click="UpdateData()" class="btn default">Edit Users</button>
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
    props:['user_id'],
   data(){
    return {
         name:'',
         email:'',
         password:'',
         phone:'',
         errors:[],
         isLoading:false,

    }
   },mounted(){
    this.getData();
   },methods:{
           getData:function() {
                this.$http.get('/api/dashboard/users/'+this.user_id).then(response => {
                 var users     = response.body;
                 this.name     = users.name
                 this.email    = users.email
                 this.password = users.password
                 this.phone    = users.phone
                 console.log(response.body);
                }, response => {
                  this.flash('Something went wrong', 'error',{timeout:3000});
                });
            },
           UpdateData:function(){
            this.isLoading = true;

            this.$http.put('/api/dashboard/users/'+this.user_id,{
             name:this.name,
             email:this.email,
             password:this.password,
             phone:this.phone,
           }).then(response => {
            this.errors    = '';
            this.flash('Data has been successfully send', 'success' ,{timeout:3000});
             this.isLoading = false;
            
            }, response => {
             if(response.status  == 422){
               this.errors = response.data.errors
             }   
             this.flash('Something went wrong', 'error',{timeout:3000});
             this.isLoading = false;
            });
        } 
    }
}
</script>
