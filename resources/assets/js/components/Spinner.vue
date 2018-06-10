<template>
    <div v-if="showSpinner" class="spinner-block">
        <spinner class="vspinner" color="red"/>
        <div class="spinner-overlay"></div>
    </div>
</template>

<script>
  import Spinner from 'vue-spinner-component/src/Spinner.vue';

  export default {
    props: {
      showSpinner: {
        type: Boolean,
      },
    },
    components: {
      'spinner': Spinner
    },
  };
</script>

<style>
    .spinner-block {
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .vspinner {
        position: absolute;
        left: 48%;
        top: 45%;
    }

    .spinner-overlay {
        width: inherit;
        height: inherit;
        position: inherit;
        background-color: grey;
        opacity: .4;
    }
</style>