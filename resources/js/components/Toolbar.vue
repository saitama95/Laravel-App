<template>
  <v-toolbar>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">

      <router-link 
      v-for="item in items"
      v-bind:key="item.title"
      :to="item.to"
      v-if="item.show">
        <v-btn flat>{{item.title}}</v-btn>
      </router-link>

      
    </div>
  </v-toolbar>
</template>
<script>
export default {
   name:'Toolbar',
   data(){
     return{
       items:[
         {title:'Forum',to:'/formu',show:true},
         {title:'Ask Question',to:'/ask',show:User.loggedIn()},
         {title:'Category',to:'/category',show:User.loggedIn()},
         {title:'Login',to:'/login',show:!User.loggedIn()},
         {title:'Logout',to:'/logout',show:User.loggedIn()},
       ]
     }
   },
   created(){
     EventBus.$on('logout',()=>{
       User.logout()
        this.$router.push({name:'login'}) 
     })
   }
}
</script>