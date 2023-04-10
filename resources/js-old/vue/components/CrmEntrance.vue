<template>
  <div>
    <div class="text-center p-5"  v-if="step == 'welcome'">
      <div class="spinner-border spinner-border text-info" role="status"></div>
      <div class="text-center mt-1">
        در حال دریافت اطلاعات شما از پایگاه داده هستیم، لطفا شکیبا باشید . . .
      </div>
    </div>
    <div v-if="step == 'checkSms'">
      <login-form mode="checkSms" :contact-mobile="userMobile"></login-form>
    </div>
    <div v-if="step == 'hasError'">
      <div class="alert alert-danger">
        وضعیت نامشخص، لطفا با واحد پشتیبانی تماس حاصل فرمایید.
      </div>
    </div>
    <div v-if="step == 'error120'">
      <div class="alert alert-danger">
        <strong>همکار گرامی، </strong> به دلیل مشکل فنی امکان پاسخگویی وجود ندارد، لطفا با واحد پشتیبانی تماس حاصل نمایید.
      </div>
    </div>
    <div v-if="step == 'error121'">
      <div class="alert alert-danger">
        <strong>همکار گرامی، </strong> اطلاعات شما یافت نشد، لطفا با بخش پشتیبانی تماس حاصل فرمایید.
      </div>
    </div>
    <div v-if="step == 'error122'">
      <div class="alert alert-danger">
        <strong>همکار گرامی، </strong> کد ملی و شماره موبایل شما تطابق ندارد. لطفا با واحد پشتیبانی تماس حاصل
      </div>
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
            this.step = "checkSms";
            this.userMobile = res.data.data.mobile;
            
          } else {
            
            switch (res.data.code) {
              case 120:
                this.step = "error120";
                return;
              case 121:
                alert(res.data.code)
                this.step = "error121";
                return;
              case 122:
                this.step = "error122";
                return;
              case 123:
                this.step = "checkSms";
                this.userMobile = res.data.data.mobile;
                return;
            }

            this.login_error = res.data.message;
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
