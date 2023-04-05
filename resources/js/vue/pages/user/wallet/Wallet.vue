<template >
  <v-container>
    <v-row>
      <v-col>
        <v-alert v-if="status=='error'" type="error"  closable class="mb-5"  variant="tonal">
            عملیات پرداخت موفقیت آمیز نبود
        </v-alert>
        <v-alert v-if="status=='success'" type="success" closable class="mb-5" variant="tonal">
            افزایش اعتبار با موفقیت انجام شد.
        </v-alert>
        <card icon="mdi-wallet" title="کیف پول" :loading="false">
          <v-card-text>
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
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="8">
                <v-slider
                  v-model="value"
                  color="primary"
                  :min="minAmount"
                  :max="maxAmount"
                  :step="stepAmount"
                  thumb-label
                ></v-slider>
                <div class="mb-5">
                  افزایش اعتبار کیف پول به مبلغ:
                  <strong>{{ value.toLocaleString() }}</strong>
                  تومان
                </div>
                <v-btn
                  @click="increaseCredit"
                  class="mx-1"
                  color="blue-lighten-3"
                >
                    {{ paymentBtnText }} 
                </v-btn>
              </v-col>
            </v-row>
          </v-card-text>
        </card>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <card title="لیست پرداخت ها">
          <v-card-text>
            <v-table>
              <thead>
                <tr>
                  <th>مبلغ</th>
                  <th>تاریخ پرداخت</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="credit in credits" :key="credit.id">
                  <td>{{ credit.amount }}</td>
                  <td>{{ credit.created_at_fa }}</td>
                </tr>
              </tbody>
            </v-table>
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
  props: ["amount","status"],
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