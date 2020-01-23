<?php require '../header.php'; require '../class/contact.php' ?>
<div class="content-wrapper">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Les Appels</h3><h4><a href="ajout.php">ajouter appel</a></h4>
					<div class="box-tools">
						
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="table_appelles" class="table table-bordered table-striped display">
						<thead><tr>
							<th>ID</th>
							<th>contact</th>
							<th>Nom prospet</th>
							<th>date</th>
							<th>resultat</th>
							<th>commentaire</th>
                            <th>gére</th>
						</tr>
					</thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <th>ID</th>
                            <th>contact</th>
                            <th>Nom prospet</th>
                            <th>date</th>
                            <th>resultat</th>
                            <th>commentaire</th>
                            <th>gére</th>
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
<div class="modal fade" id="supprimer_appel" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">supprime appel</h4>
			</div>
			<div class="modal-body">
				<p>Voulez-vous supprimer cette appel ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="button" class="btn btn-danger supprimer_id_appel" >Supprimer</button>
			</div>
		</div>
	</div>
</div>
<?php require '../footer.php'; ?>
<script>
function supprimer(id)
{
          $(".modal").modal("show");
      $(".supprimer_id_appel").click(function(event) {
        $.post('../fonctions/appelles/supprimer.php', {id:id}, function(data, textStatus, xhr) {
          
          window.location="";
        });
      });
}
$(document).ready(function() {
    $('#table_appelles').DataTable( {
        "ajax": {
            "url": "../fonctions/appelles/affiche.php",
            "dataSrc": ""
        },
        "columns": [
            {   "data":"id"   },
            { "data": "nom_contact" },
            { "data": "nom_prospect" },
            { "data": "date" },
            { "data": "resultat_libelle" },
            { "data": "commentaire" },
            {
            "mData": null,
            "bSortable": false,
           "mRender": function (o) { return '<a href="modifier.php?id='+o.id+'"><button class="btn btn-primary">Modifier</button></a><button class="btn btn-danger" onclick="supprimer('+o.id+')">supprimer</button>'; }
        },
        ],
         "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
    });
    	if(annyang)
	{
		annyang.setLanguage("fr-FR");
		var modifier=function(id){
			if(!isNaN(id))
			{
				window.location="modifier.php?id="+id;
			}
			else{
				responsiveVoice.speak("Voulez-vouz dire un nombre");
			}
		}
		var commandes_rdv={
			"modifier :id" :modifier
		}
		annyang.addCommands(commandes_rdv);
	}
});

		</script>
	</body>
</html>