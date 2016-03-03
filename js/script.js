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
//script verif des champ
function surligne(champ, erreur) {
	if(erreur) { champ.style.backgroundColor = "#FF6347"; }
	else{ champ.style.backgroundColor = "#98FB98"; }
}
function verifPseudo(champ) {
	if(champ.value.length < 2 || champ.value.length > 25) { surligne(champ, true); return false; }
	else { surligne(champ, false); return true; }
}
function verifMail(champ) {
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	if(!regex.test(champ.value)) { surligne(champ, true); return false;	}
	else { surligne(champ, false); return true;	}
}
function verifSujet(champ) {
	if(champ.value.length < 2 || champ.value.length > 50) {	surligne(champ, true); return false; }
	else { surligne(champ, false); return true;	}
}
function verifMsg(champ) {
	if(champ.value.length < 5 || champ.value.length > 2000) { surligne(champ, true); return false; }
	else { surligne(champ, false); return true; }
}
function verifForm(f) {
	var pseudoOk = verifPseudo(f.nom);
	var mailOk = verifMail(f.mail);
	var sujetOk = verifSujet(f.sujet);
	var msgOk = verifMsg(f.msg);
	if(pseudoOk && mailOk && sujetOk && msgOk) { return true; }
	else { alert("Veuillez remplir correctement les champs"); return false;	}
}
//foncttion ajax pour le formulaire
$(function(){
	$("#formulaire").submit(function(event){
		$.ajax({
			type : "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success : function() {
				alert('Votre requête a bien été traitée!');
			},
			error: function() {
				alert("Erreur votre requête a échoué, veuillez réessayer !");
			}
		});
		return false;
	});
});

/*
if (erreur) {
	for (var prop in obj) {
  		console.log("obj." + prop + " = " + obj[prop]);
	}

// Affiche dans la console :
// "obj.a = 1"
// "obj.b = 2"
// "obj.c = 3"
	
}
 */