//script scroll sur les liens
$(document).ready(function() {
		$('.scrollTo').on('click', function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 750; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top -55 }, speed ); // Go
		return false;
	});
});
//script engrenage
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
//foncttion ajax pour le formulaire
/*
$(function(){
	$("#formulaire").submit(function(event){
		$.ajax({
			type : "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success : function(retPHP) {
				var tabJSon = retPHP;
				console.log(tabJSon);
			},
			error: function() {
				alert("Erreur votre requête a échoué !");
			}
		});
		return false;
	});
});
 */