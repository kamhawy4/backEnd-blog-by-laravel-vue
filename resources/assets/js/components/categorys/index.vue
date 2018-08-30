<template>
	<div   v-loading="isLoading">
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
		    </div>
		    <div class="modal-body">
		      <form>
		      	<flash-message  class="myCustomClass"></flash-message>
		        <div class="form-group">
		            <input type="text"  v-model="editName" class="form-control" name="catdit"  id="message-text2">
		            <label class="text-danger"  v-if="errors.name" >{{errors.name[0]}}</label>
		        </div>
		          <input type="hidden"  v-model="id" name="idedit"    class="form-control"     id="id-id">
		      </form>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      <button id="save-edit" @click="updateData()" type="button"  class="btn btn-primary" >Edit</button>
		    </div>
		  </div>
		</div>
		</div>


		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-body">
				  <form> 
				    <div class="form-group">
				    <flash-message  class="myCustomClass"></flash-message>
				      <label for="message-text" class="control-label"> Add a new section:</label>
				      <input  v-model="name" class="form-control" name="categray"  id="message-text" type="text" >
				      <label class="text-danger"  v-if="errors.name" >{{errors.name[0]}}</label>
				    </div>
				  </form>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button  @click="AddCategory()" type="button" class="btn btn-primary"    id="send" >Add</button>
				</div>
				</div>
			</div>
		</div>


<div class="row">
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
     <div class="portlet-title">
         <div class="caption font-dark">
             <i class="fa fa-tags  font-dark"></i>
             <span class="caption-subject bold   ">Categories table</span>
     </div>
         </div>  
		    <div class="portlet-body">
		        <div class="table-toolbar">
		            <div class="row">
		                <div class="col-md-6">
		                   <button data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary"  type="button">Add a new Categories</button>
		                </div>
		            </div>
		        </div>
		         <flash-message class="myCustomClass"></flash-message>
		        <table  class="table table-striped table-bordered table-hover table-checkable order-column" >
		            <thead>
		                <tr>
		                    <th> Category </th>
		                    <th> Options </th>
		                </tr>
		            </thead>
		            <tbody  class="alldata">
		            
		                <tr  v-for='(category , index) in categorys' id="tr-type" class="odd gradeX">
		                    <td> 
		                       {{category.name}}
		                    </td>
		                    <td>

		                        <a  @click="EditUser(category.name,category.id,index)"  class="btn btn-primary edit-items"  data-toggle="modal" data-target="#exampleModal2">
		                          <i class="fa fa-pencil"></i> Edit </a>

		                          <a class="btn btn-danger"  @click="DeleteUser(category.id,index)"  data-target="#exampleModal2">
		                          <i class="fa fa-trash"></i> Delete </a>
		                      
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
  </div>
  </div>
</div>
</template>

<script>
    export default {
    	data(){
    		return {
              categorys:[],
              name:'',
              editName:'',
              id:'',
              errors:[],
              isLoading:false,
              url:'/api/categorys',
              pagination:[],
              editindex:'',
    		}
    	},
        mounted() {
            this.GetData();
        },methods:{
        	GetData:function(){
        	  this.isLoading = true;
        	  let $this = this
			  this.$http.get(this.url).then(response => {
			  this.isLoading = false;
			  this.categorys = response.data.data;
			  $this.makePagination(response.data);
			  }, response => {
			   this.flash('Something went wrong', 'error',{timeout:3000});
			  });
			},
			AddCategory:function() {
				this.isLoading = true;
			    this.$http.post('/api/categorys',{name:this.name}).then(response => {
			    this.categorys.push({"name":this.name});
			  	this.isLoading = false;
			  	this.name   = '',
			  	this.errors = '',
                this.flash('Data has been successfully send', 'success' ,{timeout:3000});
			  }, response => {
			  	if(response.status == 422){
                   this.errors = response.data.errors
			  	}
			   this.isLoading = false;
               this.flash('Something went wrong', 'error',{timeout:3000}); 
			  });
			},EditUser:function (name,id,index) {
				this.editName    = name;
				this.id          = id;
				this.editindex   = index;
			},updateData:function() {
				this.isLoading = true;
			    this.$http.put('/api/categorys/'+this.id,{name:this.editName}).then(response => {
			    this.categorys[this.editindex].name = this.editName;
			  	this.isLoading = false;
			  	this.errors = '',
                this.flash('Data has been successfully send', 'success' ,{timeout:3000});
			  }, response => {
			  	if(response.status == 422){
                   this.errors = response.data.errors
			  	}
			   this.isLoading = false;
               this.flash('Something went wrong', 'error',{timeout:3000}); 
			  });
			},
			DeleteUser:function(id,index){

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
					    this.$http.delete('/api/categorys/'+id).then(response => {
					    this.categorys.splice(index,1);	
	                    this.$swal(
	                      'Deleted!',
	                      'Your file has been deleted.',
	                      'success'
	                    )
					  	this.flash('Data has been successfully Delete', 'success' ,{timeout:3000});
					  }, response => {
					   this.flash('Something went wrong', 'error',{timeout:3000});
					  });

                  }
                }) 
				
			},
			makePagination(data){
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
