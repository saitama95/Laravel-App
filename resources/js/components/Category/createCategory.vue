<template>
    <div class="box">
        <v-form @submit.prevent="addCreate">
             <v-text-field
                v-model="forms.name"
                label="Title"
                type="text"
             ></v-text-field>

             <v-btn type="submit" color="success" v-if="editslug">Update</v-btn>
             <v-btn type="submit" color="success" v-else>Create</v-btn>
        </v-form>

         <v-card class="mt-4">
            <v-toolbar color="indigo" dark dense>
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>

            <v-list  v-for="(category,index) in categorys" v-bind:key="index">
                <v-list-tile>
                    <v-list-tile-action class="delete">
                    <v-btn icon small @click="deletecat(category.slug,index)">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                     <v-btn icon small @click="edit(index)">
                        <v-icon color="orange">edit</v-icon>
                    </v-btn>
                </v-list-tile-action>

                    <v-list-tile-content class="ml-5 content">
                        <v-list-tile-title>
                            {{category.name}}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-divider></v-divider>
            </v-list>
        </v-card>
    </div>
</template>
<script>
export default {
    name:'createCategory',
    data() {
        return {
            forms:{
                name:null
            },
            temp:null,
            categorys:{},
            store:{},
            editslug:null
        }
    },
     created(){
         if(!User.admin()){
             this.$router.push('/formu')
         }
        axios.get('/api/categories')
        .then(response=>{
            this.categorys=response.data.data
        })
    },
    methods:{
        addCreate(){
           this.editslug ? this.update() : this.create()
        },
        update(){
             axios.put(`/api/categories/${this.editslug}`,this.forms)
              .then(response=>{  
               this.categorys.unshift(response.data)
               this.forms.name=null
            })
        },
        create(){
            axios.post('/api/categories',this.forms)
            .then(response=>{  
               this.categorys.unshift(response.data)
               this.forms.name=null
            })
        },
        deletecat(slug,index){
            axios.delete(`/api/categories/${slug}`)
            .then(response=>this.categorys.splice(index,1))
        },
        edit(index){
            if(this.forms.name==null){
                this.forms.name=this.categorys[index].name
                this.editslug=this.categorys[index].slug
                this.categorys.splice(index,1)
            }
            
            
        }
    },
    
}
</script>
<style scoped>
.box{
    margin:auto;
    width:900px;
}  
.content{
    position: relative;
    right: 75px;
}
.delete{
    position: relative;
    left: 820px;
}
</style>