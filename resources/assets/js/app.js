/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'imports-loader?$=jquery!owl.carousel';


window.jQuery = $;
import '@fancyapps/fancybox/dist/jquery.fancybox.css';
import 'imports-loader?$=jquery!@fancyapps/fancybox/dist/jquery.fancybox';

const WOW = require('./wow.min');
window.wow = new WOW.WOW({live: false});


require('./bootstrap');
require('./main');



// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
