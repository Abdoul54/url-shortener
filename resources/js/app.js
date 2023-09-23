import "bootstrap";

import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from 'vue-router';
import URLShortenerForm from "./components/URLShortenerForm.vue";
import ShortenedURLList from './components/ShortenedURLList.vue';

const routes = [
  { path: '/', component: URLShortenerForm },
  { path: '/urls/list', component: ShortenedURLList },
];
const router = createRouter({
  history: createWebHistory(),
  routes
});
//app.component("url-shortener-form", URLShortenerForm);
const app = createApp(App);
app.component('app', App);
app.use(router);
app.mount('#app');
