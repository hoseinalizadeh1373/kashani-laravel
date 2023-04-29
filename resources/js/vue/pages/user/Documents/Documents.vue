<template >
  <v-container>
    <v-row>
      <v-col>
        <card :loading="loading" title="اسناد">
          <v-list>
            <template
              v-for="(documentsGroup, folderid) in documents"
              :key="folderid"
            >
              <v-list-subheader>
                {{ folders[folderid] }}
              </v-list-subheader>
              <v-list-item
                v-for="doc in documentsGroup"
                :key="doc"
                @click="
                  showDoc = true;
                  selectedDoc = doc;
                "
                border="bottom"
              >
                <v-list-item-title>
                  {{ doc.notes_title }}
                </v-list-item-title>
                <!-- <template v-slot:append>
                  <v-btn
                    color="grey-lighten-1"
                    icon="mdi-information"
                    variant="text"
                  ></v-btn>
                </template> -->
              </v-list-item>
              <v-divider /> 
            </template>
          </v-list>
          <v-table v-if="false">
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