/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

let $ = require('jquery');
window.$ = $;
require('bootstrap');

require('bootstrap/dist/css/bootstrap.min.css')
require('bootstrap-datetimepicker/src/js/bootstrap-datetimepicker')
require('bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')
require('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')
require('./styles/app.css');

$(document).ready(() => {
    $('.datepicker').on('focus', () => {
        $(event.currentTarget).attr('type', 'datetime-local');
    }).on('blur', () => {
        if ($(event.currentTarget).val() === '') {
            $(event.currentTarget).attr('type', 'text');
        }
    })
})