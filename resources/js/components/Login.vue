 <template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card-body">
                            <form>
                                <img src="images/logo.png" class="w-25 mx-auto d-block mt-5"/>
                                <div class="form-group margin row">
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="Address mail..." class="form-control" v-model="email" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Mot de passe..." class="form-control" v-model="password" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn button bg-white" @click="handleSubmit">
                                            Connexion
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-white w-50 mt-5">
                                <p class="text-center text-white mt-5">Vous n'avez pas encore de compte ?</p>
                                <router-link class="btn button bg-white" to="/register">S'inscrire</router-link>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </template>
     <script>
        export default {
            data() {
                return {
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {
                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password

                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin

                            localStorage.setItem('feater.user', JSON.stringify(user))
                            localStorage.setItem('feater.jwt', response.data.token)

                            if (localStorage.getItem('feater.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push((is_admin == 1 ? 'admin' : '/'))
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>
    
    <style scoped >
         .form-group input{
             border-radius: 50px;
         }
         .button{
             border-radius: 20px;
             width: 100%;
         }
         .container{
             height: 800px;
             background-color: #1C1818;
         }
         hr{
             border-radius: 5px;
             height: 2px;
         }
         .margin{
             margin-top: 80px;
         }

     </style>
    
    