<template>
    <div  v-if="question">
        <reply 
        v-for="(reply,index) in content" 
        v-bind:key="index"
        :index=index
        :data=reply
        ></reply>
    </div>
</template>
<script>
import reply from './reply'
export default {
    name:'replies',
    props:['question'],
    components:{reply},
    data(){
        return{
            content:this.question.replies
        }
    },
    created(){
        this.listen()
    },
    methods: {
        listen(){
            EventBus.$on('newReply',(reply)=>{
                this.content.unshift(reply)
            })
            EventBus.$on('deleteReply',(index)=>{
                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                    .then(response=>{
                    this.content.splice(index,1)
                })  
            })
            Echo.private('App.User.' + User.id())
                .notification((notification) => {
                   this.content.push(notification.reply)
            });
            Echo.channel('deleteReplyChannel')
            .listen('DeleteReplyEvent',e=>{
                for(let index=0;index<this.content.length;index++){
                    if(this.content[index].id===e.id){
                        this.content.splice(index,1)
                    }
                }
            })
        }
    },
}
</script>