<?php
 require "./db/config.php";

if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $policyno = $_POST['policyno'];
    $claimno = $_POST['claimno'];
    $claimcategory = $_POST['claimcategory'];
    $county = $_POST['county'];
    $date_submitted = $_POST['date'];
    $errors = array(); 

if(empty($name)){
    array_push($errors, "Client's Full names are required");
}
    if(empty($email)){
    array_push($errors, "Client's Email address is required");
}
    if(empty($phone)){
    array_push($errors, "Client's phone number is required");
}
    if(empty($policyno)){
    array_push($errors, "Client's policy number is required");
}
    if(empty($claimno)){
    array_push($errors, "Client's policy number is required");
}
    if(empty($claimcategory)){
    array_push($errors, "Client's claim category is required");
}
    if(empty($date_submitted)){
    array_push($errors, "Client's date of claim submmission is required");
}
    if(count($errors) == 0){
       
        $sql = "INSERT INTO `claims`(`id`, `names`, `email`, `phone number`, `policy number`, `claim category`, `county`, `date`, `claim number`, `address`) VALUES('',$name,$email,$phone,$policyno,$claimcategory,$county, $date_submitted, $claimno, $address)";

      if (isset($conn,$sql) === TRUE) {
       echo "New record created successfully";
           } else {
         array_push($errors, "There were errors during the execution of the query");
           }
       
         }

 
           }



?>