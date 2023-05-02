<template >
  <v-container>
    <v-row>
      <v-col>
        <card :loading="loading" title="اسناد">
          <v-list>
            <v-list-group
              v-for="(documentsGroup, folderid) in documents"
              :key="folderid"
            >
              <template v-slot:activator="{ props }">
                <v-list-item
                  v-bind="props"
                  prepend-icon="mdi-folder-multiple-outline"
                  color="orange-darken-4"
                  :title="folders[folderid]"
                ></v-list-item>
              </template>

              <v-list-item
                class="ps-10"
                v-for="doc in documentsGroup"
                :key="doc"
                @click="
                  showDoc = true;
                  selectedDoc = doc;
                "
                border="bottom"
              >
                <v-list-item-title class="text-orange-darken-4">
                  <v-icon size="x-small" color="orange-darken-4">mdi-file</v-icon>
                  {{ doc.notes_title }}
                </v-list-item-title>
              </v-list-item>

            </v-list-group>
            
          </v-list>
          
        </card>
      </v-col>
    </v-row>

    <document
      v-if="showDoc"
      :document="selectedDoc"
      @cancel="
        showDoc = false;
        selectedDoc = null;
      "
      >asdasd</document
    >
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";
import Document from "@/components/ViewDocument.vue";

export default {
  name: "documents",
  components: { Document },

  data() {
    return {
      loading: false,
      documents: [],
      showDoc: false,
      selectedDoc: null,
      folders: {
        "22x4": "ریپورت هولتر ضربان",
        "22x5": "ریپورت نوار مغز",
        "22x6": "ریپورت هولتر فشار خون",
        "22x7": "قرارداد مراقبت",
        "22x10": "جواب آزمایشات",
        "22x11": "جواب تصویربرداری",
        "22x12": "معرفی نامه مراقب",
        "22x14": "نسخه پزشک",
      },
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
      const { data } = await axios.get(
        `/api/users/${this.user.id}/documents/related`
      );
      this.documents = data;
      this.documents = _.groupBy(this.documents, "folderid");
      console.log(this.documents);
      this.loading = false;
    },
  },
  mounted() {
    this.loadDocuments();
  },
};
</script>