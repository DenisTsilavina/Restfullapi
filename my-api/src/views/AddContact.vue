I'd be glad to provide a corrected and enhanced response that addresses the identified issue and incorporates valuable insights from the ratings:

Code snippet
<template>
  <div class="add-contact">
    <h2>Ajouter un contact</h2>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" v-model="newContact.name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="newContact.email" required>
      </div>
      <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="number" id="phone" v-model="newContact.phone">
      </div>
      <button type="submit" class="btn btn-primary">Créer</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios'; // Assuming you're using Axios for API calls

const newContact = ref({
  name: '',
  email: '',
  phone: '', // Optional phone field
});

const handleSubmit = async () => {
  try {
    // Validate email format before sending request
    if (!validateEmail(newContact.value.email)) {
      console.error('Email invalide. Veuillez saisir une adresse email valide.');
      return; // Prevent sending invalid data to the API
    }

    const response = await axios.post('http://127.0.0.1:8000/api/contacts', newContact.value);
    console.log('Contact créé avec succès:', response.data);

    // Clear form data and optionally redirect to contacts list
    newContact.value = { name: '', email: '', phone: '' };
    // router.push('/contacts'); // Implement router navigation if needed

  } catch (error) {
    console.error('Erreur lors de la création du contact:', error);
    // Handle errors appropriately, e.g., display user-friendly error messages
  }
};

// Function to validate email format (optional but recommended)
function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
</script>

<style scoped>
.add-contact {
  max-width: 400px; /* Ajustez la largeur maximale selon vos besoins */
  margin: 0 auto; /* Pour centrer horizontalement le formulaire */
}

.add-contact h2 {
  text-align: center;
  margin-bottom: 20px; /* Espacement sous le titre */
}

.form-group {
  margin-bottom: 20px; /* Espacement entre chaque champ de formulaire */
}

.form-group label {
  font-weight: bold; /* Met en évidence les étiquettes */
}

.form-group input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.btn-primary {
  display: block; /* Afficher le bouton sur une ligne distincte */
  width: 100%; /* Remplir la largeur du contenant */
  padding: 10px;
  font-size: 16px;
  text-align: center;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0056b3; /* Couleur de survol du bouton */
}
</style>