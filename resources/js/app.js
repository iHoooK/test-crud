import { createApp } from 'vue';
import './bootstrap';
import IndexComponent from '@/components/IndexComponent.vue';

const app = createApp({})
    .component('index-component', IndexComponent)
    .mount('#app');
