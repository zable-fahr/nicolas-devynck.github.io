$(document).ready(function() {
		$('.scrollTo').on('click', function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 750; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top -55 }, speed ); // Go
		return false;
	});
});
var iScrollPos = 0;
$(window).scroll(function () {
    var iCurScrollPos = $(this).scrollTop();
	if (iCurScrollPos > iScrollPos) {
		$("#engr1").rotate(-iCurScrollPos);
		$("#engr2").rotate(iCurScrollPos*2+25);
		$("#engr3").css({ top : iCurScrollPos-100 });
		$("#engr3").rotate(iCurScrollPos);
		$("#engr4").rotate(iCurScrollPos);
		$("#engr5").rotate(-iCurScrollPos*2);
	} else {
		$("#engr1").rotate(-iCurScrollPos);
		$("#engr2").rotate(iCurScrollPos*2+25);
		$("#engr3").css({ top : iCurScrollPos-100 });
		$("#engr3").rotate(iCurScrollPos);
		$("#engr4").rotate(iCurScrollPos);
		$("#engr5").rotate(-iCurScrollPos*2);
	}
	iScrollPos = iCurScrollPos;
});