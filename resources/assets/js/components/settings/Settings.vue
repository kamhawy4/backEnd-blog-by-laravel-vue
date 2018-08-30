<template>
 <div v-loading="isLoading" >

	<div class="panel panel-default">
	    <div style="text-align: center;"   class="panel-heading">Settings</div>
	</div>
   <flash-message class="myCustomClass"></flash-message>
	<form   v-on:submit.prevent="UpdateSettings()"  class="form-inline" enctype="multipart/form-data">
		<section  class="col-md-12" >
			  <div  class="form-group col-md-4">
			    <label for="exampleInputName2">Name Site</label>
			    <br>
			    <input type="text" class="form-control" name="name_site" id="exampleInputName2" placeholder="Name Site"  v-model="name_site">
			    <label style="color: red"  v-if="errors.name_site" class="error" >{{errors.name_site[0]}}</label>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="exampleInputEmail2">Email</label>
                 <br>
			    <input type="text" class="form-control" v-model="email" name="email" id="exampleInputEmail2" placeholder="jane.doe@example.com">
			    <label style="color: red"  v-if="errors.email" class="error" >{{errors.email[0]}}</label>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="phone">Phone</label>
			    <br>
			    <input type="phone" name="phone" v-model="phone" class="form-control" id="phone" placeholder="Phone">
			    <label style="color: red"  v-if="errors.phone" class="error" >{{errors.phone[0]}}</label>
			  </div>
		  </section>
		  <section  style="margin-top: 20px" class="col-md-12" >
		  	<div class="form-group col-md-4" >
		  		<label for="address">Address</label>
		  		<br>
		  		<textarea rows="7"	name="address"  v-model="address" class="form-control" placeholder="Address" id="address" ></textarea>
		  		 <label style="color: red"  v-if="errors.address" class="error" >{{errors.address[0]}}</label>
		  	</div>
		  	<div class="form-group col-md-4" >
		  		<label for="brief_site">Brief Site</label>
		  		<br>
		  		<textarea rows="7" name="brief_site" v-model="brief_site" class="form-control" placeholder="Brief Site" id="brief_site" ></textarea>
		  		<label style="color: red"  v-if="errors.brief_site" class="error" >{{errors.brief_site[0]}}</label>
		  	</div>
		  	<div class="form-group col-md-4" >
		  		<label for="file">Logo</label>
		  		<br>
		  		<img style="width: 291px;height: 104px;margin-bottom: 10px;" v-bind:src="'/uploads/logo/'+logo">
		  		<input type="file"  name="file" ref="avatar" class="form-control" id="file" placeholder="Logo">
		  		<label style="color: red"  v-if="errors.avatar" class="error" >{{errors.avatar[0]}}</label>
		  	</div>
		  </section>
		  <section  style="margin-top: 20px" class="col-md-12" >
		  	<div class="form-group col-md-4" >
		  		<label for="meta_keywords">Meta keywords</label>
		  		<br>
		  		<textarea rows="7" v-model="meta_keywords"	name="meta_keywords"  class="form-control" placeholder="Meta keywords" id="meta_keywords" ></textarea>
		  		<label style="color: red"  v-if="errors.meta_keywords" class="error" >{{errors.meta_keywords[0]}}</label>
		  	</div>
		  	<div class="form-group col-md-4" >
		  		<label for="meta_description">Meta Description</label>
		  		<br>
		  		<textarea v-model="meta_description" name="meta_description" rows="7" class="form-control" placeholder="Meta Description" id="meta_description" ></textarea>
		  		<label style="color: red"  v-if="errors.meta_description" class="error" >{{errors.meta_description[0]}}</label>
		  	</div>
		  	 <div class="form-group col-md-4" >
		  		<label for="file">fav</label>
		  		<br>
		  		<img style="width: 34px;height: 41px;margin-bottom: 71px;" v-bind:src="'/uploads/fav/'+fav">
		  		<input type="file"  name="file" ref="fav" class="form-control" id="file" placeholder="fav">
		  		<label style="color: red"  v-if="errors.favicone" class="error" >{{errors.favicone[0]}}</label>
		  	</div>
		  </section>
		  

	   <button style="margin-top:20px;margin-right: 35%; " type="submit" class="btn btn-primiry">Send invitation</button>
	</form>
</div>      
</template>

<script>
 
    export default {
        data(){
        	return{
        	   id_settings:'',
               name_site:'',
               logo:'',
               fav:'',
               email:'',
               phone:'',
               address:'',
               brief_site:'',
               meta_keywords:'',
               meta_description:'',
               avatar:"",
               errors:[],
               isLoading:false,
        	}
        },mounted(){
			this.getData();
        },methods:{
	    	getData:function() {
	    	  this.isLoading = true;
			  this.$http.get('/api/get/settings').then(response => {
			  this.isLoading = false;
				var settings   = response.data;
				this.id_settings = settings.id
				this.name_site = settings.name_site
				this.email = settings.email
				this.phone = settings.phone
				this.address = settings.address
				this.brief_site = settings.brief_site
				this.meta_keywords = settings.meta_keywords
				this.meta_description = settings.meta_description
				this.logo = settings.logo
				this.fav = settings.fav
				}, response => {
				 this.flash('Something went wrong', 'error',{timeout:3000});	
				});
			},
           UpdateSettings:function(){
           	this.isLoading = true;
				var formData =  new FormData();
                if(this.$refs.avatar.files[0] != undefined)
                {
					formData.append(
					   "avatar",this.$refs.avatar.files[0]
					);
			    }

			    if(this.$refs.fav.files[0] != undefined)
                {
				  formData.append(
					   "favicone",this.$refs.fav.files[0]
				   );
                }


				formData.append("name_site",this.name_site);
				formData.append("email",this.email);
				formData.append("phone",this.phone);
				formData.append("address",this.address);
				formData.append("brief_site",this.brief_site);
				formData.append("meta_keywords",this.meta_keywords);
				formData.append("meta_description",this.meta_description);

				this.$http.post('/api/store/settings/'+this.id_settings,formData).then(response => {
			    this.isLoading = false;
				this.logo = response.data.logo;
				this.fav  = response.data.fav;
				this.errors = '';
				this.reset();
				this.flash('Data has been successfully updated', 'success',{timeout:3000});
				}, response => {
					if(response.status  == 422){
					   this.errors = response.data.errors
					}
				  this.flash('Something went wrong', 'error',{timeout:3000});
                 this.isLoading = false;
				});
			},
			reset() {
			 const input = this.$refs.avatar
			 input.type = 'text'	
			 input.type = 'file'

			 const fav = this.$refs.fav
			 fav.type = 'text'	
			 fav.type = 'file'
			}
        }
    }
</script>
