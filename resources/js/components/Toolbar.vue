<template>
  <v-toolbar>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="logIn"></app-notification>
    <div class="hidden-sm-and-down">

      <router-link 
      v-for="item in items"
      v-bind:key="item.title"
      :to="item.to"
      v-if="item.show"
      ><v-btn flat>{{item.title}}</v-btn>
      </router-link>

      
    </div>
  </v-toolbar>
</template>
<script>
import appnotification from './AppNotification'
export default {
  components:{
    'app-notification':appnotification
  },
   name:'Toolbar',
   data(){
     return{
       logIn:User.loggedIn(),
       items:[
          {title:'Forum',to:'/formu',show:true},
          {title:'Ask Question',to:'/ask',show:User.loggedIn()},
          {title:'Login',to:'/login',show:!User.loggedIn()},
          {title:'Logout',to:'/logout',show:User.loggedIn()},
          {title:'Category',to:'/category',show:User.admin()},
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


