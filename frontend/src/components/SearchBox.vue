<template>
  <div id="searchBox">
    <div id="search">
      <p for="name" class="bold" style="text-align: start">Renseigner un nom ou une dénomination</p>
      <input id="input" type="text" name="name" placeholder="Nom ou dénomination" v-model="name">
      <br><br>
      <div style="display: flex; justify-content: end">
        <button id="searchButton" @click="handleSearch">Rechercher</button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'

export default {
  setup() {
    let contacts = ref([])
    const name = ref("jean")
    const handleSearch = async () => {
      
    }

    const fetchContacts = async () => {
      await fetch("http://localhost:8000/getContacts.php?nom=" + name)
        .then(res => res.json())
        .then(data => contacts.value = data)
        .catch(err => {
          console.log(err)
        })

      contacts = JSON.parse(JSON.stringify(contacts._value.datas))
    }

    fetchContacts()

    return { name, contacts }
  }
}
</script>

<style>
#searchBox{
  box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192);
  background: white;
  padding: 20px;
}
#search{
  width: 40%;
  margin: auto;
}
#input {
  border: 0.5px solid gray;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 5px;
  width: 95%
}
#searchButton {
  color: white;
  background: #FA823C;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  right: 0;
}


</style>