window._ = require('lodash')

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')

    require('bootstrap-sass')

    // JS Files - Admin BSB
    require('adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select')
    require('adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll')
    window.Waves = require('adminbsb-materialdesign/plugins/node-waves/waves')
    require('adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo')
    window.Raphael = require('adminbsb-materialdesign/plugins/raphael/raphael')
    require('adminbsb-materialdesign/plugins/morrisjs/morris')
    require('adminbsb-materialdesign/plugins/chartjs/Chart.bundle')
    require('adminbsb-materialdesign/plugins/flot-charts/jquery.flot')
    require('adminbsb-materialdesign/plugins/flot-charts/jquery.flot.resize')
    require('adminbsb-materialdesign/plugins/flot-charts/jquery.flot.pie')
    require('adminbsb-materialdesign/plugins/flot-charts/jquery.flot.categories')
    require('adminbsb-materialdesign/plugins/flot-charts/jquery.flot.time')
    require('adminbsb-materialdesign/plugins/jquery-sparkline/jquery.sparkline')
    require('adminbsb-materialdesign/js/admin')
    require('adminbsb-materialdesign/js/pages/index')
    require('adminbsb-materialdesign/js/demo')
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
