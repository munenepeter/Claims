<?php
   require "includes/header.php";
   include_once "includes/claims-table.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block  shadow-sm"><button class="btn btn btn-secondary "><i>Kariobia Group Limited  .<i class="fas fa-trademark fa-sm text-white-90"></i></i></button></a>
          </div>
            <br>
            <hr>
            <br>
            <br>

          <!-- Content Row -->
        
            <br>
            <hr>
            <br>

          <!-- Content Row -->

          <div class="row">

            
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
                   <table class="table table-bordered table-hover " id="table">
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
                           <td><a href="analyse.php"><button class="btn btn-outline-danger btn-md " id="analyse">Analyse</button></a></td>
                           </tr>  
                       </tbody>
                       <?php
                               }
                       ?>
                    </table>
                </div>
              </div>
            </div>
            
              <script>
               var btnAnalyse = document.getElementById("analyse").addEventListener('click'Function(e){alert("qwertyuiopasdfghjklzxcvbnm")}); 
              </script>
             

               <div class="col-xl-12 col-lg-11">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Claims Overview</h6>
                    
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
                   <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Claim number</th>
                                <th>Client</th>
                                <th>Category</th>
                                <th>Type</th>
                            </tr>  
                        </thead>
                       <tbody>
                           <tr>
                            <td>1</td>
                           <td>001c</td>
                           <td>Eshter Birgen</td>
                           <td>Motor</td>
                           <td>Theft</td>
                           </tr>
                            <tr>
                            <td>2</td>
                           <td>002c</td>
                           <td>Gibson Kimani</td>
                           <td>Non Motor</td>
                           <td>Fire</td>
                           </tr>
                            <tr>
                            <td>3</td>
                           <td>003c</td>
                           <td>Sammy Magara</td>
                           <td>Motor</td>
                           <td>Accident</td>
                           </tr>
                            <tr>
                            <td>4</td>
                           <td>004c</td>
                           <td>Charity Wambui</td>
                           <td>Motor</td>
                           <td>Theft</td>
                           </tr>
                           
                       </tbody>
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
                          <h6 class="m-0 font-weight-bold text-primary">Poems</h6>
                      </div>
                      <div class="card-body">
                          <p class="lead" style="color:blue;">
                              <span>Hello 2105</span></p>
                          <strong><i>
                                  Oh this prison .say am done<br>
                                  Yet I'm still here<br>
                                  Prison, my lines that ain't fordone<br>
                                  But its very rare.<br>
                                  It's a blessing and a curse<br>
                                  A leliver,<br>
                                  It changes my course<br>
                                  Making me a non believer.<br><br>

                                  Prison . pain but pleasure,<br>
                                  Dependence upon a lie.<br>
                                  Prison. Work but leisure,<br>
                                  Not seen by the eye</i></strong>.
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
