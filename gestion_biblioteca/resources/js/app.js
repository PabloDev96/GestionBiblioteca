import './bootstrap';
import { createApp } from 'vue';
import Biblioteca from '@/components/Biblioteca.vue';
import BookList from '@/components/BookList.vue';
import router from './router';
// Creamos aplicación
createApp(Biblioteca).use(router).mount('#app');
