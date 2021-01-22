<template>
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
    >
     Submit
    </v-btn>

  </v-form>
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
          User.login(this.forms);
        }
    }
}
</script>