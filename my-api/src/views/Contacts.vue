<!-- <template>
  <div class="card">
    <div class="card-body">
      <h1 style="text-align: center; color: blue;">Listes des contacts</h1>
      <div class="card-body">
        <router-link to="/contacts/add" class="btn btn-success">Ajouter</router-link>
      </div>
      <table v-if="contacts.length > 0" class="table">
        <thead style="color: gold;">
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in contacts" :key="contact.id">
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.phone }}</td>
            <td>
              <router-link :to="`/contacts/edit/${contact.id}`" class="btn btn-primary btn-sm">Éditer</router-link>
              <button class="btn btn-danger btn-sm" @click="deleteContact(contact)">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
      <p v-else>Aucun contact trouvé.</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useStore } from 'vuex'; 

const store = useStore();
const contacts = ref([]);

async function fetchContacts() {
  try {
    const response = await axios.get('//http://127.0.0.1:8000/api/contacts');
    contacts.value = response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des contacts:', error);
    // Consider displaying a user-friendly error message
  }
}

const deleteContact = async (contact) => {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/contacts/${contact.id}`);
    store.dispatch('fetchContacts'); // Update state using Vuex action
  } catch (error) {
    console.error('Erreur lors de la suppression du contact:', error);
    // Consider displaying a user-friendly error message
  }
};

fetchContacts();
</script>

<style scoped>
.card {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.card-body {
  margin: 20px 0;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}
</style> -->
<template>
  <div class="card">
    <div class="card-body">
      <h1 style="text-align: center; color: blue;">Listes des contacts</h1>
      <div class="card-body">
        <router-link to="/contacts/add" class="btn btn-success">Ajouter</router-link>
      </div>
      <table v-if="contacts.length > 0" class="table">
        <thead style="color: gold;">
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in contacts" :key="contact.id">
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.phone }}</td>
            <td>
              <router-link :to="`/contacts/edit/${contact.id}`" class="btn btn-primary btn-sm">Éditer</router-link>
              <button class="btn btn-danger btn-sm" @click="deleteContact(contact)">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
      <p v-else>Aucun contact trouvé.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useStore } from 'vuex'; 
import axios from 'axios';

const store = useStore();
const contacts = ref([]);

async function fetchContacts() {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/contacts');
    contacts.value = response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des contacts:', error);
    // Considérez l'affichage d'un message d'erreur convivial
  }
}

const deleteContact = async (contact) => {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/contacts/${contact.id}`);
    store.dispatch('fetchContacts'); // Mettre à jour l'état en utilisant l'action Vuex
  } catch (error) {
    console.error('Erreur lors de la suppression du contact:', error);
    // Considérez l'affichage d'un message d'erreur convivial
  }
};

onMounted(fetchContacts);
</script>

<style scoped>
.card {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.card-body {
  margin: 20px 0;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}
</style>
