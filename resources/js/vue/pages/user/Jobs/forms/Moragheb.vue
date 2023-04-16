<template >
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6" lg="4">
        <v-form @submit.prevent="submit" validate-on="submit">
          <card title="ویرایش اطلاعات مراقب">
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  :rules="[rules.required]"
                  v-model="contact.firstname"
                  label="نام"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.lastname"
                  label="نام خانوادگی"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1036"
                  label="نام پدر"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.mobile"
                  label="شماره موبایل"
                  disabled
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.otherphone"
                  label="تلفن"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  class="mb-0"
                  density="compact"
                  v-model="contact.birthday"
                  label="تاریخ تولد"
                  :rules="[rules.required]"
                  hint="فرمت تاریخ: 1358/01/01"
                  v-mask="'0000/00/00'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1042"
                  label="محل تولد"
                  :rules="[rules.required]"
                  hint="لطفا شهر محل سکونت خود را وارد نمایید."
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_pcf_irc_1122"
                  label="کد ملی"
                  disabled
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1038"
                  label="شماره شناسنامه"
                  :rules="[rules.required]"
                  v-mask="'0000000000'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_pcf_ccn_1127"
                  label="شماره کارت بانکی"
                  :rules="[rules.required]"
                  v-mask="'0000-0000-0000-0000'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  label="وضعیت تاهل"
                  v-model="contact.cf_1058"
                  density="compact"
                  :items="['مجرد', 'متاهل', 'متارکه', 'فوت همسر']"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1062"
                  label="تعداد فرزندان"
                  :rules="[rules.required]"
                  v-mask="'00'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  label="وضعیت خدمت سربازی"
                  v-model="contact.cf_1064"
                  density="compact"
                  :rules="[rules.required]"
                  :items="[
                    'معاف',
                    'پایان خدمت',
                    'در حال تحصیل',
                    'غایب',
                    'مشمول',
                    'در حال خدمت',
                  ]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1225"
                  label="وزن"
                  :rules="[rules.required]"
                  v-mask="'000'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1221"
                  label="قد"
                  :rules="[rules.required]"
                  v-mask="'000'"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  label="آخرین مدرک تحصیلی"
                  v-model="contact.cf_1030"
                  density="compact"
                  :rules="[rules.required]"
                  :items="[
                    'بیسواد',
                    'ابتدایی',
                    'سیکل',
                    'دیپلم',
                    'کاردانی',
                    'کارشناسی',
                    'کارشناس ارشد',
                    'دکترا',
                  ]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  label="سابقه محکومیت کیفری"
                  v-model="contact.cf_1205"
                  density="compact"
                  :items="['دارم', 'ندارم']"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  label="محدوده فعالیت"
                  v-model="contact.cf_1193"
                  multiple
                  density="compact"
                  :items="[
                    'شمال',
                    'جنوب',
                    'مرکز',
                    'شرق',
                    'غرب',
                    'حومه',
                    'تمامی مناطق',
                  ]"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1247"
                  label="زندگی با"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1048"
                  label="ملیت"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1529"
                  label="زبان و گویش"
                  multiple
                  density="compact"
                  :items="[
                    'پارسی',
                    'ترکی',
                    'گیلکی',
                    'مازنی',
                    'لری',
                    'لکی',
                    'عربی',
                    'بلوچی',
                    'ترکمن',
                    'دری',
                    'پشتو',
                    'ارمنی',
                  ]"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1050"
                  label="دین"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_1052"
                  label="مذهب"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1195"
                  label="شیفت خدمات"
                  multiple
                  density="compact"
                  :items="[
                    'روزانه',
                    'شبانه',
                    'شبانه روزی',
                    'مقطعی',
                    'بیمارستان',
                    'منزل',
                    'موردی',
                  ]"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1197"
                  label="خدمات مراقب"
                  multiple
                  density="compact"
                  :items="[
                    'سالمند لگنی',
                    'سالمند پوشکی',
                    'آلزایمر',
                    'سالمند سالم',
                    'کودک',
                    'بهیار',
                    'کمک بهیار',
                    'کودک دوقولو',
                    'امور منزل',
                    'تمامی موارد',
                    'پرستار',
                    'پرستار ویژه',
                  ]"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1255"
                  label="استعمال دخانیات"
                  density="compact"
                  :items="[
                    'سیگار می کشم',
                    'سیگار نمی کشم',
                    'ترک کردم',
                    'تفریحی',
                  ]"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-radio-group
                  v-model="contact.cf_1480"
                  inline
                  color="primary"
                  label="کار با مددجوی مرد"
                >
                  <v-radio label="بله" value="1"></v-radio>
                  <v-radio label="خیر" value="0"></v-radio>
                </v-radio-group>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1809"
                  label="وسیله نقلیه"
                  multiple
                  density="compact"
                  :items="['موتور', 'ماشین']"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1515"
                  label="گزینه های بیشتر"
                  multiple
                  density="compact"
                  :items="[
                    'گواهینامه',
                    'پاسپورت',
                    'ماشین',
                    'موتور',
                    'امکان سفر داخلی',
                    'امکان سفر خارجی',
                  ]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.cf_1249"
                  label="مشخصات معرف اول"
                  :rules="[rules.required]"
                  hint="نام - شماره تماس - نسبت - آدرس"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.cf_1251"
                  label="مشخصات معرف دوم"
                  :rules="[rules.required]"
                  hint="نام - شماره تماس - نسبت - آدرس"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.cf_1253"
                  label="مشخصات معرف سوم"
                  hint="نام - شماره تماس - نسبت - آدرس"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.cf_1880"
                  label="مشخصات همسر"
                  hint="نام - نام خانوادگی - شماره تماس - آدرس محل کار"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.cf_1882"
                  label="مشخصات کارفرمای قبلی"
                  hint="نام - نام خانوادگی - شماره تماس - آدرس محل کار"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-textarea
                  density="compact"
                  v-model="contact.mailingstreet"
                  label="آدرس"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                  density="compact"
                  v-model="contact.cf_pcf_irp_1076"
                  label="کد پستی"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-select
                  v-model="contact.cf_1521"
                  label="مشکلات جسمانی"
                  multiple
                  density="compact"
                  :items="[
                    'عینکی',
                    'کم شنوایی',
                    'دودید',
                    'نیستاگموس',
                    'کم دید',
                    'مشکل کمر',
                    'مشکل گردن',
                    'مشکل دست',
                    'مشکل زانو',
                    'ضعف جسمانی',
                    'پای پرانتزی',
                    'لنگی پا',
                    'قطع انگشتان دست',
                    'لکنت زبان',
                  ]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-checkbox
                  v-model="terms"
                  color="primary"
                  label="صحت کلیه اطلاعات را تایید می نمایم"
                  :rules="[rules.terms]"
                ></v-checkbox>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-expand-transition>
                  <v-alert
                    v-if="hasErrors"
                    class="text-red py-2 pt-3 my-2"
                    type="error"
                    variant="tonal"
                  >
                    بعضی مقادیر به صورت صحیح وارد نشده اند. لطفا همه مقادیر و
                    خطاهای احتمالی را چک کنید.
                  </v-alert>
                </v-expand-transition>
                <v-btn color="primary" :loading="loading" type="submit"
                  >ذخیره</v-btn
                >
              </v-col>
            </v-row>
          </card>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "JobsForm",

  props: ["contactInfo", "loading"],
  data() {
    return {
      contact: {},
      terms: false,
      rules: {
        required: (v) => !!v || "مقدار فیلد الزامی است.",
        terms: (v) => v || "صحت اطلاعات فرم را تایید کنید.",
      },
      hasErrors: false,
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
    async submit(event) {
      this.hasErrors = false;
      const results = await event;
      this.hasErrors = !results.valid;
      if (!results.valid) return;

      this.$emit("save", this.contact);
    },
  },
  mounted() {
    this.contact = this.contactInfo;
  },
};
</script>