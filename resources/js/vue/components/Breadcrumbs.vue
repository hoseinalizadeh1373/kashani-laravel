<template >
  <v-container class="pa-0">
    <v-row no-gutters>
      <v-col class="">
        <v-breadcrumbs
          v-if="pages[route.name]"
          :items="breadItems"
          color="primary"
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
        "user.jobs": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "همکاری با ثمین",
            disabled: true,
            to: "/user/jobs",
          },
        ],
        "user.jobs.form": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "ویرایش اطلاعات",
            disabled: true,
            to: "/user/jobs/form",
          },
        ],
        "user.jobs.documents": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "ارسال مدارک",
            disabled: true,
            to: "/user/jobs/documents",
          },
        ],
        "user.documents": [
          {
            title: "صفحه اصلی",
            disabled: false,
            to: "/",
          },
          {
            title: "مشاهده اسناد",
            disabled: true,
            to: "/user/documents",
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