<?php
require "../../class/contact.php";
require "../header.php";
?>
<div class="content-wrapper fluid">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">
        <div class="box box-success">
          <div class="box-body">
            <form id="ajout_appel">
              <h4>RDV</h4>
              <div class="form-group">
                <label>contact</label>
                <select id="contact" class="form-control" required="required">
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
              <br>
                <input id="date_un" data-nom='date appel'  type="hidden" required="required">
              <br>
              <label>date rdv</label>
              <div class="input-group">
                <input id="date_deux" data-nom='date appel' class="form-control" type="text" required="required">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
              <br>
              <div class="form-group">
                <label>lieu</label>
                    <input type="text" id="lieu" class="form-control" required="required" value="" placeholder="">
              </div>
              <br>
              <div class="form-group">
                <label>commentaire</label>
                    <input type="text" id="commentaire" class="form-control" required="required" value="" placeholder="">
              </div>
              <div class="form-group">
              <select id="resultat" required>
                  <option value="1">accepte</option>
                  <option value="2">en attent</option>
                  <option value="3">refuse</option>
                </select></div>
              <div class="input-group">
                <button type="submit" id="enregistrer" class="btn btn-block btn-success">Enregisterer</button>
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

<?php require "../../footer.php"; ?>
<script>
	$(document).ready(function() {
    $('#date_deux').pickadate({min:new Date()});
    var d = new Date().toISOString().slice(0,10);
    <?php if(isset($_GET["id"])) 
    {
?>
        $.getJSON('../fonctions/rdv/affiche.php', {id:<?php echo $_GET["id"] ?>}, function(json, textStatus) {
            /*optional stuff to do after success */
            console.log(json);
            for (var i = 0; i < json.length; i++) {
              $("#date_deux").val(json[i].date_rdv);
              $("#lieu").val(json[i].lieu_rdv);
              $('#commentaire').val(json[i].commentaire)
            };
        });
        $("#enregistrer").click(function(event) {
          event.preventDefault();
          /* Act on the event */
          $.post('../fonctions/rdv/modifier.php', {user_id:<?php echo $_SESSION["id"]?>,commentaire:$("#commentaire").val(),lieu_rdv:$('#lieu').val(),date:d,id_contact:$("#contact").val(),date_rdv:$("#date_deux").val(),id:<?php echo $_GET["id"] ?>,resultat:$("#resultat").val() }, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            console.log(data);
          });
        });
<?php
    }
    else
    {
      ?>
    $("#enregistrer").click(function(event) {
      /* Act on the event */
      event.preventDefault();
      var $date_rdv=$("#date_deux").val();
      var $id_contact=$('#contact').val();
      var $lieu_rdv=$('#lieu').val();
      var $commentaire=$("#commentaire").val();
      console.log($date_rdv,$id_contact,$lieu_rdv,$commentaire);
      $.post('../fonctions/rdv/ajout.php', {user_id:<?php echo $_SESSION['id'] ?>,date:d,date_rdv:$date_rdv,id_contact:$id_contact,lieu_rdv:$lieu_rdv,commentaire:$commentaire,resultat:$("#resultat").val()}, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        console.log(data);
      });
    });
    <?php } ?>
	});
</script>