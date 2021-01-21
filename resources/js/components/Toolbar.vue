<template>
  <v-toolbar>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <v-btn flat>Link Two</v-btn>
      <v-btn flat>Link Three</v-btn>
      <router-link to="/login">
        <v-btn flat>Login</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>
<script>
export default {
   name:'Toolbar',
}
</script>