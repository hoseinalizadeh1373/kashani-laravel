<template >
  <v-container>
    <v-row>
      <v-col>
        <v-card>
          <v-card-text>
            <v-row justify="center">
              <v-col cols="8" sm="2" order="2">
                <v-img
                  :src="imageUrl"
                  cover
                  class="pa-5 border"
                  :aspect-ratio="1"
                ></v-img>
              </v-col>
              <v-col cols="12" sm="8" md="8" order="3">
                <v-file-input
                  @update:modelValue="imageSelected"
                  label="اینجا کلیک کنید"
                >
                </v-file-input>
              </v-col>
            </v-row>
          </v-card-text>
          <v-card-actions>
            <v-btn
              @click="upload"
              :loading="loading"
              color="primary"
              variant="tonal"
              >ثبت</v-btn
            >
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "wallet",
  components: {},

  data() {
    return {
      loading: false,
      imageUrl: null,
      file: null,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    user() {
      return this.auth.user;
    },
  },
  methods: {
    imageSelected(files) {
      this.imageUrl = URL.createObjectURL(files[0]);
      this.file = files[0];
    },
    upload() {
      this.loading = true;
      let formData = new FormData();
      formData.append("file", this.file);
      axios.post(`/api/users/${this.auth.user.id}/profileImage`, formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
      this.loading = false;
    },
  },
  mounted() {},
};
</script>