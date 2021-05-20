<?php
// include header
   require "includes/header.php";
   // Include config file
   require_once "db/config.php";

   if(isset($_POST['insert'])){
   $name = $_POST['name'];
   $extentt= $_POST['extentt'];
   $phone= $_POST['phone'];
   $location = $_POST['location'];
   $policyno = $_POST['policyno'];
   $date = $_POST['date'];
   $summary = $_POST['summary'];
    $name_err = $extent_err = $phone_err = $location_err = $policyno_err = $summary_err = $date_err = $success = $unknown_err = "";
       
    //validate  if feilds are empty
       // Check if name is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter the clients names.";
    } else{
        $name = trim($_POST["name"]);
    }
       //empty degree
       if(empty(trim($_POST['extentt']))){
        $extent_err = "Please enter the degree of the risk.";
    } else{
        $extent = trim($_POST['extentt']);
    }
       //empty phone number
       if(empty(trim($_POST['phone']))){
        $phone_err = "Please enter the clients phone number.";
    } else{
        $phone = trim($_POST['phone']);
    } 
       //empty location
        if(empty(trim($_POST['location']))){
        $location_err = "Please enter the location of the risk.";
    } else{
        $location = trim($_POST['location']);
    }
       //empty policy number
        if(empty(trim($_POST['policyno']))){
        $policyno_err = "Please enter the policy number.";
    } else{
        $policyno = trim($_POST['policyno']);
    }
       //empty date
         if(empty(trim($_POST['date']))){
        $date_err = "Please enter the policy number.";
    } else{
        $date = trim($_POST['date']);
    }
       //empty summary
         if(empty(trim($_POST['summary']))){
        $summary_err = "Please enter the policy number.";
    } else{
        $summary = trim($_POST['summary']);
    }
       
if(empty($name_err) || empty($extent_err) || empty($phone_err) || empty($location_err) || empty($policyno_err) || empty($date_err) || empty($summary_err )){
   $sql = "INSERT INTO `assessor`( `names`, `degree`, `phone`, `location`, `policy_no`, `date`, `summary`) VALUES ('$name','$extentt','$phone','$location','$policyno','$date', '$summary')";

   if ($link->query($sql) === TRUE) {
    $success ="submitted successfully";
   } else {
  $unknown_err = "Error: " . $sql . "<br>" . $link->error;
     }
  }
}
   ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card spur-card ">
            <div class="card-header bg-gradient-dark">
                <div class="spur-card-title ">
                    <h4 class="m-0 font-weight-bold text-info">Claim</h4>
                </div>
            </div>
            <div class="card-body" style="color:green;">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Client's Name</label>
                            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Full names">
                            <span class="help-block" style="color:red"><i><?php echo $name_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Extent of the Peril </label>
                            <input type="text" name="extentt" class="form-control" id="inputEmail4" placeholder="How much damage was felt?">
                            <span class="help-block" style="color:red"><i><?php echo $extent_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="inputPassword4" placeholder="07-- --- ---"><span class="help-block" style="color:red"><i><?php echo $phone_err; ?></i></span>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputAddress2"> Address of The Peril</label>
                            <input type="text" name="location" class="form-control" id="inputAddress2" placeholder="Where did the risk occur?">
                            <span class="help-block" style="color:red"><i><?php if ( isset( $location_err ) ) {  echo $location_err; }?></i></span>
                        </div>
                        <!-- policy number collection-->

                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Insurance Policy Number</label>
                            <input type="text" name="policyno" class="form-control" id="inputAddress2" placeholder="Policy No."><span class="help-block" style="color:red"><i><?php echo $policyno_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Date of the Occurence</label>
                            <input type="date" name="date" class="form-control" id="inputAddress2" placeholder="DD/MM/YY"><span class="help-block" style="color:red"><i><?php echo $date_err; ?></i></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Summary of the Investigation</label>
                            <input type="text" name="summary" class="form-control" id="inputAddress2" placeholder="Explain in details how the incident happened and what was stolen" style="length:100px;"><span class="help-block" style="color:red"><i><?php echo $summary_err; ?></i></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <!--div class="form-group col-md-6">
                            Description: <input type="text" name="desc"><br><br>
                            <label id="upload">Select the file to upload:</label>
                            <input class="btn btn-outline-success btn-md" type="file" id="upload" name="upload" placeholder="Select the file to upload:">
                            <input type="hidden" name="action" value="upload" />
                            <input type="submit" value="Upload " name="submitt" class="btn btn-success btn-md" />
                        </div-->
                    </div>
                    <?php
                    /* if($_SERVER["REQUEST_METHOD"] == "POST"){
                         $description = $name ="";
                     $name =$_FILES['upload']['name'];
                     $tmp_name = $_FILES['upload']['tmp_name'];
                     $submitbutton = isset($_POST['submitt']) ? $_POST['submitt'] : '';
                     
                     $position = strpos($name, ".");
                     $fileextension =substr($name, $position + 1);
                     
                      $fileextension = strtolower($fileextension);
                     $description = $_POST['desc'];
                     
                        if(isset($name)){
                            $path = '/uploads/files';
                            
                            if(!empty($name)){
                                if(move_uploaded_file($tmp_name, $path.$name)){
                                    echo 'File uploaded!';
                                }
                            }
                        }
                     if(!empty($description)){
                         mysqli_query($link, "INSERT INTO `assessment` (`description`, `filename`)VALUE('$description','$name')");
                     }
                     }
                      // Close connection
                       mysqli_close($link);
                     */?>
                    <button type="submit" class="btn btn-outline-success btn-lg" name="insert">Assess Claim</button>
                    <button type="reset" class="btn btn-outline-secondary btn-md" name="reset">Reset</button>
                </form><br>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block" aria-hidden="true" style="color:red"><i><?php echo $unknown_err; ?></i></span>
                </div>
                <div class="alert alert-success" role="alert">
                    <span class="help-block" aria-hidden="true" style="color:green"><i><?php echo $success; ?></i></span>
                </div>

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