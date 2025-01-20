import './bootstrap';
import { createApp } from 'vue';
import Departments from './component/Departments.vue';
import axios from 'axios';

const app=createApp({})
app.component('departments',Departments)
window.baseUrl = '/';
app.mount('#app')

