<template>
    <div class="form-group">
        <label v-if="title" :for="id">{{title}}</label>
        <input :type="type" class="form-control" :id="id" :name="name" :value="value"/>
    </div>
</template>

<script>
  export default {
    props: {
      id: {
        type: String
      },
      name: {
        type: String,
      },
      title: {
        type: String,
      },
      type: {
        type: String,
        default: 'text'
      },
      value: {
        default: null
      }
    }
  };
</script>