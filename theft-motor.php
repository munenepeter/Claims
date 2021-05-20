 <?php
   require "includes/header.php";
   //include_once "includes/claims-table.php";
?>
<?php

// Include config file
require_once "db/config.php";
 
// Define variables and initialize with empty values
$name = $email = $phone = $address = $policy_no = $date = $desc = "";
$name_err = $email_err = $phone_err = $address_err = $policy_no_err = $date_err = $desc_err = $unknown_err = "";
 $success = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter the clients names.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter the clients email.";
    } else{
        $email = trim($_POST["email"]);
    }
    // check whether phone number is empty
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter the clients phone number.";
    } else{
        $phone = trim($_POST["phone"]);
    }
    //check whether  address is empty
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter the clients address.";
    } else{
        $address = trim($_POST["address"]);
    }
    //chek whether policy number is empty
    if(empty(trim($_POST["policyno"]))){
        $policy_no_err = "Please enter the clients policy number.";
    } else{
        $policy_no = trim($_POST["policyno"]);
    }
    // check whether date is empty
    if(empty(trim($_POST["date"]))){
        $date_err = "Please enter the date of occurence.";
    } else{
        $date = trim($_POST["date"]);
    }
    // check whethr the description is empty
    if(empty(trim($_POST["desc"]))){
        $desc_err = "Please enter the clients description.";
    } else{
        $desc = trim($_POST["desc"]);
    }
    
    // Validate credentials
    if(empty($name_err) && empty($email_err) && empty($policy_no_err)){
        // Prepare an insert statement
        
        $sql = "INSERT INTO cases (id, names, email, phone, address, policy_no, date, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ";  
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            
            mysqli_stmt_bind_param($stmt, "ississss", $param_id, $param_name, $param_email, $param_phone, $param_address, $param_policy_no, $param_date, $param_desc);
            
            // Set parameters
            $param_id = "";
            $param_name = $name;
            $param_email =  $email;  
            $param_phone = $phone;
            $param_address = $address;
            $param_policy_no = $policy_no;
            $param_date = $date;
            $param_desc = $desc;
            

             // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // display to a msg on the page
              $success = "New claim inserted!";
            } else{
              $unknown_err = "Oops there is something wrong with my code. Please call me to rectify!.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<div class="row">
    <div class="col-xl-12">
        <div class="card spur-card ">
            <div class="card-header bg-gradient-secondary">
                <div class="spur-card-title ">
                    <h4 class="m-0 font-weight-bold text-info">New Claim</h4>
                </div>
            </div>
            <div class="card-body" style="color:blue;">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Client's Name</label>
                            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Full names">
                            <span class="help-block" style="color:red"><i><?php echo $name_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email Address">
                            <span class="help-block" style="color:red"><i><?php echo $email_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="inputPassword4" placeholder="07** *** **"><span class="help-block" style="color:red"><i><?php echo $phone_err; ?></i></span>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputAddress2"> Address</label>
                            <input type="text" name="address" class="form-control" id="inputAddress2" placeholder="0000-0000, Town">
                            <span class="help-block" style="color:red"><i><?php echo $address_err; ?></i></span>
                        </div>
                        <!-- policy number collection-->

                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Insurance Policy Number</label>
                            <input type="text" name="policyno" class="form-control" id="inputAddress2" placeholder="Policy No."><span class="help-block" style="color:red"><i><?php echo $policy_no_err; ?></i></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Date of the Occurence</label>
                            <input type="date" name="date" class="form-control" id="inputAddress2" placeholder="DD/MM/YY"><span class="help-block" style="color:red"><i><?php echo $date_err; ?></i></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Describe the Incident</label>
                            <input type="text" name="desc" class="form-control" id="inputAddress2" placeholder="Explain in details how the theft occured." style="length:100px;"><span class="help-block" style="color:red"><i><?php echo $desc_err; ?></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">Check if the claim form was submitted</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg" name="insert">Insert Claim</button>
                    <button type="rest" class="btn btn-outline-secondary btn-md" name="insert">Reset</button>
                </form><br><br><button class="btn btn btn-outline-danger">
                    <span class="help-block" style="color:red"><i><?php echo $unknown_err; ?></i></span>
                    <span class="help-block" style="color:green"><i><?php echo $success; ?></i></span></button>
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
                     
                    
                   