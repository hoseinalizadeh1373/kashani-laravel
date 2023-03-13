<template>
  <div>
    <div v-if="step == 'welcome'">
      در حال بررسی اطلاعات شما هستیم، لطفا چند لحظه صبر کنید ...
    </div>
    <div v-if="step == 'checkSms'">
      <login-form mode="checkSms" :contact-mobile="userMobile"></login-form>
    </div>
    <div v-if="step == 'hasError'">
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
      countDown: 0,
      step: "welcome",
      userMobile: "",
      login_error: "",
    };
  },
  methods: {
    countDownTimer(countDown) {
      let vm = this;
      vm.countDown = countDown;
      if (this.countDown > 0) {
        setTimeout(() => {
          vm.countDown =vm.countDown - 1;
          vm.countDownTimer(vm.countDown);
        }, 1000);
      }
    },
    startChecking() {
      this.loading = true;

      axios
        .post("/crme/checkContact", { token: this.token })
        .then((res) => {
          if (res.data.success) {
            this.step = "checkSms";
            this.userMobile = res.data.data.mobile;
            return;
          }

          if (res.data.code == 123) {
            this.step = "checkSms";
            return;
          }

          this.login_error = res.data.message;
          this.step = "hasError";
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
