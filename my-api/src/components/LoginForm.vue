<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <!-- Champs d'entrée pour l'email et le numéro -->
      <input type="email" v-model="email" placeholder="Email" required>
      <input type="number" v-model="number" placeholder="Number" required>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const email = ref('');
const number = ref('');
const router = useRouter();

const login = () => {
  // Vérification de la connexion dans la base de données ou système d'authentification
  // Si les informations de connexion sont correctes, mettre à jour l'état de la connexion
  // et rediriger vers la page des contacts
  if (verifyCredentials(email.value, number.value)) {
    // Mettre à jour l'état de la connexion
    // Par exemple, si vous utilisez Vuex :
    // store.commit('loginSuccess');

    // Rediriger vers la page des contacts
    router.push('/contacts');
  } else {
    alert('Invalid email or number');
  }
};

// Fonction fictive pour vérifier les informations d'identification
const verifyCredentials = (email, number) => {
  // Implémentez votre logique de vérification des informations d'identification ici
  // Par exemple, vérifiez si les informations sont valides dans une base de données
  // ou un système d'authentification externe
  // Retourne true si les informations sont valides, sinon false
  return true; // Remplacez ceci par votre logique de vérification réelle
};
</script>
