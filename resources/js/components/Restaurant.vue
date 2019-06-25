<template>
        <main class="nutrition">
        <nav class="nutrition-nav">
            <a href="#"><i class="fas fa-arrow-left"></i></a>
            <a class="nutrition-link" >Nutrition</a>
        </nav>
        <section class="mx-auto mt-3" >
            <div class="map-content">

                <gmap-map ref="gmap" :center="center" class="contact-map card-map"   :zoom="12" >

                        <gmap-marker :key="index" v-for="(m, index) in markers"   :position="m.position" @click="toggleInfoWindow(m,index)"></gmap-marker>

                </gmap-map>

                <div v-if="infoWinOpen == false" class="card-search-bar hide-card">
                    <a id="card-button" href="#">Trouvez un lieu</a>

                    <div class="restaurant-search-bar">
                        <input type="text" class="mr-2" id="search" placeholder="Rechercher">
                        <input type="submit" id="submit" value="GO">
                    </div>
                </div>

                <div v-else class="card-search-bar2 hide-card">

                    <div class="restaurant-search-bar" >

                        <div class="description " v-html="infoContent"></div>
                    </div>
                </div>
            </div>
        </section>


    </main>
    
</template>

<script>

    export default {
        name: "MapNutrition",

        data() {
            return {
                //a default center for the map
                restaurants:[],
                center: {lat: 48.8534, lng: 2.3488},
                map: null,
                infoContent: '',
                infoWindowPos: {},
                infoWinOpen: false,
                infoOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -30
                    }
                },

                markers: [
                    {
                        name: 'Health Inside',
                        address: '30 Rue Charlot',
                        city: 'Paris',
                        zipCode: '75003',
                        schedule:'Du lundi au dimanche de 10h à 22h',
                        typeOfFood:'Bio',
                        phoneNumber:'0142781881',
                        photo:'HealthInside.jpg',
                        description: "Ce restaurant contemporain à l'ambiance jazzy sert une cuisine bio, détox, végétarienne et végétalienne.",
                        position: {lat: 48.8624, lng: 2.362129999999979}
                    },
                    {
                        name: 'Nous Châteaudun',
                        address: '8 Rue de Châteaudun',
                        city: 'Paris',
                        zipCode: '75009',
                        schedule:'Du lundi au vendredi de 12h00 à 14h30 et de 19h à 20',
                        typeOfFood:'Cuisine du monde',
                        phoneNumber:'0950515882',
                        photo:'Nouschâteaudun.jpg',
                        description: 'Cuisine du monde (burritos, bentos, burgers) diététique, cocktails à base de fruits pressés et vins naturels.',
                        position: {lat: 48.8759428, lng: 2.3413613}
                    },

                    {
                        name: 'Le Cent Huit',
                        address: '4 Impasse de Joinville',
                        city: 'Paris',
                        zipCode: '75019',
                        schedule:'Du lundi au samedi de 8h00 à 22h et le dimanche de 8h à 19h',
                        typeOfFood:'Français',
                        phoneNumber:'014037464',
                        photo:'LeCentHuit.jpg',
                        description: 'Véranda et mur d\'accent rose bonbon pour ce restaurant lumineux doublé d\'une librairie, avec événements.',
                        position: {lat: 48.8911, lng: 2.3782599999999547}
                    },
                    {
                        name: 'Nous Paradis',
                        address: '16 Rue de Paradis',
                        city: 'Paris',
                        zipCode: '75010',
                        schedule:'Du lundi au dimanche de 12h30 à 14h30 et de 19 à 22h30',
                        typeOfFood:'Français',
                        phoneNumber:'0980927210',
                        photo:'NousParadis.jpg',
                        description: 'Viandes françaises et fruits et légumes bio pour cette adresse au look naturel brut et au menu de street food.',
                        position: {lat: 48.8748, lng: 2.353810000000067}
                    },
                    {
                        name: 'PH7 Equilibre',
                        address: '21 Rue le Peletie',
                        city: 'Paris',
                        zipCode: '75009',
                        schedule:'Du lundi au samedi de 11h à 15h',
                        typeOfFood:'Bio',
                        phoneNumber:'0983879595',
                        photo:'PH7Equilibre.jpg',
                        description: 'Cuisine bio et végétarienne en équilibre acido-basique. Produits de saison et murs ornés de fleurs géantes.',
                        position: {lat: 48.8729435, lng: 2.338512}
                    },
                    {
                        name: 'Le Bichat',
                        address: '11 Rue Bichat',
                        city: 'Paris',
                        zipCode: '75010',
                        schedule:'Du lundi au dimanche de 9h à 23h',
                        typeOfFood:'Bio Scandinave',
                        phoneNumber:'48.8729435',
                        photo:'LeBichat.jpg',
                        description: 'Cuisine bio, sans gluten et plats végétariens/végétaliens dans une salle claire à l\'esprit scandinave.',
                        position: {lat: 48.870250, lng: 2.368740}
                    },



                ],
            };
        },
        methods: {
            toggleInfoWindow: function (marker) {
                this.infoWindowPos = marker.position;
                this.infoContent = this.getInfoWindowContent(marker);
                this.infoWinOpen = !this.infoWinOpen;
            },
            getInfoWindowContent: function (marker) {
                return (`<div >
                            <h5 class="title float-left " style="text-decoration: underline">${marker.name}</h5>
                            <p class="pt-2 float-left text-left">
                             ${marker.description}
                            </p>


                        </div>`);
            },
        },
        mounted () {
            this.markerCoordinates.forEach((coord) => {
                const position = new google.maps.LatLng(coord.latitude, coord.longitude);
                const marker = new google.maps.Marker({
                    position,
                    map
                });
            });
        },

        beforeMount() {
            axios.get('/api/restaurants').then(response => this.restaurants = response.data)





        },
    };

</script>

<style scoped lang="scss">
    .contact-map{
        overflow: hidden;


    }
    .nutrition{
        height: 100vh;
        display: flex;
        flex-direction: column;
        .nutrition-nav{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
            .nutrition-link{
                padding: 5px 15px;
                background-color: #FFBB3B;
                color: #fff;
                border-radius: 50px;
                margin: auto;
            }
            a{
                color: #000;
            }
        }
        section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 80%;
            height: 80%;

            border-radius: 50px;
            .map-content{
                width: 100%;
                height: 100%;
                border-radius: 50px;
                .card-search-bar{
                    text-align: center;
                    height: 20%;
                    width: 100%;
                    background-color: #000;
                    border-radius: 0 0 50px 50px;
                    box-shadow: -10px -38px 69px -2px #000;
                    z-index: 5;
                    position: relative;
                    a{
                        text-align: center;
                        position: relative;
                        z-index: 3;
                        top: -35px;
                        color: #fff;
                    }
                }
                .card-search-bar2{
                    text-align: center;
                    height: 33%;
                    width: 100%;
                    margin-top: -22%;
                    background-color: #000;
                    border-radius: 0 0 50px 50px;
                    box-shadow: -10px -38px 69px -2px #000;
                    z-index: 5;
                    padding: 24% 2%;
                    position: relative;
                    a{
                        text-align: center;
                        position: relative;
                        z-index: 3;
                        top: -35px;
                        color: #fff;
                    }
                }
                .card-map{
                    border-radius: 50px 50px 0 0;
                    height: 80%;
                    width: 100%;
                    z-index: 1;
                    position: relative;
                }
            }
        }
    }

    .restaurant-search-bar{
        padding: 5px 0;
        border-radius: 0 0 50px 50px;
        box-sizing: border-box;
        width: 80%;
        height: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        input{
            width: 80%;
            border-radius: 50px;
            margin: 0 auto;
            padding: 5px;
        }
        input[type=submit]{
            width: 20%;
        }
    }

    .card{
        color: #fff;
        width: 100%;
        align-self: flex-end;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 0 0 50px 50px;
        height: 60%;
        div{
            height: 33%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .type-review{
            display: flex;
            flex-direction: row;
            div{
                width: 50%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                a{
                    padding: 10px;
                    font-size: 20px;
                }
            }
        }
        .restaurant-infos{
            a{
                border-radius: 30px;
                padding: 10px;
                width: 80%;
                font-size: 20px;
                text-align: center;
            }
        }
    }

    .description{

        color:white!important;
        padding: 3% 2%
    }



</style>