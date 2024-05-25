<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Case</title>

    <!-- stylesheets -->
    <link href="<?php echo base_url('vendor/components/font-awesome/css/all.min.css') ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/panel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/toastr.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/jquery.fancybox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendor/datatables/datatables/media/css/jquery.dataTables.min.css'); ?>"
        rel="stylesheet">
    <?php $cache = date("YmdHis"); ?>
    <link href='<?php echo base_url("public/assets/css/custom.css?v=$cache") ?>' rel="stylesheet">
    <!-- stylesheets -->

        <!-- scripts -->
    <script src="<?php echo base_url('vendor/components/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/datatables/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/panel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.fancybox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.mask.js'); ?>"></script>
    <!-- scripts -->

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">Product Module</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item mt-1">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url('products'); ?>">List</a>
                    </div>
                </div>
            </li>

        </ul>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                        <a class="dropdown-item" href="<?php echo base_url('logout/logout'); ?>"
                                    data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </li>
                    </ul>
                </nav>
                <div class=" container-fluid">
                        <?php echo $content; ?>
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php echo "Products Modul " . date("Y") ?></span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to log out?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('logout/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>