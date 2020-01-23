<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calendrier</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
        <!-- Header Navbar: style can be found in header.less -->
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="/crm/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!--<li class="message-menu parler">
                <a href='#' class="button-parlez">
                  <i style="width:40px" class="fa fa-microphone"></i>
                  <span style="height:20px;font-size:10px" class="label label-danger parlez">
                    parlez
                  </span>
                </a>
              </li>
              < Messages: style can be found in dropdown.less-->
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Utilisateur</p>
              <a href="/crm/#"><i class="fa fa-circle text-success"></i> développeur web</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li>
              <a href="/crm/accueil.php">
                <i class="fa fa-home"></i> <span>Accueil</span> </i>
              </a>
            </li>
            <li class="treeview">
              <a href="/crm/#">
                <i class="fa fa-users"></i>
                <span>prospet</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/prospet/ajout.php"><i class="fa fa-user-plus"></i> ajouter prospet</a></li>
                <li><a href="/crm/prospet/index.php"><i class="fa fa-users"></i> tous les prospets<span class="label label-primary pull-right" data-id-prospect="">4</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="/crm/#">
                <i class="fa fa-users"></i>
                <span>Contacts</span>
                <span class="label label-primary pull-right">12</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/contact/ajouter.php"><i class="fa fa-user-plus"></i> ajouter contact</a></li>
                <li><a href="/crm/contact/index.php"><i class="fa fa-users"></i> tous les contacts<span class="label label-primary pull-right" data-id-prospect="">4</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="/crm/#">
                <i class="fa fa-phone-square"></i>
                <span>Appelles</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/appelles/ajout.php"><i class="fa fa-plus"></i> ajouter un appelle</a></li>
                <li><a href="/crm/appelles/index.php"><i class="fa fa-phone"></i> Tous les appelles</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="/crm/#">
                <i class="fa fa-user"></i>
                <span>RDV</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/crm/rdv/rdv.php"><i class="fa fa-calendar"></i> Ajouter un RDV</a></li>
                <li><a href="/crm/rdv/index.php"><i class="fa fa-calendar"></i> Liste RDV </a></li>
                <li><a href="/crm/admin/pages/calendar.php"><i class="fa fa-calendar"></i> calendar</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->      <script src='/crm/admin/dist/js/responsive.js' charset="utf-8"></script>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            calendrier des RDV
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-10">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->   <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="../dist/js/moment.js"></script>
    <script src="../plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="../dist/js/lang-all.js"></script>    <!-- Page specific script -->
    <script>
      $(function () {
                $.getJSON('../../rdv/affiche_calender.php', function(json, textStatus) {
                  console.log(json);
                    $('#calendar').fullCalendar({
                      lang:"fr",
          events: json,
           header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {},
           eventRender: function(event, element) {
            element.find('.fc-title').append("<br/>" + event.description);
        }
        });
                });
              });
    </script>
  </body>
</html>
