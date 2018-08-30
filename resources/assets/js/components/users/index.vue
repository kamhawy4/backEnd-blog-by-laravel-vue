<template>
  <div v-loading="isLoading"  >
<div class="row">
   <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered">
         <div class="portlet-title">
             <div class="caption font-dark">
                 <i class="fa fa-users font-dark"></i>
                 <span class="caption-subject bold   ">Table of Users</span>
             </div>  
         </div>

         <flash-message  class="myCustomClass"></flash-message>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <router-link to="/dashboard/users/create" class="btn btn-primary">Add New Users</router-link>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" >
                <thead>
                    <tr>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Options </th>
                    </tr>
                </thead>
                <tbody>
               
                    <tr class="odd gradeX"  v-for='(user,index) in users' >
                        <td> 
                            {{user.name}}
                        </td>
                        <td>
                            {{user.email}}
                        </td>
                        <td>
                            {{user.phone}}
                        </td>
                        <td>
                          <router-link class="btn btn-primary" :to="{ name: 'edituser', params: { user_id: user.id }}"> <i class="fa fa-pencil"></i> Edit</router-link>

                        <a class="btn btn-danger"  href="javascript:;"  @click="deleteUser(user.id,index)" >
                        <i class="fa fa-trash-o"></i> Delete </a>
                          
                        </td>
                    </tr>
                </tbody>
            </table>
             <div class="pagination" >
              <button class="btn btn-default" v-on:click="ftechPagination(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">previos</button>
              <span> page {{pagination.current_page}} of {{pagination.last_page}} </span>
              <button class="btn btn-default" v-on:click="ftechPagination(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button>
             </div>
        </div>

     </div>
    <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
</div>
</template>

<script>
    export default {
      data(){
       return {
           users:[],
           isLoading:false,
           url:'/api/users',
           pagination:[],
       }
      },mounted() {
           this.GetData();
      },methods:{
          GetData:function(){
             this.isLoading = true;
              let $this = this
              this.$http.get(this.url).then(response => {
              this.isLoading = false;
              this.users = response.data.data;
              $this.makePagination(response.data);
              }, response => {
                 this.flash('Something went wrong', 'error',{timeout:3000});
              });
            },deleteUser:function(id,index){

                this.$swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {

                     this.$http.delete('/api/users/'+id).then(response => {
                     this.users.splice(index,1);
                     this.flash('Data has been successfully Delete', 'success' ,{timeout:3000});
                     this.$swal(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                     )

                     }, response => {
                        this.flash('Something went wrong', 'error',{timeout:3000});
                    });



                  }
                }) 
                
            },makePagination(data){
              let pagination  = {
                current_page  : data.current_page,
                last_page     : data.last_page,
                next_page_url : data.next_page_url,
                prev_page_url : data.prev_page_url,
               }
               this.pagination = pagination
              },ftechPagination(url){
                  console.log(url);
                       this.url = url
                       this.GetData()
              }
        }
    }
</script>
