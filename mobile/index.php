<?php session_start(); if(isset($_SESSION["id"])){header("loaction:accueil.php");} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<form action="#">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3">
    <label class="mdl-textfield__label" for="sample3">email/login</label>
    <span id="erreur_connexion" class="mdl-textfield__error">ce n'a pas un email</span>
  </div>
<!-- Numeric Textfield with Floating Label -->
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password"  id="sample4">
    <label class="mdl-textfield__label" for="sample4">mot de passe</label>
    <span class="mdl-textfield__error">ce n'a pas un email</span>
  </div>
  <!-- Colored raised button -->
  <div>
<button id="connexion" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  connexion
</button>
<div>

</form>
<script src="js/material.min.js"></script>
<script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
$(document).ready(function()
        {
            $("form").submit(function(event)
            {
                event.preventDefault();
                var $login = $("#sample3");
                var $pass = $("#sample4");
                var $erreur = $("#erreur_connexion");
                $("#connexion").click(function(event)
                {
                    event.preventDefault();
                    $.post('../fonctions/utilisateur/verification.php',
                    {
                        'login': $login.val(),
                        'password': $pass.val()
                    }, function(data)
                    {
                        $("#erreur_connexion").text(data);
                        var resultat = jQuery.parseJSON(data);
                        if (resultat.validation == 'true')
                        {
                            location.href = "chargement.php?id=" + resultat.id;
                        }
                        else
                        {
                            $erreur.text("login/email ou mot de passe incorrect !")
                        }
                        //alert(data);
                    });
                    $("#conx").data('id', 'button');
                });
            });	});
</script>
</body>
</html>