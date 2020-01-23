<?php session_start();if(!isset($_SESSION["id"])){header("location:index.php");};require '../../class/contact.php' ?>
<!doctype html>
<!--
Material Design Lite
Copyright 2015 Google Inc. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
https://www.apache.org/licenses/LICENSE-2.0
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License
-->
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
		<link rel="stylesheet" href="../css/styles.css">
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
	</head>
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
			<main>
			          <div class="page-content">
            <div class="mdl-grid mdl-cell mdl-cell--12-col mdl-grid">
			<div class="demo-card-wide mdl-card mdl-shadow--2dp">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">Modifier appel</h2>
				</div>
				<div class="mdl-card__supporting-text">
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<form>
					  <div class="mdl-textfield mdl-js-textfield ">
					    <libelle>contact : </libelle><select id="contact" class="" required="required">
                  <?php
                    $selecter_contact=new Contact();
                    $contacts=$selecter_contact->afficher_contact('*');
                    foreach ($contacts as $contact => $champs) {
                      foreach ($champs as $champ => $valeur) {
                        if($champ=="id")
                        {
                          $id=$valeur;
                        }
                        if($champ=='nom')
                        {
                          $nom=$valeur;
                        }
                        if($champ=='prenom')
                        {
                          $prenom=$valeur;
                        }
                      }
                      echo "<option value='$id'>$nom $prenom</option>";
                  //echo "<script>alert('".print_r($contact)."')";
                      }
                  ?>
                </select>
					  </div>
						  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    <input class="mdl-textfield__input" type="date" id="date">
						    <label class="mdl-textfield__label" for="date">date</label>
						  </div>
						  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    <input class="mdl-textfield__input" type="text" id="commentaire">
						    <label class="mdl-textfield__label" for="commentaire">commentaire</label>
						  </div>
						  <div class="mdl-textfield mdl-js-textfield ">
							<select id="resultat" data-nom="resultat" class="form-control" required="required">
			                  <option value="1">Accepté</option>
			                  <option value="2">En attent</option>
			                  <option value="3">Refusé</option>
			                </select>
						  </div>
						  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
							  Enregisterer
							</button>
					</form>

				</div>
			</div>
			</div>
			</div>
			</main>
			<script src="../js/material.min.js"></script>
			<script src="../../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
			<script>
				function getParameterByName(name, url) {
				    if (!url) url = window.location.href;
				    name = name.replace(/[\[\]]/g, "\\$&");
				    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
				        results = regex.exec(url);
				    if (!results) return null;
				    if (!results[2]) return '';
				    return decodeURIComponent(results[2].replace(/\+/g, " "));
				}
				$(document).ready(function() {
					var $contact=$("#contact");
					var $resultat=$("#resultat");
					var $date=$("#date");
					var $commentaire=$("#commentaire");
					var $id=getParameterByName('id');
					$.getJSON('../../fonctions/appelles/affiche.php', {id_appel: $id}, function(json, textStatus) {
							var data=json[0];
							console.log(data);
							$date.val(data.date);
							$("#contact option[value="+data.id_contact+"]").attr('selected', 'selected');
							$("#commentaire").val(data.commentaire);
							$("#resultat option[value="+data.resultat+"]").attr('selected', 'selected');
					});
					$("form").submit(function(event) {
						event.preventDefault();
						$.post('../../fonctions/appelles/modifier.php', {id:$id,user_id:<?php echo $_SESSION["id"] ?>,date:$date.val(),id_contact:$contact.val(),commentaire:$commentaire.val(),resultat:$resultat.val()}, function(data, textStatus, xhr) {
							console.log(data);
                    data=$.parseJSON(data);
                    console.info(data.resultat);
                    window.location="../accueil.php";
              });
					});
				});
			</script>
		</body>
	</html>