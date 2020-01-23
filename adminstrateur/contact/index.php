<?php require '../header.php';require '../../class/prospect.php'; require '../../class/contact.php'; ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Les Contacts</h3><h4><a href="ajouter.php">ajouter contact</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="table_contact" class="table table-bordered table-striped display">
            <thead>
            <tr>
              <th>ID</th>
              <th>utilisateur</th>
              <th>Nom</th>
              <th>email</th>
              <th>Téléphone</th>
              <th>post</th>
              <th>prospect</th>
              <th>gérer</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <tr class="e" style="display: none"><td>e</td></tr>
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

<?php require "../../footer.php"; ?>
<script>
    function supprime(id)
    {
      $(".modal").modal("show");
      $(".supprimer_id_contact").click(function(event) {
        $.post('../fonctions/contact/supprimer.php', {id:id}, function(data, textStatus, xhr) {
          $(".modal").modal("hide");
          window.location="";
        });
      });
    }
$(document).ready(function() {
    $('#table_contact').DataTable( {
        "ajax": {
            "url": "../fonctions/contact/affiche.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            {"data":"nom_utilisateur"},
            {"data":"nom_contact"},
              { "data": "email" },
              { "data": "tel" },
              { "data": "poste" },
              { "data": "nom_prospect" },

            {
            "mData": null,
            "bSortable": false,
           "mRender": function (o) { return '<a href="modifier.php?id='+o.id+'"><button class="btn btn-primary">Modifier</button></a><button data-id="'+o.id+'" onclick="supprime($(this).data(\'id\'))" class="btn btn-danger supprime">supprimer</button>'; }
        },
        ],
         "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
    });

    $(".supprime").click(function(event) {
      alert($(this).data("id"));
      /* Act on the event */
    });
});


  </script>