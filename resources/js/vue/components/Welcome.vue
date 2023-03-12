<template>
  <div>
   <div v-if="step=='welcome'">
    در حال بررسی اطلاعات شما هستیم، لطفا چند لحظه صبر کنید ...
   </div>
   <div v-if="step=='checkSms'">
      <login-form mode="checkSms" :contact-mobile="userMobile"></login-form>
   </div>
  </div>
</template>

<script>
export default {
  props: ["token"],
  data: function () {
    return {
      loading: false,
      step: "welcome",
      userMobile: "",
    };
  },
  methods: {
    startChecking() {
      this.loading = true;

      axios
        .post("/crme/checkContact", { token: this.token })
        .then((res) => {
          if (res.data.success) {
            this.step = "checkSms"
            this.userMobile = res.data.data.mobile;
          } else {
            alert("error");
            if (res.data.code == 120) {
            }
            if (res.data.code == 121) {
            }
            if (res.data.code == 122) {
            }
          }
        })
        .catch((err) => {})
        .then(() => {
          this.loading = false;
        });
    },
  },
  computed: {},
  mounted() {
    this.startChecking();
  },
};
</script>
