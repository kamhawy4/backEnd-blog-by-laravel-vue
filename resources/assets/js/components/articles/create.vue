<template>
    <div  v-loading="isLoading" >
	<div class="panel panel-default">
	  <div style="text-align: center;" class="panel-heading">Add New Article</div>
    <router-link style="margin-top: 20px"  to="/dashboard/articles" class="btn btn-primary" >Show Articles</router-link>
	</div>
        <flash-message class="myCustomClass"></flash-message>
            <div class="form-group">
                <label for="title">Title</label>
                <input v-model="title" type="text" class="form-control" id="title" placeholder="Title">
                <label class="text-danger"  v-if="errors.title" >{{errors.title[0]}}</label>
            </div>

            <div class="form-group" >
	            <label for="title">Categorie</label>
	            <select   v-model="categorie" class="form-control" >
	            	<option v-for="category in categorys" :value="category.id" >{{category.name}}</option>
	            </select>  
	            <label class="text-danger"  v-if="errors.category" >{{errors.category[0]}}</label>
            </div>
            
            <div class="form-group" >
	            <label  for="title">Status</label>
	            <select v-model="type" class="form-control" >
	            	<option  value="active" >Active</option>
	            	<option  value="unactive" >UnActive</option>
	            </select>    
	            <label class="text-danger"  v-if="errors.type" >{{errors.type[0]}}</label>
            </div>
             
             <div>
               <label for="image">Description</label>
		  	   <vue-ckeditor  v-model="description" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" />
		  	     <label class="text-danger"  v-if="errors.description" >{{errors.description[0]}}</label>
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

import VueCkeditor from 'vue-ckeditor2';

export default {

  components: { VueCkeditor },
  data() {
    return {
      isLoading:false,
      categorys:[],
      errors:[],
      title: '',
      categorie: '',
      type: '',
      description: '',
      photo:'',
      config: {
        toolbar: [
			  'Format',
			  ['Bold', 'Italic', 'Strike', 'Underline'],
			  ['BulletedList', 'NumberedList', 'Blockquote'],
			  ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
			  ['Link', 'Unlink'],
			  ['FontSize', 'TextColor'],
			  ['Image'],
			  ['Undo', 'Redo'],
			  ['Source', 'Maximize']
			],
        height: 200
      }
    };
  },mounted(){
   this.GetDatCategorys();
  },methods: {
	GetDatCategorys:function(){
	  this.$http.get('/api/dashboard/allcategory/artical').then(response => {
	  this.categorys = response.data;
	  }, response => {
	   this.flash('Something went wrong', 'error',{timeout:3000});
	  });
	},
  	StoreData:function() {
  		        this.isLoading = true;
				var formData =  new FormData();

                if(this.$refs.photo.files[0] != undefined)
                {
					formData.append(
					   "photo",this.$refs.photo.files[0]
					);
			    }
				formData.append("title",this.title);
				formData.append("categorie_id",this.categorie);
				formData.append("type",this.type);
				formData.append("description",this.description);
		        this.$http.post('/api/dashboard/articles',formData).then(response => {
		       	this.isLoading   = false;
		       	this.errors      = '';
		        this.flash('Data has been successfully Send', 'success' ,{timeout:3000});
				this.title       = '';
				this.categorie   = '';
				this.type        = '';
				this.description = '';
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
