<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/'); ?>images/logo.svg" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="<?= base_url('auth/login'); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/'); ?>vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/'); ?>js/template.js"></script>
    <!-- endinject -->
</body>

</html>