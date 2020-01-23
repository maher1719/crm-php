<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<title>crm</title>
		<link rel="stylesheet" href="/crm/ios/css/ios.min.css">
		<link rel="stylesheet" href="/crm/ios/css/ios.colors.min.css">
		<link rel="stylesheet" href="/crm/ios/css/framework7.3dpanels.min.css">
		<script src="/crm/admin/plugins/datatables/jquery.dataTables.min.css"></script>
		<style>
		table
		{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: inherit;
		position:relative;
		left:0%;
		background: white;
		margin: auto;
		width: 100%;
		max-width:100px;
		border-collapse: collapse;
		text-align: left;
		}
		table th
		{
		font-size: 14px;
		font-weight: normal;
		color: #039;
		padding: auto;
		border-bottom: 2px solid #6678b1;
		}
		table td
		{
		color: #669;
		padding: 9px 8px 0px 8px;
		}
		table tbody tr:hover td
		{
		color: #009;
		}
		body {
		background: #074d55;
		background: -moz-radial-gradient(center, ellipse cover, #a7cfdf 0%, #23538a 100%); /* FF3.6+ */
		background: -webkit-gradient(radial, right bottom, 0px, left top, 100%, color-stop(0%,#6967a5), color-stop(50%,#2075a1), color-stop(100%,#074d55));
		background: -webkit-radial-gradient(right bottom, ellipse cover, #6967a5 0%, #2075a1 50%, #074d55 100%);
		background: radial-gradient(ellipse at right bottom, #6967a5 0%, #2075a1 50%, #074d55 100%);
		
		}
		.panel .page, .panel .pages, .panel {
		background: none;
		}
		.panel .list-block ul {
		background: none;
		border:none;
		}
		.panel .list-block .item-link {
		color:#fff;
		}
		.panel .list-block .item-link:active {
		background: rgba(255,255,255,0.2);
		}
		.panel .list-block .item-inner {
		border-bottom-color:rgba(255,255,255,0.2);
		}
		.panel .content-block, .panel .content-block-title {
		color:#fff;
		}
		</style>
	</head>
	<body>
		<div class="statusbar-overlay"></div>
		<div class="panel-overlay"></div>
		<div class="panel panel-right panel-reveal">
			<div class="view">
				<div class="pages">
					<div class="page">
						<div class="page-content">
							<div class="list-block">
								<ul>
								<li>
										<a id="page_accueil" href="accueil.php" class="item-content item-link">
											<div class="item-inner">
												<div class="item-title">Accueil</div>
											</div>
										</a>
									</li>
									<li>
										<a id="page_prospect" href="prospect/index.php" class="item-content item-link">
											<div class="item-inner">
												<div class="item-title">prospect</div>
											</div>
										</a>
									</li>
									<li>
										<a id="page_contact" href="contact/index.php" class="item-content item-link">
											<div class="item-inner">
												<div class="item-title">contact</div>
											</div>
										</a>
									</li>
									<li>
										<a id="page_appel" href="appel/index.php" class="item-content item-link">
											<div class="item-inner">
												<div class="item-title">appel</div>
											</div>
										</a>
									</li>
									<li><a id="page_rdv" href="RDV/index.php" class="item-content item-link">
										<div class="item-inner">
											<div class="item-title">rdv</div>
										</div>
									</a>
								</li>
								<li><a id="page_deconnexion" href="RDV/index.php" class="item-content item-link">
										<div class="item-inner">
											<div class="item-title">Déconnexion</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="views">
		<div class="view view-main">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="col-50"><a href="#" data-panel="right" class="button open-panel">Menu </a></div>
					<div class="right"><a href="#" class="link icon-only open-panel"> <i class="icon icon-bars-blue"></i></a></div>
				</div>
			</div>
			<div class="pages navbar-through toolbar-through">
				<div data-page="index" class="page">
					<div class="page-content">
						<div class="content-block-title">Accueil</div>
						<div class="content-block">
							<div class="buttons-row">
								<!-- Link to 1st tab, active -->
								<a href="#tab1" class="tab-link active button">Prospect</a>
								<!-- Link to 2nd tab -->
								<a href="#tab2" class="tab-link button">Contact</a>
								<!-- Link to 3rd tab -->
								<a href="#tab3" class="tab-link button">Appel</a>
								<a href="#tab4" class="tab-link button">RDV</a>
							</div>
						</div>
						<!-- Tabs, tabs wrapper -->
						<div class="tabs">
							<!-- Tab 1, active by default -->
							<div id="tab1" class="tab active">
								<div class="content-block">
									<table id="table_prospects">
										<thead>
											<tr>
												<th>ID</th>
												<th>raison social</th>
												<th>Nom</th>
												<th>email</th>
												<th>Téléphone</th>
												<th>Fax</th>
												<th>adresse</th>
												<th>date contrat</th>
												<th>domaine</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							<!-- Tab 2 -->
							<div id="tab2" class="tab">
								<div class="content-block">
									<table id="table_contact">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nom</th>
												<th>email</th>
												<th>Téléphone</th>
												<th>post</th>
												<th>prospect</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							<!-- Tab 3 -->
							<div id="tab3" class="tab">
								<div class="content-block">
									<table id="table_appel">
										<thead>
											<tr>
												<th>ID</th>
												<th>contact</th>
												<th>Nom prospet</th>
												<th>date</th>
												<th>resultat</th>
												<th>commentaire</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
							<div id="tab4" class="tab">
								<div class="content-block">
									<table id="table_rdv" class="table table-bordered table-striped display">
										<thead><tr>
											<th>ID</th>
											<th>contact</th>
											<th>date rdv</th>
											<th>lieu rdv</th>
											<th>resultat</th>
											<th>commentaire</th>
										</tr>
									</thead>
									<tbody id="tbody">
										<tr style="display: none;">
											<td>e</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/crm/ios/js/framework7.min.js"></script>
<script src="/crm/ios/js/framework7.3dpanels.min.js"></script>
<script src="/crm/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/crm/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
var myApp = new Framework7({
    swipePanel: 'left'
});
var mainView = myApp.addView('.view-main');
$(document).ready(function() 
{
	$("#page_accueil").click(function(event) {
		window.location="index.php";
	});
	$("#page_rdv").click(function(event) {
		window.location="rdv/index.php";
	});
	$("#page_prospect").click(function(event) {
		window.location="prospect/index.php";
	});
	$("#page_appel").click(function(event) {
		window.location="appel/index.php";
	});
	$("#page_contact").click(function(event) {
		window.location="contact/index.php";
	});
	$("#page_deconnexion").click(function(event) {
		window.location="deconnexion.php";
	});
    $("#table_prospects").DataTable({
        "language": {
            "sProcessing": "Traitement en cours...",
            "sSearch": "Rechercher&nbsp;:",
            "sLengthMenu": "Afficher _MENU_ Appels",
            "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix": "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst": "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext": "Suivant",
                "sLast": "Dernier"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        },
        "ajax": {
            "url": "../fonctions/prospet/affiche.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": "id"
        }, {
            "data": "raison_social"
        }, {
            "data": "nom"
        }, {
            "data": "email"
        }, {
            "data": "tel"
        }, {
            "data": "fax"
        }, {
            "data": "adresse"
        }, {
            "data": "date_contrat"
        }, {
            "data": "domaine"
        }, ]
    });
    $("#table_contact").DataTable({
        "language": {
            "sProcessing": "Traitement en cours...",
            "sSearch": "Rechercher&nbsp;:",
            "sLengthMenu": "Afficher _MENU_ Appels",
            "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix": "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst": "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext": "Suivant",
                "sLast": "Dernier"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        },
        "ajax": {
            "url": "../fonctions/contact/affiche.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": "id"
        }, {
            "data": "nom_contact"
        }, {
            "data": "email"
        }, {
            "data": "tel"
        }, {
            "data": "poste"
        }, {
            "data": "nom_prospect"
        }, ]
    });
    $("#table_appel").DataTable({
        "language": {
            "sProcessing": "Traitement en cours...",
            "sSearch": "Rechercher&nbsp;:",
            "sLengthMenu": "Afficher _MENU_ Appels",
            "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix": "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst": "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext": "Suivant",
                "sLast": "Dernier"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        },
        "ajax": {
            "url": "../fonctions/appelles/affiche.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": "id"
        }, {
            "data": "nom_contact"
        }, {
            "data": "nom_prospect"
        }, {
            "data": "date"
        }, {
            "data": "resultat_libelle"
        }, {
            "data": "commentaire"
        }, ]
    });
    $("#table_rdv").DataTable({
        "language": {
            "sProcessing": "Traitement en cours...",
            "sSearch": "Rechercher&nbsp;:",
            "sLengthMenu": "Afficher _MENU_ Appels",
            "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix": "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst": "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext": "Suivant",
                "sLast": "Dernier"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        },
        "ajax": {
            "url": "../fonctions/rdv/affiche.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": "id"
        }, {
            "data": "nom_contact"
        }, {
            "data": "date_rdv"
        }, {
            "data": "lieu_rdv"
        }, {
            "data": "libelle"
        }, {
            "data": "commentaire"
        }, ]
    });
});
</script>
</body>
</html>