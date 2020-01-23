<?php require '../header.php';require '../class/prospect.php'; ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Les prospects</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="table_prospects" class="table table-hover">
            <thead><tr>
              <th>ID</th>
              <th>raison social</th>
              <th>Nom</th>
              <th>email</th>
              <th>Téléphone</th>
              <th>Fax</th>
              <th>adresse</th>
              <th>date contrat</th>
              <th>domaine</th>
            </tr>
          </thead>
          <tbody>
            <tr><td style="display: none;">e</td></tr>
          </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.sidebar -->
</div>
<div class="modal fade" id="supprimer_prospect" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">supprime prospect</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce prospect ? Quand vous supprimer un prospect , tous ses contacts , les appels et les rendez-vous sera supprimées.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default annuler_supprimer" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger supprimer_id_prospect" >Supprimer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modifier_prospect" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier prospect</h4>
      </div>
      <div class="modal-body">
<form>

              <br>
              <label>Nom de prospet</label>
              <div class="input-group">
                <input id="nom" class="form-control" type="text">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
              <br>
              <label>Raison social</label>
              <div class="input-group">
                <input id="raison" class="form-control" type="text">
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
                <input id="date" class="form-control datepicker" type="text">
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
              </div>
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default annuler_modification" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary modifier_prospect_button" >Modifier</button>
        </div>
      </div>
    </div>
  </div>
  <?php require "../footer.php"; ?>
  <script>
  $(document).ready(function() {
    $(".modifier_prospect_button").click(function() {
        //$prospect=$("#prospect");
        ////////alert("zzz <?php print_r($_SESSION['id']) ?>");
        var $email = $("#email");
        var $tel = $("#tel");
        var $fax=$("#fax");
        var $nom = $("#nom");
        var $adresse= $("#adresse");
        var $domaine=$("#domaine");
        var $raison_social=("#raison");
        var contrat=$("#date");
        console.log($("#raison").val());
        console.log($("#date").val());
        var $id = $("#modifier_prospect").data('id');
        ////alert("goot"+$id);
        $.getJSON('../fonctions/prospet/affiche.php', {id: $id}, function(json, textStatus) {
            /*optional stuff to do after success */
            for(var k=0;k<json.length;k++)
            {
              console.log(json[k]);
              $("#raison").val(json[k].raison_social);
              $("#date").val(json[k].date_contrat);
              $nom.val(json[k].nom);
              $email.val(json[k].email);
              $tel.val(json[k].tel);
              $fax.val(json[k].fax);
              $adresse.val(json[k].adresse);
              $domaine.val(json[k].domaine);
            }
        
        });

        console.log($("#raison").val(),$("#date").val());
        ////alert('id form='+$id);
        $.post('../fonctions/prospet/modifier.php',{id: $id,user_id: <?php echo $_SESSION['id'] ?>,nom: $nom.val(),email: $email.val(),tel: $tel.val(),raison_social:$("#raison").val(),fax:$fax.val(),adresse:$adresse.val(),domaine:$domaine.val(),date_contrat: $("#date").val()}, function(data, textStatus, xhr) {
            console.log(textStatus);
            console.log(data);
            var resultat = $.parseJSON(data);
            if (resultat.resultat == "true") {
                $('.modal').modal('hide');
                console.log(data);
                console.log(data);
                console.log("resultat");
                responsiveVoice.cancel();
                responsiveVoice.speak("prospect a été modifié avec succès");
                $("tbody").empty();
                $.getJSON("../fonctions/prospet/affiche.php", function(data) {
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                                    $("#table_prospects").append('<tr id="col' + i + '"  data-id=' + data[i].id + '><td>' + data[i].id + "</td><td>" + data[i].raison_social + "</td><td>" + data[i].nom + "</td><td>" + data[i].email + "</td><td>" + data[i].tel + "</td><td>" + data[i].fax + "</td><td>" + data[i].adresse + "</td><td>" + data[i].date_contrat + "</td><td>" + data[i].domaine + "</td><td><a href='#modifier_prospect' data-toggle='modal' ><button data-id='" + data[i].id + "' class='btn btn-primary modifier'>modifier</button></a><a href='#supprimer_prospect' data-toggle='modal' ><button data-id='" + data[i].id + "'  class='btn btn-danger supprimer butt js--triggerAnimation' data-id-col='col" + i + "'>supprimer</button></a></td></tr>");
                    }
                    $('.modifier').click(function(event) {
                        /* Act on the event */
                        ////alert('id = ' + $(this).data('id'));
                        $('#modifier_prospect').data('id', $(this).data('id'));
                        ////alert($('#modifier_prospect').data('id')+"modifier prospect");
                    });
                    $(".supprimer").click(function(event) {
                        responsiveVoice.speak("Voulez-vous supprimer ce prospect");
                        $('.supprimer_id_prospect').data('id', $(this).data('id')); //insérer id de prospect dans le button de confirmation de supperition
                        var d = $(this).data('id-col'); //re
                        //////alert(d);
                        $('.supprimer_id_prospect').data('id-col', $(this).data('id-col'));
                        //////alert($('.supprimer_id_prospect').data('id-col'));
                        $(".supprimer_id_prospect").click(function(event) {
                            var id_prospect = $('.supprimer_id_prospect').data('id');
                            var id_col = $(this).data('id-col');
                            $.post('../fonctions/prospect/supprimer.php', {
                                id: id_prospect
                            }, function(data) {
                                $("#" + id_col).hide();
                            });
                            $(".modal").modal('hide');
                            /* Act on the event */
                        });

                    });

                });
            }
        });
    });
    $.getJSON("../fonctions/prospet/affiche.php", function(data) {
        var resultat_communication;
        var tableau_prospect = new Array();
        for (var i = 0; i < data.length; i++) {
            console.log(data[i]);
            $("#table_prospects").append('<tr id="col' + i + '"  data-id=' + data[i].id + '><td>' + data[i].id + "</td><td>" + data[i].raison_social + "</td><td>" + data[i].nom + "</td><td>" + data[i].email + "</td><td>" + data[i].tel + "</td><td>" + data[i].fax + "</td><td>" + data[i].adresse + "</td><td>" + data[i].date_contrat + "</td><td>" + data[i].domaine + "</td><td><a href='#modifier_prospect' data-toggle='modal' ><button data-id='" + data[i].id + "' class='btn btn-primary modifier'>modifier</button></a><a href='#supprimer_prospect' data-toggle='modal' ><button data-id='" + data[i].id + "'  class='btn btn-danger supprimer butt js--triggerAnimation' data-id-col='col" + i + "'>supprimer</button></a></td></tr>");
            console.log(data[i].id);
        }
        $("#table_prospects").DataTable(
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
        $('.modifier').click(function(event) {
            /* Act on the event */
            ////alert("modifier");
            responsiveVoice.cancel();
            responsiveVoice.speak('Voulez-vous modifier ce prospect');
            ////alert('id = ' + $(this).data('id'));
            $('#modifier_prospect').data('id', $(this).data('id'));
            var $id_prospect=$(this).data('id');
            var $email = $("#email");
        var $tel = $("#tel");
        var $fax=$("#fax");
        var $nom = $("#nom");
        var $adresse= $("#adresse");
        var $domaine=$("#domaine");
        var $raison_social=("#raison");
        var contrat=$("#date");
            $.getJSON('../fonctions/prospet/affiche.php', {id: $id_prospect}, function(json, textStatus) {
            /*optional stuff to do after success */
            for(var k=0;k<json.length;k++)
            {
              console.log(json[k]);
              $("#raison").val(json[k].raison_social);
              $("#date").val(json[k].date_contrat);
              $nom.val(json[k].nom);
              $email.val(json[k].email);
              $tel.val(json[k].tel);
              $fax.val(json[k].fax);
              $adresse.val(json[k].adresse);
              $domaine.val(json[k].domaine);
            }
        
        });
            ////alert($('#modifier_prospect').data('id'));
        });
        $(".supprimer").click(function(event) {
            responsiveVoice.speak('Voulez-vous supprimer ce prospect');
            $('.supprimer_id_prospect').data('id', $(this).data('id'));
            var d = $(this).data('id');
            ////alert(d);
            $('.supprimer_id_prospect').data('id-col', $(this).data('id-col'));
            $(".supprimer_id_prospect").click(function(event) {
                var id = $('.supprimer_id_prospect').data('id');
                var id_col = $(this).data('id-col');
                $.post('../fonctions/prospet/supprimer.php', {
                    id: id
                }, function(data, textStatus, xhr) {
                  ////alert(data);
                    $(".modal").modal('hide');
                    $("#" + id_col).hide();
                });
                /* Act on the event */
            });

        });
    });
    $(".annuler_supprimer").click(function(event) {
        /* Act on the event */
        responsiveVoice.cancel();
        speak("suppression annulé");
    });
    $(".annuler_modification").click(function(event) {
        /* Act on the event */
        cancel();
        speak("modification annulé");
    });

});
  </script>