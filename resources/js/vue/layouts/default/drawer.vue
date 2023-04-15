<template>
  <v-navigation-drawer v-model="drawer" class="side">
    <v-list dense v-if="!isLogedIn" color="primary"> </v-list>
    <v-list dense v-if="isLogedIn" color="primary">
      <v-list-item>
        <v-list-item-title class="text-h6">{{ user.name }}</v-list-item-title>
        <v-list-item-subtitle> </v-list-item-subtitle>
        <v-list-item-subtitle>
          <v-btn
            size="x-small"
            color="primary lighten-4"
            class="pa-0 px-2 mt-1"
            @click="logout"
            >خروج</v-btn
          >
        </v-list-item-subtitle>
      </v-list-item>
    </v-list>

    <v-list density="compact" v-if="isLogedIn">
      <v-list-subheader>عملیات کاربر</v-list-subheader>
      <v-list-item active-color="primary" :to="{ name: 'user.jobs' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple"></v-icon>
        </template>
        <v-list-item-title>اعلام همکاری</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'user.jobs.form' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple"></v-icon>
        </template>
        <v-list-item-title>ویرایش اطلاعات</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'user.jobs.documents' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple"></v-icon>
        </template>
        <v-list-item-title>ارسال مدارک</v-list-item-title>
      </v-list-item>
      <v-list-item active-color="primary" :to="{ name: 'user.documents' }">
        <template v-slot:prepend>
          <v-icon icon="mdi-account-multiple"></v-icon>
        </template>
        <v-list-item-title>مشاهده پرونده پزشکی</v-list-item-title>
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
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, watch, defineEmits } from "vue";
import { useAuthStore } from "@/store/auth";
import { useOptionsStore } from "@/store/options";
import { useRoute, useRouter } from "vue-router";

const emit = defineEmits(["drawerChanged"]);

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
    emit("drawerChanged", first);
  }
);

onMounted(() => {
  drawer.value = props.drawer;
});
</script>
