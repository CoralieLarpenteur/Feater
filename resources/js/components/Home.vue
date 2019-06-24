<template>
    <div>
        <section>
            <div class="d-flex height-50vh presentation align-items-center justify-content-center">
                <div class="col-md-4 d-flex justify-content-center">
                    <h1 v-if="name">Bonjour {{ name }} !</h1>
                    <h1 v-else>Bienvenue sur Feater !</h1>
                </div>
            </div>
            <div class="nav height-50vh d-flex align-items-center justify-content-center" v-if="name">
                <router-link class="mx-2" :to="'/search'">Chercher un partenaire > </router-link>
                <router-link class="mx-2" :to="'/searchFood'">Chercher un resto Fit > </router-link>
                <router-link class="mx-2" :to="'/tchat'">Tchat > </router-link>
            </div>
        </section>
    </div>

</template>
<script>
export default {
    data() {
        return { 
            userName: null,
            userSport: null,
            userLevel: null,
            userZipCode: null,
            isLoggedIn: localStorage.getItem('feater.jwt') != null,

        }
    },
    mounted() {
            
        },
    methods : {
        
    },
    beforeMount() {
            // axios.get('/api/users').then(response => this.users = response.data)
            // axios.get('/api/sports').then(response => this.sports = response.data)
            
            if (this.isLoggedIn) {
                let user = JSON.parse(localStorage.getItem('feater.user'))
                this.name = user.name
                this.userSport = user.sport_id
                this.userLevel = user.level
                this.userZipCode = user.zipCode
                
            }
            
            
        }, 
}
</script>
<style>
.height-50vh {
    height: 50vh;
}
.presentation {
    height: 50vh;
    background: linear-gradient(#e66465, #9198e5);
    color:white;
}

</style>
