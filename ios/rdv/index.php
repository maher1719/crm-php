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
						<div class="content-block-title">Appel</div>
						<div class="content-block-title">List View Accordion</div>
<div  class="list-block accordion-list">
  <ul id="liste_rdv">
  </ul>
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
var _ = Dom7;
function modifier(id)
{
	window.location="modifier.php?id="+id;
}
function supprimer(id)
{
	myApp.confirm('voulez-vous supprimer ce rendez-vous?', 'Custom Title', function () {
        $.post('../../fonctions/rdv/supprimer.php', {id: id}, function(data, textStatus, xhr) {
        	/*optional stuff to do after success */
        });
    });
}
var mainView = myApp.addView('.view-main');
$(document).ready(function() 
{
	$("#page_accueil").click(function(event) {
		window.location="/crm/ios/index.php";
	});
	$("#page_rdv").click(function(event) {
		window.location="/crm/rdv/index.php";
	});
	$("#page_prospect").click(function(event) {
		window.location="/crm/ios/prospect/index.php";
	});
	$("#page_appel").click(function(event) {
		window.location="/crm/ios/appel/index.php";
	});
	$("#page_contact").click(function(event) {
		window.location="/crm/ios/contact/index.php";
	});
	$("#page_deconnexion").click(function(event) {
		window.location="/crm/ios/deconnexion.php";
	});
	_('.accordion-item').on('opened', function () {
});
_('.accordion-item').on('closed', function (e) {
});
_('.confirm-title-ok').on('click', function () {
    myApp.confirm('Are you sure?', 'Custom Title', function () {
        myApp.alert('You clicked Ok button');
    });
});
	$.getJSON('../../fonctions/rdv/affiche.php', function(json, textStatus) {
		for (var i = 0; i < json.length; i++) {
		
		data=json[i];
			$("#liste_rdv").append('<li class="accordion-item"><a href="#" class="item-content item-link"><div class="item-inner"><div class="item-title">'+data.nom_contact+' date : '+data.date_rdv+' à '+data.lieu_rdv+'</div></div></a><div class="accordion-item-content"><div class="content-block"><div>id : '+data.id+'</div><div>nom : '+data.nom_contact+'</div><div>prospect: '+data.nom_prospect+'</div><div>date : '+data.date+'</div><div>resultat : '+data.libelle+'</div><div>commentaire : '+data.commentaire+'</div><div onclick="modifier('+data.id+')" style="color:blue;cursor:pointer"><span  class="modifier" data-id="'+data.id+'">modifier</span></div><div onclick="supprimer('+data.id+')" style="color:red;cursor:pointer"><span  class="modifier" data-id="'+data.id+'">Supprimer</span></div></li>');};
	})
	});
</script>
</body>
</html>