import { createRouter, createWebHistory } from 'vue-router'
import SearchContact from '../views/SearchContact'
import ContactDetails from '../views/ContactDetails'
import EditContact from '../views/EditContact'

const routes = [
  {
    path: '/',
    name: 'SearchContact',
    component: SearchContact
  },
  {
    path: '/details/:id',
    name: 'ContactDetails',
    component: ContactDetails
  },
  {
    path: '/edit/:id',
    name: 'EditContact',
    component: EditContact
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
