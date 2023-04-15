<template>
  <v-layout app>
    <v-locale-provider app rtl>
      <v-app-bar
        app
        height="60"
        elevation="1"
        color="primary"
        :absolute="!drawer"
        class="appbar"
      >
        <v-app-bar-nav-icon @click.stop="drawer = !drawer" v-if="auth.isLogedIn"></v-app-bar-nav-icon>
        <a
          href="#"
          style="margin: 0; padding: 0"
          @click.stop="router.push('/')"
          class="mx-5"
        >
        <h1 class="h1">ثمین</h1>
          <!-- <img class="mx-5" src="/images/logo.png" height="50"/> -->
        </a>
      
        <v-spacer></v-spacer>
        <v-btn
          variant="text"
          :color="isLogedIn ? 'white' : 'white'"
          @click="auth.showLoginForm()"
        >
          <template v-if="auth.isLogedIn">{{ auth.user.name }}</template>
          <template v-if="!auth.isLogedIn">ورود/ثبت‌نام</template>
        </v-btn>
      </v-app-bar>
      <nav-drawer :drawer="drawer" @drawerChanged="drawerChanged" />
      <v-main>
        <slot />
        <breadcrumbs />
        <app-progress />
        <router-view v-slot="{ Component }">
          <v-slide-x-transition leave-absolute>
            <component :is="Component" />
          </v-slide-x-transition>
        </router-view>
        <v-footer class="bg-white" elevation="2" app>
          <v-row justify="center" no-gutters>
            <v-col class="text-center text-grey text-subtitle-1" cols="12">
              <small> مرکز نگهداری و پرستاری ثمین</small>
            </v-col>
          </v-row>
        </v-footer>
      </v-main>
    </v-locale-provider>
  </v-layout>
</template>

<script setup>
import NavDrawer from "./default/drawer.vue";
import Breadcrumbs from "@/components/Breadcrumbs.vue";
import AppProgress from "@/components/AppProgress.vue";
import { computed, ref } from "vue";
import { useAuthStore } from "@/store/auth";
import { useOptionsStore } from "@/store/options";
import { useRoute, useRouter } from "vue-router";

const drawer = ref(false),
  auth = useAuthStore(),
  options = useOptionsStore(),
  loading = false,
  route = useRoute(),
  router = useRouter(),
  isLogedIn = computed(() => auth.isLogedIn);

const user = computed(() => {
  if (auth.user !== null) {
    return auth.user;
  }
});

const siteName = computed(() => {
  // if(options.hasOwnProperty("options.sitename"))
  return options.options.sitename ?? "مشاوره";
});

async function logout() {
  await auth.logout();
  if (route.meta.requireAuth) router.push("/");
}

function drawerChanged(drawerVal) {
  drawer.value = drawerVal;
}
</script>
<style scoped>
.appbar a {
  text-decoration: none;
  color: white;
  margin-left: 30px;
}
</style>