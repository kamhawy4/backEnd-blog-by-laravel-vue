<template>
 <div  v-loading="isLoading" >
  						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  						  <div class="modal-dialog" role="document">
  						    <div class="modal-content">
  						      <div class="modal-body">
  						        <span class="namesite hidden" >blog</span>
  						          <div class="form-group">
  						            <label for="recipient-name" class="control-label">Title:</label>
  						            <input type="text" name="subject"   class="form-control subject" id="recipient-name">
  						          </div>
  						          <div class="form-group">
  						            <label for="message-text" class="control-label">Message:</label>
  						            <textarea class="form-control" name="desc_message"  id="message-text"></textarea>
  						          </div>
  						      </div>
  						      <div class="modal-footer">
  						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  						        <button type="button" class="btn btn-primary"    id="send" data-dismiss="modal">Send</button>
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
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold">Subscribers</span>
                            </div>  
                        </div>
                     <p id="msg" style="padding: 20px;display: none;" class="bg-success" >sent succesfully</p>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                      <button data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary"  type="button">Sending messages</button>
                                    </div>
                                    
                                </div>
                            </div>
                            <flash-message class="myCustomClass"></flash-message>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                              
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                              </label>
                                          </th>

                                        <th> Email </th>
                                        <th> Date </th>
                                       <th> Options </th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr v-for="(dataSubscribes,index) in dataSubscribe" class="odd gradeX">
                                      <td>
                                      <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                          <input type="checkbox" class="checkboxes" value="1" />
                                          <span></span>
                                      </label>
                                      </td>

                                        <td>{{dataSubscribes.email}}</td>
                                        <td>
                                           {{dataSubscribes.created_at | moment("from", "now", true) }}
                                        </td>
                                        
                                         <td>
                														<div class="col-md-4" >  
                														<a class="btn btn-danger"   href="javascript:;" @click="DeleteData(dataSubscribes.id,index)"  >delete</a> 
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
             dataSubscribe:[],
             isLoading:false,
             url:'/api/subscribe',
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
              this.dataSubscribe = response.body.data;
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
                    this.$http.delete('/api/subscribe/'+id).then(response => {
                    this.isLoading = false;
                    this.dataSubscribe.splice(index,1);
                    this.flash('Data has been successfully Delete', 'success' ,{timeout:3000});
                      this.$swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
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