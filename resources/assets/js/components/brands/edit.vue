<template>
    <div  v-loading="isLoading" >
	<div class="panel panel-default">
	  <div style="text-align: center;" class="panel-heading">Add New Brands</div>
    <router-link style="margin-top: 20px"  to="/dashboard/brands" class="btn btn-primary" >Show Brands</router-link>
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
    		  		<img style="margin-bottom: 10px;" v-bind:src="'/uploads/photo/'+photo">
                    <input type="file" class="form-control" ref="photo" id="photo" placeholder="photo" >
                    <label class="text-danger"  v-if="errors.photo" >{{errors.photo[0]}}</label>
    		  	</div>


            <button  @click="UpdateData()" type="submit"  class="btn btn-primary">Save</button>

    </div>    
</template>


<script>


export default {
  props:['brands_id'],
  data() {
    return {
      isLoading:false,
      errors:[],
      name: '',
      url: '',
      photo:'',
    };
  },mounted(){
   this.GetDat();
  },methods: {
   GetDat:function(){
    this.$http.get('/api/dashboard/brands/'+this.brands_id).then(response => {
      var brands          = response.body;
			this.name           = brands.name
			this.url            = brands.url
			this.photo          = brands.image
        }, response => {
          this.flash('Something went wrong', 'error',{timeout:3000});
        });
    },
  	UpdateData:function() {
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
		        this.$http.post('/api/dashboard/editbrands/'+this.brands_id,formData).then(response => {
		       	this.isLoading      = false;
		       	this.errors         = '';
            var brands          = response.body;
		       	this.photo          = brands.image
		        this.flash('Data has been successfully Send', 'success' ,{timeout:3000});
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
