<template >
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent>
      <v-card :loading="loading">
        <v-card-title>
          <span class="text-h5">کیف پول کاربر</span>
        </v-card-title>
        <v-card-text v-if="user">
          <v-container>
            <v-row>
              <v-col>
                <v-chip dense color="primary" class="ml-2">
                  کل اعتبار: {{ user.total_credit ?? 0 }}
                </v-chip>
                <v-chip dense color="red-darken-4" class="ml-2">
                  اعتبار استفاده شده: {{ user.used_credit ?? 0 }}
                </v-chip>
                <v-chip dense color="green-darken-4" class="ml-2">
                  اعتبار باقی مانده: {{ user.remain_credit ?? 0 }}
                </v-chip>
                <br />
                <br />
                <v-btn
                  @click="increaseCredit(50000)"
                  class="mx-1"
                  size="small"
                  :disabled="loading"
                  >افزایش 50 هزار تومان</v-btn
                >
                <v-btn
                  @click="increaseCredit(10000)"
                  class="mx-1"
                  size="small"
                  :disabled="loading"
                  >افزایش 10 هزار تومان</v-btn
                >
                <v-btn
                  @click="increaseCredit(-1)"
                  class="mx-1"
                  size="small"
                  :disabled="loading"
                  >اعتبار صفر</v-btn
                >
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue-darken-1" variant="text" @click="cancel">
            بسیار خب
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "edit-wallet",
  components: {},
  props: ["user_id"],
  data() {
    return {
      loading: false,
      dialog: true,
      user: null,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
  },
  methods: {
    cancel() {
      this.$emit("cancel");
    },
    async increaseCredit(amount) {
      this.loading = true;
      await axios.post(
        `/api/users/${this.user.id}/increaseCredit/${amount}`
      );
      await this.fetchUser();
      this.loading = false;
    },
    async fetchUser() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user_id}`);
      this.user = data.data;
      this.loading = false;
    },
  },
  async mounted() {
    this.fetchUser();
  },
};
</script>