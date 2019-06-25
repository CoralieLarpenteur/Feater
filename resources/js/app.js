import Vue from 'vue'
    import VueRouter from 'vue-router'

    Vue.use(VueRouter)

    import * as VueGoogleMaps from "vue2-google-maps";

    Vue.use(VueGoogleMaps, {
        load: {
            key: "AIzaSyDSe50JrFASadaw3cA2trvIEziDTCel4pE",
            libraries: "places" // necessary for places input
        }
    });

    import App from './components/App'
    import Home from './components/Home'
    import Login from './components/Login'
    import Register from './components/Register'
    import Restaurant from './components/Restaurant'
    

    const router = new VueRouter({
        mode: 'history',
        routes: [
            
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/login',
                name: 'login',
                component: Login
            },
            {
                path: '/register',
                name: 'register',
                component: Register
            },
            {
                path: '/restaurants',
                name: 'restaurant',
                component: Restaurant
            },
        ],
    })

    router.beforeEach((to, from, next) => {
        if (to.matched.some(record => record.meta.requiresAuth)) {
            if (localStorage.getItem('feater.jwt') == null) {
                next({
                    path: '/login',
                    params: { nextUrl: to.fullPath }
                })
            } else {
                let user = JSON.parse(localStorage.getItem('feater.user'))
                if (to.matched.some(record => record.meta.is_admin)) {
                    if (user.is_admin == 1) {
                        next()
                    }
                    else {
                        next({ name: 'userboard' })
                    }
                }
                else if (to.matched.some(record => record.meta.is_user)) {
                    if (user.is_admin == 0) {
                        next()
                    }
                    else {
                        next({ name: 'admin' })
                    }
                }
                next()
            }
        } else {
            next()
        }
    })

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
    });