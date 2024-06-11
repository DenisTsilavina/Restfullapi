<template>
  <div class="card">
    <div class="card-body">
      <h1>Liste des contacts</h1>
      <div class="card-body">
        <button class="btn btn-success" @click="addContact">Ajouter</button>
      </div>
      <table v-if="contacts.length > 0" class="table">
        <thead>
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
              <button class="btn btn-primary btn-sm" @click="editContact(contact)">Éditer</button>
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
import axios from 'axios'; 

const contacts = ref([]);

const fetchContacts = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/contacts'); 
    contacts.value = response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des contacts:', error);
  }
};

const addContact = () => {
  // Logique pour ajouter un contact
};

const editContact = (contact) => {
  // Logique pour éditer un contact
};

const deleteContact = async (contact) => {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/contacts/${contact.id}`);
    fetchContacts(); // Actualiser la liste des contacts après suppression
  } catch (error) {
    console.error('Erreur lors de la suppression du contact:', error);
  }
};

fetchContacts();
</script>

<style>
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

.table th, .table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}
</style>
