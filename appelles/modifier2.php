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
              <h4>Modifier Appelle</h4>
              
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
                <textarea name="textarea" data-nom="commentaire" id="commentaire" class="form-control" required="required"></textarea>
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
            <div class="ui error message">
        </div>
          </div>
        </div>
        
       </section>  
      
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>
<script>
$(document).ready(function() {
   <?php if($_GET["id"]) {?>  
    $('form')
        .form({
          fields: {
            textarea: {
              identifier  : 'textarea',
              rules: [
                {
                  type   : 'empty',
                  prompt : "Si'il vous palit inserer votre email"
                }
              ]
            }
          }
        })
      ;
      $("#enregistrer").click(function(event) {
        /* Act on the event */
        console.log($("form").form("is valid"));
      });
        <?php } else { header("location:/crm/appelles/"); } ?>
  });
</script>
  </body>
</html>