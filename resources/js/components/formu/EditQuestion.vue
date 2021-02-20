<template>
    <div>
        <v-container>
            <v-form @submit.prevent="updateQuestion()">
                <v-text-field
                v-model="forms.title"
                label="Title"
                type="text"
                ></v-text-field>

                <vue-simplemde v-model="forms.body"/>

                <v-btn
                    type="submit"
                    color="success"
                    >Update
                </v-btn>

                <v-btn
                    @click="cancel()"
                    type="submit"
                    color="red"
                    >Cancel
                </v-btn>

            </v-form>
        </v-container>
    </div>
</template>
<script>
import VueSimplemde from 'vue-simplemde'
export default {
    props:['datas'],
     components: {
      VueSimplemde
    },
    data(){
        return{
            forms:{
                title:null,
                body:null
            },
        }
    },
    mounted(){
        this.forms=this.datas
    },
    methods:{
        updateQuestion(){
            axios.put(`/api/question/${this.datas.slug}`,this.forms)
            .then(response=>{
               this.cancel(this.forms.body)
            })
            .catch(error=>{
                console.log(error.response.data)
            })
        },
        cancel(question){
            EventBus.$emit('cancel',question)
        }    
    }
}
</script>