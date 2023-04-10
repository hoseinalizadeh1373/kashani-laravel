<template >
  <v-card
    :prepend-icon="icon"
    elevation="1"
    class="rounded-0"
    :loading="loading"
    border
  >
    <template v-slot:title v-if="title">
      <div class="d-flex justify-space-between py-1">
        <v-sheet>{{ title }}</v-sheet>
        <v-sheet>
          <slot name="actions" />
        </v-sheet>
      </div>
    </template>
    <v-card-text>
      <slot />
    </v-card-text>
  </v-card>
</template>

<script >
export default {
  props: ["loading", "title", "icon"],
  data: () => {
    return {};
  },
};
</script>