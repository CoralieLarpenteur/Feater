<template>
    <div>
        <div id="container" class="container">
             <!-- <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>Image</td>
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Adresse</td>
                        <td>Code Postal</td>
                        <td>Ville</td>
                        <td>Sport</td>
                        <td>Niveau</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-xs-center text-md-center" v-for="(user,index) in users" v-bind:key="index" v-show="user.sport_id == userSport && user.level == userLevel && user.zipCode == userZipCode && name != user.name">
                        <td>{{index+1}}</td>
                        <td><img class="img-fluid" :src="'images/'+user.imageProfil" alt="profil picture"></td>
                        <td v-model="user.name">{{user.name}}</td>
                        <td v-model="user.email">{{user.email}}</td>
                        <td v-model="user.is_admin" v-if="user.is_admin == 1">Admin</td>
                        <td v-else >User</td>
                        <td>{{user.address}}</td>
                        <td>{{user.zipCode}}</td>
                        <td v-if="user.city != null">{{user.city}}</td>
                        <td v-else>Non dispo</td>
                        <td v-for="(sport, index) in sports" v-bind:key="index" v-show="user.sport_id == sport.id">{{sport.name}}</td>
                        <td>{{user.level}}</td>
                        <td>
                            <button @click="editingUser = user" raised color="teal darken-1">
                                <i class="fa fa-cog white--text" aria-hidden="true"></i>
                            </button>
                            <button raised color="red darken-1" @click.prevent="deleteUser(user)">
                                <i class="fa fa-times white--text" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>  -->
            
                <div class="col-xs-12 mb-2" v-for="(user,index) in users" v-bind:key="index" v-show="user.sport_id == userSport && user.level == userLevel && user.zipCode == userZipCode && name != user.name">
                    <div class="card text-left" >
                      <img class="card-img-top" :src="'images/'+user.imageProfil" alt="">
                      <div class="card-body">
                        <h4 v-model="user.name" class="card-title">{{user.name}}</h4>
                        <p v-model="user.email" class="card-text">{{user.email}}</p>
                         <p v-model="user.sport_id" class="card-text" v-for="(sport, index) in sports" v-bind:key="index" v-show="user.sport_id == sport.id">{{sport.name}}</p>
                          <p v-model="user.level" class="card-text">Niveau : {{user.level}}</p>
                        <button class=" btn btn-primary" @click="addLike()"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <button class=" btn btn-primary" @click="remove()"><i class="fa fa-heart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                </div>
            
            <!-- <div class="tinder">
                <div class="tinder--status">
                    <i class="fa fa-remove"></i>
                    <i class="fa fa-heart"></i>
                
                 </div>
                 <div class="tinder--cards">
                    <div  v-for="(user,index) in users" v-bind:key="index" v-show="user.sport_id == userSport && user.level == userLevel && user.zipCode == userZipCode && name != user.name">
                            <img :src="'images/'+user.imageProfil" alt="img_profil">
                        <div class="inside">
                            <h4>{{user.name}}</h4>
                            <p v-for="(sport, index) in sports" v-bind:key="index" v-show="user.sport_id == sport.id">{{sport.name}}</p>
                            <p v-if="user.level == 1">Débutant</p>
                            <p v-if="user.level == 2">Intermédiaire</p>
                            <p v-if="user.level == 3">Confirmé</p>
                            <button class="seeInfos">
                                <i class="fas fa-sort-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>  -->
            <!-- <CartSwipe /> -->
            <!-- <div class="buddy" style="display: block;">
                <div class="avatar" v-for="(user,index) in users" v-bind:key="index" v-show="user.sport_id == userSport && user.level == userLevel && user.zipCode == userZipCode && name != user.name">
                    <img :src="'images/'+user.imageProfil" alt="">
                </div>
            </div> -->
            <!-- <vue-swing
            @throwout="throwout"
            @throwin="throwin"
            :config="config"
            >
            <div class="box">Toss me! Don't tell the elf!</div>
            </vue-swing> -->
        </div>
    </div>

</template>


<script>
// import CartSwipe from './CartSwip.vue'
// $(document).ready(function(){

//     $(".buddy").on("swiperight",function(){
//       $(this).addClass('rotate-left').delay(700).fadeOut(1);
//       $('.buddy').find('.status').remove();

//       $(this).append('<div class="status like">Like!</div>');      
//       if ( $(this).is(':last-child') ) {
//         $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
//        } else {
//           $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
//        }
//     });  

//    $(".buddy").on("swipeleft",function(){
//     $(this).addClass('rotate-right').delay(700).fadeOut(1);
//     $('.buddy').find('.status').remove();
//     $(this).append('<div class="status dislike">Dislike!</div>');

//     if ( $(this).is(':last-child') ) {
//      $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
//       alert('OUPS');
//      } else {
//         $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
//     } 
//   });

// });
// import VueSwing from 'vue-swing'



export default {
    // components: { CartSwipe },
   
    data() {
        return {
            users : [],
            sports : [],  
            usersLike : [],
            name: null,
            userSport: null,
            userLevel: null,
            userZipCode: null,
            isLoggedIn: localStorage.getItem('feater.jwt') != null,
            // config: {
            //     minThrowOutDistance: 100,
            //             // Determine the rotation of the element
            //     maxRotation: 80
            // }

        }
    },
    components: {
        // VueSwing,
    },
    mounted() {
        
    },
     beforeMount() {
            axios.get('/api/users').then(response => this.users = response.data)
            axios.get('/api/sports').then(response => this.sports = response.data)
            
            if (this.isLoggedIn) {
                let user = JSON.parse(localStorage.getItem('feater.user'))
                this.name = user.name
                this.userSport = user.sport_id
                this.userLevel = user.level
                this.userZipCode = user.zipCode
                
            }
            
            
        },
    methods: {
        remove(user) {
            let item = this.users.indexOf(user)
            this.users.splice(item, 1)
        },
        addLike(user) {
            let user_id = user.id
            axios.post("/api/user/", {user_id})
                     .then(response => this.usersLike.push(user))
        }
    },

}
</script>
<style>
.tinder {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    opacity: 0;
    transition: opacity 0.1s ease-in-out;
}

.loaded.tinder {
    opacity: 1;
}

.tinder--status {
    position: absolute;
    top: 50%;
    margin-top: -30px;
    z-index: 2;
    width: 100%;
    text-align: center;
    pointer-events: none;
}

.tinder--status i {
    font-size: 100px;
    opacity: 0;
    transform: scale(0.3);
    transition: all 0.2s ease-in-out;
    position: absolute;
    width: 100px;
    margin-left: -50px;
}

.tinder_love .fa-heart {
    opacity: 0.7;
    transform: scale(1);
}

.tinder_nope .fa-remove {
    opacity: 0.7;
    transform: scale(1);
}

.tinder--cards {
    flex-grow: 1;
    padding-top: 40px;
    text-align: center;
    display: flex;
    justify-content: center;
    /*align-items: flex-end;*/
    z-index: 1;
}

.tinder--card {
    display: inline-block;
    width: 90vw;
    max-width: 400px;
    height: 75vh;
    /*height: 70vh;*/
    background: #FFFFFF;
    /*padding-bottom: 40px;*/
    border-radius: 8px;
    overflow: hidden;
    position: absolute;
    will-change: transform;
    transition: all 0.3s ease-in-out;
    cursor: -webkit-grab;
    cursor: -moz-grab;
    cursor: grab;
}

.moving.tinder--card {
    transition: none;
    cursor: -webkit-grabbing;
    cursor: -moz-grabbing;
    cursor: grabbing;
}

.tinder--card img {
    max-width: 100%;
    height: 60vh;
    object-fit: cover;
    pointer-events: none;
}

.tinder--card h3 {
    pointer-events: none;
}

.tinder--card p {
    pointer-events: none;
}

.tinder--buttons {
    text-align: center;
    padding-top: 5px;
}

.tinder--buttons button {
    border-radius: 50%;
    line-height: 60px;
    width: 60px;
    border: 0;
    background: #FFFFFF;
    display: inline-block;
    margin: 0 8px;
}

.tinder--buttons button:focus {
    outline: 0;
}

.tinder--buttons i {
    font-size: 32px;
    vertical-align: middle;
}

.fa-heart {
    color: #FFACE4;
}

.fa-remove {
    color: #CDD6DD;
}


.inside{
    background-color: white;
    transition: ease 0.4s;
}


.infoUp{
    transform: translateY(-50px);
}


.seeInfos{
    font-size: 30px;
    background-color: transparent;
    border: none;
    outline: none;
}


* {
    margin: 0;
    padding: 0; }

body {
    background-color: #e8e8e8;
    
}


body h1 {
    font-size: 1em;
}
</style>
