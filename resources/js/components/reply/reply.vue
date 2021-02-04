<template>
    <div class="mt-4" v-if="data">
        <v-card>
            <v-card-title>
                <div class="headline">{{data.user}}</div>
                <div class="ml-2 time"> said{{data.created_at}}</div>
            </v-card-title>
            <v-divider></v-divider>

            <edit-reply 
            v-if="editing"
            :reply=data
            ></edit-reply>

            <v-card-text v-else v-html="reply"></v-card-text>
            <div v-if="!editing">
                <v-card-actions v-if="authcheck">
                <v-btn icon small @click="edit()">
                    <v-icon color="orange">edit</v-icon>
                </v-btn>
                 <v-btn icon small @click="destroy(index)">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>
            </div> 
        </v-card>
    </div>
</template>
<script>
import editReply from './editReply'
export default {
    name:'reply',
    props:['data','index'],
    components:{
        'edit-reply':editReply
    },
    data(){
        return{
           beforeedit:'',
           editing:false,
           
        }
    },
    computed:{
        authcheck(){
            return AppStorage.getId()==this.data.user_id
        },
        reply(){
            return md.parse(this.data.reply)
        }
    },
    created(){
        this.listen()
    },
    methods:{
        destroy(index){
            EventBus.$emit('deleteReply',this.index)
        },
        edit(){
             this.editing=true,
             this.beforeedit=this.data.reply
        },
        listen(){
            EventBus.$on('cancel_event',(reply)=>{
                this.editing=false
                console.log(reply)
                if(reply!==this.data.reply){
                    this.data.reply=this.beforeedit
                    this.beforeedit=''
                }  
            })
        }
    }

}
</script>
<style  scoped>
.time{
    font-size: 15px;
}
</style>
    
