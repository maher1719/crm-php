<?php require '../header.php'; ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">
        <div class="box box-success">
          <div class="box-body">
            <form>
              <h4>Ajout prospect</h4>
              <br>
              <label>Nom de prospet</label>
              <div class="input-group">
                <input id="nom" class="form-control" type="text">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
              <br>
              <label>Raison social</label>
              <div class="input-group">
                <input id="raison_social" class="form-control" type="tel">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              </div>
              <br>
              <label>Email</label>
              <div class="input-group">
                <input id="email" class="form-control" type="email">
                <span class="input-group-addon"><i class="fa fa-envelope-o "></i></span>
              </div>
              <br>
              <label>Téléphone</label>
              <div class="input-group">
                <input id="tel" class="form-control" type="tel">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              </div>
              <label>Fax</label>
              <div class="input-group">
                <input id="fax" class="form-control" type="tel">
                <span class="input-group-addon"><i class="fa fa-fax"></i></span>
              </div>
              <br>
              <label>Adresse</label>
              <div class="input-group">
                <input id="adresse" class="form-control" type="text">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
              </div>
              <br>
              <label>date de contrat</label>
              <div class="input-group">
                <input id="date_contrat" class="form-control datepicker" type="text">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
              <br>
              <label>Domaine</label>
              <div class="input-group">
                <input id="domaine" class="form-control" type="text">
                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
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
<script type="text/javascript">
$(document).ready(function() {
$enregistrer=$("#enregistrer");

$enregistrer.click(function(event)
{
  var $nom=$("#nom").val();
var $email=$("#email").val();
var $tel=$("#tel").val();
var $fax=$("#fax").val();
var $adresse=$("#adresse").val();
var $date_contrat=$("#date_contrat").val();
var $domaine=$("#domaine").val();
var $raison_social=$("#raison_social").val();
/* Act on the event */
$.post('../fonctions/prospet/ajout.php', {user_id:<?php echo $_SESSION['id'] ?>,nom:$nom,email:$email,raison_social:$raison_social,tel:$tel,fax:$fax,adresse:$adresse,domaine:$domaine,date_contrat:$date_contrat}, function(data, textStatus, xhr) {
  
/*optional stuff to do after success */
console.log(data);
console.log($adresse);
data=$.parseJSON(data);
 if(data.ajout=="true")
 {
    speak("insertion terminé");
    console.log(data.ajout);
    $("#modal_re").modal('show');
 }

});
});
});
</script>
