<?php
   require "includes/header.php";
   include_once "includes/claims-table.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block  shadow-sm"><button class="btn btn btn-success "><i>Kariobia Group Limited  .<i class="fas fa-trademark fa-sm text-white-90"></i></i></button></a>
          </div>
            <hr>
            <br>
            <hr>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Reported Claims Overview</h6>
                    
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Actions:</div>
                      <a class="dropdown-item" href="#">View client</a>
                      <a class="dropdown-item" href="#">Assessor</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Recommendations</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                   <table class="table table-bordered table-hover table-reponsive">
                       <?php
                  $sqli = "SELECT * FROM `cases`;";
                  $result = mysqli_query($link, $sqli)
                  
                  ?>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client's Name</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Policy number</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                         <?php
                      
                         while($row = mysqli_fetch_assoc($result)){
                          
                       ?>
                       <tbody>
                           <tr>
                            <td><?php echo $row['id']?></td>
                           <td><?php echo $row['names']?></td>
                           <td><?php echo $row['phone']?></td>
                           <td><?php echo $row['email']?></td>
                           <td><?php echo $row['address']?></td>
                           <td><?php echo $row['policy_no']?></td>
                           <td><?php echo $row['date']?></td>
                           <td> <?php echo $row['description']?></td>
                           <td><a href="assess.php"><button class="btn btn-outline-info btn-md ">Assess</button></a></td>
                           </tr>
                       </tbody>
                       <?php
                               }
                       ?>
                    </table>
                </div>
              </div>
            </div>
             

               <div class="col-xl-12 col-lg-11">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Assessed claims</h6>
                    
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Actions:</div>
                      <a class="dropdown-item" href="#">View client</a>
                      <a class="dropdown-item" href="#">Assessor</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Recommendations</a>
                    </div>
                  </div>
                </div>
                <!-- to the claim analyst -->
                <div class="card-body">
                   <table class="table table-bordered table-hover ">
                       <?php
                        $sql2 = "SELECT 
                        c.id,
                        c.names, 
                        c.email,
                        c.phone, 
                        c.address,
                        a.location,
                        a.policy_no, 
                        a.date,
                        c.date, 
                        a.summary
                        FROM cases c
                        RIGHT JOIN assessor a  
                        ON c.id = a.id
                        ORDER BY c.id;";
          
                       $result1 = mysqli_query($link, $sql2)
                       ?>
                        <thead>
                           
                            <tr>
                                <th>#</th>
                                <th>Client's Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Address of client</th>
                                <th>Address of risk</th>
                                <th>Policy number</th>
                                <th>Claim date</th>
                                <th>Date of risk</th>
                                <th>Summary</th>
                                <th>Action</th>>
                            </tr>  
                        </thead>
                        <?php
                      
                         while($row = mysqli_fetch_assoc($result1)){
                          
                       ?>
                       <tbody>
                           <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['names']?></td>
                            <td><?php echo $row['email']?></td>
                           <td><?php echo $row['phone']?></td>
                           <td><?php echo $row['address']?></td>
                           <td><?php echo $row['location']?></td>
                           <td><?php echo $row['policy_no']?></td>
                           <td><?php echo $row['date']?></td>
                           <td><?php echo $row['date']?></td>
                           <td> <?php echo $row['summary']?></td>
                           <td><a href="#"><button class="btn btn-outline-success btn-md ">Submit</button></a></td>
                           </tr>  
                       </tbody>
                       <?php
                               }
                       ?>
                    </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12">


              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">-----------------</h6>
                </div>
                <div class="card-body">
                  
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> &copy;<?php echo date("Y");?> Kariobia All Rights Reserved</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
