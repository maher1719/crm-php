<?php session_start();if(isset($_SESSION["id"])){header("location:accueil.php");} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title></title>
	<link rel="stylesheet" href="css/ios.min.css">
	<<link rel="stylesheet" href="css/ios.colors.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
  <div class="login-screen modal-in">
    <div class="view">
      <div class="page">
        <div class="page-content login-screen-content">
          <div class="login-screen-title">Connexion</div>
          <form>
            <div class="list-block">
              <ul>
                <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">Email ou login</div>
                    <div class="item-input">
                      <input type="text" id="login" name="username" placeholder="Email ou login">
                    </div>
                  </div>
                </li>
                <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">mot de pass</div>
                    <div class="item-input">
                      <input type="password" id="password" name="password" placeholder="mot de pass">
                    </div>
                  </div>
                </li>
              </ul>
              <p><a href="#" id="connexion" class="button button-round">Connexion</a></p>
            </div>
            <div class="list-block">
              <ul>
                <li><a id="inscription" href="inscription.php" class="item-link list-button">Inscription</a></li>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/framework7.min.js"></script>
  <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script>
  	var myApp = new Framework7();
			var _ = Dom7;
  	$(document).ready(function() {
  		$("#inscription").click(function(){
  			window.location="inscription.php";
  		})
  		$login=$("#login");
  		$password=$("#password");
  		$("#connexion").click(function(event) {
  			$.post('../fonctions/utilisateur/verification.php', {login: $login.val(),password:$password.val()}, function(data, textStatus, xhr) {
  				if($.parseJSON(data))
  				{
  					var d=$.parseJSON(data);
  					if(d.validation=="true")
  					{
  						location.href = "chargement.php?id=" + d.id;
  					}
  					else
  					{
  						myApp.alert(d.validation);
  					}
  				}

  			});
  		});
  	});
  </script>
</body>

</html>