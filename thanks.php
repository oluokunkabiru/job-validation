<?php 
session_start();
if(!empty($_SESSION['applicant'])){
include('header.php');
include('db/db.php'); 
$applicantid = $_SESSION['applicant'];
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
    <title>Index::Advance Information</title>
</head>
<body>
<div class="jumbotron">
  <div class="container">
      <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header"><h3 class="font-weight-bold text-center">Application Form</h3></div>
                  <div class="card-body text center">
                      <h5><i>Dear </i> <b><?php echo $name ?></b>, Thanks for Applying this job.</h5>
                      <h4>We will get back to you </h4>
                      <a href="#view" class="btn btn-primary text-center" data-toggle="collapse">View Your details</a>
                  </div>
                </div>

          </div>

          <div class="col-md-3"></div>
      </div>

      <!-- The Modal -->
  <div id="view" class="collapse card">
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
</body>
</html>
<?php include('footer.php') ;
}
else{
    header('location:index.php');
}
?>
