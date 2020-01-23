<?php require '../header.php';require '../class/prospect.php'; require '../class/contact.php'; ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Les Contacts</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="table_contact" class="table table-bordered table-striped display">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>email</th>
              <th>Téléphone</th>
              <th>post</th>
              <th>prospect</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <tr class="e" style="display: none"><td>e</td></tr>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>email</th>
              <th>Téléphone</th>
              <th>post</th>
              <th>prospect</th>
            </tr>
          </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.sidebar -->
</div>
<div class="modal fade" id="supprimer_contact" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">supprime contact</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce contact ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default annuler_supprimer" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger supprimer_id_contact" >Supprimer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modifier_contact" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier contact</h4>
      </div>
      <div class="modal-body">
        <form id="form_modifier">
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
              //echo "<script>//alert('".print_r($post)."')";
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default annuler_modification" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary modifier_contact_button" >Modifier</button>
      </div>
    </div>
  </div>
</div>
<?php require "../footer.php"; ?>
<script>
$(document)
    .ready(function()
    {

        $(".modifier_contact_button")
            .click(function()
            {
                console.log(5);
                ////alert(5);
                var resultat_communication;
                //$prospect=$("#prospect");
                //////alert("zzz <?php print_r($_SESSION['id']) ?>");
                var $email = $("#email");
                var $post = $("#post");
                var $tel = $("#tel");
                var $prenom = $("#prenom");
                var $prospect = $("#prospect");
                var $nom = $("#nom");
                //console.log($email.val(),$post.val(),$tel.val(),$prenom.val(),$prospect.val(),$nom.val());
                var $id = $("#form_modifier")
                    .data('id');
                console.log($id);
                var liste_champs = new Array($email, $post, $tel, $prenom, $prospect, $nom);
                ////alert('id form='+$id);
                $.post('../fonctions/contact/modifier.php',
                {
                    id: $id,
                    user_id: <?php echo $_SESSION['id'] ?>,
                    nom: $nom.val(),
                    prenom: $prenom.val(),
                    email: $email.val(),
                    tel: $tel.val(),
                    post: $post.val(),
                    prospect: $prospect.val()
                }, function(data, textStatus, xhr)
                {
                    /*optional stuff to do after success */
                    /*optional stuff to do after success */
                    console.log(data);
                    var resultat = $.parseJSON(data);
                    if(resultat.resultat == "true")
                    {
                        $('.modal')
                            .modal('hide');
                        console.log(data);
                        console.log($email.val());
                        console.log("resultat");
                        responsiveVoice.cancel();
                        responsiveVoice.speak("contact a été modifié avec succès");
                        $("#tbody")
                            .empty();
                        $.getJSON("../fonctions/contact/affiche.php", function(data)
                        {

                            for(var i = 0; i < data.length; i++)
                            {
                                //console.log(data[i]);
                                $("#tbody")
                                    .append('<tr id="col' + i + '"  data-id=' + data[i].id + '><td>' + data[i].id + "</td><td>" + data[i].nom + "</td><td>" + data[i].prenom + "</td><td>" + data[i].email + "</td><td>" + data[i].tel + "</td><td>" + data[i].poste + "</td><td>" + data[i].nom_prospect + "</td><td><a href='#modifier_contact' data-toggle='modal' ><button data-nom=" + data[i].nom + " data-prenom=" + data[i].prenom + " data-email=" + data[i].email + " data-tel=" + data[i].tel + " data-post=" + data[i].poste + " data-nom-prospect=" + data[i].nom_prospect + " data-id='" + data[i].id + "' class='btn btn-primary modifier'>modifierr</button></a><a class='supprime_a' href='#supprimer_contact' data-toggle='modal' ><button data-id='" + data[i].id + "'  class='btn btn-danger supprimer'  data-id-col='col" + i + "'>supprimer</button></a></td></tr>");
                            }
                            $('.modifier')
                                .click(function(event)
                                {
                                    /* Act on the event */
                                    //alert('id = ' + $(this).data('id'));
                                    $('#form_modifier')
                                        .data('id', $(this)
                                            .data('id'));
                                    //alert($('#form_modifier').data('id'));
                                });
                            $(".supprimer")
                                .click(function(event)
                                {
                                    responsiveVoice.speak("Voulez-vous supprimer ce contact");
                                    $('.supprimer_id_contact')
                                        .data('id', $(this)
                                            .data('id')); //insérer id de contact dans le button de confirmation de supperition
                                    var d = $(this)
                                        .data('id-col'); //re
                                    ////alert(d);
                                    $('.supprimer_id_contact')
                                        .data('id-col', $(this)
                                            .data('id-col'));
                                    ////alert($('.supprimer_id_contact').data('id-col'));
                                    $(".supprimer_id_contact")
                                        .click(function(event)
                                        {
                                            var id_contact = $('.supprimer_id_contact')
                                                .data('id');
                                            var id_col = $(this)
                                                .data('id-col');
                                            $.post('../fonctions/contact/supprimer.php',
                                            {
                                                id: id_contact
                                            }, function(data)
                                            {
                                                $("#" + id_col)
                                                    .hide();
                                            });
                                            $(".modal")
                                                .modal('hide');
                                            /* Act on the event */
                                        });

                                });

                        });
                    }
                });
            });
        
        $.getJSON("../fonctions/contact/affiche.php", function(data)
        {
            var resultat_communication;
            var tableau_prospect = new Array();
            for(var i = 0; i < data.length; i++)
            {
                console.log(data[i]);
                $("#tbody")
                    .append('<tr id="col' + i + '"  data-id=' + data[i].id + '><td>' + data[i].id + "</td><td>" + data[i].nom + "</td><td>" + data[i].prenom + "</td><td>" + data[i].email + "</td><td>" + data[i].tel + "</td><td>" + data[i].poste + "</td><td>" + data[i].nom_prospect + "</td><td><a href='#modifier_contact' data-toggle='modal' ><button data-nom=" + data[i].nom + " data-prenom=" + data[i].prenom + " data-email=" + data[i].email + " data-tel=" + data[i].tel + " data-post=" + data[i].poste + " data-id-prospect=" + data[i].id_prospect + " data-id='" + data[i].id + "' class='btn btn-primary modifier'>modifier</button></a><a href='#supprimer_contact' data-toggle='modal' ><button data-id='" + data[i].id + "'  class='btn btn-danger supprimer butt js--triggerAnimation' data-id-col='col" + i + "'>supprimer</button></a></td></tr>");

            }
            $("table").DataTable(
                      {
                          "language":
                          {
                              "sProcessing": "Traitement en cours...",
                              "sSearch": "Rechercher&nbsp;:",
                              "sLengthMenu": "Afficher _MENU_ Appels",
                              "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                              "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                              "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                              "sInfoPostFix": "",
                              "sLoadingRecords": "Chargement en cours...",
                              "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                              "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                              "oPaginate":
                              {
                                  "sFirst": "Premier",
                                  "sPrevious": "Pr&eacute;c&eacute;dent",
                                  "sNext": "Suivant",
                                  "sLast": "Dernier"
                              },
                              "oAria":
                              {
                                  "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                                  "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                              }
                          },
                          "paging": true,
                          "lengthChange": true,
                          "searching": true,
                          "ordering": true,
                          "info": true,
                          "autoWidth": false,
                          select: true,
                      });
            $('.e').remove();
            
            $('.modifier')
                .click(function(event)
                {
                    /* Act on the event */
                    var $email = $("#email");
                    var $post = $("#post");
                    var $tel = $("#tel");
                    var $prenom = $("#prenom");
                    var $prospect = $("#prospect");
                    var $nom = $("#nom");
                    var $contact = $(this);
                    var $id=$contact.data('id');
                    console.log('modifier clické');
                    responsiveVoice.cancel();
                    responsiveVoice.speak('Voulez-vous modifier ce contact');
                    $.getJSON('../fonctions/contact/affiche.php', {id:$id}, function(json, textStatus) {
                      var data=json[0];
                      console.info(data);
                        $email.val(data.email);
                        $nom.val(data.nom);
                        $post.val(data.poste);
                        $tel.val(data.tel);
                        $prenom.val(data.prenom);
                    });
                    console.log($contact.data('id-prospect') + " selected");
                    alert($prospect.val());
                    $('#form_modifier')
                        .data('id', $(this)
                            .data('id'));
                    //alert($('#form_modifier').data('id'));
                });
            $(".supprimer")
                .click(function(event)
                {
                    responsiveVoice.speak('Voulez-vous supprimer ce contact');
                    $('.supprimer_id_contact')
                        .data('id', $(this)
                            .data('id'));
                    var d = $(this)
                        .data('id');
                    $('.supprimer_id_contact')
                        .data('id-col', $(this)
                            .data('id-col'));
                    $(".supprimer_id_contact")
                        .click(function(event)
                        {
                            var id = $('.supprimer_id_contact')
                                .data('id');
                            var id_col = $(this)
                                .data('id-col');
                            $.post('../fonctions/contact/supprimer.php',
                            {
                                id: id
                            }, function(data, textStatus, xhr)
                            {
                                $(".modal")
                                    .modal('hide');
                                $("#" + id_col)
                                    .hide();
                            });
                            /* Act on the event */
                        });

                });

        });
        $(".annuler_supprimer")
            .click(function(event)
            {
                /* Act on the event */
                responsiveVoice.cancel();
                speak("suppression annulé");
            });
        $(".annuler_modification")
            .click(function(event)
            {
                /* Act on the event */
                cancel();
                speak("modification annulé");
            });



    });


  </script>