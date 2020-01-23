<?php session_start();if(isset($_SESSION["id"])){header("location:accueil.php");} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>connexion</title>
    <style>
        .login-page{background-image:url("images/login.png");}
    </style>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="admin/plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page" style="background-image: url('images/login.png');background-repeat: no-repeat;background-size:100% 100%;">
    <div style="color:white"  class="register-logo">
      connexion
    </div>
    <div class="login-box" >
      <div class="login-logo">
        </div><!-- /.login-logo -->
        <div class="login-box-body" style="background-color: transparent;background: transparent;border-color: transparent;">
          <form>
            <div class="form-group has-feedback">
              <input type="text" id="login"  style="background-color: transparent;background: transparent;color:white" class="form-control" placeholder="Email ou login">
              <span style="color:white" class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" id="password" style="background-color: transparent;background: transparent;color:white" class="form-control" placeholder="mot de passe">
              <span style="color:white" class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                  <button style="background-color: transparent;background: transparent;" id="conx" class="btn btn-primary btn-block btn-flat">connexion</button>
                  </div><!-- /.col -->
                </div>
              </form>
              <div style="color:red;background-color: transparent;" id="error">
                
              </div>
              <a href="inscription.php" class="text-center">inscription</a>
              <div class="col-4 text-danger" id="erreur_connexion">
                
              </div>
              </div><!-- /.login-box-body -->
              </div><!-- /.login-box -->
              <!-- jQuery 2.1.4 -->
              
              <script type="text/javascript" src="/crm/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
              <script type="text/javascript" src="admin/plugins/iCheck/icheck.min.js"></script>
              <?php require "footer.php"; ?>
              <script>
              $(function () {
              var $login=$("#login");
              var $pass=$("#password");
              var $erreur=$("#erreur_connexion");
              $("#conx").click(function(event) {
              event.preventDefault();
              $.post('fonctions/utilisateur/verification.php', {'login': $login.val(),'password':$pass.val()}, function(data) {
              
              var resultat=jQuery.parseJSON(data);
              if(resultat.validation=='true')
              {
                alert(resultat.id);
              location.href="chargement.php?id="+resultat.id;
              }
              else
              {
                $("#erreur_connexion").text(data);
                $erreur.text("login/email ou mot de passe incorrect !")
              }
              //alert(data);
              });
              $("#conx").data('id', 'button');
              });
              });
              </script>
            </body>
          </html>