<template src="./login.html"></template>

<script setup>
import { reactive, computed, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useAuthStore } from "@/store/auth";

const auth = useAuthStore();
const route = useRoute();
const dialog = computed(() => {
  return auth.loginFormDisplay;
});

const router = useRouter();

const data = reactive({
  mode: "login",
  loading: false,
  image: null,

  loginForm: null,
  formErrors: {},

  mobile: "",
  firstname: "",
  lastname: "",
  password: "",
  entrance_fee: "",
  credit_ratio: "",
  title: "",
  showPassword: false,
});

const intendedUrl = auth.intendedUrl;
auth.setIntendedUrl("");

function register() {
  data.formErrors = {};
  data.loading = true;
  auth
    .register(data)
    .then(async (res) => {
      const user = await auth.fetchUser();
      if (intendedUrl !== "") {
        router.push({ path: intendedUrl });
      }
      auth.hideLoginform();
    })
    .catch((error) => {
      if (error.response.status == 422) {
        data.formErrors = error.response.data.errors;
      }
    })
    .then(() => {
      data.loading = false;
    });
}

function requestToken() {
  data.loading = true;
  data.formErrors = {};
  auth
    .requestToken(data.mobile)
    .then(async (res) => {
      const user = await auth.fetchUser();
      if (intendedUrl !== "") {
        router.push({ path: intendedUrl });
      }
      auth.hideLoginform();
    })
    .catch(function (error) {
      if (error.response) {
        if (error.response.status == 422) {
          data.formErrors = error.response.data.errors;
        }
        if (error.response.status == 401) {
          data.formErrors = {
            mobile: "شماره موبایل یا رمز عبور اشتباه است",
          };
        }
      }
    })
    .then(() => {
      data.loading = false;
    });
}

async function logout() {
  data.loading = true;
  await auth.logout();
  data.loading = false;
  auth.hideLoginform();
  if (route.meta.requireAuth) router.push("/");
}
</script>