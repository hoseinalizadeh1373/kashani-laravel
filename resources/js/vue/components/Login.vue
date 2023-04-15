<template >
  <v-dialog v-model="dialog" persistent>
    <v-row justify="center">
      <v-col cols="10" sm="8" md="6">
        <v-expand-transition>
          <login-form
            v-model:user="data.user"
            v-if="data.mode == 'login'"
            @changeMode="changeMode"
          />
          <register-form
            v-if="data.mode == 'register'"
            @changeMode="changeMode"
            v-model:user="data.user"
          />
        </v-expand-transition>
      </v-col>
    </v-row>
  </v-dialog>
</template>

<script setup>
import { reactive, computed, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useAuthStore } from "@/store/auth";
import LoginForm from "./login/LoginForm.vue";
import RegisterForm from "./login/RegisterForm.vue";

const auth = useAuthStore();
const route = useRoute();
const dialog = computed(() => {
  return auth.loginFormDisplay;
});

const router = useRouter();

const data = reactive({
  mode: "login",
  loading: false,
  loginForm: null,
  formErrors: {},
  user: {
    mobile: "",
  },
});

const intendedUrl = auth.intendedUrl;
auth.setIntendedUrl("");

function register() {
  data.formErrors = {};
  data.loading = true;
  auth
    .register(data.user)
    .then(async (res) => {
      data.mode = "enterToken"
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

async function logout() {
  data.loading = true;
  await auth.logout();
  data.loading = false;
  auth.hideLoginform();
  if (route.meta.requireAuth) router.push("/");
}

function changeMode(newMode) {
  data.mode = newMode;
}

function upuser(ev){
  console.log("evvv",ev)
}
</script>