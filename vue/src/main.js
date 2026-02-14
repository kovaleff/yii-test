import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import Lara from '@primeuix/themes/lara';
import PrimeVue from 'primevue/config';

createApp(App).use(PrimeVue, { theme: { preset: Lara}}).mount('#app')
