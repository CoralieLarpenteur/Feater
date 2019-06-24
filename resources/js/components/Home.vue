<template>
    <div>
        <div class="container">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td></td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Is admin ?</td>
                        <td>Adresse</td>
                        <td>Code Postal</td>
                        <td>Ville</td>
                        <td>Sport</td>
                        <td>Level</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-xs-center text-md-center" v-for="(user,index) in users" v-bind:key="index">
                        <td>{{index+1}}</td>
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
            </table>
        </div>
    </div>

</template>
<script>
export default {
    data() {
        return {
            users : [],
            sports : [],         
        }
    },
    beforeMount() {
            axios.get('/api/users').then(response => this.users = response.data)
            axios.get('/api/sports').then(response => this.sports = response.data)
            
        }, 
    methods: {
        deleteUser() {

        },
    },

}
</script>
<style>

</style>
