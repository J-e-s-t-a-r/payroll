<?php include_once(dirname(__FILE__) . '/layouts/header.php'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">LEO70 Employee</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit New Employee</li>
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
                                <form action ="/updatepayroll" method ="post">
                                <?php if($data): ?> 
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                

                                                <input class="form-control" name="id" id="inputDILGID" type="number" placeholder="Enter your DILG ID" required value="<?= $data['DILG_ID']; ?>"/>
                                                <label for="inputDILGID">DILG ID</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" name="position" id="inputPosition type="text" placeholder="Enter your Position/Designation" required value="<?= $data['Position']; ?>" />
                                                <label for="inputPosition">Position</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="fullname" id="inputFullName" type="text" placeholder="Enter your Name" required value="<?= htmlspecialchars_decode($data['Name']); ?>"/>
                                                <label for="inputFullName">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="salary" id="inputSalary" type="number" placeholder="Enter your Monthly Salary" required value="<?= $data['Salary']; ?>" />
                                                <label for="inputSalary">Monthly Salary</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-2 mb-md-0">
                                                <input class="form-control" name="minute" id="inputMinutes" type="text" placeholder="Enter your total UT/L/A in minutes" required value="<?= ($data['Minutes']); ?>"/>
                                                <label for="inputMinutes">UT/L/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-2 mb-md-0">
                                                <input class="form-control" name="sss" id="inputSSS" type="number" placeholder="Enter your SSS Contribution" required value="<?= $data['SSS']; ?>" />
                                                <label for="inputSSS">SSS</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-2 mb-md-0">
                                                <select class="form-control" name="tax" id="inputTax">
                                                    <option value="Yes" <?php if($data['Tax'] == "Yes") : echo "selected"; endif; ?>>Yes</option>
                                                    <option value="No" <?php if($data['Tax'] == "No") : echo "selected"; endif; ?>>No</option>
                                                </select>
                                                <label for="inputTax">with 8% Income Tax</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="month" id="inputMonth">
                                                    <option value="" <?php if($data['Month'] == null) : echo "selected"; endif; ?>>Please select a month</option>
                                                    <option value="January" <?php if($data['Month'] == "January") : echo "selected"; endif; ?>>January</option>
                                                    <option value="Februrary" <?php if($data['Month'] == "Februrary") : echo "selected"; endif; ?>>Februrary</option>
                                                    <option value="March" <?php if($data['Month'] == "March") : echo "selected"; endif; ?>>March</option>
                                                    <option value="April" <?php if($data['Month'] == "April") : echo "selected"; endif; ?>>April</option>
                                                    <option value="May" <?php if($data['Month'] == "May") : echo "selected"; endif; ?>>May</option>
                                                    <option value="June" <?php if($data['Month'] == "June") : echo "selected"; endif; ?>>June</option>
                                                    <option value="July" <?php if($data['Month'] == "July") : echo "selected"; endif; ?>>July</option>
                                                    <option value="August" <?php if($data['Month'] == "August") : echo "selected"; endif; ?>>August</option>
                                                    <option value="September" <?php if($data['Month'] == "September") : echo "selected"; endif; ?>>September</option>
                                                    <option value="October" <?php if($data['Month'] == "October") : echo "selected"; endif; ?>>October</option>
                                                    <option value="November" <?php if($data['Month'] == "November") : echo "selected"; endif; ?>>November</option>
                                                    <option value="December" <?php if($data['Month'] == "December") : echo "selected"; endif; ?>>December</option>
                                                </select>
                                                <label for="inputMonth">Month</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="cutoff" id="inputCutoff" type="text" placeholder="Enter your cutoff range" required value="<?= $data['Range']; ?>" />
                                                <label for="inputCutoff">Cut-off</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type ="submit" class="btn btn-primary btn-block"> Save changes </button></div>
                                    </div>
                                <?php endif; ?>           
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
