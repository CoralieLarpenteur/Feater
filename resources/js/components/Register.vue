<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
                            <form>
                                <img src="images/logo.png" class="w-25 mx-auto d-block mt-5"/>
                                <div class="form-group margin row">
                                    <div class="col-md-6">
                                        <input id="name"  placeholder="Nom..." type="text" class="form-control"  v-model="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="Email..." class="form-control" v-model="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="address"  placeholder="Adresse..." type="address" class="form-control" v-model="address" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="zipCode" placeholder="Code postal..." type="zipCode" class="form-control" v-model="zipCode" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="city"  placeholder="Ville..." type="city" class="form-control" v-model="city" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mdl-selectfield mb-4 col-md-6">
                                        <select :sports="sports" v-model="sport_id" class="form-control"  placeholder="Sport...">
                                            <option   v-for="sport in sports" v-bind:key="sport.name" :value="sport.id">{{ sport.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="mdl-selectfield mb-4 col-md-6" >
                                        <select v-model="level" class="form-control"  placeholder="Categories...">
                                            <option value="1" >Débutant</option>
                                             <option  value="2" >Intermédiaire</option>
                                              <option value="3" >Confirmé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Passport..." class="form-control" v-model="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" placeholder="Confirm Passport..."  class="form-control" v-model="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn button bg-white mt-3" @click="handleSubmit">
                                            Inscription
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    <style scoped>
    .form-group input, select{
        border-radius: 50px;
    }
    .button{
        border-radius: 20px;
        width: 100%;
    }
    .container{
        min-height: 800px;
        background-color: #1C1818;
    }
    .margin{
        margin-top: 80px;
    }
    hr{
        border-radius: 5px;
        height: 2px;
    }

</style>