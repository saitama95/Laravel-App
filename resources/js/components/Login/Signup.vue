<template>
<div class="box">
    <v-form @submit.prevent="signup"
  >
    <v-text-field
      v-model="forms.name"
      label="Name"
      type="text"
    ></v-text-field>
    <span class="red--text" v-if="errors">{{errors.name}}</span>
    <v-text-field
      v-model="forms.email"
      label="Email"
    ></v-text-field>
    <span class="red--text" v-if="errors">{{errors.email}}</span>

    <v-text-field
      v-model="forms.password"
      label="Password"
      type="password"
    ></v-text-field>
    <span class="red--text" v-if="errors">{{errors.password}}</span>

    <v-text-field
      v-model="forms.password_confirmation"
      label="Confirm Password"
      type="password"
    ></v-text-field>
    <span class="red--text" v-if="errors">{{errors.password}}</span>

    <div  class="btns">
        <v-btn
        type="submit"
        color="success"
    >
     Signup
    </v-btn>

     <router-link to="/login">
        <v-btn flat color="blue">Back to Login</v-btn>
      </router-link>

    </div>
    
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
                name:null,
                password_confirmation:null,
            },
            errors:{}
        }
    },
    methods:{
        signup(){
          axios.post('/api/auth/signup',this.forms)
          .then(response=>{
              User.responseAfterLogin(response)
              this.$router.push({name:'formu'})
          })
          .catch(error=>{
              this.errors=error.response.data.errors
          })
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
.btns{
    margin-top:20px;
}
</style>