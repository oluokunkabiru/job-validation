<?php
session_start();
include('db/library.php');
include('db/db.php');
$error =[];
$checkemail = new users();
$checkphone = new users();
$time = Date('Y-m-d-h-m-s');

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//   basic information datas
 if(isset($_POST['basicinfo'])){
    if(empty(testinput($_POST['sname']))){
        array_push($error,'Please Your Surname');
    }
    if(empty(testinput($_POST['lname']))){
        array_push($error,'Please Your Lastname');
    }
    if(empty(testinput($_POST['fname']))){
        array_push($error,'Please Your Firstname');
    }
    $checkemail->setCheck("applicant","email", $_POST['email']);
    $checkphone->setCheck("applicant","phone", $_POST['phone']);

    if (!preg_match("/^[a-zA-Z0-9]+\s*/",testinput($_POST["address"]))) {
    array_push($error, "Only text is allow");
    }
    if(empty(testinput($_POST['address']))){
        array_push($error,'Please Enter Your Address');
    }

    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["sname"]))) {
    array_push($error, "Only letters and white space allowed");
    }
    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["lname"]))) {
    array_push($error, "Only letters and white space allowed");
    }
    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["fname"]))) {
        array_push($error, "Only letters and white space allowed");
        }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Please enter valid email");
    }
    if(empty($_POST['phone'])){
        array_push($error,'Enter your Phone Number ');
    }
    if(empty($_POST['gender'])){
        array_push($error,'Select Gender ');
    }
    if (!preg_match("/^[0-9]*$/",testinput($_POST['phone']))) {
        array_push($error, "Only Numbers allowed");
    }
   
    if($checkemail->getCheck() >0){
        array_push($error, 'Applicant with this email already exists');
    }
    if($checkphone->getCheck() >0){
        array_push($error, 'Applicant with this phone number already exists');
    }

    foreach($error as $errors){
        echo("$errors <br>");
    }

    if(count($error)==0){
        $applicant = new users();
        $name = testinput($_POST['sname']).','. testinput($_POST['fname']). ','. testinput($_POST['lname']);
        $applicant->setName($name);
        $applicant->setEmail(testinput($_POST['email']));
        $applicant->setPhone(testinput($_POST['phone']));
        $applicant->setAddress(testinput($_POST['address']));
        $applicant->setGender(testinput($_POST['gender']));
        $name = $applicant->getName();
        $email=$applicant->getEmail();
        $phone = $applicant->getPhone();
        $address = $applicant->getAddress();
        $gender = $applicant->getGender();
        // $password = md5($applicant->getPassword());
        $applicantid = $applicant->generateid("applicant");
    
        $new = mysqli_query($conn, "INSERT INTO applicant(id, name, email, phone,gender, address, applicantid)
        VALUES('', '$name', '$email', '$phone', '$gender','$address', '$applicantid')");
        if($new){
            $_SESSION['applicant']=$applicantid;
            echo "<h2 class='text-success'>Register Successfully</h1>";
            echo '<script>
            setInterval(function(){
                location.assign("advance.php");
            }, 500);
                </script>';

        }else{
            echo "Fail to register ". mysqli_error($conn);
        }
    
    }  
    
    
    
}

// advance information datas
if(isset($_POST['advanceinfo'])){
    if(empty(testinput($_POST['city']))){
        array_push($error,'Please Supply your City');
    }
    // echo $_POST['names'];
    if(empty(testinput($_POST['state']))){
        array_push($error,'Please Supply Your State');
    }
    if(empty(testinput($_POST['country']))){
        array_push($error,'Please Your Country');
    }
    
    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["city"]))) {
    array_push($error, "Only letters and white space allowed");
    }
    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["state"]))) {
    array_push($error, "Only letters and white space allowed");
    }
    if (!preg_match("/^[a-zA-Z ]+\s*/",testinput($_POST["country"]))) {
        array_push($error, "Only letters and white space allowed");
        }
    
    if($_POST['bvnrequest']=="Yes"){
        if(empty(testinput($_POST['bvn']))){
            array_push($error,'Please Supply Your BVN');
        }
    }
    if(empty(basename($_FILES["nationalid"]["name"]))){ 
        array_push($error, "Please Upload Your Nationa ID");
    }  
    if(empty(basename($_FILES["cv"]["name"]))){ 
        array_push($error, "Please Upload Your CV");
    }             

    if(!empty(basename($_FILES["nationalid"]["name"]))){              
        $target_dir = "upload/";
        if(!is_dir($target_dir)){
            mkdir($target_dir);
        }
                        $target_file = $target_dir . basename($_FILES["nationalid"]["name"]);
                        $uploadOk = 1;
                        // echo $target_file."<br>";
        
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        // echo $imageFileType."<br>";
                        $nationalid =$_POST['name'] ." (".$time.").".$imageFileType;
                        // echo "<br> $newName <br>";
                        if(!empty($imageFileType)){
                            $check = getimagesize($_FILES["nationalid"]["tmp_name"]);
                            if($check !== false) {
                                // array_push($error, "File is an image - " . $check["mime"] . ".");
                                $uploadOk = 1;
                            } else {
                                array_push($error, "File is not an image.");
                                $uploadOk = 0;
                            }
                        
                       
                        // Check file size
                        if ($_FILES["nationalid"]["size"] > 5000000) {
                            array_push($error, "Sorry, your file is too large.");
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPEG"
                        && $imageFileType != "GIF"  && $imageFileType != "JPG" ) {
                            array_push($error, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            array_push($error, "Sorry, your file was not uploaded.");
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["nationalid"]["tmp_name"], $nationalid)) {
                                // echo "The file ". basename( $_FILES["profile_picture"]["name"]). " has been uploaded.";
                            } else {
                                array_push($error, "Sorry, there was an error uploading your file.");
                            }
                        }
                    }
                }
        
                // upload cv file
                if(!empty(basename($_FILES["cv"]["name"]))){              
                    $target_dir = "upload/";
                    if(!is_dir($target_dir)){
                        mkdir($target_dir);
                    }
                                    $target_file = $target_dir . basename($_FILES["cv"]["name"]);
                                    $uploadOk = 1;
                                    // echo $target_file."<br>";
                    
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    // Check if image file is a actual image or fake image
                                    // echo $imageFileType."<br>";
                                    $cv =$_POST['name'] ." (".$time.").".$imageFileType;
                                    // echo "<br> $newName <br>";
                                    if(!empty($imageFileType)){
                                        // $check = getimagesize($_FILES["cv"]["tmp_name"]);
                                        // if($check !== false) {
                                        //     // array_push($error, "File is an image - " . $check["mime"] . ".");
                                        //     $uploadOk = 1;
                                        // } else {
                                        //     array_push($error, "File is not accepted format.");
                                        //     $uploadOk = 0;
                                        // }
                                    
                                   
                                    // Check file size
                                    if ($_FILES["cv"]["size"] > 5000000) {
                                        array_push($error, "Sorry, your file is too large.");
                                        $uploadOk = 0;
                                    }
                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "pdf" && $imageFileType != "PNG" && $imageFileType != "JPEG"
                                    && $imageFileType != "docx" && $imageFileType != "DOCX" && $imageFileType != "doc"
                                    && $imageFileType != "zip" && $imageFileType != "ZIP" && $imageFileType != "text"
                                    && $imageFileType != "PDF"  && $imageFileType != "JPG" ) {
                                        array_push($error, "Sorry, only JPG, JPEG,DOC, PDF, PNG & zip files are allowed.");
                                        $uploadOk = 0;
                                    }
                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                        array_push($error, "Sorry, your file was not uploaded.");
                                    // if everything is ok, try to upload file
                                    } else {
                                        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv)) {
                                            // echo "The file ". basename( $_FILES["profile_picture"]["name"]). " has been uploaded.";
                                        } else {
                                            array_push($error, "Sorry, there was an error uploading your file.");
                                        }
                                    }
                                }
                              }
            

      foreach($error as $errors){
        echo("$errors <br>");
    }

    if(count($error)==0){
        $applicantid = $_POST['applicantid'];
        $city = testinput($_POST['city']);
        $state = testinput($_POST['state']);
        $country = testinput($_POST['country']);
        $bvn = testinput($_POST['bvn']);
        
        
        
    
        $new = mysqli_query($conn, "UPDATE applicant SET city='$city', state ='$state',country ='$country', bvn ='$bvn',
        nationalid = '$nationalid', cv='$cv' WHERE applicantid ='$applicantid' ");
        if($new){
            echo "<h2 class='text-success'>Register Successfully</h1>";
            echo '<script>
            setInterval(function(){
                location.assign("thanks.php");
            }, 500);
                </script>';
        }else{
            echo "Fail to register ". mysqli_error($conn);
        }
    
    }  
    
    
    
}


?>