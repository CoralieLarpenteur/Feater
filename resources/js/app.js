import Vue from 'vue'
    import VueRouter from 'vue-router'

    Vue.use(VueRouter)

    import App from './components/App'
    import Home from './components/Home'
    import Login from './components/Login'
    import Register from './components/Register'
    

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
        ],
    })

    router.beforeEach((to, from, next) => {
        if (to.matched.some(record => record.meta.requiresAuth)) {
            if (localStorage.getItem('bigStore.jwt') == null) {
                next({
                    path: '/login',
                    params: { nextUrl: to.fullPath }
                })
            } else {
                let user = JSON.parse(localStorage.getItem('bigStore.user'))
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