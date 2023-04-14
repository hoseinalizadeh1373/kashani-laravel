import { createRouter } from 'vue-router'

import Homepage from '@/pages/publics/home/Home.vue';
import Forbidden from '@/pages/publics/Forbidden.vue';

import Documents from '@/pages/user/Documents/Documents.vue';
import Jobs from '@/pages/user/Jobs/Jobs.vue';
import JobsForm from '@/pages/user/Jobs/Form.vue';
import JobsDucuments from '@/pages/user/Jobs/Documents.vue';
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
    path: "/user/documents",
    name: "user.documents",
    component: Documents,
    meta: { requireAuth: true, },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },

  {
    path: "/user/jobs",
    name: "user.jobs",
    component: Jobs,
    meta: { requireAuth: true, },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },
  {
    path: "/user/jobs/form",
    name: "user.jobs.form",
    component: JobsForm,
    meta: { requireAuth: true, },
    children: [
      // { path: 'base', component: Walleti },
    ]
  },
  {
    path: "/user/jobs/documents",
    name: "user.jobs.documents",
    component: JobsDucuments,
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