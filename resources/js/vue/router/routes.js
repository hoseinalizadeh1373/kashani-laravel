import { createRouter } from 'vue-router'

import Homepage from '@/pages/publics/home/Home.vue';
import Forbidden from '@/pages/publics/Forbidden.vue';

import Profile from '@/pages/user/Profile.vue';
import Users from '@/pages/admin/users/Users.vue';
import Options from '@/pages/admin/options/Options.vue';

const routes = [
  {
    path: '/',
    component: Homepage,
    name: "home",
  },

  {
    path: "/profile",
    name: "profile",
    component: Profile,
    meta: { requireAuth: true, },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },


  {
    path: "/admin/users",
    name: "admin.users",
    component: Users,
    meta: { requireAuth: true, level: "admin" },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },
  {
    path: "/admin/options",
    name: "admin.options",
    component: Options,
    meta: { requireAuth: true, level: "admin"  },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },
  {
    path: '/forbidden',
    name: "forbidden",
    component: Forbidden
  },

]

export default function (history) {
  return createRouter({
    history,
    routes
  })
}