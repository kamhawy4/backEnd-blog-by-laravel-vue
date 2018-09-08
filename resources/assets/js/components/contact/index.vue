<template>
<div  v-loading="isLoading" >
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-inbox font-dark"></i>
                    <span class="caption-subject bold">Inbox</span>
                </div>  
            </div>
            <flash-message class="myCustomClass"></flash-message>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" >
                    <thead>
                        <tr>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Created </th>
                            <th> Options </th>
                        </tr>
                    </thead>
                    <tbody>

                   
                        <tr v-for="(dataContacts,index) in dataContact" class="odd gradeX">

                            <td >{{dataContacts.name}}</td>
                            <td>
                               {{dataContacts.phone}}
                            </td>
                             <td>
                               {{dataContacts.created_at  | moment("from", "now", true)  }}
                            </td>
                            
                            <td>
                               <div class="col-md-4" >  
                               <a class="btn btn-danger"   href="javascript:;" @click="DeleteData(dataContacts.id,index)"  >delete</a> 
                                </div>
                               

                               <div class="col-md-4">
                                
                                  <router-link  class="btn btn-primary" :to="{name:'showData' , params:{message_id:dataContacts.id }}" > <i class="fa fa-pencil"></i> Show</router-link>

                                </div>
                              
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="pagination" >
                    <button class="btn btn-dafault" @click="fetchPaginate(pagination.prev_page_url)"  :disabled="!pagination.prev_page_url" >Previos</button>
                  <span>  page {{pagination.current_page}} of {{pagination.last_page}} </span>
                    <button class="btn btn-dafault" @click="fetchPaginate(pagination.next_page_url)"  :disabled="!pagination.next_page_url" >Next</button>
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
             dataContact:[],
             isLoading:false,
             url:'/api/dashboard/contact/us',
             pagination:[],
          }
    	},mounted() {
             this.getdata();
        },methods:{
          getdata() {
              let $this = this;
              this.isLoading = true;
			  this.$http.get(this.url).then(response => {
              this.isLoading   = false;
              this.dataContact = response.body.data;
              $this.makepaginate(response.body);
			  }, response => {
              this.isLoading = false;
                 this.flash('Something went wrong', 'error',{timeout:3000});
			  });
			},DeleteData:function(id,index) {
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
                      this.isLoading = true;
                      this.$http.delete('/api/dashboard/contact/us/'+id).then(response => {
                      this.isLoading = false;
                      this.dataContact.splice(index,1);
                      this.$swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      this.flash('Data has been successfully Delete', 'success' ,{timeout:3000});
                      }, response => {
                      this.isLoading = false;
                      this.flash('Something went wrong', 'error',{timeout:3000});
                      });

                  }
                }) 
            },makepaginate(data){
            let pagination = {
                current_page : data.current_page,
                last_page    :  data.last_page,
                next_page_url : data.next_page_url,
                prev_page_url : data.prev_page_url,
            }
            this.pagination = pagination
        },fetchPaginate:function(url) {
            this.url = url;
            this.getdata();
        }
      }
    }
</script>
