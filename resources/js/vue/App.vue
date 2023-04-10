<template>
  <div>
    <component :is="layout">
      <login v-if="showLoginForm"></login>
    </component>
  </div>
</template>
<script>
import defaultLayout from "./layouts/default.vue";
import basic from "./layouts/basic.vue";
import Login from "./components/Login.vue";
import { useAuthStore } from "./store/auth";
import { useOptionsStore } from "./store/options";

export default {
  components: {
    default: defaultLayout,
    basic,
    Login,
  },
  data: function () {
    return {
      layout: "default",
      auth: useAuthStore(),
    };
  },
  computed: {
    showLoginForm() {
      const auth = useAuthStore();
      return auth.loginFormDisplay;
    },
    options() {
      return useOptionsStore();
    },
  },
  watch: {
    $route: function (route) {
      this.setLayout(route.meta.layout || "default");
    },
  },
  methods: {
    setLayout(layout) {
      this.layout = layout;
    },
  },
  async mounted() {},
  async created() {
    if (!this.options.optionsLoaded) await this.options.getOptionsFromServer();
  },
};
</script>
<style>
/* body{
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1074%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(255%2c 255%2c 255%2c 1)'%3e%3c/rect%3e%3cpath d='M1512 560L0 560 L0 403.17Q44.19 375.36%2c 72 419.55Q138.14 365.69%2c 192 431.83Q259.94 379.77%2c 312 447.72Q351.58 367.31%2c 432 406.89Q504.45 359.34%2c 552 431.79Q596.25 404.05%2c 624 448.3Q636.56 388.86%2c 696 401.41Q770.61 356.01%2c 816 430.62Q867.79 362.41%2c 936 414.21Q1012.4 370.62%2c 1056 447.02Q1105.82 376.83%2c 1176 426.65Q1230.47 361.13%2c 1296 415.6Q1351.03 398.63%2c 1368 453.66Q1397.89 411.55%2c 1440 441.44Q1461.72 391.16%2c 1512 412.89z' fill='rgba(178%2c 204%2c 255%2c 1)'%3e%3c/path%3e%3cpath d='M1488 560L0 560 L0 449.1Q35.21 412.31%2c 72 447.53Q138.43 393.96%2c 192 460.39Q236.93 433.31%2c 264 478.24Q283.35 425.59%2c 336 444.94Q419.07 408.01%2c 456 491.08Q498.23 413.31%2c 576 455.54Q627.4 386.95%2c 696 438.35Q783.29 405.64%2c 816 492.93Q842.42 447.35%2c 888 473.76Q909.7 423.46%2c 960 445.16Q1004.23 417.39%2c 1032 461.62Q1076.35 433.97%2c 1104 478.31Q1149.06 403.37%2c 1224 448.43Q1266.82 419.25%2c 1296 462.06Q1345.62 439.68%2c 1368 489.29Q1420.99 422.28%2c 1488 475.28z' fill='%2325467d'%3e%3c/path%3e%3cpath d='M1488 560L0 560 L0 491.88Q42.15 462.03%2c 72 504.19Q138.59 450.78%2c 192 517.37Q213.24 466.61%2c 264 487.84Q345.71 449.55%2c 384 531.26Q406.26 481.52%2c 456 503.79Q500.18 475.97%2c 528 520.14Q571.29 443.43%2c 648 486.72Q715.54 434.26%2c 768 501.81Q812.16 473.98%2c 840 518.14Q860.01 466.15%2c 912 486.17Q955.22 457.39%2c 984 500.62Q1049.42 446.05%2c 1104 511.47Q1148.74 484.21%2c 1176 528.95Q1217.39 450.34%2c 1296 491.73Q1367.93 443.67%2c 1416 515.6Q1458.88 486.48%2c 1488 529.35z' fill='%23356cb1'%3e%3c/path%3e%3cpath d='M1560 560L0 560 L0 566.73Q42.71 489.44%2c 120 532.15Q161.45 501.6%2c 192 543.04Q258.14 489.18%2c 312 555.32Q381.25 504.57%2c 432 573.82Q476.21 498.03%2c 552 542.24Q617.93 488.17%2c 672 554.11Q695.86 505.97%2c 744 529.82Q800.47 514.29%2c 816 570.76Q870.81 505.57%2c 936 560.38Q960.66 513.04%2c 1008 537.69Q1058.89 468.58%2c 1128 519.47Q1180.59 500.06%2c 1200 552.65Q1249.99 482.64%2c 1320 532.63Q1374.96 467.59%2c 1440 522.55Q1511.37 473.91%2c 1560 545.28z' fill='rgba(176%2c 214%2c 255%2c 1)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1074'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
    background-position: bottom;
    background-attachment: fixed;
    background-size: cover;
    background-repeat: repeat-x;
} */

footer.v-footer {
  background-color: rgba(225, 225, 225, 0.8) !important;
}
</style>