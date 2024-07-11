<?php $session = session();
 if($session->get('isLoggedIn') == 0 || $session->get('isLoggedIn') == ''){
    $session->setFlashdata('msg','Please login..');
    return redirect()->to('login');
 } ?>

<?php include_once(dirname(__FILE__) . '/layouts/header.php'); ?>



            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">LEO70 Employee Salary</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee Salary</li>
                        </ol>

                                    <?php if(session()->getFlashdata('msg')): ?>
                                        <br>
                                        <div class="alert alert-warning">
                                        <?= session()->getFlashdata('msg') ?>
                                        </div>
                                        <br>
                                    <?php endif; ?>

                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                EMPLOYEE SALARY
                            </div> -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>DILG ID</th>
                                            <th>Position</th>
                                            <th>Basic Salary</th>
                                            <th>UT/L/A in Minutes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($users as $user): ?>
                                        <tr>
                                            <td> <?= $user['Name']; ?> </td>
                                            <td> <?= $user['DILG_ID']; ?> </td>
                                            <td> <?= $user['Position']; ?> </td>
                                            <td> <?= number_format($user['Salary']); ?> </td>
                                            <td> <?= number_format($user['Minutes']); ?> </td>
                                            <td>
                                                <div class="" style="text-align: center;">
                                                    <a class="btn btn-sm btn-info" title="View" data-toggle="modal" data-target="#mySave" href="<?php echo base_url('../generateFiletoPDF/'.$user['DILG_ID']); ?>">
                                                        <i class="fas fa-user-check me-1" > </i>
                                                    </a>
                                                    <a class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#myEdit" href="<?php echo base_url('../editemployee/'.$user['DILG_ID']); ?>">
                                                        <i class="fas fa-user-pen me-1"> </i> 
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#myDelete<?= $user['DILG_ID']; ?>">
                                                        <i class="fas fa-user-xmark me-1"> </i> 
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> 

                                            <!-- Modal -->
                                            <div class="modal fade" id="myDelete<?= $user['DILG_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #D54C3C">
                                                            <h5 class="modal-title" id="exampleModalLabel">ALERT!</h5>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>Are you sure you want to delete this employee? </label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" title="Cancel" data-bs-dismiss="modal">
                                                                Close 
                                                            </a>
                                                            <a class="btn btn-primary" title="Delete" href="<?php echo base_url('../deleteemployee/'.$user['DILG_ID']); ?>">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <?php endforeach; ?>                                       
                                    </tbody>
                                </table>
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
