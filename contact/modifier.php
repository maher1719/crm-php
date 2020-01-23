<?php require '../header.php' ;require '../class/prospect.php' ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2"></div>
  <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
        <div class="box box-success">
        <div class="box-body">
        <form>
                  <h4>Ajout contact</h4>
                  
                  <div class="form-group">
                    <label>Prospet</label>
                    <select id="prospect" class="form-control">
                    <?php
                      $selecter_prospect=new prospect();
                      $prospects=$selecter_prospect->affiche_prospect('*');
                      foreach ($prospects as $prospect => $champs) {
                        foreach ($champs as $champ => $valeur) {
                          if($champ=="id")
                          {
                            $id=$valeur;
                          }
                          if($champ=='nom')
                          {
                            $nom=$valeur;
                          }
                        }
                        echo "<option value='$id'>$nom</option>";
                        //echo "<script>alert('".print_r($post)."')";
                      }

                    ?>
                    </select>
                  </div>
                
                  <br>
                  <label>Nom</label>
                  <div class="input-group">
                      <input id="nom" class="form-control" type="text">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  </div>
                  <br>
                  <label>Prenom</label>
                  <div class="input-group">
                    <input id="prenom" class="form-control" type="text">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  </div>
                  <label>Email</label>
                  <div class="input-group">
                    <input id="email" class="form-control" type="email">
                    <span class="input-group-addon"><i class="fa fa-envelope-o "></i></span>
                  </div>
                  <label>Téléphone</label>
                  <div class="input-group">
                    <input id="tel" class="form-control" type="telephon">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  </div>
                  <label>Post</label>
                  <div class="input-group">
                    <input id="post" class="form-control" type="text">
                    <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
                  </div>
                  <div class="form-group">
                </div>
                <div class="input-group">
                    <button type="button" id="enregistrer" class="btn btn-block btn-success">Enregisterer</button>
                  </div>
      </form>
      </div>
      </div>
      <div id="e">
      </div>
              </section>
              
              </div>
              </div>
              </div>


<?php require '../footer.php'; ?>
    <script>
    <?php if(isset($_GET["id"]))
    { ?>
      $(document).ready(function() {
        var $enregistrer=$("#enregistrer");
        //$prospect=$("#prospect");
        //alert("zzz <?php print_r($_SESSION['id']) ?>");
        var $email=$("#email");
        var $post=$("#post");
        var $tel=$("#tel");
        var $prenom=$("#prenom");
        var $prospect     =$("#prospect");
        var $nom=$("#nom");
        console.log($email,$post,$tel,$prenom,$prospect);
        $.getJSON('../fonctions/contact/affiche.php', {id:<?php echo $_GET['id'] ?>}, function(json, textStatus) {
          data=json[0];
          $email.val(data.email);
          $post.val(data.poste);
          $tel.val(data.tel);
          $prenom.val(data.prenom);
          $nom.val(data.nom);
            /*optional stuff to do after success */
        });
        $enregistrer.click(function(event) {
          console.log($email.val(),$post.val(),$tel.val(),$prenom.val(),$prospect.val());
          $.post('../fonctions/contact/modifier.php', {id:<?php echo $_GET["id"] ?>,user_id:<?php echo $_SESSION['id'] ?>,nom:$nom.val(),prenom:$prenom.val(),email:$email.val(),tel:$tel.val(),post:$post.val(),prospect:$prospect.val()}, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            window.location="index.php";
          });
        });
      });
      <?php } else { header("location:index.php");} ?>
    </script>
</body>
</html>