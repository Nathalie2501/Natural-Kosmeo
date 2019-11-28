$(document).ready(function () {
	//Navbar
	$(".button-collapse").sideNav();


	//carrousel
	$('.carousel').carousel();

	//taille textarea
	$('#textarea').trigger('autoresize');

	//menu Popout

	var elem = document.querySelector('.collapsible popout');
	var instance = M.Collapsible.init(elem, {
		accordion: false
	});


});