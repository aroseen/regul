import Echo from 'laravel-echo';
import Vue from 'vue';
import VueForm from './components/Form';
import CxltToastr from 'cxlt-vue2-toastr';
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';

require('./bootstrap');

Vue.use(CxltToastr, {
  position: 'top right',
  showDuration: 2000,
  hideDuration: 2000,
  timeOut: 5000
});

window.vm = new Vue({
  el: '#app',
  data: {
    processing: false,
    showSpinner: false
  },
  components: {
    'vform': VueForm,
  },
  methods: {
    showSuccessNotification (title, text) {
      this.$toast.success({
        title: title,
        message: text
      });
    }
  }
});

let echo = new Echo({
  broadcaster: 'socket.io',
  host: window.location.hostname + ':6001',
});

echo.channel('processing').listen('ProcessingStarted', function (data) {
  vm.showSuccessNotification(data.title, data.notification);
  console.log(data.date, ': ' + data.title + ': ' + data.notification);
  vm.processing = vm.showSpinner = true;
}).listen('ProcessingFinished', function (data) {
  vm.showSuccessNotification(data.title, data.notification);
  console.log(data.date, ': ' + data.title + ': ' + data.notification);
  vm.processing = vm.showSpinner = false;
});