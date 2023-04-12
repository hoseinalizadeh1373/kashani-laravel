<template >
  <v-container>
    <v-text-field />
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "Moragheb",

  data() {
    return {
      loading: false,
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
    async loadDocuments() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/documents`);
      this.documents = data;
      this.loading = false;
    },
  },
  mounted() {
    this.loadDocuments();
  },
};
</script>