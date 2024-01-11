<template>
  <div id="searchContact">
    <div id="page-title">Recherche d'une fiche de contact</div>
    <br>
    <SearchBox />
    <br>
    <ListContacts />
  </div>
</template>

<script>
import SearchBox from "../components/SearchBox"
import ListContacts from "../components/ContactsList/ListContacts"

export default {
  components: { SearchBox, ListContacts },
}
</script>

<style>
#searchContact{
  width: 80%;
  margin: auto;
}
#page-title{
  text-align: start;
  padding: 20px;
  font-size: 25PX;
  box-shadow: 0.5px 0.5px 1px 1px rgb(192, 192, 192);
  background: white;
}
.bold{
  font-weight: 800;
}
</style>