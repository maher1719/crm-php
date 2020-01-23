/*if( /Android|webOS|BlackBerry|MeeGo|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

    window.location="/crm/mobile/index.php";
};
if(/iPhone|iPad|iPod/i.test(navigator.userAgent))
{
	window.location="/crm/ios/index.php";
}*/
		function verifier_champs(champs) {
			if (champs === undefined || champs.length == 0 || typeof (champs) !== "object") {
				return false;
			} else {
				var champs_vide = new Array();
				for (var i = 0; i < champs.length; i++) {
					if (champs[i].val() == "" || champs[i].val() === undefined) {
						champs_vide.push(champs[i].data('nom'));
					}
				}
				if (champs_vide.length == 0) {
					return true;
				} else {
					return champs_vide;

				}
			}
		}

		function getSelectionText() {
			var text = "";
			if (window.getSelection) {
				text = window.getSelection().toString();
			} else if (document.selection && document.selection.type != "Control") { // for Internet Explorer 8 and below
				text = document.selection.createRange().text;
			}
			return text;
		}
		var support_commande_vocal = "false";

		$(document).ready(function () {
			
			$(".es").remove();
			$.getJSON('/crm/fonctions/accueil/accuiel.php', function(json, textStatus) {
                console.log(json[0]);
                $(".header_rdv").text(json[0].somme_rdv);
                $(".header_appel").text(json[0].somme_appel);
                $(".header_prospect").text(json[0].somme_prospect);
                $(".header_contact").text(json[0].somme_contact);

          });
			$("#deconnexion").click(function(event) {
				/* Act on the event */
				window.location="deconnexion.php";
			});
			responsiveVoice.setDefaultVoice("French Female");
					var speak = responsiveVoice.speak;
		var cancel = responsiveVoice.cancel;

			// when the document has completed loading
			$(document).mouseup(function (e) { // attach the mouseup event for the document
				responsiveVoice.cancel(); // stop anything currently being spoken
				responsiveVoice.speak(getSelectionText()); //speak the text as returned by getSelectionText
			})
			$('a').mouseenter(function () { // Attach this function to all mouseenter events for 'a' tags
				responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
				var text = $(this).text().trim();
				if (text == "RDV") {
					text = "Rendez-vous";
				}
				responsiveVoice.speak(text); // Speak the text contents of all nodes within the current 'a' tag
			});
			$.extend($.fn.pickadate.defaults, {
				monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
				weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
				today: 'aujourd\'hui',
				clear: 'effacer',
				close: 'fermerr',
				format: 'yyyy-mm-dd',
				formatSubmit: 'yyyy/mm/dd'
			});
			$('.datepicker').pickadate();
			$('select').chosen({
				width: "100%",
				no_results_text: "aucun résultat pour "
			});
			if (annyang) {
				annyang.setLanguage("fr-FR");
				support_commande_vocal = "support";
				if (support_commande_vocal == "false") {
					support_commande_vocal = "support";
				}
				var url = "/crm/";
				var vers_page = function (page) {

					switch (page) {
					case "contact":
					case "contacts":
						url = url + "contact/";
						window.location = url;
						break;
					case "appel":
					case "appels":
					case "appelle":
					case "appelles":
						url = url + "appelles/";
						window.location = url;
						break;
					case "prospect":
					case "prospects":
					case "prospecte":
						url = url + "prospet/";
						window.location = url;
						break;
					case "rendez-vous":
						url=url+ "rdv/index.php";
						window.location=url;
					default:
						// statements_def
						speak("j'ai pas compris ta commande ou elle est incorrect, Veuillez vous la réssayer ?");
						break;
					}
				}
				var ajout_chose = function (chose) {
					switch (chose) {
					case "contact":
					case "contacts":
						url = url + "contact/ajouter.php";
						window.location = url;
						break;
					case "appel":
					case "appels":
					case "appelle":
					case "appelles":
						url = url + "appelles/ajout.php";
						window.location = url;
						break;
					case "accueil":
					case "accueils":
						url = url + "accueil.php";
						window.location = url;
						break;
					case "prospect":
					case "prospects":
					case "prospecte":
						url = url + "prospet/ajout.php";
						window.location = url;
						break;
						case "rdv":
						case "rendez-vous":
						url=url+"rdv/rdv.php";
						window.location=url;
					default:
						speak("j'ai pas compris ta commande, Veuillez vous la réssayer ?");
						break;
					}
				}
				var commandes = {
					"liste (les) (des) :page": vers_page,
					"ajouter :chose": ajout_chose,
					"accueil": function () {
						window.location = "/crm/accueil.php"
					},
					"réfléchir": function () {
						window.location = ""
					},
					"calendrier":function(){
						window.location="/crm/admin/pages/calendar.php"
					}
				}
				annyang.abort();
				annyang.debug();
				annyang.addCommands(commandes);
				$(".parlez").hide();
				if (annyang.isListening() === true) {
					$(".parlez").show();
				}
				$(".button-parlez").click(function (event) {
					if (annyang.isListening() === false) {
						$(".parlez").show();
						annyang.start();
					} else {
						$(".parlez").hide();
						annyang.abort();
					}
				});
			} else {
				//responsiveVoice.speak("votre navigateur ne support pas les commandes vocales éssayé d'utilisé le navigateur chrome version 35 ou plus ancien");
				//alert("navigateur ne support pas les commandes vocales éssayé d'utilisé chrome v 35+");
				$(".parlez").hide();
				$(".parler>a").addClass('disabled');

			}
			


		});