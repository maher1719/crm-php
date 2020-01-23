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
</head>
<body>
  <div class="login-screen modal-in">
    <div class="view">
      <div class="page">
        <div class="page-content login-screen-content">
          <div class="login-screen-title">Inscription</div>
          <form>
            <div class="list-block">
              <ul>
              <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">Nom</div>
                    <div class="item-input">
                      <input type="text" name="username" placeholder="Email ou login">
                    </div>
                  </div>
                </li>
                <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">Prénom</div>
                    <div class="item-input">
                      <input type="text" name="username" placeholder="Email ou login">
                    </div>
                  </div>
                </li>
                <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">Email</div>
                    <div class="item-input">
                      <input type="password" name="password" placeholder="mot de pass">
                    </div>
                  </div>
                </li>
                <li class="item-content">
                  <div class="item-inner">
                    <div class="item-title label">Mot de passe</div>
                    <div class="item-input">
                      <input type="password" name="password" placeholder="mot de pass">
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="list-block">
              <ul>
                <li><a id="page_connexion" class="item-link list-button">Connexion</a></li>
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
      $("#page_connexion").click(function(event) {
        window.location="index.php";
      });
    });
  </script>
</body>

</html>