<template >
  <v-form @submit.prevent="upload" ref="form">
    <v-row justify="center">
      <v-col cols="8" sm="2" order="2">
        <v-img
          :src="image_url"
          cover
          class="pa-5 border"
          :aspect-ratio="1"
        ></v-img>
      </v-col>
      <v-col cols="12" sm="8" md="8" order="3">
        <v-select
          :rules="rules.docTitle"
          v-model="docTitle"
          label="عنوان مدرک"
          density="compact"
          :items="[
            'عکس پرسنلی',
            'تصویر کارت ملی',
            'تصویر صفحه یک شناسنامه',
            'تصویر صفحه دو شناسنامه',
            'تصویر عدم سوء پیشینه',
          ]"
        />

        <v-file-input
          @update:modelValue="imageSelected"
          label="اینجا کلیک کنید"
          :rules="rules.file"
          hint="فایل مورد نظر باید jpg یا  png باشد و از 150 کیلو بایت بیشتر نباشد"
        >
        </v-file-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col align="left">
        <v-btn type="submit" :loading="loading" color="primary" variant="tonal" size="large"
          >بارگزاری</v-btn
        >
      </v-col>
    </v-row>
  </v-form>
</template>


<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "uploader",
  components: {},
  props: ["advisor_id"],
  data() {
    return {
      loading: false,
      docTitle: null,
      file: null,
      image_url: null,
      image_selected: false,
      rules: {
        docTitle: [(v) => !!v || "عنوان فایل ارسالی وارد نشده است"],
        file: [
          (v) => !!v || "فایل وارد نشده است",
          (v) =>
            ["image/jpeg", "image/png"].includes(v[0].type) ||
            "فقط فایل های jpg یا png مجاز هستند",
          (v) =>
            v[0].size < 1024 * 160 ||
            "فایل انتخابی نباید بیشتر از 160 کیلو باید باشد",
        ],
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
    imageSelected(files) {
      this.image_url = URL.createObjectURL(files[0]);
      this.file = files[0];
    },
    async upload(event) {
      const results = await event;
      if (!results.valid) return;

      this.loading = true;
      let formData = new FormData();
      formData.append("file", this.file);
      formData.append("doc_title", this.docTitle);
      try {
        await axios.post(
          `/api/users/${this.user.id}/documents/upload`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        alert("بارگزاری شد.");
        this.reset();

        this.$emit("uploaded");
      } catch (err) {}
      this.loading = false;
    },
    reset() {
      this.$refs.form.reset();
    },
  },
  mounted() {},
};
</script>