<template >
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent>
            <v-card :loading="loading">
        <v-card-title>
          <span class="text-h5">ویرایش کاربر</span>
        </v-card-title>
        <v-card-text v-if="user">
          <v-container>
            <v-row>
              <v-col cols="12" sm="6">
                <v-text-field
                  label="نام"
                  required
                  v-model="user.firstname"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6">
                <v-text-field
                  label="نام خانوادگی"
                  required
                  v-model="user.lastname"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6">
                <v-text-field
                  label="شماره مویایل"
                  required
                  v-model="user.mobile"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue-darken-1"
            variant="text"
            @click="updateUser"
            :loading="loading"
          >
            ثبت
          </v-btn>
          <v-btn color="blue-darken-1" variant="text" @click="cancel">
            انصراف
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "edit-user",
  components: {},
  props: ["user_id"],
  data() {
    return {
      loading: false,
      dialog: true,
      user: null,
      imageUrl: null,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
  },
  methods: {
    async updateUser() {
      this.loading = true;
      const { data } = await axios.post(
        `/api/users/${this.user.id}`,
        this.user
      );
      this.loading = false;
      this.$emit("edited", this.user);
      this.dialog = false;
    },
    cancel() {
      this.$emit("cancel");
    },
    async fetchUser() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user_id}`);
      this.user = data.data;
      this.imageUrl = this.user.profile_image;
      this.loading = false;
    },
  },
  async mounted() {
    this.fetchUser();
  },
};
</script>