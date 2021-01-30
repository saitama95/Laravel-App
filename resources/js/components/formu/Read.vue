<template>
    <div>
        <edit-question v-if="editing"
         :datas=question
        ></edit-question>
       <div v-else>
            <show-question
            :datas=question
            ></show-question>
       </div>
    </div>   
</template>
<script>
import editQuestion from './EditQuestion'
import showQuestion from './ShowQuestion'
export default {
    name:'Read',
    components:{
        'show-question':showQuestion,
        'edit-question':editQuestion
    },
    data(){
        return{
            question:null,
            editing:false 
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
            }),
            EventBus.$on('cancel',()=>{
                this.editing=false
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