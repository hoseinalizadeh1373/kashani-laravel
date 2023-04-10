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
          <div v-if="collaborating">
            <v-container>
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
                      <v-btn color="blue-darken-4"> ثبت نام </v-btn>
                    </div>
                  </v-alert> </v-col
                ><v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="پرستار"
                    color="teal"
                  >
                    برای شروع همکاری به عنوان پرستار از طریق لینک زیر اقدام نمایید
                    <div class="pt-3" align="center">
                      <v-btn color="teal"> ثبت نام </v-btn>
                    </div>
                  </v-alert> </v-col
                ><v-col>
                  <v-alert
                    border="bottom"
                    variant="tonal"
                    title="مراقب"
                    color="purple-lighten-1"
                  >
                    برای شروع همکاری به عنوان مراقب از طریق لینک زیر اقدام نمایید
                    <div class="pt-3" align="center">
                      <v-btn color="purple-lighten-1"> ثبت نام </v-btn>
                    </div>
                  </v-alert>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </card>
      </v-col>
    </v-row>
    <document
      v-if="showDoc"
      :document="selectedDoc"
      @cancel="
        showDoc = false;
        selectedDoc = null;
      "
      >asdasd</document
    >
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "documents",

  data() {
    return {
      loading: false,
      documents: [],
      showDoc: false,
      selectedDoc: null,
    };
  },
  computed: {
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
  },
  methods: {
    async loadDocuments() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/documents`);
      this.documents = data;
      this.loading = false;
    },
  },
  mounted() {
    this.loadDocuments();
  },
};
</script>