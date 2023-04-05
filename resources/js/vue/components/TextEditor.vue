<template >
  <light-editor
    v-model="content"
    class="border"
    style="min-height: 150px; padding: 5px"
  />
</template>

<script >
import { LightEditor, LightEditorPlugin } from "@hannanmiah/light-editor";

export default {
  props: ["value"],
  components: { LightEditor },
  data: () => {
    return {
      content: "",
    };
  },
  watch: {
    content(newVal) {
      this.$emit("input", newVal);
    },
  },
  mounted() {
    this.content = this.value;
  },
};
</script>