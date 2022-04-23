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
            path: '/:id',
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
                    path: 'productList',
                    component: () => import('../pages/productList'),
                    name: 'productList'
                },
                {
                  path: 'productCard',
                  component: () => import('../pages/productCard'),
                  name: 'productCard'
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
        },
        {
            path: '/order',
            component: () => import('../pages/orderPage'),
            name: 'order'
        }
    ],
    linkActiveClass: 'active',
    linkExactActiveClass: 'active'
});


export default router;