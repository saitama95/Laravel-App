<template>
    <div>
       <tool-bar></tool-bar>
        <router-view></router-view>
       <footer-app></footer-app>
    </div>
</template>
<script>
import toolbar from './Toolbar'
import footer from './FooterApp'
export default {
    name:'HomeApp',
    components:{
        'tool-bar':toolbar,
        'footer-app':footer,
    }
}
</script>
<style scoped>

</style>