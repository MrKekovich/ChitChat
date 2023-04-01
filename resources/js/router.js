import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        // Main routes //
        {
            path: '/',
            component: () => import('./components/Main/IndexComponent.vue'),
            name: "index",
        },
        {
            path: '/:pathMatch(.*)*',
            component: () => import('./components/Main/Errors/NotFoundComponent.vue'),
            name: "404",
        },
        // Main routes //
        // Chats routes //
        {
            path: '/chats',
            component: () => import('./views/Chat/ChatList.vue'),
            name: "chat.index",
        },
        {
            path: '/chats/create',
            component: () => import('./views/Chat/ChatCreate.vue'),
            name: "chat.create",
        },
        {
            path: '/chats/:id',
            component: () => import('./views/Chat/ChatDetails.vue'),
            name: "chat.show",
        },
        // Chats routes //
    ]
})

export default router
