<template>
  <v-navigation-drawer v-model="drawer" class="side">
    <v-list dense v-if="!isLogedIn" color="primary">
    
    </v-list>
    <v-list dense v-if="isLogedIn" color="primary">
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">{{ user.name }}</v-list-item-title>
          <v-list-item-subtitle>
            اعتبار: {{ user.remain_credit }}
          </v-list-item-subtitle>
          <v-list-item-subtitle>
            <v-btn
              size="x-small"
              color="primary lighten-4"
              class="pa-0 px-2 mt-1"
              @click="logout"
              >خروج</v-btn
            >
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-list density="compact" v-if="isLogedIn">
      <v-list-subheader>عملیات کاربر</v-list-subheader>
      <v-list-item active-color="primary" :to="{ name: 'wallet' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-wallet"></v-icon>
        </template>
        <v-list-item-title>کیف پول</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'history' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-phone-log"></v-icon>
        </template>
        <v-list-item-title>تاریخچه تماس ها</v-list-item-title>
      </v-list-item>
    </v-list>

    <v-list density="compact" v-if="isLogedIn && auth.isAdmin">
      <v-list-subheader>عملیات مدیر</v-list-subheader>
      <v-list-item active-color="primary" :to="{ name: 'admin.users' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple"></v-icon>
        </template>
        <v-list-item-title>مدیریت کاربران</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'admin.advisors' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple-outline"></v-icon>
        </template>
        <v-list-item-title>مدیریت مشاورین</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'admin.categories' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-format-list-bulleted-type"></v-icon>
        </template>
        <v-list-item-title>مدیریت دسته بندی ها</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'admin.calls' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-phone-log"></v-icon>
        </template>
        <v-list-item-title>تماس ها</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'admin.options' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-cog"></v-icon>
        </template>
        <v-list-item-title> تنظیمات سیستم</v-list-item-title>
      </v-list-item>
    </v-list>
    <v-list density="compact" v-if="isLogedIn && auth.isAdvisor">
      <v-list-subheader>عملیات مشاور</v-list-subheader>
      <v-list-item active-color="primary" :to="{ name: 'advisor.dashboard' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-view-dashboard"></v-icon>
        </template>
        <v-list-item-title>داشبورد مشاور</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'commingsoon' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-timetable"></v-icon>
        </template>
        <v-list-item-title>برنامه زمان بندی مشاور</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'commingsoon' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-phone-log"></v-icon>
        </template>
        <v-list-item-title>تماس های من</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, watch, defineEmits } from "vue";
import { useAuthStore } from "@/store/auth";
import { useOptionsStore } from "@/store/options";
import { useRoute, useRouter } from "vue-router";

const emit = defineEmits(['drawerChanged'])

const props = defineProps(["drawer"]);

const drawer = ref(false),
  auth = useAuthStore(),
  options = useOptionsStore(),
  route = useRoute(),
  router = useRouter(),
  isLogedIn = computed(() => auth.isLogedIn);

const user = computed(() => {
  if (auth.user !== null) {
    return auth.user;
  }
});

async function logout() {
  await auth.logout();
  if (route.meta.requireAuth) router.push("/");
}

watch(
  () => props.drawer,
  (first) => {
    drawer.value = first;
  }
);
watch(
  () => drawer.value,
  (first) => {
    emit("drawerChanged",first)
  }
);

onMounted(() => {
  drawer.value = props.drawer;
});
</script>
