
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

// fungsi untuk delete

$(document).ready(function() {
	$(document.body).on('click', '.js-submit-confirm', function(event) {
		event.preventDefault()
		var $form = $(this).closest('form')
		var $el = $(this)
		var text = $el.data('confirm-data') ? $el.data('confirm-data') : 'Kamu tidak akan bisa membatalkan proses ini!'

		swal({
			title : 'Kamu yakin?',
			text : text,
			type : 'warning',
			showCancelButton : true,
			confirmButtonColor : '#DD6B55',
			confirmButtonText : 'Yap, lanjutkan!',
			cancelButtonText : 'Batal',
			closeOnConfirm : true
		},
			function() {
				$form.submit()
			})
	})

	// for selectize.js
	$('.js-selectize').selectize({
		sortField: 'text'
	})
})
