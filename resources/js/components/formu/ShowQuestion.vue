<template>
    <v-card v-if="datas">
        <v-container class="fluid">
        <v-card-title>
            <div>
                <div class="headline">
                    {{datas.title}}
                </div>
                <p class="grey--text">{{datas.user}} said {{datas.created_at}}</p>
            </div>
            <v-spacer></v-spacer>
           
            <v-btn color="teal">Replies</v-btn>
        </v-card-title>
        <v-card-text v-html="body"></v-card-text>
        
        <v-card-actions v-if="check">
            <v-btn icon small @click="edit()">
                <v-icon color="orange">edit</v-icon>
            </v-btn>

            <v-btn icon small @click="destroy()">
                <v-icon color="red">delete</v-icon>
            </v-btn>
        </v-card-actions>
        </v-container>
    </v-card>
   
</template>
<script>
export default {
    name:'ShowQuestion',
    props:['datas'],
    data(){
        return{
           
        }
    },
    computed:{
        body(){
            console.log(this.show)
            return md.parse(this.datas.body)
        },
        show(){
            return this.datas.id
        },
        check(){
            return AppStorage.getId()==this.show
        }

    },
    methods:{
        destroy(){
            axios.delete(`/api/question/${this.datas.slug}`)
            .then(response=>{
                this.$router.push('/formu')
            })
            .catch(error=>{
                console.log(error.response.data)
            })
        },
        edit(){
            EventBus.$emit('startEdit')
        }
    }
}
</script>
<style scoped>
p{
  font-size:15px;
}
</style>