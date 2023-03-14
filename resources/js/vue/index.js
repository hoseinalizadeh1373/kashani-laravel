
import { createApp } from 'vue';

const app = createApp({});

import LoginForm from './components/LoginForm.vue';
app.component('login-form', LoginForm);

import CrmEntrance from './components/CrmEntrance.vue';
app.component('crm-entrance', CrmEntrance);

import Notifications from '@kyvg/vue3-notification'
app.use(Notifications)

app.mount('#app');
