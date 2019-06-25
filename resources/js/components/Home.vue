<template>
    <div  id="add">
        <div class="background">
            <div class="text">
                <h5 class="container text-white ml-3">Trouvez votre partenaire idéal <br> proche de vous.</h5>
            </div>
            <!-- <carousel-3d class="carousel">
                
                <slide :index="0">
                    <div class="row justify-content-around">
                        
                            <div class="sport" @click="sport()">
                                
                            </div>
                        
                        
                        <div class="nutrition" @click="nutrition()">

                        </div>
                        
                    </div>
                </slide>
                
                
                <slide :index="1">
                    <div class="row justify-content-around">
                        
                        <div class="message" @click="message()">

                        </div>
                        

                    </div>

                </slide>
                
               
                <slide :index="2">
                    Slide 3 Content
                </slide>
                
            </carousel-3d> -->

        </div>
    </div>
</template>

<script>
   // import { Carousel3d, Slide } from 'vue-carousel-3d';
    
    export default {
    data() {
        
        return { 
            name: null,
            userSport: null,
            userLevel: null,
            userZipCode: null,
            isLoggedIn: localStorage.getItem('feater.jwt') != null,

        }
    },
    
    mounted() {
            
        },
    methods : {
        message() {
            window.location.href = "/tchat"
        },
        sport() {
            window.location.href ='/search'
        },
        nutrition() {
            window.location.href ='/searchFood'
        }
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
<style scoped lang="scss">
    $responsive-mobile: 425px;
    .carousel{
        margin-top: 50px;
    }
    .carousel-3d-slide{
        background-color: transparent;
        border: none;
    }

    @media (max-width: $responsive-mobile) {
        .border, .nutrition, .sport, .message{
            height: 150px;
            width: 40%;

        }
        .sport{
            background-image: url('../../../public/images/carousel1.png');
            background-size: 140px;
            background-repeat: no-repeat;
        }
        .nutrition{
            background-image: url('../../../public/images/nutrition.png');
            background-size: 140px;
            background-repeat: no-repeat;
        }
        .message{
            background-image: url('../../../public/images/message.png');
            background-size: 140px;
            background-repeat: no-repeat;
        }
        .background{
            background-image: url('../../../public/images/fondhome.png');
            background-size: 500px;
            height: 890px;
        }
        h5{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-top: 400px;

        }
    }

</style>



     <!-- <div>
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
    </div>  -->
    
