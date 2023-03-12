<template>
  <div>
    برای ادامه روی لینک زیر کلیکل کنید
    {{ loading }}
  </div>
</template>

<script>
export default {
  props: ["token"],
  data: function () {
    return {
      loading: false,
      step: "welcome",
    };
  },
  methods: {
    startChecking() {
      this.loading = true;
      
      axios.post("/crme/checkContact",{ token: this.token })
        .then(res=>{
          if(res.data.success)
            alert("ok")
          else{

          }
          
        })
        .catch(err=>{

        })
        .then(()=>{
          this.loading = false;
        })
      
    },
  },
  computed:{
   
  },
  mounted() {
    this.startChecking();    
  },
};
</script>
