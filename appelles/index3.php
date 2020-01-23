<?php require '../header.php'; require '../class/contact.php' ?>
<div class="content-wrapper">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Les Appels</h3>
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
                    <tbody id="tbody">
                        <tr class="o" style="display: none;">
                            <td>e</td>
                        </tr>
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
<div class="modal fade" id="modifier_appel" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modifier appel</h4>
			</div>
			<div class="modal-body">
				<form id="form_modifier" role="form">
					<h4>Ajout Appelle</h4>
					
					<div class="form-group">
						<label>contact</label>
						<select id="contact_modifier">
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
							//echo "<script>//alert('".print_r($contact)."')";
							}
							?>
						</select>
					</div>
					
					<br>
					<label>date d'appelle</label>
					<div class="input-group">
						<input id="date_modifier" class="form-control datepicker" type="text">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
					<br>
					<label>commentaire</label>
					<div class="input-group">
						<textarea name="" id="commentaire_modifier" class="form-control"></textarea>
						<span class="input-group-addon"><i class="fa fa-edit"></i></span>
					</div>
					<div class="form-group">
						<label>Résultat</label>
						<select id="resultat_modifier" class="form-control">
							<option value="1">Accepté</option>
							<option value="2">En attent</option>
							<option value="3">Refusé</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="button" class="btn btn-primary modifier_appel_button" >Modifier</button>
			</div>
		</div>
	</div>
</div>
<?php require '../footer.php'; ?>
<script>
$(document).ready(function()
{
    $(".o").remove();
    var $date_modifier = $("#date_modifier");
    var $contact_modifier = $("#contact_modifier");
    var $commentaire_modifier = $("#commentaire_modifier");
    var $resultat_modifier = $("#resultat_modifier");
    //console.log($resultat_modifier, $contact_modifier, $commentaire_modifier, $resultat_modifier);
    $(".modifier_appel_button").click(function()
    {
        //console.log(5);
        //alert(5);
        var resultat_communication;
        //$prospect=$("#prospect");
        ////alert("zzz <?php print_r($_SESSION['id']) ?>");
        var $date = $("#date_modifier");
        var $contact = $("#contact_modifier");
        var $commentaire = $("#commentaire_modifier");
        var $resultat = $("#resultat_modifier");
        var $id = $("#form_modifier").data('id');
        //alert('id form='+$id);
        $.post('../fonctions/appelles/modifier.php',
        {
            id: $id,
            user_id: <?php echo $_SESSION['id'] ?>,
            resultat: $resultat.val(),
            date: $date.val(),
            commentaire: $commentaire.val(),
            id_contact: $contact.val()
        }, function(data, textStatus, xhr)
        {
            /*optional stuff to do after success */
            window.location = "";

            //console.log(data);
            /*optional stuff to do after success */
            ;
            var resultat = $.parseJSON(data);
            if(resultat.resultat == "true")
            {
                $('.modal').modal('hide');
                $("#table_appelles").empty();
                $.getJSON("../fonctions/appelles/affiche.php", function(data)
                {
                    for(var i = 0; i < data.length; i++)
                    {
                        var resultat_text;
                        var res;
                        var resultat = data[i].resultat;
                        switch(resultat)
                        {
                            case "1":
                                resultat_text = "<span class='label label-success'> accepté </span>";
                                res = "accepté";
                                break;
                            case "2":
                                resultat_text = "<span class='label label-warning'>en attent";
                                res = "en attent";
                                break;
                            default:
                                resultat_text = "<span class='label label-danger'>refusé</span>";
                                res = "refusé";
                                break;
                        }
                        ////console.log(data[i]);
                        $("#tbody").append('<tr id="col' + i + '"  data-id=' + data[i].id_contact + '><td>' + data[i].id + "</td><td>" + data[i].nom_contact + " " + data[i].prenom_contact + "</td><td>" + data[i].nom_prospect + "</td><td>" + data[i].date + "</td><td>" + res + "</td><td>" + data[i].commentaire + "</td><td><a href='#modifier_appel' toggle='modal' ><button data-id='" + data[i].appel_id + "' class='btn btn-primary modifier'>modifier</button></a><a href='#supprimer_appel' data-toggle='modal' ><button data-id='" + data[i].appel_id + "'  class='btn btn-danger supprimer' data-id-col='col" + i + "'>supprimer</button></a></td></tr>");
                    }
                    $('.modifier').click(function(event)
                    {
                        /* Act on the event */
                        //alert('id = '+$(this).data('id'));
                        $("#modifier_appel").modal("show");
                        $('#form_modifier').data('id', $(this).data('id'));
                        //alert($('#form_modifier').data('id'));
                    });
                    $(".supprimer").click(function(event)
                    {
                        $('.supprimer_id_appel').data('id', $(this).data('id')); //insérer id de appel dans le button de confirmation de supperition
                        var d = $(this).data('id-col'); //re
                        //alert(d);
                        $('.supprimer_id_appel').data('id-col', $(this).data('id-col'));
                        //alert($('.supprimer_id_appel').data('id-col'));
                        $(".supprimer_id_appel").click(function(event)
                        {
                            var id_appel = $('.supprimer_id_appel').data('id');
                            var id_col = $(this).data('id-col');
                            $.post('../fonctions/appelles/supprimer.php',
                            {
                                id: id_appel
                            }, function(data)
                            {
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

    $.getJSON("../fonctions/appelles/affiche.php", function(data)
    {
        //console.log(data);
        var resultat_communication;
        for(var i = 0; i < data.length; i++)
        {
            var resultat_text;
            var res;
            var resultat = data[i].resultat;
            switch(resultat)
            {
                case "1":
                    resultat_text = "<span class='label label-success'> accepté </span>";
                    res = "accepte";
                    break;
                case "2":
                    resultat_text = "<span class='label label-warning'>en attent";
                    break;
                    res = "en attent";
                default:
                    resultat_text = "<span class='label label-danger'>refusé</span>";
                    res = "refusé";
                    break;
            }
            ////console.log(data[i]);

            $("#tbody").append('<tr id="col' + i + '"  data-id=' + data[i].id_contact + '><td>' + data[i].id + "</td><td>" + data[i].nom_contact + " " + data[i].prenom_contact + "</td><td>" + data[i].nom_prospect + "</td><td>" + data[i].date + "</td><td>" + resultat_text + "</td><td>" + data[i].commentaire + "</td><td><a href='#modifier_appel' toggle='modal' ><button class='btn btn-primary modifier' data-id-contact=" + data[i].id_contact + " data-nom-contact=" + data[i].nom_contact + " data-prenom-contact=" + data[i].prenom_contact + " data-date=" + data[i].date + " data-id='" + data[i].appel_id + "'>modifier</button></a><a href='#supprimer_appel' data-toggle='modal' ><button data-id='" + data[i].appel_id + "'  class='btn btn-danger supprimer' data-id-col='col" + i + "'>supprimer</button></a></td></tr>");
        };
        $('.modifier').click(function(event)
        {
            /* Act on the event */
            //alert('id = '+$(this).data('id'));
            $modifier = $(this);
            var $date = $("#date_modifier");
            var $contact = $("#contact_modifier");
            var $commentaire = $("#commentaire_modifier");
            var $resultat = $("#resultat_modifier");
            $date.val($modifier.data('date'));
            $contact.val($modifier.data('id-contact'));
            $.post('../fonctions/appelles/affiche.php',
            {
                'id_appel': $(this).data('id')
            }, function(data, textStatus)
            {
                data = JSON.parse(data);
                //console.log(data);
                for(var j = 0; j < data.length; j++)
                {
                    $date.val(data[j].date);
                    $commentaire.val(data[j].commentaire);
                    //console.log(data[j]);
                };
            });
            $('#form_modifier').data('id', $(this).data('id'));
            $("#modifier_appel").modal("show");
            //alert($('#form_modifier').data('id'));
        });
        $(".supprimer").click(function(event)
        {
            $('.supprimer_id_appel').data('id', $(this).data('id')); //insérer id de appel dans le button de confirmation de supperition
            var d = $(this).data('id-col'); //re
            //alert(d);
            $('.supprimer_id_appel').data('id-col', $(this).data('id-col'));
            //alert($('.supprimer_id_appel').data('id-col'));
            $(".supprimer_id_appel").click(function(event)
            {
                var id_appel = $('.supprimer_id_appel').data('id');
                var id_col = $(this).data('id-col');
                $.post('../fonctions/appelles/supprimer.php',
                {
                    id: id_appel
                }, function(data)
                {
                    $("#" + id_col).hide();
                });
                $(".modal").modal('hide');
                /* Act on the event */
            });

        });
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
            "autoWidth": false
        });

    });
});
</script>
	</body>
</html>