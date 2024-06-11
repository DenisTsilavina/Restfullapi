import { createApp } from 'vue';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.css';
import { createRouter, createWebHistory } from 'vue-router';

import ContactsList from './views/Contacts.vue'; // Assuming this is the correct file
import AddContact from './views/AddContact.vue';
import EditContact from './views/EditContact.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    
    { path: '/', component: ContactsList },
    { path: '/contacts/add', component: AddContact },
    { path: '/contacts/edit/:id', component: EditContact },
    // Add other routes as needed
  ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');