<template>
  <div>
   <div v-if="step=='welcome'">
    در حال بررسی اطلاعات شما هستیم، لطفا چند لحظه صبر کنید ...
   </div>
   <div v-if="step=='checkSms'">
      <login-form mode="checkSms" :contact-mobile="userMobile"></login-form>
   </div>
   <div v-if="step=='hasError'">
      <login-form mode="hasError" :contact-error="login_error"></login-form>
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
      login_error:"",
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
            
            // if (res.data.code == 120) {
            //  this.login_error =res.data.message;
            // }
            // if (res.data.code == 121) {
            //   this.login_error =res.data.message;
            // }
            // if (res.data.code == 122) {
            //   this.login_error =res.data.message;
            // }
            this.login_error =res.data.message;
            this.step = "hasError";

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
