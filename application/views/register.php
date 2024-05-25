<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Case - Register</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?php echo base_url('public/assets/css/panel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/css/toastr.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('vendor/components/jquery/jquery.min.js'); ?>"></script>

    <script src="<?php echo base_url('public/assets/js/panel.min.js'); ?>"></script>
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
                                    <div class="container">
                                        <h2>Register</h2>
                                        <?php if (!empty($this->session->flashdata('error')) && !empty($_POST)): ?>
                                        <script>
                                        toastr.error('<?php echo $this->session->flashdata('error'); ?>', {
                                            positionClass: 'toast-top-right'
                                        });
                                        </script>
                                        <?php endif; ?>
                                        <?php echo validation_errors(); ?>
                                        <?php echo form_open('users/register'); ?>

                                        <div class="form-group">
                                            <label for="email">Mail :</label>
                                            <input type="text" name="email" class="form-control"
                                                value="<?php echo set_value('email'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirm">Password Again:</label>
                                            <input type="password" name="password_confirm" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary col-12">Register</button>

                                        </form>

                                        <div class="text-center my-3">
                                            <a class="small btn btn-outline-primary col-12"
                                                href="<?php echo site_url('login'); ?>">Sign in</a>
                                        </div>
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