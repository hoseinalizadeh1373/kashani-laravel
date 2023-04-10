<template >
  <v-container>
    <v-row>
      <v-col>
        <card title="مدیریت کاربران" :loading="loading">
          <v-card-text>
            <v-container>
              <v-row>
                <v-col>
                  <v-text-field
                    label="جستجو"
                    density="compact"
                    v-model="search"
                  />
                  <v-data-table
                    :headers="headers"
                    :items="users"
                    :search="search"
                  >
                    <template v-slot:item.actions="{ item }">
                      <v-btn
                        class="ml-1 px-2"
                        :rounded="0"
                        :disabled="loading"
                        size="x-small"
                        @click="swithAdvisor(item.raw.id)"
                        >مشاور</v-btn
                      >
                      <v-btn
                        class="ml-1 px-2"
                        :rounded="0"
                        :disabled="loading || item.raw.id == 1"
                        size="x-small"
                        @click="toggleAdmin(item.raw.id)"
                        >ادمین</v-btn
                      >
                      <v-btn
                        size="xx-small"
                        class="ml-1 px-2"
                        :rounded="0"
                        icon="mdi-account-edit"
                        @click="editable = item.raw"
                      ></v-btn>
                      <v-btn
                        size="xx-small"
                        class="ml-1 px-2"
                        :rounded="0"
                        icon="mdi-wallet"
                        @click="editable_wallet = item.raw"
                      ></v-btn>
                    </template>
                    <template v-slot:item.roles="{ item }">
                      <v-chip
                        size="xx-small"
                        class="pa-1 px-2 mx-1"
                        label
                        color="red"
                        v-if="item.raw.roles.includes('advisor')"
                        ><small>مشاور</small></v-chip
                      >
                      <v-chip
                        size="xx-small"
                        class="pa-1 px-2 mx-1"
                        label
                        color="blue "
                        v-if="item.raw.roles.includes('admin')"
                        ><small>ادمین</small></v-chip
                      >
                    </template>
                  </v-data-table>
                  <v-table density="compact" v-if="false">
                    <thead>
                      <tr>
                        <th>نام</th>
                        <th>سطح دسترسی</th>
                        <th>موبایل</th>
                        <th>اعتبار</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td></td>
                        <td>{{ user.mobile }}</td>
                        <td>{{ user.remain_credit }}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </v-table>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </card>
      </v-col>
    </v-row>
    <edit-user
      v-if="editable"
      :user_id="editable.id"
      @edited="onEditUser"
      @cancel="editable = null"
    ></edit-user>
    <edit-user-wallet
      v-if="editable_wallet"
      :user_id="editable_wallet.id"
      @cancel="
        onEditUser();
        editable_wallet = null;
      "
    ></edit-user-wallet>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";
import { useUsersStore } from "@/store/users";
import EditUser from "./Edit.vue";
import EditUserWallet from "./EditWallet.vue";
import { VDataTable } from "vuetify/labs/VDataTable";

export default {
  name: "wallet",
  components: { EditUser, EditUserWallet, VDataTable },

  data() {
    return {
      editable: null,
      editable_wallet: null,
      loading: false,
      search: "",
      headers: [
        {
          align: "start",
          key: "name",
          title: "نام",
        },
        {
          align: "start",
          key: "mobile",
          title: "موبایل",
        },
        { key: "roles", title: "سطح دسترسی" },
        { key: "actions", title: "عملیات" },
      ],
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    usersStore() {
      return useUsersStore();
    },
    usersloading() {
      return this.usersStore.loading;
    },
    users() {
      return this.usersStore.users;
    },
  },
  watch: {
    usersloading(value) {
      this.loading = value;
    },
  },
  methods: {
    async swithAdvisor(userId) {
      this.loading = true;
      await axios.post(`/api/users/${userId}/toggleAdvisor`);
      this.loading = false;
      this.getUsers();
    },
    async toggleAdmin(userId) {
      this.loading = true;
      await axios.post(`/api/users/${userId}/toggleAdmin`);
      this.loading = false;
      this.getUsers();
    },
    onEditUser(user) {
      this.editable = null;
      this.getUsers();
    },
    getUsers() {
      this.usersStore.getUsersFromServer();
    },
  },
  mounted() {},
};
</script>