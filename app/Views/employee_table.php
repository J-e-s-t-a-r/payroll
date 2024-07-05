<?php include_once(dirname(__FILE__) . '/layouts/header.php'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">LEO70 Employee Salary</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee Salary</li>
                        </ol>
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
                                            <th>Division/Unit</th>
                                            <th>Basic Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>DILG ID</th>
                                            <th>Position</th>
                                            <th>Division/Unit</th>
                                            <th>Basic Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>$320,800</td>
                                            <td>
                                                <div class="" style="text-align: center;">
                                                    <a class="btn btn-sm btn-info" title="View" data-toggle="modal" data-target="#mySave">
                                                        <i class="fas fa-file me-1" > </i>
                                                    </a>
                                                    <a href="" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#myEdit">
                                                        <i class="fas fa-pencil me-1"> </i> 
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#myDelete">
                                                        <i class="fas fa-trash me-1"> </i> 
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>                                        
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
