<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <vspinner :show-spinner="showSpinner"/>
                <div class="card-header">{{formTitle}}</div>

                <div class="card-body">
                    <form :processing="processing" :id="id" :method="method" :action="action">
                        <vfield v-if="!isAjax" type="hidden" name="_token" :value="csrf_token"/>
                        <vfield v-for="item in fields" :key="item.id" :id="item.id" :name="item.name" :title="item.title"/>
                        <vbutton :is-ajax="isAjax" button-text="Отправить" @buttonClicked="onFormButtonClick"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
  import VueButton from './Button';
  import VueField from './Field';
  import Spinner from './Spinner';

  export default {
    props: {
      formTitle: {
        type: String,
        default: 'Default title'
      },
      id: {
        type: String
      },
      method: {
        type: String,
        default: 'POST'
      },
      action: {
        type: String,
        default: '/'
      },
      isAjax: {
        type: Boolean,
        default: false
      },
      fieldsData: {
        type: String
      },
      processing: {
        type: Boolean,
        default: false
      },
      showSpinner: {
        type: Boolean,
      },
    },
    components: {
      'vbutton': VueButton,
      'vfield': VueField,
      'vspinner': Spinner
    },
    methods: {
      onFormButtonClick () {
        let form = document.getElementById(this.id);
        axios(form.action, {
          method: form.method,
          data: new FormData(form)
        });
      },
      blockForm () {
        document.getElementById('submit-form').setAttribute('disabled', 'true');
        for (let item of document.getElementsByTagName('input')) {
          item.setAttribute('disabled', true);
        }
      },
      unblockForm () {
        document.getElementById('submit-form').removeAttribute('disabled');
        for (let item of document.getElementsByTagName('input')) {
          item.removeAttribute('disabled');
        }
      }
    },
    computed: {
      fields: function () {
        return JSON.parse(this.fieldsData);
      },
      csrf_token: function () {
        return document.getElementsByName('csrf-token')[0].content;
      }
    },
    watch: {
      processing: function () {
        this.processing ? this.blockForm() : this.unblockForm();
      }
    },
  };
</script>