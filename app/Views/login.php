<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="<?php echo base_url('../SB_Admin_Assets/');?>css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div style="background-image: url(<?php echo base_url('../images');?>/bg-01.png);"></div>
                                    <div class="" >
                                        <span>
                                            <h2 class="text-center font-weight-light my-4"> <b> LOCALIZATION OF EO70 PMO </b> </h1>
                                            <h3 class="text-center font-weight-light my-4"> PAYROLL SYSTEM </h3>
                                            <h6 class="text-center font-weight-light my-4"> <i>BETA VERSION</i> </h6> 
                                        </span>
                                    </div>

                                    <?php if(session()->getFlashdata('msg')): ?>
                                        <br>
                                        <div class="alert alert-warning">
                                        <?= session()->getFlashdata('msg') ?>
                                        </div>
                                    <?php endif; ?>


                                    <div class="card-body">
                                        <form action = "/auth" method='post'>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="inputUsername" type="username" placeholder="Username" />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-warning" href="/guest">Continue as Guest</a>
                                                <button type ="submit" class="btn btn-primary btn-block"> Login </button> 
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <!-- <div class="small"><a href="/register">Need an account? Sign up!</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('../SB_Admin_Assets/');?>js/scripts.js"></script>
    </body>
</html>
