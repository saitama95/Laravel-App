<template>
    <div>
        
        <edit-question 
        v-if="editing"
        :datas=question
        ></edit-question>

       <div v-else>
        <show-question
        :datas=question
        ></show-question>
       </div>
       <v-container>

        <replies
       v-if="question"
       :question=question
       ></replies>
       
       <create-reply
       v-if="question"
       :questionSlug=question.slug
       ></create-reply>
       
       </v-container>
       
    </div>   
</template>
<script>
import editQuestion from './EditQuestion'
import showQuestion from './ShowQuestion'
import replies from '../reply/replies'
import createReply from '../reply/createReply'
export default {
    name:'Read',
    components:{
        'show-question':showQuestion,
        'edit-question':editQuestion,
        'replies':replies,
        'create-reply':createReply
    },
    data(){
        return{
            question:null,
            editing:false,
            beforeedit:''
        }
    },
    created(){
        this.showData(),
        this.listen()
    },
    methods:{
        listen(){
            EventBus.$on('startEdit',()=>{
                this.editing=true
                this.beforeedit=this.question.body
            }),
            EventBus.$on('cancel',(question)=>{
                this.editing=false
                if(question!==this.question.body){
                    this.question.body=this.beforeedit
                    this.beforeedit=''
                }
            })
        },
        showData(){
             axios.get(`/api/question/${this.$route.params.slug}`)
            .then(response=>{
            this.question=response.data.data
        })
        }
    }
}
</script>