<template >
  <v-container>
    <v-row v-if="loading" justify="center" class="py-10">
      <v-col cols="4" align="center" class="py-16">
        <div class="pb-2">در حال دریافت اطلاعات از سرور ...</div>
        <v-progress-linear color="primary" indeterminate></v-progress-linear>
      </v-col>
    </v-row>
    <template v-if="canCollaborate && contactInfo !== null">
      <moragheb
        v-if="user.contact_type == 1"
        :contactInfo="contactInfo"
        @save="save"
        :loading="storeContactLoading"
      />
      <nurse
        v-if="user.contact_type == 2"
        :contactInfo="contactInfo"
        @save="save"
      />
      <doctor
        v-if="[3, 4].includes(user.contact_type)"
        :contactInfo="contactInfo"
        @save="save"
      />
    </template>
    <card v-if="!canCollaborate">
      <v-alert
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
    </card>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";
import Moragheb from "./forms/Moragheb.vue";
import Doctor from "./forms/Doctor.vue";
import Nurse from "./forms/Nurse.vue";

export default {
  name: "JobsForm",
  components: { Moragheb, Nurse, Doctor },
  data() {
    return {
      loading: false,
      storeContactLoading: false,
      contactInfo: null,
      terms: false,
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
    collaboratePosition() {
      return ["مراقب", "پرستار", "پزشک", "پزشک"][this.user.contact_type - 1];
    },
    theColor() {
      return ["purple-lighten-1", "teal", "blue-darken-4", "blue-darken-4"][
        this.user.contact_type - 1
      ];
    },
  },
  methods: {
    async loadContactInfo() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/crmInfo`);
      this.contactInfo = data;
      this.loading = false;
    },
    async save(contact) {
      this.storeContactLoading = true;
      const { data } = await axios.put(`/api/users/${this.user.id}/crmInfo`,{
        contact_data: contact
      });
      this.storeContactLoading = false;
      alert("ذخیره شد")
    },
  },
  mounted() {
    this.loadContactInfo();
  },
};
</script>