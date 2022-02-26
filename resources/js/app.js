require('./bootstrap');
import { createApp } from "vue";
import App from './vue/App';
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas);

const app = createApp(App);

app.component('fai',FontAwesomeIcon);

app.mount('#app');



