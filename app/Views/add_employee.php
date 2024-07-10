<?php include_once(dirname(__FILE__) . '/layouts/header.php'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">LEO70 Employee</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Employee</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        
                        <div class="card mb-4">

                            <?php if(session()->getFlashdata('msg')): ?>
                                <br>
                                <div class="alert alert-warning">
                                <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($validation)): ?>
                                    <div class="card">
                                    <a class="btn btn-warning" disable> <?= $validation->listErrors() ?> </a> 
                                    </div>
                                    <?php endif; ?>


                            <div class="card-body">
                            <form action ="/payroll" method ="post">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="id" id="inputDILGID" type="number" placeholder="Enter your DILG ID" required />
                                                <label for="inputDILGID">DILG ID</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" name="position" id="inputPosition type="text" placeholder="Enter your Position/Designation" required/>
                                                <label for="inputPosition">Position</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="fullname" id="inputFullName" type="text" placeholder="Enter your Name" required/>
                                                <label for="inputFullName">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="salary" id="inputSalary" type="number" placeholder="Enter your Monthly Salary" required/>
                                                <label for="inputSalary">Monthly Salary</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type ="submit" class="btn btn-primary btn-block"> Add New Employee </button></div>
                                    </div>
                                </form>
                            </div>                            
                        </div>
                    </div>
                </main>
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


<?php include_once(dirname(__FILE__) . '/layouts/footer.php'); ?>
