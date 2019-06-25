<template>
        <div>
            
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-dark">
                <div class="container">
                    <router-link :to="{name: 'home'}" class="navimg navbar-brand"><img src="images/logo.png" class="w-50"/> </router-link>
                    <button class="navbar-toggler dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon light"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                            <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                            <span v-if="isLoggedIn">
                                <router-link :to="{ name: 'search' }" class="nav-link" >Sport</router-link>
                                <router-link :to="{ name: 'tchat' }" class="nav-link" >Tchat</router-link>
                                <router-link :to="{ name: 'searchFood' }" class="nav-link" >Food</router-link>
                                <router-link :to="{ name: 'admin' }" class="nav-link" v-if="user_type == 1"> Hi, {{name}}</router-link>
                                <router-link :to="'/profile' " class="nav-link" v-else> Hi, {{name}}</router-link>
                            </span>
                            <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <router-view @loggedIn="change"></router-view>
            </main>
        </div>
    </template>
    <script>
    export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('feater.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('feater.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('feater.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('feater.jwt')
                localStorage.removeItem('feater.user')
                window.location.assign("/")
            }
        }
    }
    </script>
    <style>
    .nav-link {
        cursor: pointer;
    }
    .custom-toggler .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

    .custom-toggler.navbar-toggler {
    border-color: rgb(255,102,203);
    } 
    </style>
    