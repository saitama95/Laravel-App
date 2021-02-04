<template>
    <v-card>
        <v-toolbar color="cyan" dark dense class="mt-2">
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>

        <v-list v-for="(category,index) in categorys" v-bind:key="index">
            <v-list-tile>
                <v-list-tile-content>
                    <v-list-tile-title>{{category.name}}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-card>
</template>
<script>
export default {
    name:'AppSidebar',
    data() {
        return {
            categorys:{}
        }
    },
    created(){
        axios.get('/api/categories')
        .then(response=>{
           this.categorys=response.data.data
        })
    }
}
</script>