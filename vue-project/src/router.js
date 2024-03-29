import { createRouter, createWebHistory } from 'vue-router'
import MainView from './views/MainView.vue'
import Posts from './views/Posts/Posts.vue'
import CreatePosts from './views/Posts/CreatePost.vue'
import EditPost from './views/Posts/EditPost.vue'
import ShowPost from './views/Posts/ShowPost.vue'
import Login from './views/Auth/Login.vue'
import Get from './views/Auth/Get.vue'
import Registration from './views/Auth/Registration.vue'

const router = createRouter({
    history: createWebHistory(''),
    routes: [
        {
            path: '/',
            name: 'main',
            component: MainView
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts
        },
        {
            path: '/create-posts',
            name: 'create.posts',
            component: CreatePosts
        },
        {
            path: '/show-post/:id',
            name: 'show.post',
            component: ShowPost
        },
        {
            path: '/edit-post/:id',
            name: 'edit.post',
            component: EditPost
        },
        {
            path: '/get',
            name: 'get',
            component: Get
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/registration',
            name: 'registration',
            component: Registration
        },
    ]
})

export default router