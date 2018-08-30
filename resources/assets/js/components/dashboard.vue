<template>
<div  v-loading="isLoading" >

<flash-message  class="myCustomClass"></flash-message>

  <div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    <div class="dashboard-stat2 ">
	        <div class="display">
	            <div class="number">
	                <h3 class="font-purple-soft">
	                    <span data-counter="counterup" :data-value="users">{{users}}</span>
	                </h3>
	                <small>Number of Users</small>
	            </div>
	            <div class="icon">
	                <i class="fa fa-user"></i>
	            </div>
	        </div>
	        <div class="progress-info">
	            <div class="progress">
	                <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
	                    <span class="sr-only">Number of Users</span>
	                </span>
	            </div>
	            <div class="status">
	                <router-link style="text-decoration:none;color: #8877a9;" to="dashboard/users" >More</router-link>
	            </div>
	        </div>
	    </div>
	</div>




	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    <div class="dashboard-stat2 ">
	        <div class="display">
	            <div class="number">
	                <h3 class="font-blue-sharp">
	                    <span data-counter="counterup" :data-value="categories">{{categories}}</span>
	                </h3>
	                <small>Number of Categories</small>
	            </div>
	            <div class="icon">
	                <i class="fa fa-tag"></i>
	            </div>
	        </div>
	        <div class="progress-info">
	            <div class="progress">
	                <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
	                    <span class="sr-only">Number of Categories</span>
	                </span>
	            </div>
	            <div class="status">
	                <router-link style="text-decoration:none;color: #5c9bd1;" to="dashboard/categorys" >More</router-link>

	            </div>
	        </div>
	    </div>
	</div>
	

	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    <div class="dashboard-stat2 ">
	        <div class="display">
	            <div class="number">
	                <h3 class="font-red-haze">
	                    <span data-counter="counterup" :data-value="article">{{article}}</span>
	                </h3>
	                <small>Number of Articles</small>
	            </div>
	            <div class="icon">
	                <i class="fa fa-newspaper-o"></i>
	            </div>
	        </div>
	         <div class="progress-info">
	            <div class="progress">
	                 <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
	                     <span class="sr-only">Number of Articles</span>
	                </span>
	            </div>
	            <div class="status">
	                <router-link style="text-decoration:none;color: #f36a5a;" to="dashboard/articles" >More</router-link>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    <div class="dashboard-stat2 ">
	        <div class="display">
	            <div class="number">
	                <h3 class="font-blue-sharp">
	                    <span data-counter="counterup" :data-value="subscribe">{{subscribe}}</span>
	                </h3>
	                <small>Number of Subscribes</small>
	            </div>
	            <div class="icon">
	                <i class="fa fa-thumbs-o-up"></i>
	            </div>
	        </div>
	        <div class="progress-info">
	            <div class="progress">
	                <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
	                    <span class="sr-only">Number of Subscribes</span>
	                </span>
	            </div>
	            <div class="status">
	            	 <router-link style="text-decoration:none;color: #5c9bd1;" to="dashboard/subscribe" >More</router-link>
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
		       	  users:'',
		       	  article:'',
		       	  subscribe:'',
		       	  categories:'',
		          isLoading:false,
		       }
		     },mounted(){
               this.getdata();
		     },methods:{
		     	getdata:function() {
					  this.isLoading = true;
					  this.$http.get('/api/dashboard').then(response => {
					    var data           = response.body;
					    this.users         = data.users;
					    this.article       = data.article;
					    this.subscribe     = data.subscribe;
					    this.categories    = data.categories;
					    this.isLoading     = false;
					  }, response => {
					    this.flash('Something went wrong', 'error',{timeout:3000});
					  });
					}
		     }
		 }
</script>
