<template>
  <table id="listContacts">
    <thead id="table-head">
      <tr style="height:40px">
        <th></th>
        <th class="bold textAlignStart">Nom</th>
        <th class="bold textAlignStart">Adresse</th>
        <th class="bold textAlignStart">Ville</th>
        <th class="bold textAlignStart">Téléphone</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr style="height:80px; box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192)" v-for="contact in contacts" :key="contact.id">
        <SingleContact :contact="contact" />
      </tr>
    </tbody>
  </table>
</template>

<script>
import { onMounted, ref } from 'vue'
import SingleContact from "./SingleContact"
export default {
  components: { SingleContact },
  setup(){
    let contacts = ref([])

    onMounted(async () => {
      await fetch("http://localhost:8000/getContacts.php?id=&nom=&adresse=&ville=&tel=")
      .then(res => res.json())
      .then(data => contacts.value = data)
      .catch(err => {
        console.log(err)
      })
      contacts.value = JSON.parse(JSON.stringify(contacts._value.datas))
    })
    return { contacts }
  }
}
</script>

<style>
#listContacts{
  box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192);
  background: white;
  width: 100%;
}
#table-head{
  background: #F0F0F0;
}
table {
  border-collapse: collapse;
}
.textAlignStart{
  text-align: start;
}
</style>