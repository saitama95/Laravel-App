<template>
    <div>
     <vue-simplemde v-model="body"/>
        <p>{{msg}}</p>
       <v-btn small color="green"  @click="create">
           <v-icon>done</v-icon>
       </v-btn>
    </div>
</template>
<script>
import VueSimplemde from 'vue-simplemde'
export default {
    props:['questionSlug'],
    name:'createReply',
    components: {
      VueSimplemde
    },
    data() {
        return {
            body:'',
            empty:'',
            msg:''
        }
    },
    methods:{
        create(){
            if(this.body){
                axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
                .then(response=>{
                EventBus.$emit('newReply',response.data.reply)
                window.scrollTo(0,0)
                this.body=''
            })
            }
            else{
                this.msg='Enter reply'
            }   
        },
    }
}
</script>
<style scoped>
    p{
        font-size:1em;
        color:red;
    }
</style>