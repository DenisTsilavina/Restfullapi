<template>
  <div class="card">
    <div class="card-body">
      <h1>Éditer le contact</h1>
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="name" class="form-label">Nom</label>
          <input type="text" v-model="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" v-model="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Téléphone</label>
          <input type="text" v-model="phone" class="form-control" id="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Éditer</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

// Initialisation des variables
const router = useRouter();
const route = useRoute();

const name = ref('');
const email = ref('');
const phone = ref('');

// Fonction pour récupérer les informations du contact
const fetchContact = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/contacts/${route.params.id}`);
    name.value = response.data.name;
    email.value = response.data.email;
    phone.value = response.data.phone;
  } catch (error) {
    console.error('Erreur lors de la récupération du contact:', error);
  }
};

// Fonction pour soumettre le formulaire
const submitForm = async () => {
  try {
    const contactId = route.params.id; // Récupération de l'ID du contact à partir des paramètres de la route
    const updatedContactData = {
      name: name.value,
      email: email.value,
      phone: phone.value
    };
    console.log('Updating contact:', contactId, updatedContactData); // Debugging
    await axios.put(`http://127.0.0.1:8000/api/contacts/${contactId}`, updatedContactData);
    router.push('/contacts'); // Redirection vers la liste des contacts après mise à jour
  } catch (error) {
    console.error('Erreur lors de la mise à jour du contact:', error);
  }
};

// Chargement des informations du contact lors de l'initialisation du composant
onMounted(fetchContact);
</script>

<style>
/* Styles pour le composant */
.card {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.card-body {
  margin: 20px 0;
}

.form-label {
  display: block;
  margin-bottom: 5px;
}

.mb-3 {
  margin-bottom: 15px;
}

.btn {
  margin-top: 10px;
}
</style>
