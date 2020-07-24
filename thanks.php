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
                  <div class="card-body">
                      <h3><i>Deal </i><?php $name ?>, Thanks for Applying this job.</h3>
                      <h4>We will get back to you </h4>
                      <a href="#view" class="btn btn-primary text-center">View Your details</a>
                  </div>
                </div>

          </div>

          <div class="col-md-3"></div>
      </div>
  </div>
  <!-- The Modal -->
<div class="modal" id="whybvn">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Why Do We Request For Your BVN?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>
            This day people have given false information about themselves and its only through your 
            BVN and national Identifiacation we can surely know more about you before you can be consider
            for this job.
        </p>
        <p>
            We have experience many false information provided by applicate many times without numbers 
            and we come up with getting to know more about you through this procedure.
        </p>
        <p class="float-right"><b><i>Thanks for your understanding</i></b></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

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
