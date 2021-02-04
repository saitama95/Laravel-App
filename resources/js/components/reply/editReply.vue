<template>
    <div>
        <vue-simplemde v-model="reply.reply"/>
         <div>
             <v-card-actions>
                <v-btn icon small @click="edit()">
                    <v-icon color="green">save</v-icon>
                </v-btn>
                 <v-btn icon small @click="cancel()">
                    <v-icon color="black">cancel</v-icon>
                </v-btn>
            </v-card-actions>
        </div> 
    </div>
</template>
<script>
import VueSimplemde from 'vue-simplemde'
export default {
    props:['reply'],

     components: {
      VueSimplemde
    },
    methods:{
        edit(){
            axios.put(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
            .then(res=>{
                this.cancel(this.reply.reply)
            })
        },
        cancel(reply){
            EventBus.$emit('cancel_event',reply)
        }
    }
}
</script>