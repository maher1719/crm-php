<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
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
  <body class="hold-transition register-page" style="background-image: url('images/inscription.png');background-repeat: no-repeat;background-size:100% 100%;">
    <div class="register-box transparent " style="   background-color: transparent;background: transparent;border-color: transparent;">
      <div style="color:white" class="register-logo">
        Inscription
      </div>

      <div class="register-box-body" style="background-color: transparent;background: transparent;border-color: transparent;">
        <p style="color:white" class="login-box-msg">faire une nouvelle inscription</p>
        <form action="admin/index.html" method="post">
          <div class="form-group has-feedback" style="background-color: transparent;background: transparent;">
            <input type="text" data-nom-champ="nom" id="nom" class="form-control"  style="background-color: transparent;background: transparent;color:white" placeholder="nom">
            <span style="color:white" class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" style="background-color: transparent;background: transparent;">
            <input type="text" data-nom-champ="prenom" id="prenom" class="form-control"  style="background-color: transparent;background: transparent;color:white" placeholder="prenom">
            <span style="color:white" class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" >
            <input type="text" data-nom-champ="login" id="login"   style="color:white;background-color: transparent;background: transparent;" class="form-control" placeholder="login">
            <span style="color:white;"  class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback" >
            <input type="email" data-nom-champ="email" style="color:white; background-color: transparent;background: transparent;" class="form-control" id="email" placeholder="Email">
            <span style="color:white" class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" >
            <input id="telephone" data-nom-champ="telephone" type="telephone" style="color:white; background-color: transparent;background: transparent;" class="form-control" placeholder="telephonee">
            <span style="color:white" class="glyphicon glyphicon-earphone form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" >
            <input id="adresse" data-nom-champ="adresse" type="text" style="color:white; background-color: transparent;background: transparent;" class="form-control" name="adresse" placeholder="adresse">
            <span style="color:white" class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" >
            <input id="mdp" data-nom-champ="mot de passe" type="password" style="color:white; background-color: transparent;background: transparent;" class="form-control" placeholder="mot de passe">
            <span style="color:white" class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback" >
            <input  type="password" id="cmdp" data-nom-champ="confirme mot de passe" style="color:white; background-color: transparent;background: transparent;" class="form-control" placeholder="confirmer mot de passe">
            <span style="color:white" class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="button" id="inscrit" style="color:white; background-color: transparent;background: transparent;" class="btn btn-primary btn-block btn-flat">Register</button>
              <button type="reset" style="color:white; background-color: transparent;background: transparent;" class="btn btn-primary btn-block btn-flat">annuler</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="index.php" class="text-center">je suis déja inscrit</a>
        <div class="col'4 text-danger" id="erreur_inscription"></div>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="admin/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        $inscrit=$("#inscrit");
        $nom=$("#nom");
        $prenom=$("#prenom");
        $login=$("#login");
        $adresse=$("#adresse");
        $mdp=$("#mdp");
        $cmdp=$("#cmdp");
        $tele=$("#telephone");
        $email=$("#email");
        var champss;
        var validation=true;
        var champ_vide="";
        var champs=new Array($nom,$prenom,$login,$adresse,$tele,$mdp,$cmdp,$email);
        $inscrit.click(function() {
          alert($tele.val()+$adresse.val());
          validation=true;
          alert(5);
          $("#erreur_inscription").empty();
          champ_vide="";
          //console.log($("#erreur_inscription").empty());
          for(var i=0;i<champs.length;i++)
          { 
            if(champs[i].val()=='')
            {
              validation=false;
              champ_vide+=champs[i].data('nom-champ')+' ';
            }
          }
          if(validation)
          {
          $.post('fonctions/utilisateur/inscription.php', {'nom':$nom.val() ,'prenom':$prenom.val(),'login':$login.val(),'password':$mdp.val(),'email':$email.val(),'adresse':$adresse.val(),'telephone':$tele.val()}, function(data, textStatus, xhr) {
            $("#erreur_inscription").text(data);
            alert(data);
          });
        }
        else
        {
          $("#erreur_inscription").text("champ(s) vides "+champ_vide);
        }
        });

      }); 
      
    </script>
  </body>
</html>
