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
                      <p class="text-danger advanceerror"></p>
                        <form action="" id="advance">
                            <div class="form-group">
                                <label for="usr">City</label>
                                <input type="text" class="form-control" id="usr" name="city" placeholder="Town/City">
                            </div>
                            <input type="hidden" value="<?php echo  $name ?>" name="name">
                            <input type="hidden" value="<?php echo $applicantid ?>" name="applicantid">
                            <div class="form-group">
                                <label for="usr">State</label>
                                <input type="text" class="form-control" id="usr" name="state" placeholder="State Of Resident">
                            </div>
                            <div class="form-group">
                                <label for="usr">Country</label>
                                <input type="text" class="form-control" id="usr" name="country"  placeholder="Country Of Origin">
                            </div>
                            <div class="form-group">
                                <label for="usr">Valid National ID</label>
                                <input type="file" class="form-control" id="usr" name="nationalid"  placeholder="Valid National ID">
                            </div>
                            <div class="form-group">
                                <label for="usr">Upload Your CV</label>
                                <input type="file" class="form-control" id="usr" name="cv"  placeholder="Valid National ID">
                            </div>
                            <label for="">Do You Have BVN (for Nigerian only)</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                  <input type="radio" class="form-check-input" id="radio1" name="bvnrequest" value="Yes" checked>Yes
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                  <input type="radio" class="form-check-input" id="radio2" name="bvnrequest" value="No">No
                                </label>
                              </div>
                            <div class="form-group">
                                <label for="usr">Supply Your BVN</label>
                                <input type="number" class="form-control" id="usr" name="bvn" placeholder="Your BVN">
                            </div>
                            <label for=""><a href="#whybvn" data-toggle="modal">Why BVN ?</a></label>
                            
                            <input type="hidden" value="advanceinfo" name="advanceinfo">
                            <button class="btn btn-primary btn-block" id="advancekbtn" name="basickbtn">Submit</button>
                        </form>
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
