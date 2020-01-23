<?php require '../header.php' ;require '../class/contact.php' ?>
<div class="content-wrapper fluid">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">
        <div class="box box-success">
          <div class="box-body">
            <form id="ajout_appel">
              <h4>Ajout Appelle</h4>
              
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
              <label>date d'appelle</label>
              <div class="input-group">
                <input id="date" data-nom='date appel' class="form-control datepicker" type="text" required="required">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
              <br>
              <label>commentaire</label>
              <div class="input-group">
                <textarea name="" data-nom="commentaire" id="commentaire" class="form-control" required="required"></textarea>
                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
              </div>
              <div class="form-group">
                <label>Résultat</label>
                <select id="resultat" data-nom="resultat" class="form-control" required="required">
                  <option value="1">Accepté</option>
                  <option value="2">En attent</option>
                  <option value="3">Refusé</option>
                </select>
              </div>
              <div class="input-group">
                <button type="submit" id="enregistrer" class="btn btn-block btn-success">Enregisterer</button>
              </div>
            </form>
            <div style="color:red" id="e">
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
    $(document).ready(function() {

      $('.datepicker').pickadate({
          min: new Date()
      });
      var $enregistrer = $("#enregistrer");
      //$prospect=$("#prospect");
      //alert("zzz <?php print_r($_SESSION['id']) ?>");
      var $date = $("#date");
      console.log($date.val()+666);
      var $contact = $("#contact");
      var $commentaire = $("#commentaire");
      var $resultat = $("#resultat");
      var champs=new Array($date,$contact,$commentaire,$resultat);
      $date.data('champ','date');
      $enregistrer.click(function(event) {
        event.preventDefault();
         var valid=true;
              var msg2="";
              var msg1="";
              for (var i = 0; i < champs.length; i++) {
                console.info(champs[i].val());
                if(champs[i].val()=="")
                {
                  valid=false;
                  champs[i].css('border-color', 'red');
                  msg1="Voullez-vouz remplire tous les champs"
                }
                if(champs[0].val()=="0000-00-00")
                {
                  valid=false;
                  msg2="la date ne peut etre zéro ";
                }
              };
              if (valid)
              {
                $("#e").hide();
              console.log($date.val()+"5555");
               $.post('../fonctions/appelles/ajout.php', {
              user_id: <?php echo $_SESSION['id'] ?> ,
              resultat: $resultat.val(),
              date: $date.val(),
              commentaire: $commentaire.val(),
              id_contact: $contact.val()
                }, function(data, textStatus, xhr) {
              /*optional stuff to do after success */
              ;
              var resultat = $.parseJSON(data);
              if (resultat.ajoute == "true") {
                  responsiveVoice.speak("appel a été enregistrer avec succès")
              }
            });
              console.log(resultat);
          }
            else
            {
               $("#e").text(msg1+msg2);
            };
          });
      });
</script>
  </body>
</html>