<template>
  <div>
    <notifications position="top center" type="warn" />
    <div v-if="step == 'getMobile'">
      <ul class="alert alert-danger" v-if="Object.keys(errors).length">
        <template v-for="error in errors" :key="error">
          <li v-for="message in error" :key="message">{{ message }}</li>
        </template>
      </ul>
      <div class="row mb-3" v-if="national_code_required">
        <label for="national_code" class="col-md-4 col-form-label text-md-end"
          >کد ملی</label
        >
        <div class="col-md-6">
          <input
            type="text"
            name="national_code"
            id="national_code"
            class="form-control"
            v-model="national_code"
            autofocus
            :disabled="loading"
          />
        </div>
      </div>
      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end"
          >شماره موبایل</label
        >
        <div class="col-md-6">
          <input
            type="text"
            name="mobile"
            id="mobile"
            class="form-control"
            v-model="mobile"
            autofocus
            :disabled="loading"
          />
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              name="remember"
              id="remember"
              v-model="remember_me"
            />
            <label class="form-check-label" for="remember">
              مرا به خاطر بسپار
            </label>
          </div>
        </div>
      </div>
      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button
            type="button"
            class="btn btn-primary"
            @click="sendVerificationCode"
          >
            <div
              v-if="loading"
              class="spinner-border spinner-border-sm"
              role="status"
            >
              <span class="sr-only"></span>
            </div>
            ورود
          </button>
        </div>
      </div>
    </div>
    <!-- form 2 -->
    <div v-if="step == 'getVerificationCode'">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-10 col-md-8">
          <p>
            کد تایید به شماره موبایل شما {{ filteredMobile }} ارسال شده است.
          </p>
        </div>

        <div class="col-12 col-sm-10 col-md-8">
          <input
            required
            class="form-control"
            name="vrification_code"
            :disabled="loading"
            v-model="verification_code"
            placeholder="کد تایید را وارد کنید"
          />
        </div>
        
        <div class="col-12 col-sm-10 col-md-8 mt-3" v-if="verificationError">
          <div class="alert alert-danger mb-0">{{ verificationError }}</div>
        </div>

        <div class="col-12 col-sm-10 col-md-8 mt-3">
          <button
            type="button"
            :disabled="loading"
            class="btn btn-primary"
            @click="checkVerificationCode"
          >
            <div
              v-if="loading"
              class="spinner-border spinner-border-sm"
              role="status"
            >
              <span class="sr-only"></span>
            </div>
            تایید کد اعتبار سنجی
          </button>
        </div>
      </div>
    </div>

    <!-- form 3 -->
    <div v-if="step == 'showError'">
      <p>{{ this.login_error }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["mode", "contactMobile", "contactError"],
  data: function () {
    return {
      loading: false,
      step: "getMobile",
      mobile: "",
      verificationError: "",
      login_error: "",
      verification_code: "",
      national_code: "",
      national_code_required: false,
      remember_me: false,
      errors: {},
    };
  },
  methods: {
    sendVerificationCode() {
      this.loading = true;
      this.errors = {};
      axios
        .get("/mobile/login", {
          params: {
            mobile: this.mobile,
            national_code: this.national_code,
          },
        })
        .then((res) => {
          console.log(res);
          if (res.data.success) {
            this.step = "getVerificationCode";
            return;
          }

          if (res.data.status_code == 101) {
            this.$notify({
              type: "warn",
              text: "این کاربر قبلا ثبت نام نشده است.",
            });
            this.national_code_required = true;
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          //
        })
        .then(() => {
          this.loading = false;
        });
    },
    checkVerificationCode() {
      this.loading = true;
      this.verificationError = "";
      axios
        .get("/mobile/check", {
          params: {
            mobile: this.mobile,
            code: this.verification_code,
          },
        })
        .then((res) => {
          if (res.data.success) {
            window.location = "/client/form";
          } else {
            this.verificationError = "کد تایید اشتباه وارد شده است";
            this.loading = false;
          }
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
    },
  },
  computed: {
    filteredMobile() {
      if (!this.mobile) return "";
      return this.mobile
        .substr(7, 4)
        .concat("******")
        .concat(this.mobile.substr(0, 2));
    },
  },
  mounted() {
    if (this.mode == "checkSms") {
      this.step = "getVerificationCode";
    }
    if (this.mode == "hasError") {
      this.step = "showError";
    }

    this.mobile = this.contactMobile;
    this.login_error = this.contactError;
  },
};
</script>
