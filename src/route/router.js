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
        }

    ],
    linkActiveClass: 'active',
    linkExactActiveClass: 'active'
});


export default router;