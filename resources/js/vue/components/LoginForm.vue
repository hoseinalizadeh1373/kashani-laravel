<template>
  <div>
    <form v-if="step == 'getMobile'">
      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end"
          >شماره موبایل</label
        >
        <div class="col-md-6">
          <input
            type="text"
            class="form-control"
            :value="mobile"
            autofocus
            :disabled="loading"
          />
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
            :value="verification_code"
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
  props: ["mobile"],
  data: function () {
    return {
      loading: false,
      step: "getMobile",
      verification_code: "",
    };
  },
  methods: {
    sendVerificationCode() {
      this.loading = true;
      axios
        .get("/mobile/sendVerificationSms")
        .then((res) => {
          this.step="getVerificationCode"
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
        .get("/mobile/checkVerificationCode")
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
