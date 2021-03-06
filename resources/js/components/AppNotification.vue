<template>
 <div class="text-xs-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
            icon
          v-on="on"
        >
         <v-icon :color="color">add_alert</v-icon>{{unreadcount}}
        </v-btn>
      </template>
      <v-list>
        <v-list-tile  v-for="item in unread" :key="item.id">
            <router-link :to="item.path">
              <v-list-tile-title  v-on:click="readIt(item.id)">{{ item.question}}</v-list-tile-title>  
            </router-link> 
        </v-list-tile>
        <v-divider></v-divider>

        <v-list-tile  v-for="item in read" :key="item.id">
              <v-list-tile-title>{{ item.question}}</v-list-tile-title>  
        </v-list-tile>

      </v-list>
    </v-menu>
  </div>
</template>
<script>
export default {
    data() {
        return {
            unreadcount:0,
            read:{},
            unread:{},
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotification()
        }
        Echo.private('App.User.'+User.id())
          .notification(notification=>{
            this.unread.unshift(notification)
            this.unreadcount++
          })
    },
    computed:{
      color(){
        return this.unreadcount==0 ? 'red lighten-4':'red'
      }
    },
    methods: {
      getNotification(){
          axios.post(`/api/notification`)
          .then(response=>{
              this.read=response.data.read
              this.unread=response.data.unread
              this.unreadcount=response.data.unread.length
          })
      },
      readIt(notification){
        axios.post(`/api/markasread/${notification}`)
        .then(response=>{
         this.unread.splice(notification,1)
         this.read.push(notification)
         this.unreadcount--
        })
      }  
    },
}
</script>
