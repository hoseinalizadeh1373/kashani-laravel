<template >
  <v-container>
    <v-row>
      <v-col>
        <card :loading="loading" title="همکاری با ما">
          <v-alert
            v-if="!canCollaborate"
            border="start"
            variant="tonal"
            color="deep-purple-accent-4"
            title="شرایط همکاری"
          >
            <div class="pt-3">
              متاسفانه شرایط همکاری با شما مقدور نمی‌باشد
              <br />
              برای کسب اطلاعات بیشتر با پشتیبانی تماس حاصل فرمایید.
            </div>
          </v-alert>
          <div v-if="canCollaborate">
            <v-container v-if="collaborating">
              <v-row>
                <v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="خوش آمدید"
                    :color="color"
                  >
                    <div class="pt-3">
                      <strong> {{ collaboratePosition }} گرامی؛ </strong>
                      با تشکر از شما، فرم اعلام همکاری شما به عنوان
                      {{ collaboratePosition }}
                      در این سیستم ثبت شده است. جهت تکمیل فرم ثبت نام و یا
                      ویرایش اطلاعات خود روی لینک زیر کلیک کنید .
                      <div class="pt-3" align="center">
                        <v-btn :color="color" :to="{ name: 'user.jobs.form' }">
                          تکمیل / ویرایش فرم همکاری {{ collaboratePosition }}
                        </v-btn>
                      </div>
                    </div>
                  </v-alert>
                </v-col>
              </v-row>
            </v-container>
            <v-container v-if="!collaborating">
              <v-row>
                <v-col
                  ><div>
                    <h3>شرایط همکاری</h3>
                    توضیح در مورد شرایط همکاری اینجا قرار داده میشود.
                  </div>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="پزشک"
                    color="blue-darken-4"
                  >
                    برای شروع همکاری به عنوان پزشک از طریق لینک زیر اقدام نمایید
                    <div class="pt-3" align="center">
                      <v-btn color="blue-darken-4" @click="colabAs(3)" :disabled="loadingColab">
                        ثبت نام
                      </v-btn>
                    </div>
                  </v-alert>
                </v-col>
                <v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="پرستار"
                    color="teal"
                  >
                    برای شروع همکاری به عنوان پرستار از طریق لینک زیر اقدام
                    نمایید
                    <div class="pt-3" align="center">
                      <v-btn color="teal" @click="colabAs(2)" :disabled="loadingColab"> ثبت نام </v-btn>
                    </div>
                  </v-alert> </v-col
                ><v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="مراقب"
                    color="purple-lighten-1"
                  >
                    برای شروع همکاری به عنوان مراقب از طریق لینک زیر اقدام
                    نمایید
                    <div class="pt-3" align="center">
                      <v-btn color="purple-lighten-1" @click="colabAs(1)" :disabled="loadingColab">
                        ثبت نام
                      </v-btn>
                    </div>
                  </v-alert>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";
import { useRoute, useRouter } from "vue-router";

export default {
  name: "jobs",

  data() {
    return {
      loading: false,
      loadingColab: false,
    };
  },
  computed: {

    router() {
      return useRouter();
    },
    auth() {
      return useAuthStore();
    },
    user() {
      return this.auth.user;
    },
    collaborating() {
      if (this.user.contact_type in [1, 2, 3, 4]) return true;
      return false;
    },
    canCollaborate() {
      if (!this.user.crm_registered) return true;
      return this.collaborating;
    },
    collaboratePosition() {
      return ["مراقب", "پرستار", "پزشک", "پزشک"][this.user.contact_type - 1];
    },
    color() {
      return ["purple-lighten-1", "teal", "blue-darken-4", "blue-darken-4"][
        this.user.contact_type - 1
      ];
    },
  },
  methods: {
    async colabAs(type) {
      this.loadingColab = true;
      const { data } = await axios.put(`/api/users/${this.user.id}/colabAs`, {
        colab_as: type,
      });
      this.loadingColab = false;
      if(data.success==true){
        this.router.push({name:"user.jobs.form"});
      }
    },
  },
  mounted() {},
};
</script>