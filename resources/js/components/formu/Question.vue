<template>
      <v-card>
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
              <router-link :to="data.path">
                {{data.title}}
              </router-link>
            </h3>
            <p class="grey--text">{{data.user}} said {{data.created_at}}</p>
          </div>
        </v-card-title>
        <v-card-text>
            {{data.body}}
        </v-card-text>
      </v-card>
</template>
<script>
export default {
    name:'Question',
    props:['data']
}
</script>
<style scoped>
p{
  font-size:15px;
}
</style>