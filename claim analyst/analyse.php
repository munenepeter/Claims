<?php
   require "includes/header.php";
   require_once "db/config.php";

if(isset($_POST['analyse'])){
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST['name'];
$recommendation= $_POST['recommendations'];


//insert into the database
$sql = "INSERT INTO `analyse`( `names`, `recommendations`) VALUES ('$name','$recommendation')";

//check for errors in the code
if ($link->query($sql) === TRUE) {
echo  "submitted successfully";
} else {
echo "Error: " . $sql . "<br>" . $link->error;
}
}
}
?>

<div class="alert alert-light" role="alert">
    <span>
        <script>
            var d = Date();
            // Converting the number of millisecond in date string 
            a = d.toString()
            // Printing the current date    
            document.write("Date: " + a)
        </script>
    </span>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="container-fluid padding">
                <div class="row padding head">
                    <div class="col-md-9 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Police abstract</h4>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitches" onclick="myFunction()">
                                    <label class="custom-control-label" for="customSwitches">Toggle If the police abstract was submitted</label>
                                </div>
                                <span id="text" style="display:none">The abstract was submiited</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function myFunction() {
                    var checkBox = document.getElementById("customSwitches");
                    var text = document.getElementById("text");
                    if (checkBox.checked == true) {
                        text.style.display = "block";
                    } else {
                        text.style.display = "none";
                    }
                }
            </script>
            <!-- policy/insurance certificate-->
            <div class="container-fluid padding">
                <div class="row padding head">
                    <div class="col-md-9 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Insurance certificate</h4>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitches1" onclick="myFunction1()">
                                    <label class="custom-control-label" for="customSwitches">Toggle If the policy/insurance certificate had not expired by the time of risk</label>
                                </div>
                                <span id="text1" style="display:none">The insurance certificate was valid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function myFunction1() {
                    var checkBox1 = document.getElementById("customSwitches1");
                    var text1 = document.getElementById("text1");
                    if (checkBox.checked == true) {
                        text.style.display = "block";
                    } else {
                        text.style.display = "none";
                    }
                }
            </script>
            <!--evidence-->
            <div class="container-fluid padding">
                <div class="row padding head">
                    <div class="col-md-9 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Proof of the risk/Damage</h4>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitches2" onclick="myFunction2()">
                                    <label class="custom-control-label" for="customSwitches">Toggle If the client submitted some proof for the occurrence of the risk</label>
                                </div>
                                <span id="text2" style="display:none">SUbstantial amount of evidence was provided</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function myFunction2() {
                    var checkBox2 = document.getElementById("customSwitches2");
                    var text2 = document.getElementById("text2");
                    if (checkBox.checked == true) {
                        text.style.display = "block";
                    } else {
                        text.style.display = "none";
                    }
                }
            </script>
            <!--clients name-->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="col-md-9 mt-5">
                <div class="input-group">
                    <label for="form19">Client's Name</label>
                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Full names">
                </div>
            </div>
            <!--REcommendations textarea-->
            <div class="col-md-9 mt-5">
                <div class="md-form amber-textarea active-amber-textarea">
                    <label for="form19">
                        <h2 class="lead"><strong>Recommendations for the claim.</strong></h2>
                    </label>
                    <textarea id="form19" class="md-textarea form-control" rows="3" name="recommendations"></textarea>
                </div>
            </div>
            <div class="col-md-10 mt-5">
                <button type="submit" class="btn btn-outline-primary btn-lg" name="analyse">Analyse</button>
            </div>
            <span style="color:green;"><?php// echo $success ?></span>
            <span style="color:red;"><?php// echo $error ?></span>
            </form>
        </div>
    </div>
</div>