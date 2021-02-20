<template>
<div class="box">
  <v-form @submit.prevent="login"
  >
    <v-text-field
      v-model="forms.email"
      label="Email"
    ></v-text-field>

    <v-text-field
      v-model="forms.password"
      label="Password"
      type="password"
    ></v-text-field>


    <v-btn
      type="submit"
      color="success"
    >Login
    </v-btn>

      <router-link to="/signup">
        <v-btn flat>Signup</v-btn>
      </router-link>

  </v-form>
</div>
  
</template>

<script>
export default {
    name:'Login',
    data(){
        return{
            forms:{
                email:null,
                password:null,
            }
        }
    },
    methods:{
        login(){
          User.login(this.forms)
          this.$router.push({name:'formu'}) 
        }
    },
    created(){
      if(User.loggedIn()){
        this.$router.push({name:'formu'}) 
      }
    } 
}
</script>
<style scoped>
  .box{
    margin:auto;
    width:50%;
}
</style>