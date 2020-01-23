<?php
require "header.php";
?>
<div data-theme="b" data-role="page" data-url="/n/index.php?key=oGt48M2y&amp;embedded=1" tabindex="0" class="ui-page ui-page-theme-b ui-page-active" style="">
</div>
  <div style="min-height: 976px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Accueil
      <small><?php echo $_SESSION["utilisateur"] ?></small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">prospects</span>
              <span class="info-box-number" id="prospect"></span>
              </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.col -->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Contacts</span>
                    <span class="info-box-number" id="contact"></span>
                    </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">RDV</span>
                          <span class="info-box-number" id="rdv"></span>
                          </div><!-- /.info-box-content -->
                          </div><!-- /.info-box -->
                          </div><!-- /.col -->
                          </div><!-- /.row -->
                          <!-- Info boxes -->
                          <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-phone"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Appelles</span>
                                  <span class="info-box-number" id="appel"></span>
                                  </div><!-- /.info-box-content -->
                                  </div><!-- /.info-box -->
                                  </div><!-- /.col -->
                                  <!-- fix for small devices only -->
                                  <div class="clearfix visible-sm-block"></div>
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="info-box">
                                      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                                      <div class="info-box-content">
                                        <span class="info-box-text">Produits</span>
                                        <span class="info-box-number" id="produit"></span>
                                        </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                        </div><!-- /.col -->
                                        <!-- fix for small devices only -->
                                        <div class="clearfix visible-sm-block"></div>
                                        </div><!-- /.row -->
                                        <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <!-- USERS LIST -->
                                            <div class="box box-danger">
                                              <div class="box-header with-border">
                                                <h3 class="box-title">Prospects</h3>
                                                <div class="box-tools pull-right">
                                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                                </div><!-- /.box-header -->
                                                <div class="box-body no-padding">
                                                  <ul class="users-list clearfix prospect">
                                                    </ul><!-- /.users-list -->
                                                    </div><!-- /.box-body -->
                                                    <div class="box-footer text-center">
                                                      <a href="contact/index.php" class="uppercase">Voir tous les prospects</a>
                                                      </div><!-- /.box-footer -->
                                                      </div><!--/.box -->
                                                      </div><!-- /.col -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <!-- USERS LIST -->
                                                        <div class="box box-danger">
                                                          <div class="box-header with-border">
                                                            <h3 class="box-title">contacts</h3>
                                                            <div class="box-tools pull-right">
                                                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                            </div>
                                                            </div><!-- /.box-header -->
                                                            <div class="box-body no-padding">
                                                              <ul class="users-list clearfix contact">
                                                                </ul><!-- /.users-list -->
                                                                </div><!-- /.box-body -->
                                                                <div class="box-footer text-center">
                                                                  <a href="contact/index.php" class="uppercase">Voir tous les contacts</a>
                                                                  </div><!-- /.box-footer -->
                                                                  </div><!--/.box -->
                                                                  </div><!-- /.col -->
                                                                  </div><!-- /.row -->
                                                                  </div><!-- /.row -->
                                                                  </section><!-- /.content -->
                                                                </div>
                                                              </div>
                                                              <?php
                                                              require 'footer.php';
                                                              ?>
                                                              <script>
                                                              $(document).ready(function() {
                                                              $.getJSON('fonctions/accueil/accuiel.php', function(json, textStatus) {
                                                              console.log(json[0]);
                                                              $("#rdv").text(json[0].somme_rdv);
                                                              $("#appel").text(json[0].somme_appel);
                                                              $("#prospect").text(json[0].somme_prospect);
                                                              $("#contact").text(json[0].somme_contact);
                                                              $('#produit').text(json[0].somme_produit)
                                                              });
                                                              var $ul_contact=$("ul.users-list.clearfix.contact");
                                                              var $ul_prospect=$("ul.users-list.clearfix.prospect");
                                                              $.getJSON('fonctions/accueil/contact.php', function(json, textStatus) {
                                                              /*optional stuff to do after success */
                                                              for (var i = 0; i < json.length; i++) {
                                                              $ul_contact.append('<li><a title="'+json[i].nom_contact+'" class="users-list-name" href="/crm/contact/index.php">'+json[i].nom_contact+'</a></li>');
                                                              };
                                                              });
                                                              $.getJSON('fonctions/accueil/prospet.php', function(json, textStatus) {
                                                              for (var i = 0; i < json.length; i++) {
                                                              $ul_prospect.append('<li><a title="'+json[i].nom+'" class="users-list-name" href="/crm/prospet/index.php">'+json[i].nom+'</a></li>');
                                                              };
                                                              });
                                                              });
                                                              </script>
                                                            </body>
                                                          </html>