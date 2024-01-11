<template>
  <div id="editContact">
    <div class="name-display">
      <div>
        <span v-if="contact">{{ prenom }}</span>
        <span v-if="contact" class="bold">{{ " " + nomFamille }}</span>
      </div>
        <button class="editButton"><Icon icon="mdi:gear" /> Editer</button>
    </div>
    <br>
    <div id="info-header">
      <p class="bold" style="margin-top: 0; text-align: start;">INFORMATIONS</p>
      <hr>

      <div class="info">
        <div class="left-info">
          <p class="bold">Prénom & NOM</p>
          <p class="bold">Téléphone</p>
          <p class="bold">Email</p>
          <p class="bold">Adresse</p>
          <p class="bold">Code postal</p>
          <p class="bold">Ville</p>
        </div>
        <div class="right-info">
          <input v-if="contact" type="text" v-model="nom">
          <input v-if="contact" type="text" v-model="tel">
          <input v-if="contact" type="text" v-model="email">
          <input v-if="contact" type="text" v-model="adresse">
          <input v-if="contact" type="text" v-model="codePostal">
          <input v-if="contact" type="text" v-model="ville">
        </div>
      </div>
      
      <hr>
      <div style="margin-top: 20px; display: flex; justify-content: end;">
        <button id="cancelButton" @click="goBack">Annuler</button>
        <button id="saveButton" @click="handleSave">Enregistrer</button>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue"
import { ref } from 'vue'
import { useRoute } from 'vue-router'
import router from '@/router'


export default {
  components: { Icon },
  props: ['test'],
  setup(){
    const route = useRoute()    
    let prenom = ref()
    let nomFamille = ref()
    let contact = ref()
    const id = route.params.id

    const nom = ref()
    const tel = ref()
    const email = ref()
    const adresse = ref()
    const codePostal = ref()
    const ville = ref()

    const fetchContact = async () => {
      await fetch("http://localhost:8000/getContact.php?id=" + id)
        .then(res => res.json())
        .then(data => contact.value = data)
        .catch(err => {
          console.log(err)
        })

      contact.value = JSON.parse(JSON.stringify(contact._value.datas))
      prenom.value = contact.value.nom.split(' ')[0]
      nomFamille.value = contact.value.nom.split(' ')[1]

      nom.value = contact.value.nom
      tel.value = contact.value.tel
      email.value = contact.value.email
      adresse.value = contact.value.adresse
      codePostal.value = contact.value.codePostal
      ville.value = contact.value.ville
    }

    fetchContact()

    const handleSave = () => {
      const updatedData = { nom: nom.value, tel: tel.value, email: email.value, adresse: adresse.value, codePostal: codePostal.value, ville: ville.value }

      const requestOptions = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(updatedData)
      }
      fetch("http://localhost:8000/updateContact.php?id=" + id, requestOptions)
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(err => {
          console.log(err)
        })
    }

    const goBack = () => {
      router.go(-1)
    }

    
    return { prenom, nomFamille, contact, id, nom, tel, email, adresse, codePostal, ville, handleSave, goBack }
  }
}
</script>

<style>
#editContact{
  width: 80%;
  margin: auto;
}
hr {
  border: none;
  height: 1px;
  background-color: rgb(192, 192, 192);
}
input{
  margin-top: 15px;
  border: 1px solid rgb(192, 192, 192);
  padding: 4px;
}
#cancelButton{
  color: rgb(192, 192, 192);
  background: white;
  padding: 10px 20px;
  border-radius: 5px;
  border: 1px solid rgb(192, 192, 192);
  margin-right: 5px;
}
#saveButton{
  color: white;
  background: #82B450;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
}
</style>