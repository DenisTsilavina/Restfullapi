import { createRouter, createWebHistory } from 'vue-router';

import Home from '@/components/Home.vue'; // Assuming your Home component path
import ContactsList from '@/views/Contacts.vue';
import AddContact from '@/views/AddContact.vue';
import EditContact from '@/views/EditContact.vue';
import LoginForm from '@/components/LoginForm.vue';
import LoginForm from '@/components/LoginForm.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/login', redirect: 'https://example.com/login' },

    { path: '/contacts', name: 'Contacts', component: ContactsList },
    { path: '/contacts/add', name: 'AddContact', component: AddContact },
    { path: '/contacts/edit/:id', name: 'EditContact', component: EditContact, props: true },
    
    // Add other routes here if necessary
  ],
});
// Logique de redirection vers la page de connexion externe si l'utilisateur n'est pas authentifié
router.beforeEach((to, from, next) => {
  const isLoggedIn = localStorage.getItem('isLoggedIn'); // Exemple avec localStorage
  if (to.name !== 'Login' && !isLoggedIn) {
    next({ name: 'Login' });
  } else {
    next();
  }
});

export default router;