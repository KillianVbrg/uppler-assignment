<template>
  <div id="contactDetails">
    <div class="name-display">
      <div>
        <span v-if="contact">{{ prenom }}</span>
        <span v-if="contact" class="bold">{{ " " + nomFamille }}</span>
      </div>
      <div>
        <router-link v-if="id" :to="{ name: 'EditContact', params : { id: id } }">
          <button class="editButton"><Icon icon="mdi:gear" /> Editer</button>
        </router-link>
      </div>
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
        </div>
        <div class="right-info">
          <p v-if="contact">{{ contact.nom }}</p>
          <p v-if="contact">{{ contact.tel }}</p>
          <p v-if="contact">{{ contact.email }}</p>
          <p v-if="contact">{{ contact.adresse }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue"
import { ref } from 'vue'
import { useRoute } from 'vue-router'

export default {
  components: { Icon },
  setup(){
    const route = useRoute()
    let prenom = ref()
    let nomFamille = ref()
    let contact = ref()
    const id = route.params.id

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
    }

    fetchContact()

    
    return { prenom, nomFamille, contact, id }
  }
}
</script>

<style>
#contactDetails{
  width: 80%;
  margin: auto;
}
.name-display{
  text-align: start;
  padding: 20px;
  font-size: 25PX;
  box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192);
  background: white;
  display: flex;
  justify-content: space-between;
}
.editButton{
  color: white;
  background: #FA823C;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
}
#info-header{
  box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192);
  background: white;
  padding: 20px;
}
hr {
  border: none;
  height: 1px;
  background-color: rgb(192, 192, 192);
}
.info{
  width: 40%;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
.right-info{
  width: 50%;
  line-height: 23px;
  text-align: start;
  padding-left: 20px;
}
.left-info{
  width: 50%;
  border-right: 1px solid rgb(192, 192, 192);
  text-align: end;
  padding-right: 20px;
}
</style>