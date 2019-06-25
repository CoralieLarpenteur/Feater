import Vue from 'vue'
    import VueRouter from 'vue-router'
    //import VueSwing from 'vue-swing'
    import Carousel3d from 'vue-carousel-3d';
//Vue.use(Carousel3d);

    //Vue.component('vue-swing', VueSwing)
    

    Vue.use(VueRouter)
    

    import App from './components/App'
    import Home from './components/Home'
    import Login from './components/Login'
    import Register from './components/Register'
    import Admin from './components/Admin'
    import Search from './components/SearchPatner'
    import SearchFood from './components/SearchFood'
    import Tchat from './components/Tchat'
    import Profile from './components/Profile'
    

    const router = new VueRouter({
        mode: 'history',
        routes: [
            
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/search',
                name: 'search ',
                component: Search
            },
            {
                path: '/profile',
                name: 'profile ',
                component: Profile
            },
            {
                path: '/searchFood',
                name: 'searchFood ',
                component: SearchFood
            },
            {
                path: '/tchat',
                name: 'tchat ',
                component: Tchat
            },
            {
                path: '/admin',
                name: 'admin ',
                component: Admin
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
                        next({ name: 'profile' })
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