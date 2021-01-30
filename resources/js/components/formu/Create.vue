<template>
<div class="box">
  <v-form @submit.prevent="create"
  >
    <v-text-field
      v-model="forms.title"
      label="Title"
      type="text"
    ></v-text-field>

    <v-select
          v-model="forms.category_id"
          item-text="name"
          item-value="id"
          :items="categories"
          label="Category"  
          autocomplete
    ></v-select>

    <vue-simplemde v-model="forms.body"/>
    <v-btn
        type="submit"
       color="success"
    >
     Create
    </v-btn>

  </v-form>
</div>
  
</template>
<script>
import VueSimplemde from 'vue-simplemde'

export default {
    name:'Create',
    components: {
      VueSimplemde
    },
    data(){
        return{
            forms:{
               title:null,
               category_id:null,
               body:null  
            },
            categories:{},
            errors:{}
        }
    },
    created(){
        axios.get('/api/categories')
        .then(response=>{
            this.categories=response.data.data
        })
    },
    methods: {
       create(){
            axios.post('/api/question',this.forms)
            .then(response=>{
              this.$router.push(response.data.path)
        }).catch(error=>{
            this.errors=error.response.data.error
        })
       } 
    },
}
</script>
<style scoped>
 @import '~simplemde/dist/simplemde.min.css';
  .box{
    margin:auto;
    width:900px;
}
</style>