<?php require "header.php"; ?>
      <main class="mdl-layout__content mdl-color--grey-100">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
          <div class="page-content">
            <div class="mdl-grid demo-content">
              <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Liste prospects</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <div class="table-responsive-vertical shadow-z-1">
                    <table style="width:100%!important" id="table_prospects" class="mdl-data-table mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="5%">
                      <thead>
                        <tr>
                          <th>Prospect</th>
                          <th>Plus d'information</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <th>contact</th>
                      <th>Plus d'information</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
          <div class="page-content">
            <div class="mdl-grid demo-content">
              <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Liste Contacts</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <div class="table-responsive-vertical shadow-z-1">
                    <table style="width:100%!important" id="table_contacts" class="mdl-data-table mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="5%">
                      <thead>
                        <tr>
                          <th>nom</th>
                          <th>Plus d'information</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <th>contact</th>
                      <th>Plus d'information</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
          <div class="page-content">
            <div class="mdl-grid demo-content">
              <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Liste Appels</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <div class="table-responsive-vertical shadow-z-1">
                    <table style="width:100%!important" id="table_appelles" class="mdl-data-table mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="5%">
                      <thead>
                        <tr>
                          <th>contact</th>
                          <th>Plus d'information</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <th>contact</th>
                      <th>Plus d'information</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-4">
          <div class="page-content">
            <div class="mdl-grid demo-content">
              <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Liste RDV</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <div class="table-responsive-vertical shadow-z-1">
                    <table style="width:100%!important" id="table_rdv" class="mdl-data-table mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="5%">
                      <thead>
                        <tr>
                          <th>contact</th>
                          <th>Plus d'information</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <th>contact</th>
                      <th>Plus d'information</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Plus d'information</h4>
    <div class="mdl-dialog__content">
      <p id="contenu_dialog">
      </p>
    </div>
    <div class="mdl-dialog__actions">
    <button class="mdl-button mdl-button--colored close">
  OK
</button>
      <button type="button" id="modifier_button" class="mdl-button">Modifer</button>
      <button type="button" class="mdl-button close">supprimer</button>
    </div>
  </dialog>
    <script src="js/material.min.js"></script>
    <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables.js"></script>
    <script>
        var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }

    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });


    function get_prospect(objet,id){
      $("#contenu_dialog").empty();
      $.getJSON('../fonctions/prospet/affiche.php', {id: id}, function(json, textStatus) {
          /*optional stuff to do after success */
          var data=json[0];
          $("#contenu_dialog").append("<div>id = "+data.id+"</div><div>raison_social="+data.raison_social+"</div><div>nom =" +data.nom+"</div><div>tel="+data.tel+"</div><div>fax="+data.fax+"</div><div>email="+data.email+"</div><div>adress="+data.adresse+"</div>date_contrat =<div>"+data.date_contrat+"</div><div>domaine="+data.domaine+"</div>");
      });

      $("#modifier_button").click(function(event) {
        window.location=objet+"/modifier.php?id="+id;
      });
    }


        function get_contact(objet,id){
      $("#contenu_dialog").empty();
      $.getJSON('../fonctions/contact/affiche.php', {id: id}, function(json, textStatus) {
          /*optional stuff to do after success */
          var data=json[0];
          $("#contenu_dialog").append("<div>id = "+data.id+"</div><div>nom="+data.nom_contact+"</div><div>nom prospect =" +data.nom_prospect+"</div><div>tel="+data.tel+"</div><div>fax="+data.fax+"</div><div>email="+data.email+"</div><div>poste="+data.poste+"</div>");
      });

      $("#modifier_button").click(function(event) {
        window.location=objet+"/modifier.php?id="+id;
      });
    }


            function get_appel(objet,id){
      $("#contenu_dialog").empty();
      $.getJSON('../fonctions/appelles/affiche.php', {id_appel: id}, function(json, textStatus) {
          /*optional stuff to do after success */
          var data=json[0];
          $("#contenu_dialog").append("<div>id = "+data.id+"</div><div>contact="+data.nom_contact+"</div><div>date="+data.date+"</div><div>commentaire =" +data.commentaire+"</div><div>nom prospect="+data.nom_prospect+"</div><div>resultat="+data.resultat_libelle+"</div>");
      });

      $("#modifier_button").click(function(event) {
        window.location=objet+"/modifier.php?id="+id;
      });
    }
                function get_rdv(objet,id){
      $("#contenu_dialog").empty();
      $.getJSON('../fonctions/rdv/affiche.php', {id: id}, function(json, textStatus) {
          /*optional stuff to do after success */
          var data=json[0];
          $("#contenu_dialog").append("<div>id = "+data.id+"</div><div>contact="+data.nom_contact+"</div><div>date="+data.date+"</div><div> date_rdv="+data.date_rdv+"</div><div>lieu de rdv= "+data.lieu_rdv+"</div><div>commentaire =" +data.commentaire+"</div><div>nom prospect="+data.nom_prospect+"</div><div>resultat="+data.libelle+"</div>");
      });

      $("#modifier_button").click(function(event) {
        window.location=objet+"/modifier.php?id="+id;
      });
    }
    function plus_information(objet,id)
    {
      switch(objet){
        case 'prospect':get_prospect(objet,id);dialog.showModal();
        break;
        case 'contact':get_contact(objet,id);dialog.showModal();
        break;
        case 'appel':get_appel(objet,id);dialog.showModal();
        break;
        case 'rdv':get_rdv(objet,id);dialog.showModal();
        break;
      }
    }
$(document).ready(function()
    {
      $('#deconnexion_mobile').click(function(){
        window.location="deconnexion.php";
      })
        $('#table_prospects').DataTable(
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
            "ajax":
            {
                "url": "../fonctions/prospet/affiche.php",
                "dataSrc": ""
            },
            columnDefs: [
            {
                targets: [0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            "columns": [
            {
                "data": "nom"
            },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(o)
                {
                    return "<a href='#'><button onclick='plus_information(\"prospect\","+o.id+")' class='mdl-button mdl-js-button mdl-button--fab mdl-button--colored'>  <i class='material-icons'>add</i></button></a>";
                }
            }, ],
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $('#table_contacts').DataTable(
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
            "ajax":
            {
                "url": "../fonctions/contact/affiche.php",
                "dataSrc": ""
            },
            columnDefs: [
            {
                targets: [0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            "columns": [
            {
                "data": "nom_contact"
            },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(o)
                {
                    return "<a href='#'><button onclick='plus_information(\"contact\","+o.id+")' class='mdl-button mdl-js-button mdl-button--fab mdl-button--colored'>  <i class='material-icons'>add</i></button></a>";
                }
            }, ],
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $('#table_appelles').DataTable(
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
            "ajax":
            {
                "url": "../fonctions/appelles/affiche.php",
                "dataSrc": ""
            },
            columnDefs: [
            {
                targets: [0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            "columns": [
            {
                "data": "nom_contact"
            },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(o)
                {
                    return "<a href='#'><button onclick='plus_information(\"appel\","+o.id+")'class='mdl-button mdl-js-button mdl-button--fab mdl-button--colored'>  <i class='material-icons'>add</i></button></a>";
                }
            }, ],
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $('#table_rdv').DataTable(
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
            "ajax":
            {
                "url": "../fonctions/rdv/affiche.php",
                "dataSrc": ""
            },
            columnDefs: [
            {
                targets: [0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            "columns": [
            {
                "data": "nom_contact"
            },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(o)
                {
                    return "<a href='#'><button onclick='plus_information(\"rdv\","+o.id+")' class='mdl-button mdl-js-button mdl-button--fab mdl-button--colored'>  <i class='material-icons'>add</i></button></a>";
                }
            }, ],
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
    </script>
  </body>
</html>