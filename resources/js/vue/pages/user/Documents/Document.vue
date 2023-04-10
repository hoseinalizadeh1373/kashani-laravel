<template >
  <v-container>asasasd
    <v-row justify="center">
      <v-col class="py-0 ma-0" md="8">
        <v-dialog v-model="dialog" persistent>
          <card :loading="loading" title="مشاهده سند">
            <v-card-text v-if="doc">
              <v-container> 
                <h4>{{  document.notes_title }}</h4>
                <v-img :src="docImage" max-height="300" />
              </v-container>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue-darken-1" variant="text" @click="$emit('cancel')">
                انصراف
              </v-btn>
            </v-card-actions>
          </card>
        </v-dialog>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "document",
  components: {},
  props: ["document"],
  data() {
    return {
      loading: false,
      dialog: true,
      doc: null,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    user() {
      return this.auth.user;
    },
    docImage(){
      return "data:image/jpeg;base64, " + this.doc.filepath;
    }
  },
  methods: {
    async getDoc() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/documents/${this.document.id}`);
      this.doc = data;
      console.log(data)
      this.loading = false;
    },
  },
  async mounted() {
    this.getDoc();
  },
};
</script>