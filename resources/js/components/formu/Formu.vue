<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question v-for="(question,index) in questions"
                v-bind:key="index"
                :data=question
                ></question>
            </v-flex>
            Sidebar
        </v-layout>
    </v-container>
</template>
<script>
import question from './Question'
export default {
    name:'Formu',
    data(){
        return{
            questions:{}
        }
    },
    components:{
        question
    },
    created(){
        axios.get('api/question')
        .then(response=>{
            this.questions=response.data.data
        }).catch(error=>{
            console.log(error.response.data)
        })
    }
}
</script>