<?php

  include 'pages/php/database.php';
  include 'pages/previsao/tempo.php';
  include 'pages/php/arduino.php';

  
  if(!isset($_SESSION['id'])){
    header('Location:pages/examples/login.html');
  }

  //php para parte de online

?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="30">
  
  <title>Weather Station</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!--Weather ICONS-->
  <link rel="stylesheet" href="bootstrap/css/weather-icons.css">
  <link rel="stylesheet" href="bootstrap/css/weather-icons.min.css">
  <link rel="stylesheet" href="bootstrap/css/weather-icons-wind.css">
  <link rel="stylesheet" href="bootstrap/css/weather-icons-wind.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  
  <link rel="icon" href="dist/img/cloud.png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>St</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Weather</b>St</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 3 Mensagens!</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/4.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Henrique_Pires
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Você conhece os Produtos da Jequiti?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/2.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Beatriz.Guergolet
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Oi, Tudo Bem?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/7.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Eduardo.Anjos
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Já Terminou o Site?</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="footer"><a href="#">...</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 3 Notificações</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> <?php echo $frasechuva?>
                    </a>
                  </li>
                  
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> Beatriz.Guergolet <br>
                      começou a seguir você.
                    </a>
                  </li>
				  
				          <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Henrique_Pires <br> 
                      começou a seguir você.
                    </a>
                  </li>
                  
                  <!--<li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>-->
                </ul>
              </li>
              <li class="footer"><a href="#">...</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/<?php 
              if ($_SESSION['id'] <= 9) {

              print($_SESSION['id']);

              }else{
                echo 'avatar5';
              }
              ?>.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php print($_SESSION['nome']) ; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/<?php 
              if ($_SESSION['id'] <= 9) {

              print($_SESSION['id']);

              }else{
                echo 'avatar5';
              }
              ?>.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php print($_SESSION['nome']) ; ?>
                  <small>Membro desde 2017</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Seguidores</a>
                  </div>
				  <div class="col-xs-4 text-center">
                    
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Amigos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="pages/php/excluir.php" class="btn btn-default btn-flat text-red">Excluir Usuario</a>
                </div>
                <div class="pull-right">
                  <a href="pages/php/sair.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/<?php 
              if ($_SESSION['id'] <= '9') {

              print($_SESSION['id']);

              }else{
                echo 'avatar5';
              }
              ?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print($_SESSION['nome']) ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- search form -->
      <!--<form action="#" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search ...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        
        $sql = "select * from usuarios order by nome asc";
  
        $query = $mysqli->query($sql);

          while($linha = $query->fetch_assoc()){

            if ($_SESSION['id'] != $linha['id_usuario']) {
			echo'          	<li class="treeview">';
			echo'            <a href="#">';
			echo'              <span class="pull-left-container">';
			echo'                <img src="dist/img/'. $linha['id_usuario'] .'.jpg" style="width:40px; height:40px;" class="img-circle">' ;
			echo'                    <span>'. $linha['nome'] .'</span>';
			echo'               <small><i class="fa fa-circle text-danger pull-right"></i></small>';
			echo'              </span>';
			echo'            </a>';
			echo'          </li>';	
            }
          }

        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="row">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="col-lg-7 col-xs-6">
              <h1>
                
                <small>Controle Fora</small>
              </h1>
            </div>
            <div class="col-lg-4 col-xs-6">
              <h1>
                <small>Chuva</small>
              </h1>
            </div>
          </section>
        </div>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-7 col-xs-6"><!--COLUNA DE FORA-->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                

                <div class="inner">
                  <h3><?php echo $tempfora;?> <sup style="font-size: 20px;"> °C</sup></h3><!--	TEMPERATURA FORA-->

                  <p>Temp. Fora</p>
                </div>
                <div class="icon">
                  <i class="ion ion-thermometer"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $umdfora;?> <sup style="font-size: 20px"> %</sup></h3><!--UMIDADE FORA-->

                  <p>Umidade Fora</p>
                </div>
                <div class="icon">
                  <i class="ion ion-waterdrop"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div><!--FIM COLUNA DE FORA-->
        <div class="col-lg-5 col-xs-6"><!--COLUNA DE CHUVA-->
            <div class="col-lg-12 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $stschuva;?></h3><!--SENSOR DE CHUVA-->

                  <p><?php echo $frasechuva?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-umbrella"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div><!--FIM COLONA DE CHUVA-->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row"><!--ROW 2-->
            <div class="row">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="col-lg-7 col-xs-6">
                <h1>
                  <small>Controle Dentro</small>
                </h1>

              </div>
              <div class="col-lg-4 col-xs-6">
                <h1>
                  <small>Previsao Do Tempo</small>
                  <small>(<?php print($_SESSION['cidade']);?>)</small><!--PREVISAO DO TEMPO-->
                </h1>

              </div>
            </section>
            </div>
          <div class="col-lg-7 col-xs-6">
            <!--DIV DA TEMP DE DENTRO-->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tempdentro?> <sup style="font-size: 20px;"> °C</sup></h3><!--TEMPERATURA DENTRO-->

                  <p>Temp. Dentro</p>
                </div>
                <div class="icon">
                  <i class="ion ion-thermometer"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!--DIV DA UMIDADE DE DENTRO-->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $umddentro?> <sup style="font-size: 20px"> %</sup></h3><!--UMIDADE DENTRO-->

                  <p>Umidade Dentro</p>
                </div>
                <div class="icon">
                  <i class="ion ion-waterdrop"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
        <div class="col-lg-5 col-xs-6"><!--DIV DA PREVISAO DO TEMPO-->
          
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $maxima; ?><sup style="font-size: 20px">  °C</sup></h3><!--TEMPERATURA MAXIMA-->
                

                <p>Máxima</p>
              </div>
              <div class="icon">
                <i class="ion ion-cloud"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo $minima; ?><sup style="font-size: 20px">  °C</sup></h3><!--TEMPERATURA MINIMA-->
                

                <p>Mínima</p>
              </div>
              <div class="icon">
                <i class="ion ion-<?php echo $icon_prev;?>"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      <br>
      <!--Fim ROW 2-->
      <!--ROW 3-->
      <div class="row">
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
    		<section class="col-lg-7 connectedSortable">
    			 <!-- LINE CHART -->
    			 <div class="box box-info box-success">
    				<?php include 'pages/php/graficotemp.php';?>
    			 </div>
    			 <!-- /.box -->
    		</section>
        <!-- right col -->
    		
	     </div>
      <!--Fim ROW 3-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

        <h3 class="control-sidebar-heading">Configurações Perfil</h3>
        <ul class="control-sidebar-menu">
          <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Usuario : 
						<br>
						<p class="text-danger"><?php print($_SESSION['nome']);?></p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="text" name="n" class="form-control" placeholder="<?php print($_SESSION['nome']);?>">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
          <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        E-mail : 
						<br>
						<p class="text-danger"><?php print($_SESSION['email']);?></p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="text" name="e" class="form-control" placeholder="<?php print($_SESSION['email']);?>">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
          <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTree">
                        Telefone : 
						<br>
						<p class="text-danger"><?php print($_SESSION['telefone']);?></p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTree" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="text" name="t" class="form-control" placeholder="<?php print($_SESSION['telefone']);?>">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
		  <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        Senha : 
						<br>
						<p class="text-danger">******</p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="password" name="se" class="form-control" placeholder="Nova Senha">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
          <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Numero Serial : 
						<br>
						<p class="text-danger"><?php print($_SESSION['numero']);?></p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="text" name="s" class="form-control" placeholder="<?php print($_SESSION['numero']);?>">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
          <li>
			<div class="panel box box" style="background:transparent;border-top:none;">
                  <div class="box-header">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        Localidade : 
						<br>
						<p class="text-danger"><?php print($_SESSION['cidade']);?></p>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="pages/php/atualizacao.php" method="POST" class="sidebar-form">
							<div class="input-group">
							<input type="text" name="l" class="form-control" placeholder="<?php print($_SESSION['cidade']);?>">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-pencil"></i>
									</button>
								</span>
							</div>
						</form>
                    </div>
                  </div>
            </div>
          </li>
          
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Atividades Recentes</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Aniversário de Bruna Zanatta</h4>

                <p>Será no Dia 14 de Setembro</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configurações</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              FeedBack
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Informações sobre as configurações
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Permitir Recebimento de Email
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Outros poderam mandar email para você.
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expor seu nome na Tela Principal
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Permite outros Usuarios Verem seu Nome.
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Configurações de Conversas</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Me Mostrar como Online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Desligar as Notificações
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Deletar o Histórico
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
