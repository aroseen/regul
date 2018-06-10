<template>
    <button :id="id" class="btn btn-primary" :type="isAjax ? 'button' : 'submit'" @click="onClick">{{buttonText}}</button>
</template>

<script>
  export default {
    props: {
      isAjax: {
        type: Boolean,
        default: false
      },
      buttonText: {
        type: String,
        default: 'Submit'
      },
      id: {
        type: String,
        default: 'submit-form'
      }
    },
    methods: {
      onClick (event) {
        this.$emit('buttonClicked', event);
      }
    }
  };
</script>