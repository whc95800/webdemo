import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import Service from "@/views/Service";
import About from "@/views/About";
import Access from "@/views/Access";
import Contact from "@/views/Contact";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/service',
        name: 'Service',
        component: Service
    },
    {
        path: '/access',
        name: 'Access',
        component: Access
    },
    {
        path: '/contact',
        name: 'Contact',
        component: Contact
    },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
