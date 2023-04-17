<template >
  <v-container>
    <v-row justify="center">
      <v-col class="py-0 ma-0" md="8">
        <v-dialog v-model="dialog" persistent>
          <card :loading="loading" title="مشاهده سند">
            <v-card-text v-if="doc">
              <v-container>
                <h4 class="mb-2">عنوان سند: {{ document.notes_title }}</h4>
                <v-img :src="docImage" max-height="300" v-if="isImage" />
                <v-btn  block v-if="isPdf" color="primary" :href="docPdf" :download="document.notes_title + '.pdf'">دانلود سند pdf</v-btn>
              </v-container>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue-darken-1"
                variant="text"
                @click="$emit('cancel')"
              >
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
    docImage() {
      return "data:image/jpeg;base64, " + this.doc.filepath;
    },
    docPdf() {
      return "data:application/octet-stream;base64, " + this.doc.filepath;
    },
    isImage() {
      return ["image/jpeg", "image/png"].includes(this.doc.filetype);
    },
    isPdf() {
      return this.doc.filetype == "application/pdf";
    },
  },
  methods: {
    async getDoc() {
      this.loading = true;
      const { data } = await axios.get(
        `/api/users/${this.user.id}/documents/${this.document.id}`
      );
      this.doc = data;
      this.loading = false;
    },
    b64toBlob(b64Data) {
      const contentType = "application/pdf";
      var sliceSize = 512;
      b64Data = b64Data.replace(/^[^,]+,/, "");
      b64Data = b64Data.replace(/\s/g, "");
      var byteCharacters = window.atob(b64Data);
      var byteArrays = [];

      for (
        var offset = 0;
        offset < byteCharacters.length;
        offset += sliceSize
      ) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
      }

      var blob = new Blob(byteArrays, { type: contentType });
      return blob;
    },
    downloadPdf() {
      const blob = this.b64toBlob(this.doc.filepath);
      console.log(blob)
      if (window.saveAs) {
        window.saveAs(blob, name);
      } else {
        navigator.saveBlob(blob, name);
      }
    },
  },
  async mounted() {
    this.getDoc();
  },
};
</script>