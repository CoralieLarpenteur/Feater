<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" v-model="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" v-model="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label text-md-right">Adresse</label>
                                    <div class="col-md-6">
                                        <input id="address" type="address" class="form-control" v-model="address" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="zipCode" class="col-sm-4 col-form-label text-md-right">Code Postal</label>
                                    <div class="col-md-6">
                                        <input id="zipCode" type="zipCode" class="form-control" v-model="zipCode" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label text-md-right">Ville</label>
                                    <div class="col-md-6">
                                        <input id="city" type="city" class="form-control" v-model="city" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="labelCat col-sm-4 col-form-label text-md-right">Sport</label>
                                    <div class="mdl-selectfield mb-4 col-md-6">
                                        <select :sports="sports" v-model="sport_id" class="form-control">
                                            <option   v-for="sport in sports" v-bind:key="sport.name" :value="sport.id">{{ sport.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="labelCat col-sm-4 col-form-label text-md-right">Categories</label>
                                    <div class="mdl-selectfield mb-4 col-md-6" >
                                        <select v-model="level" class="form-control">
                                            <option value="1" >Débutant</option>
                                             <option  value="2" >Intermédiaire</option>
                                              <option value="3" >Confirmé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" v-model="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" @click="handleSubmit">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <script>
    export default {
        props : ['nextUrl'],
        data(){
            return {
                sports : [],
                name : "",
                email : "",
                password : "",
                password_confirmation : "",
                address:'',
                city:'',
                zipCode:'',
                sport_id:'',
                level:'',
            }
        },
        beforeMount() {
            axios.get("/api/sports/").then(response => this.sports = response.data)
        },
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    return alert('Passwords do not match')
                }
                let name = this.name
                let email = this.email
                let address = this.address
                let zipCode = this.zipCode
                let city = this.city
                let sport_id = this.sport_id
                let level = this.level
                let password = this.password
                let c_password = this.password_confirmation
                axios.post('api/register', {name, email, password, c_password, address, zipCode, city, sport_id, level}).then(response => {
                    let data = response.data
                    localStorage.setItem('feater.user', JSON.stringify(data.user))
                    localStorage.setItem('feater.jwt', data.token)
                    if (localStorage.getItem('feater.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/'))
                    }
                })
            }
        }
    }
    </script>