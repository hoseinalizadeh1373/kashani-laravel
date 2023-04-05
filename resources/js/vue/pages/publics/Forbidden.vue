<template>
  <v-container>
    <v-row>
      <v-col>
        <v-card color="red-lighten-1"> 
          <v-card-text >
            در حال حاضر امکان دسترسی به این صفحه امکان پذیر نیست
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  metaInfo() {
    return { title: "صفحه اصلی" };
  },
  name: "home",
  components: {},

  data() {
    return {
      dialog: false,
      auth: useAuthStore(),
      advisors: {},
      loading: false,
    };
  },
  methods: {
    async getAdvisors() {
      const { data } = await axios.get("/api/advisors");
      this.advisors = data.data;
    },
    async call(advisorId) {
      if (!this.auth.isLogedIn) {
        alert("ابتدا باید وارد شوید");
        return false;
      }
      this.loading = true;
      try {
        const { data } = await axios.post(
          "/api/advisors/" + advisorId + "/call"
        );
      } catch (err) {
        console.log(err);
        alert(err.response.data.message);
      }
      this.loading = false;
    },
  },
  mounted() {
    this.getAdvisors();
  },
};
</script>