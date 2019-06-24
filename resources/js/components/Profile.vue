<template>
    <div>
        <section class="container">
            <h1 class="my-4">Profile : name => {{ name }}</h1>
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name:null,
            isLoggedIn: localStorage.getItem('feater.jwt') != null,
        }
    },
    beforeMount() {
        if (this.isLoggedIn) {
            let user = JSON.parse(localStorage.getItem('feater.user'))
            this.name = user.name
            
        }
    },
}
</script>
<style>
    
</style>