import { createRouter, createWebHistory } from 'vue-router';

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('../App.vue'),
            children: [
                {
                    path: '',
                    component: () => import('../pages/mainApp'),
                    name: 'main',
                },
                {
                    path: 'login',
                    component: () => import('../pages/loginPage.vue'),
                    name: 'login'
                },
                {
                    path: 'sign',
                    component: () => import('../pages/regPage.vue'),
                    name: 'sign'
                }
            ]
        },
        {
            path: '/',
            component: () => import('../pages/homePage'),
            children: [
                {
                    path: 'home',
                    component: () => import('../pages/homeHeader'),
                    name: 'home'
                },
                {
                    path: 'catalog',
                    component: () => import('../pages/catalogHeader'),
                    name: 'catalog'
                },
                {
                    path: 'basket',
                    component: () => import('../pages/basketHeader'),
                    name: 'basket'
                },
                {
                    path: 'profile',
                    component: () => import('../pages/profilePage'),
                    name: 'profile'
                }
            ]
        }

    ],
    linkActiveClass: 'active',
    linkExactActiveClass: 'active'
});


export default router;