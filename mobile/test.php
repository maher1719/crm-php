<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Connexion</title>
		<!-- Add to homescreen for Chrome on Android -->
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="192x192" href="images/android-desktop.png">
		<!-- Add to homescreen for Safari on iOS -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Material Design Lite">
		<link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
		<!-- Tile icon for Win8 (144x144 + tile color) -->
		<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
		<meta name="msapplication-TileColor" content="#3372DF">
		<link rel="shortcut icon" href="images/favicon.png">
		<link rel="stylesheet" href="../admin/plugins/datatables/jquery.dataTables.min.css">
		<link rel="stylesheet" href="css/datatables.css">
		<!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
		<!--
		<link rel="canonical" href="http://www.example.com/">
		-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.cyan-light_blue.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<style>
		#view-source {
		position: fixed;
		display: block;
		right: 0;
		bottom: 0;
		margin-right: 40px;
		margin-bottom: 40px;
		z-index: 900;
		}
		</style>
			<body>
		<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header mdl-layout--fixed-tabs">
			<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title">Home</span>
					<div class="mdl-layout-spacer"></div>
					<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
					<i class="material-icons">more_vert</i>
					</button>
					<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
						<li class="mdl-menu__item">About</li>
						<li class="mdl-menu__item">Contact</li>
						<li class="mdl-menu__item">Legal information</li>
					</ul>
				</div>
			</header>
			<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
				<header class="demo-drawer-header">
					<?php echo $_SESSION["image_mobile"] ?>
					<div class="demo-avatar-dropdown">
						<span><?php echo $_SESSION["utilisateur"] ?></span>
						<div class="mdl-layout-spacer"></div>
					</div>
				</header>
				<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Inbox</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Trash</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Spam</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Forums</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Updates</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Promos</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Social</a>
					<div class="mdl-layout-spacer"></div>
					<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
				</nav>
			</div>
			<div id="appel"></div>
  <button class="show-dialog" data-id="2" type="button" class="mdl-button">Show Dialog</button>
  <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Plus d'information</h4>
    <div class="mdl-dialog__content">
      <p>
        id : <span id="id"></span><br>
        nom : <span id="nom"></span><br>
        raison social :<span id="raison"></span><br>
      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button">Agree</button>
      <button type="button" class="mdl-button close">Disagree</button>
    </div>
  </dialog>
			<script src="js/material.min.js"></script>
			<script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
			<script>
			$(document).ready(function() {
				    $.getJSON('../fonctions/prospet/affiche.php', function(json, textStatus) {
    		for (var i = 0; i < json.length; i++) {
    			$("#appel").append('<button class="show-dialog" data-id="'+json[i].id+'" type="button" class="mdl-button">Show Dialog</button>')
    		};
    }).done(function(){
    	    $(".show-dialog").click(function(){
    	alert($(this).data("id"));
    	$.getJSON('../fonctions/prospet/affiche.php', {id: $(this).data("id")}, function(json, textStatus) {
    			/*optional stuff to do after success */
    			$("#id").text(json[0].id);
    			$("#nom").text(json[0].nom);
    			$("#raison").text(json[0].raison_social)
    	});
    	dialog.showModal();
    });
    });

    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }

    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
    });

</script>
		</body>
	</html>