<template>
  <td>
    <img style="border-radius: 50%; width: 40%" :src="'https://ui-avatars.com/api/?name=' + contact.nom" alt="">
  </td>
  <td class="bold textAlignStart">{{ contact.nom }}</td>
  <td class="textAlignStart">{{ contact.adresse }}</td>
  <td class="textAlignStart">{{ contact.ville }}</td>
  <td class="textAlignStart">{{ contact.tel }}</td>
  <td>
    <router-link v-if="contact.id" :to="{ name: 'ContactDetails', params : { id: contact.id } }">
      <button id="seeDetails"><Icon icon="mdi-light:magnify" /> Voir</button>
      
    </router-link>
  </td>
</template>

<script>
import { Icon } from "@iconify/vue"

export default {
  components: { Icon },
  props: ['contact'],
}
</script>

<style>
#seeDetails {
  color: white;
  background: #4F73BA;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
}
</style>