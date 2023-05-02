<template>
  <div>
    <v-card v-if="!auth.isLogedIn" prepend-icon="mdi-account-plus">
      <template v-slot:title>
        <v-container>
          <v-row>
            <v-col class="d-flex pa-0">
              ثبت نام
              <v-spacer> </v-spacer>
              <v-btn
                color="gray"
                @click="auth.hideLoginform()"
                fab
                elevation="0"
                icon="mdi-window-close"
                class="ma-0 pa-0"
                size="x-small"
              >
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </template>
      <v-divider></v-divider>
      <v-card-text v-if="data.mode == 'enterData'">
        <v-container>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0" hide-details>
              <v-text-field
                :error-messages="data.formErrors.national_code"
                label="کد ملی"
                required
                density="compact"
                v-model="data.user.national_code"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0">
              <v-text-field
                :error-messages="data.formErrors.mobile"
                label="شماره موبایل"
                density="compact"
                required
                v-model="data.user.mobile"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0">
              <v-text-field
                :error-messages="data.formErrors.firstname"
                label="نام"
                density="compact"
                required
                v-model="data.user.firstname"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0">
              <v-text-field
                :error-messages="data.formErrors.lastname"
                label="نام خانوادگی"
                density="compact"
                required
                v-model="data.user.lastname"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0 pt-2" hide-details>
              <v-btn
                color="primary"
                variant="tonal"
                @click="register"
                :loading="data.loading"
                :disabled="data.loading"
                size="large"
              >
                ثبت نام
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-text v-if="data.mode == 'enterToken'">
        <v-container>
          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0" hide-details>
              <div class="mb-3 text-green font-weight-bold">
                لطفا کد تایید ارسال شده به موبایل خود را وارد کنید:
              </div>
              <v-text-field
                :error-messages="data.formErrors.token"
                label="کد تایید"
                required
                density="compact"
                v-model="data.user.token"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row justify="center">
            <v-col cols="12" sm="10" class="pa-0 pt-2" hide-details>
              <v-btn
                color="primary"
                variant="tonal"
                @click="loginWithToken"
                :loading="data.loading"
                :disabled="data.loading"
              >
                ارسال کد تایید
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn
          color="primary"
          variant="text"
          @click="changeMode('login')"
          :disabled="data.loading"
          prepend-icon="mdi-account"
        >
          فرم ورود
        </v-btn>
        <v-spacer></v-spacer>
        <v-btn color="gray" variant="text" @click="auth.hideLoginform()">
          انصراف
        </v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="auth.isLogedIn" prepend-icon="mdi-account">
      <template v-slot:title>
        <v-container>
          <v-row>
            <v-col class="d-flex pa-0">
              اطلاعات کاربر
              <v-spacer> </v-spacer>
              <v-btn
                color="gray"
                @click="auth.hideLoginform()"
                fab
                elevation="0"
                icon="mdi-window-close"
                class="ma-0 pa-0"
                size="x-small"
              >
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </template>
      <v-divider></v-divider>
      <v-card-text>
        <v-container>
          <v-row v-if="data.helloMessage">
            <v-col>
              <v-alert type="success">{{ data.helloMessage }} </v-alert>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" sm="10"> کاربر: {{ auth.user.name }} </v-col>
            <v-col cols="12" sm="10"> موبایل: {{ auth.user.mobile }} </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" align="left">
              <v-btn
                color="green"
                variant="tonal"
                @click="auth.hideLoginform()"
                :disabled="data.loading"
                class="me-1"
              >
                بسیار خب
              </v-btn>
              <v-btn
                color="primary"
                variant="tonal"
                @click="logout()"
                :loading="data.loading"
                :disabled="data.loading"
              >
                خروج کاربر
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
  </div>
</template>
<script setup>
import { reactive, computed, onMounted, defineEmits } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useAuthStore } from "@/store/auth";

const emit = defineEmits(["changeMode"]);
const router = useRouter();
const auth = useAuthStore();

const data = reactive({
  loading: false,
  mode: "enterData",
  formErrors: {},
  helloMessage: null,
  user: {
    mobile: "",
    national_code: "",
    token: "",
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
      data.mode = "enterToken";
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

function closeDialog(time) {
  setTimeout(() => {
    auth.hideLoginform();
  }, time * 1000);
}

function loginWithToken() {
  data.loading = true;
  data.formErrors = {};
  auth
    .loginWithToken(data.user)
    .then(async (res) => {
      console.log("loged in")
      const user = await auth.fetchUser();
      data.helloMessage = "با موفقیت وارد شدید";
      closeDialog(2);
      
      if (intendedUrl !== "") {
        console.log("in", intendedUrl);
        router.push({ path: "/" });
      }
      else{
        router.push({ name: "home" });
      }
    })
    .catch(function (error) {
      if (error.response) {
        data.formErrors = error.response.data.errors;
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
function changeMode(mode) {
  emit("changeMode", mode);
}
</script>