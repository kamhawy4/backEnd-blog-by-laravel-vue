<template>
    <div  v-loading="isLoading" >
	<div class="panel panel-default">
	  <div style="text-align: center;" class="panel-heading">Add New Brands</div>
    <router-link style="margin-top: 20px"  to="/dashboard/brands" class="btn btn-primary" >Show Articles</router-link>
	</div>
        <flash-message class="myCustomClass"></flash-message>
            <div class="form-group">
                <label for="name">Brand Name</label>
                <input v-model="name" type="text" class="form-control" id="name" placeholder="Brands Name">
                <label class="text-danger"  v-if="errors.name" >{{errors.name[0]}}</label>
            </div>


            <div class="form-group">
                <label for="url">Brand Url</label>
                <input v-model="url" type="text" class="form-control" id="url" placeholder="Url Brands">
                <label class="text-danger"  v-if="errors.url" >{{errors.url[0]}}</label>
            </div>


		  	<div style="margin-top: 10px;"  class="form-group">
		  		<label for="photo">image</label>
                <input type="file" class="form-control" ref="photo" id="photo" placeholder="photo" >
                <label class="text-danger"  v-if="errors.photo" >{{errors.photo[0]}}</label>
		  	</div>


            <button  @click="StoreData()" type="submit"  class="btn btn-primary">Save</button>

    </div>    
</template>

<script>


export default {

  data() {
    return {
      isLoading:false,
      errors:[],
      name: '',
      url: '',
      photo:'',
    };
  },mounted(){
   this.GetDatCategorys();
  },methods: {
  	StoreData:function() {
  		        this.isLoading = true;
				var formData =  new FormData();

                if(this.$refs.photo.files[0] != undefined)
                {
					formData.append(
					   "photo",this.$refs.photo.files[0]
					);
			    }
				formData.append("name",this.name);
				formData.append("url",this.url);
		        this.$http.post('/api/dashboard/brands',formData).then(response => {
		       	this.isLoading   = false;
		       	this.errors      = '';
		        this.flash('Data has been successfully Send', 'success' ,{timeout:3000});
				this.url  = '';
				this.name = '';
		  }, response => {
		  	 if(response.status == 422){
                this.errors = response.data.errors
			 }
			 this.isLoading   = false;
		    this.flash('Something went wrong', 'error',{timeout:3000});
		  });
  	},onBlur(editor) {
      console.log(editor);
    },
    onFocus(editor) {
      console.log(editor);
    }
  }
};
</script>
