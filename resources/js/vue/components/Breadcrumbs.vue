<template >
  <v-container class="pa-0">
    <v-row no-gutters>
      <v-col class="">
        <v-breadcrumbs
          v-if="pages[route.name]"
          :items="breadItems"
          color="blue"
          active-color="grey"
        >
          <template v-slot:prepend>
            <v-icon size="small" icon="mdi-home" color="primary"></v-icon>
          </template>
        </v-breadcrumbs>
      </v-col>
    </v-row>
  </v-container>
</template>

<script >
import { useRoute } from "vue-router";
export default {
  props: ["items"],
  data: () => {
    return {
      pages: {
        history: [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "تاریخچه تماس ها",
            disabled: true,
            to: "history",
          },
        ],
        advisor: [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
        ],
        "admin.advisors": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "مدیریت مشاورین",
            disabled: true,
            to: "/admin/advisors",
          },
        ],
        "admin.users": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "مدیریت کاربران",
            disabled: true,
            to: "/admin/users",
          },
        ],
        "admin.categories": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "مدیریت دسته بندی ها",
            disabled: true,
            to: "/admin/categories",
          },
        ],
        "admin.options": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "تنظیمات",
            disabled: true,
            to: "/admin/options",
          },
        ],
        "admin.calls": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "گزارش تماس ها",
            disabled: true,
            to: "/admin/calls",
          },
        ],
        wallet: [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "کیف پول",
            disabled: true,
            to: "/wallet",
          },
        ],
      },
    };
  },
  computed: {
    breadItems() {
      let routeName = this.route.name;
      return this.pages[routeName];
    },
    route() {
      return useRoute();
    },
  },
  methods: {},
};
</script>