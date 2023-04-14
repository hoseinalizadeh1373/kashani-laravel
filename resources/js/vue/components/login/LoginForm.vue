<template>
  <div>
    <v-card v-if="!auth.isLogedIn" prepend-icon="mdi-account">
      <template v-slot:title>
        <v-container>
          <v-row>
            <v-col class="d-flex pa-0">
              ورود کاربر
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
      <v-card-text v-if="data.mode == 'enterMobile'">
        <v-form v-model="data.loginForm">
          <v-container>
            <v-row justify="center">
              <v-col cols="12" sm="10" class="pa-0">
                <v-text-field
                  :error-messages="data.formErrors.mobile"
                  density="compact"
                  label="شماره تلفن همراه"
                  name="mobile"
                  required
                  v-model="data.user.mobile"
                ></v-text-field>
              </v-col>
            </v-row>

            <v-row justify="center">
              <v-col cols="12" sm="10" class="pa-0">
                <v-spacer></v-spacer>
                <v-btn
                  color="primary"
                  variant="tonal"
                  @click="requestToken"
                  :loading="data.loading"
                  :disabled="data.loading"
                >
                  ورود
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card-text>
      <v-card-text v-if="data.mode == 'enterToken'">
        <v-form v-model="data.loginForm">
          <v-container>
            <v-row justify="center">
              <v-col cols="12" sm="10" class="pa-0">
                <v-text-field
                  :error-messages="data.formErrors.token"
                  density="compact"
                  label="کد تایید"
                  required
                  v-model="data.user.token"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="12" sm="10" class="pa-0">
                <v-spacer></v-spacer>
                <v-btn
                  color="primary"
                  variant="tonal"
                  @click="loginWithToken"
                  :loading="data.loading"
                  :disabled="data.loading"
                >
                  ورود
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn
          color="primary"
          variant="text"
          @click="changeMode('register')"
          :disabled="data.loading"
          prepend-icon="mdi-account-plus"
        >
          ثبت نام
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
          <v-row justify="center">
            <v-col cols="12" sm="10"> کاربر: {{ auth.user.name }} </v-col>
            <v-col cols="12" sm="10"> موبایل: {{ auth.user.mobile }} </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" align="left">
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
import { reactive, onMounted, defineEmits, watch, defineProps } from "vue";
import { useAuthStore } from "@/store/auth";
import { useRouter, useRoute } from "vue-router";
const emit = defineEmits([
  "requestToken",
  "loginWithToken",
  "update:user",
  "changeMode",
]);

const auth = useAuthStore();
const intendedUrl = auth.intendedUrl;
auth.setIntendedUrl("");

const route = useRoute();
const router = useRouter();

const props = defineProps(["user"]);

const data = reactive({
  formErrors: {},
  mode: "enterMobile",
  user: {
    mobile: "",
    token: "",
  },
});

function requestToken() {
  data.loading = true;
  data.formErrors = {};
  auth
    .requestToken(data.user.mobile)
    .then(async (res) => {
      data.mode = "enterToken";
    })
    .catch(function (error) {
      console.log(error.response);
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

function loginWithToken() {
  data.loading = true;
  data.formErrors = {};
  auth
    .loginWithToken(data.user)
    .then(async (res) => {
      console.log("i2n", intendedUrl);
      const user = await auth.fetchUser();
        router.push({ path: "/" });
      if (intendedUrl !== "") {
        console.log("in", intendedUrl);
        router.push({ path: "/" });
      }
      alert("با موفقیت وارد شده اید");
      auth.hideLoginform();
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

watch(data.user, (val) => {
  emit("update:user", val);
});

onMounted(() => {
  console.log("maount", props);
  data.user = props.user;
});

function changeMode(mode) {
  emit("changeMode", mode);
}

async function logout() {
  data.loading = true;
  await auth.logout();
  data.loading = false;
  auth.hideLoginform();
  if (route.meta.requireAuth) router.push("/");
}
</script>