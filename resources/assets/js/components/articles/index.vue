<template>
<div  v-loading="isLoading" >
    <h2>Articles listing</h2>
    <router-link to="articles/create" class="btn btn-success ">Add New Article</router-link>
	<flash-message style="margin-top: 20px" class="myCustomClass"></flash-message>
    <table style="margin-top: 20px"  class="table table-striped table-bordered table-hover table-checkable order-column" >
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>type</th>
                <th>Categorie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr  v-for="(article,index) in articles" >
                <td>{{article.id}}</td>
                <td>{{article.title}}</td>
                <td>{{article.author}}</td>
                <td>{{article.type}}</tds>
                <td>{{article.get_name_categorie.name}}</td>
                <td>
                   <router-link  class="btn btn-primary" :to="{name:'ediarticle' , params:{article_id:article.id }}" > <i class="fa fa-pencil"></i> Edit</router-link>
                    <a class="btn btn-danger" href="javascript:;"  @click="DeleteArticle(article.id,index)" >Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

    <div  class="pagination">
    	<button  class="btn btn-default" @click="fetchPaginate(pagination.prev_page_url)" 
    	:disabled="!pagination.prev_page_url" >Previos</button>
    	<span> page {{pagination.current_page}} of {{pagination.last_page}}</span>
    	<button  class="btn btn-default" @click="fetchPaginate(pagination.next_page_url)" 
    	:disabled="!pagination.next_page_url" >Next</button>
    	
    </div>

</div>
</template>

<script>
export default {
    data(){
    	return {
         articles:[],
         isLoading:false,
         url:'/api/articles',
         pagination:[],
    	}
      },mounted(){
          this.getArticles();
      },methods:{
      	getArticles(){
      	  let $this = this;
      	  this.isLoading = true;
		  this.$http.get(this.url).then(response => {
		  this.isLoading = false;
		  this.articles = response.body.data;
		  console.log(this.articles[0].get_name_categorie.name);
		  $this.makepaginate(response.body);
		  }, response => {
       this.isLoading = false;
			 this.flash('Something went wrong', 'error',{timeout:3000});
		  });
		},
		DeleteArticle:function(id,index) {

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
                			  this.$http.delete('/api/articles/'+id).then(response => {
                			  this.isLoading = false;
                		      this.articles.splice(index,1);
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
                
		},makepaginate:function(data) {
			let pagination = {
			   current_page : data.current_page,
			   last_page    :  data.last_page,
			   next_page_url : data.next_page_url,
			   prev_page_url : data.prev_page_url,
			}
			this.pagination = pagination
		},
		fetchPaginate:function(url) {
			this.url = url
			this.getArticles()
		}
      }
    }
</script>
