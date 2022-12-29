<template>
  <div>
    <notifications position="top center" type="warn" />
    <form v-if="step == 'getMobile'">
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
          >شماره mobile</label
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
    </form>
    <!-- form 2 -->
    <form v-if="step == 'getVerificationCode'">
      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end"
          >کد تایید
        </label>
        <div class="col-md-6">
          <input
            type="number"
            class="form-control"
            name="email"
            v-model="verification_code"
          />
        </div>
      </div>
      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button
            type="button"
            class="btn btn-primary"
            @click="checkVerificationCode"
          >
            تایید کد اعتبار سنجی
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  // props: ["mobile"],
  data: function () {
    return {
      loading: false,
      step: "getMobile",
      mobile: "",
      verification_code: "",
      national_code: "",
      national_code_required: false,
      remember_me: false,
    };
  },
  methods: {
    sendVerificationCode() {
      this.loading = true;
      axios
        .get("/mobile/sendCode", {
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
          console.log(err);
        })
        .then(() => {
          this.loading = false;
        });
    },
    checkVerificationCode() {
      this.loading = true;
      axios
        .get("/mobile/check", {
          params: {
            mobile: this.mobile,
            code: this.verification_code,
          },
        })
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.loading = false;
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
