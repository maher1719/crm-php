<?php require "../header.php";require '../../class/contact.php' ?>

<div class="content-wrapper">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Les RDV</h3>
					<div class="box-tools">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="table_rdv" class="table table-bordered table-striped display">
						<thead><tr>
							<th>ID</th>
							<th>utilisateur</th>
							<th>contact</th>
							<th>date rdv</th>
							<th>lieu rdv</th>
							<th>resultat</th>
							<th>commentaire</th>
                            <th>gére</th>
						</tr>
					</thead>
                    <tbody id="tbody">
                        <tr style="display: none;">
                            <td>e</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <th>ID</th>
                        <th>utilisateur</th>
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

<?php require "../../footer.php"; ?>
<script>
$(document).ready(function() {
    $('#table_rdv').DataTable( {
        "ajax": {
            "url": "../fonctions/rdv/affiche.php",
            "dataSrc": ""
        },
        "columns": [
            {   "data":"id"   },
            {"data":"nom_utilisateur"},
            { "data": "nom_contact" },
            { "data": "nom_prospect" },
            { "data": "date" },
            { "data": "libelle" },
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
		var url="/crm/";
		var modifier=function(id){
			if(!isNaN(id))
			{
				window.location="rdv.php?id="+id;
			}
			else
			{
				responsiveVoice.speak('voulez-vous dire un nombre');
			}
		}
		var commandes_rdv={
			"modifier :id" :modifier
		}
		annyang.addCommands(commandes_rdv);
	}
});
</script>