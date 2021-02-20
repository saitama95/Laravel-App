<template>
    <div>
        <v-btn icon @click="likeIt()">
            <v-icon :color="colors()">favorite</v-icon>{{count}}
        </v-btn>
    </div>
</template>
<script>
export default {
    props:['content'],
    data() {
        return {
            liked:this.content.liked,
            count:this.content.like_count,
            beforeedit:null,
        }
    },
    methods:{
        likeIt(){
            if(User.loggedIn()){
            this.liked ?this.decr():this.incr() 
            this.liked=!this.liked
            }
        },
        incr(){
            axios.post(`/api/like/${this.content.id}`)
            .then(response=>{
                this.count++
            })
            
        },
        colors(){
                return this.liked ? 'red' : 'red lighten-4'
            },
        decr(){
            axios.delete(`/api/unlike/${this.content.id}`)
            .then(response=>{
                this.count--
            })
        }
    }
}
</script>