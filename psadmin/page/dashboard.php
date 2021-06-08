<?php
    require_once '../session.php';

    if(!$isLogged) {
        header('Location: /psadmin/');
        die("<b>ERROR 404:</b> Página não encontrada !!!");
    }

    $visits = file_get_contents('../data/visits.json');
    $visits = json_decode($visits);

    $clients = file_get_contents('../data/clients.json');
    $clients = json_decode($clients);

    $name = file_get_contents('../data/credentials.json');
    $name = json_decode($name);
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - PSDATA</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../img/logo.png" alt="homepage" style="
                                width: 95%;
                                margin-top: 0.5em;
                            " />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <span class="text-white font-medium"><?= $name->Name ?></span>
                            <a class="profile-pic" href="../logout.php">
                                <button class="btn btn-light" style="margin-right: 1em;width: 5em;">Logout</button>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="shipping.php"
                                aria-expanded="false">
                                <i class="fas fa-envelope-square" aria-hidden="true"></i>
                                <span class="hide-menu">Shopping</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <!--<li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li>-->
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Dashboard</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info" style="margin-left: -35%;margin-right: -34%;">
                            <h3 class="box-title">Total de Visitas no Site</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success"><?= $visits->visitas ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Page Views</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-purple">869</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-info">911</span>
                                </li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <!-- ============================================================== -->
                <!-- CLIENTS -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Clientes</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                    <button type="button" id="create" class="btn btn-info" style="margin-left: 70%;">Criar Cliente</button>
                                </div>
                                <!--<div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                    <select class="form-control row border-top">
                                        <option>March 2017</option>
                                        <option>April 2017</option>
                                        <option>May 2017</option>
                                        <option>June 2017</option>
                                        <option>July 2017</option>
                                    </select>
                                </div>-->
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap" id="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">NOME</th>
                                            <th class="border-top-0">STATUS</th>
                                            <th class="border-top-0">DATA DE PAGAMENTO</th>
                                            <th class="border-top-0">VALOR</th>
                                            <th class="border-top-0">AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($clients as $cliente) { ?>
                                                <tr>
                                                    <td class="txt-oflo"><?= $cliente->nome ?></td>
                                                    <td><?= $cliente->status ?></td>
                                                    <td class="txt-oflo"><?= $cliente->pagamento ?></td>
                                                    <td>$ <?= $cliente->valor ?></td>
                                                    <td style="width: 15%;">
                                                        <button 
                                                            type="submit" 
                                                            id="edit"
                                                            btn-edit=""
                                                            class="btn btn-warning"
                                                            
                                                            data-id="<?= $cliente->id ?>"
                                                            data-name="<?= $cliente->nome ?>"
                                                            data-status="<?= $cliente->status ?>"
                                                            data-payment="<?= $cliente->pagamento ?>"
                                                            data-value="<?= $cliente->valor ?>"
                                                        >
                                                            Editar
                                                        </button>

                                                        <button 
                                                            type="button"
                                                            btn-delete=""
                                                            class="btn btn-danger"
                                                            
                                                            data-id="<?= $cliente->id ?>"
                                                        >
                                                            Deletar
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 
                2021 © PSDATA 
            </footer>

            <!-- Modal create -->
            <div class="modal bs-example-modal-sm fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="lblModalSuporte">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Novo Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="form-clients">
                        <input type="hidden" id="id" value="">
                        <br>
                        <div id="alert-form-modal" class="alert message-modal-alert hide" role="alert" style="width: 95%;margin: auto;">
                        <!-- Dynamic message here -->
                        </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select class="form-control row border-top" style="margin: auto;" id="status">
                                        <option value="">Selecionar</option>
                                        <option value="DEVENDO">DEVENDO</option>
                                        <option value="PAGO">PAGO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data do pagamento</label>
                                    <input type="date" class="form-control" id="dataOfPayment" placeholder="Data...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Valor</label>
                                    <input type="text" id="value" class="form-control" placeholder="Valor">
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" id="btn-send-modal" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/geral.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>