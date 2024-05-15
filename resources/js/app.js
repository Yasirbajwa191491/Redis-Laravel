import './bootstrap';
import { createApp } from 'vue'; // Import createApp from Vue
import App from './App.vue';
import { routes } from './routes';
import 'bootstrap/dist/css/bootstrap.min.css';
import '@fortawesome/fontawesome-free/css/all.css'

// Import VueRouter inside the components where you'll use it

const app = createApp(App); // Create the Vue app instance

// Define routes and create router inside the main component or router file
import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Use the router with the app
app.use(router);

// Mount the app to the DOM
app.mount('#app');
