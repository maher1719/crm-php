<?php session_start();
if(!empty($_SESSION["id"]))
{

    $id=$_SESSION["id"];
}
else
{
header('location: /crm/');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_SESSION["utilisateur"]; ?></title>
    <link rel="stylesheet" href="/crm/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="/crm/admin/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/crm/admin/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="/crm/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/crm/admin/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/crm/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
            <link rel="stylesheet" href="/crm/admin/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/crm/admin/plugins/fullcalendar/fullcalendar.print.css">
    <link rel="stylesheet" href="/crm/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/crm/admin/dist/css/ihover.min.css">
    <link rel="stylesheet" href="/crm/admin/dist/css/default.css">
    <link rel="stylesheet" href="/crm/admin/dist/css/default.date.css">
    <link rel="stylesheet" href="/crm/admin/plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/crm/admin/plugins/datatables/dataTables.bootstrap.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/crm/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/crm/admin/dist/css/chosen.min.css">

    <script src="/crm/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src='/crm/admin/dist/js/responsive.js' charset="utf-8"></script>
    <style type="text/css">
    .ui-page {
    background-color: rgba(0, 0, 0, 0) !important;
    height: 100%;
    overflow: hidden !important;
    }
    .ui-page {
    outline: medium none;
    }
    th{
      text-transform: capitalize;
    }
    
    </style>
    <script>
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="/crm/index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>wib</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SWIB</b> Consulting</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="message-menu parler">
                <a href='#' class="button-parlez">
                  <i style="width:40px" class="fa fa-microphone"></i>
                  <span style="height:20px;font-size:10px" class="label label-danger parlez">
                    parlez
                  </span>
                </a>
              </li>
              <li class="message-menu">
                <a id="deconnexion" href="deconnexion.php" title=""><span>déconnexion</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php echo $_SESSION["image_160"]; ?>
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["utilisateur"]; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> développeur web</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li>
              <a href="/crm/accueil.php">
                <i class="fa fa-home"></i> <span>Accueil</span> </i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>prospet</span>
                <span class="label label-primary pull-right header_prospect" </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/adminstrateur/prospet/ajout.php"><i class="fa fa-user-plus"></i> ajouter prospet</a></li>
                <li><a href="/crm/adminstrateur/prospet/index.php"><i class="fa fa-users"></i> tous les prospets<span class="label label-primary pull-right header_prospect" data-id-prospect=""></span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Contacts</span>
                <span class="label label-primary pull-right header_contact"></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/adminstrateur/contact/ajouter.php"><i class="fa fa-user-plus"></i> ajouter contact</a></li>
                <li><a href="/crm/adminstrateur/contact/index.php"><i class="fa fa-users"></i> tous les contacts<span class="label label-primary pull-right header_contact" data-id-prospect="" ></span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-phone-square"></i>
                <span>Appel</span>
                <span class="label label-primary pull-right header_appel"></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/adminstrateur/appelles/ajout.php"><i class="fa fa-plus"></i> ajouter un appelle</a></li>
                <li><a href="/crm/adminstrateur/appelles/index.php"><i class="fa fa-phone"></i> Tous les appelles <span class="label label-primary pull-right header_appel"></span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>RDV</span>
                <span class="label label-primary pull-right header_rdv"></span>
              </a>
              <ul class="treeview-menu">
                 <li><a href="/crm/adminstrateur/rdv/rdv.php"><i class="fa fa-calendar"></i> Ajouter un RDV</a></li>
                <li><a href="/crm/adminstrateur/rdv/index.php"><i class="fa fa-calendar"></i> Liste RDV<span class="label label-primary pull-right header_rdv"></span></a></li>
                <li><a href="/crm/admin/pages/calendar.php"><i class="fa fa-calendar"></i> calendrier</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->      <script src='/crm/admin/dist/js/responsive.js' charset="utf-8"></script>
      </aside>
