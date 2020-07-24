<?php  
$applicantid = $_GET['applicant'];
$select = mysqli_query($conn, "SELECT* FROM applicant WHERE applicantid='$applicantid'");
$applicant = mysqli_fetch_array($select);
$names = explode(",", $applicant['name']);
$name ="";
foreach($names as $na){
    $name .= $na .' '; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>