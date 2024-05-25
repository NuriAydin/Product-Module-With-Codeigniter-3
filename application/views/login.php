<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Case - Login</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?php echo base_url('public/assets/css/panel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/toastr.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/sweetalert2.min.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('vendor/components/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/toastr.min.js'); ?>"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Product Module</h1>
                                    </div>
                                    <?php 
                                    if (!empty($this->session->flashdata('error'))): ?>
                                    <script>
                                    toastr.error('<?php echo $this->session->flashdata('error'); ?>', {
                                        positionClass: 'toast-top-right'
                                    });
                                    </script>
                                    <?php endif; ?>

                                    <?php echo validation_errors(); ?>
                                    <?php echo form_open('login/authenticate'); ?>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" />
                                    </form>

                                    <div class="text-center my-3">
                                        <a class="small btn btn-outline-primary col-12"
                                            href="<?php echo site_url('users/register'); ?>">Create an
                                            Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



</body>

</html>

<script>
var successAlert = '<?php echo (isset($_GET["v"]) && $_GET["v"] == 1) ? 1 : 0 ?>';
if (successAlert == '1') {
    Swal.fire({
        position: 'top-end',
        title: "Your registration has been successfully completed!",
        text: "You can log in with your information",
        icon: "success",
        timer: 2500,
        showConfirmButton: false
    });
    var cleanUrl = window.location.origin + window.location.pathname;
    window.history.replaceState({}, document.title, cleanUrl);
}
</script>