<template >
  <v-container>
    <v-row>
      <v-col>
        <card title="بارگزاری مدارک" class="mb-5">
          <v-card-text>
            <uploader @uploaded="loadDocuments" />
          </v-card-text>
        </card>
        <card :loading="loading" title="مدارک بارگزاری شده">
          <v-table>
            <thead>
              <th></th>
            </thead>
            <tbody>
              <tr v-for="doc in documents" :key="doc">
                <td>{{ doc.notes_title }}</td>
                <td>{{ doc.createdtime }}</td>
                <td>
                  <v-btn
                    @click="
                      showDoc = true;
                      selectedDoc = doc;
                    "
                    class="ml-1"
                    >مشاهده</v-btn
                  >
                </td>
              </tr>
            </tbody>
          </v-table>
        </card>
      </v-col>
    </v-row>

    <document
      v-if="showDoc"
      :document="selectedDoc"
      @cancel="showDoc=false;selectedDoc=null"
    >asdasd</document>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";
import Document from "@/components/ViewDocument.vue";
import Uploader from "./documents/Uploader.vue";

export default {
  name: "documents",
  components: { Document,Uploader },

  data() {
    return {
      loading: false,
      documents: [],
      showDoc: false,
      selectedDoc: null,
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