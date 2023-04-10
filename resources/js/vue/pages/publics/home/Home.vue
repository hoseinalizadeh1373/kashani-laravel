<template src="./home.html"></template>
<style scoped src="./home.css"></style>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  metaInfo() {
    return { title: "صفحه اصلی" };
  },
  name: "home",

  data() {
    return {
      dialog: false,
      auth: useAuthStore(),
      advisors: {},
      loading: false,
    };
  },
  methods: {
    
  },
  mounted() {
  },
};
</script>