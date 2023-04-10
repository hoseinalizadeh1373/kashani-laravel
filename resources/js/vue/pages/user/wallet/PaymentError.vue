<template >
  <v-container>
    <v-row>
      <v-col>
        <card icon="mdi-wallet" title="کیف پول" :loading="false">
          <v-card-text>
            <v-row>
              <v-col>
                <v-alert color="red">عملیات پرداخت با مشکل مواجه شده است</v-alert>
              </v-col>
            </v-row>
          </v-card-text>
        </card>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import { useAuthStore } from "../../../store/auth";
import { useOptionsStore } from "../../../store/options";

export default {
  name: "wallet",
  components: {},
  props: ["amount"],
  data() {
    return {
      loading: false,
      credits: {},
      value: 50000,
      paymentBtnText: " اتصال به درگاه بانکی",
      countDown: 3,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    user() {
      return this.auth.user;
    },
    options() {
      return useOptionsStore();
    },
    minAmount() {
      return this.options.options.wallet_increase_min ?? 50000;
    },
    maxAmount() {
      return this.options.options.wallet_increase_max ?? 500000;
    },
    stepAmount() {
      return this.options.options.wallet_increase_step ?? 50000;
    },
  },

  methods: {
    async increaseCredit() {
      if (this.loading) return false;
      this.loading = true;
      this.paymentBtnText = "در حال اتصال";
      const formData = {
        amount: this.value,
      };
      try {
        const { data } = await axios.post("/api/purchase", formData);
        this.paymentBtnText = "تا لحظاتی دیگر";
        window.location = data.action;
      } catch (er) {}
      await this.auth.fetchUser();
      // this.loading = false;
    },
    async getMyCredits() {
      const { data } = await axios.get(`/api/users/${this.user.id}/credits`);
      this.credits = data.data;
    },
  },
  mounted() {
    this.getMyCredits();
  },
};
</script>