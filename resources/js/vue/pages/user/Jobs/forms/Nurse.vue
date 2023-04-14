<template >
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6" lg="4">
        <card title="ویرایش اطلاعات همکار">
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1036"
                label="نام پدر"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.mobile"
                label="شماره موبایل"
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
                density="compact"
                v-model="contact.birthday"
                label="تاریخ تولد"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1042"
                label="محل تولد"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_pcf_irc_1122"
                label="کد ملی"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1038"
                label="تاریخ تولد"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_pcf_ccn_1127"
                label="شماره کارت بانکی"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              شسی
              <v-select
                @click="asd"
                label="وضعیت تاهل"
                v-model="contact.cf_1058"
                density="compact"
                :items="['مجرد', 'متاهل', 'متارکه', 'فوت همسر']"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1062"
                label="تعداد فرزندان"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-select
                label="وضعیت خدمت سربازی"
                v-model="contact.cf_1064"
                density="compact"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1221"
                label="قد"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-select
                label="آخرین مدرک تحصیلی"
                v-model="contact.cf_1030"
                density="compact"
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
                :items="['', 'دارم', 'ندارم']"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1247"
                label="زندگی با"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1048"
                label="ملیت"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1050"
                label="دین"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-text-field
                density="compact"
                v-model="contact.cf_1052"
                label="مذهب"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-select
                v-model="contact.cf_1255"
                label="استعمال دخانیات"
                density="compact"
                :items="['سیگار می کشم', 'سیگار نمی کشم', 'ترک کردم', 'تفریحی']"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              کار با مددجوی مرد
              <v-radio-group v-model="contact.cf_1480" inline color="primary">
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
                :items="['بدون وسیله', 'موتور', 'ماشین']"
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
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-textarea
                density="compact"
                v-model="contact.cf_1251"
                label="مشخصات معرف دوم"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-textarea
                density="compact"
                v-model="contact.cf_1253"
                label="مشخصات معرف سوم"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-textarea
                density="compact"
                v-model="contact.cf_1880"
                label="مشخصات همسر"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-textarea
                density="compact"
                v-model="contact.cf_1882"
                label="مشخصات کارفرمای قبلی"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-textarea
                density="compact"
                v-model="contact.mailingstreet"
                label="آدرس"
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
              ></v-checkbox>
            </v-col>
          </v-row>
        </card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "JobsForm",

  data() {
    return {
      loading: false,
      contact: {},
      terms: false,
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
    async loadDocuments() {
      this.loading = true;
      const { data } = await axios.get(`/api/users/${this.user.id}/documents`);
      this.documents = data;
      this.loading = false;
    },
  },
  mounted() {
    this.loadDocuments();
  },
};
</script>