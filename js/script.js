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
var iScrollPos = 0; // variable qui contien la position du scroll
$(window).scroll(function () {
    var iCurScrollPos = $(this).scrollTop();
	if (iCurScrollPos > iScrollPos) { // scroll down 
		$("#engr1").rotate(-iCurScrollPos);
		$("#engr2").rotate(iCurScrollPos*2+25);
		$("#engr3").css({ top : iCurScrollPos-50 });
		$("#engr3").rotate(iCurScrollPos);
		$("#engr4").rotate(iCurScrollPos);
		$("#engr5").rotate(-iCurScrollPos*2);
	} else { // scroll up
		$("#engr1").rotate(-iCurScrollPos);
		$("#engr2").rotate(iCurScrollPos*2+25);
		$("#engr3").css({ top : iCurScrollPos-50 });
		$("#engr3").rotate(iCurScrollPos);
		$("#engr4").rotate(iCurScrollPos);
		$("#engr5").rotate(-iCurScrollPos*2);
	}
	iScrollPos = iCurScrollPos;
});
//foncttion ajax pour le formulaire
$(function(){
	$("#formulaire").submit(function(event){
		$.ajax({
			type : "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success : function(retPHP) {
				var tabJSon = JSON.parse(retPHP);
				// si c'est valide on vide le formulaire et envois d'un mesage de validation
				if (tabJSon[0][2] && tabJSon[1][2] && tabJSon[2][2] && tabJSon[3][2]) {
					document.getElementById('sujet').value = '';
					document.getElementById('sujet').style.backgroundColor = '#ffc354';
					document.getElementById('msg').value = '';
					document.getElementById('msg').style.backgroundColor = '#ffc354';
					document.getElementById('nom').value = '';
					document.getElementById('nom').style.backgroundColor = '#ffc354';
					document.getElementById('mail').value = '';
					document.getElementById('mail').style.backgroundColor = '#ffc354';
					alert('Votre requête a bien été traitée!');
				}
				// si il y a des erreur on les identifis et on indique l'erreur
				else {
					alert('Information incorrecte !! Merci de corriger');
					for (var i=0; i<tabJSon.length; i++) {
						if (!tabJSon[i][2]) {
							document.getElementById(tabJSon[i][0]).value = tabJSon[i][1];
							document.getElementById(tabJSon[i][0]).style.backgroundColor = '#FF6347';
						}
						else {
							document.getElementById(tabJSon[i][0]).value = tabJSon[i][1];
							document.getElementById(tabJSon[i][0]).style.backgroundColor = '#98FB98';
						}
					}
				}
				
			},
			error: function() {
				// si ajax a planter
				alert("Erreur votre requête a échoué !");
			}
		});
		return false;
	});
});