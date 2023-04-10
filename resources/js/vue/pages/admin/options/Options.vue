<template >
  <v-container>
    <v-row justify="center">
      <v-col title="py-0 ma-0" md="8">
        <card title="تنظیمات" :loading="loading">
          <v-card-text>
            <v-container>
              <v-row class="pa-0 my-0">
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="عنوان سایت"
                    v-model="siteOptions.sitename"
                  ></v-text-field>
                </v-col> </v-row
              ><v-row class="pa-0 my-0">
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="مرچنت زرین پال"
                    v-model="siteOptions.merchantId"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row class="pa-0 my-0">
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="حداقل مبغ قابل پرداخت"
                    v-model="siteOptions.wallet_increase_min"
                  ></v-text-field>
                </v-col>
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="حداکثر مبغ قابل پرداخت"
                    v-model="siteOptions.wallet_increase_max"
                  ></v-text-field>
                </v-col>
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="گام مبلغ قابل پرداخت"
                    v-model="siteOptions.wallet_increase_step"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col class="py-0 ma-0" cols="12" sm="6">
                  <v-text-field
                    density="compact"
                    label="هزینه تماس ها در دقیقه"
                    v-model="siteOptions.net_cost_ratio"
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
              @click="updateOptions"
              :loading="loading"
            >
              ثبت
            </v-btn>
          </v-card-actions>
        </card>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import { useAuthStore } from "@/store/auth";
import { useOptionsStore } from "@/store/options";

export default {
  name: "options",
  components: {},

  data() {
    return {
      loading: false,
      siteOptions: {},
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
  },
  methods: {
    async updateOptions() {
      this.loading = true;

      console.log(this.siteOptions);
      try {
        await this.options.update(this.siteOptions);
      } catch (err) {
        console.log(err);
      }
      this.loading = false;
    },
    getOptions() {
      this.loading = true;

      let obj = JSON.parse(JSON.stringify(this.options.options));
      this.siteOptions = obj;

      this.loading = false;
    },
  },
  mounted() {
    this.getOptions();
  },
};
</script>