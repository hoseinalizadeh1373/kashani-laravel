<template >
  <v-container>
    <v-row>
      <v-col>
        <card title="تماس های من" :loading="loading">
          <v-card-text>
            <v-container>
              <v-row>
                <v-col>
                  <v-table density="compact">
                    <thead>
                      <tr>
                        <th>کاربر</th>
                        <th>مشاور</th>
                        <th>زمان مکالمه</th>
                        <th>وضعیت</th>
                        <th>فی هر دقیقه</th>
                        <th>هزینه ورودی</th>
                        <th>کل هزینه</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="call in callsList" :key="call.id">
                        <td>{{ call.user.name }}</td>
                        <td>{{ call.advisor.name }}</td>
                        <td>{{ call.bill_time }}</td>
                        <td>{{ call.disposition }}</td>
                        <td>{{ call.credit_ratio }}</td>
                        <td>{{ call.entrance_fee }}</td>
                        <td>{{ call.total_amount }}</td>
                      </tr>
                    </tbody>
                  </v-table>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red" :loading="loading" @click="getCallsList"
              >Reload Calls List</v-btn
            >
          </v-card-actions>
        </card>
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
      callsList: {},
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
    async getCallsList() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/calls`);
      console.log(data);
      this.callsList = data.data;
      this.loading = false;
    },
  },
  mounted() {
    this.getCallsList();
  },
};
</script>