<?php  
session_start();
include('header.php');
include('db/db.php');
if(isset($_SESSION['admin'])){
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
    <title><?php echo $name ?>:: Details</title>
</head>
<body>
    <div class="jumbotron">
        <div class="card">
        <div class="card-title"> <h3 class="text-center"><?php echo $name?> Info</h3></div>
      <div class="card-body">
      <h4>Address : <?php echo $applicant['address'] ?></h4>
      <h4>City : <?php echo $applicant['city'] ?></h4>
      <h4>State : <?php echo $applicant['state'] ?></h4>
      <h4>Country : <?php echo $applicant['country'] ?></h4>
      <h4>Email : <?php echo $applicant['email'] ?></h4>
      <h4>Phone Number : <?php echo $applicant['phone'] ?></h4>
      <h4>BVN : <?php echo $applicant['bvn'] ?></h4>
      <h4>National ID : <a href="upload/<?php echo $applicant['nationalid']?>" download><?php echo $applicant['nationalid']?></a> </h4>
      <h4>CV : <a href="upload/<?php echo $applicant['cv']?>" download><?php echo $applicant['cv']?></a> </h4>
      <h4>Gender : <?php echo $applicant['gender'] ?></h4>
      <h4>Date Apply : <?php echo $applicant['reg_date'] ?></h4>
      
      </div>

    </div> 
  </div>
        </div>

    </div>
</body>
</html>
<?php 
    include('footer.php');
    
}
        
else{
    
    header('location:index.php');
}

?>