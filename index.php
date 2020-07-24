<?php include('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index::Basic Information</title>
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
                      <p class="text-danger basicerror"></p>
                        <form action="" id="basic">
                            <div class="form-group">
                                <label for="usr">Surname</label>
                                <input type="text" class="form-control" id="usr" name="sname" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <label for="usr">Firstname</label>
                                <input type="text" class="form-control" id="usr" name="fname" placeholder="Firstname">
                            </div>
                            <div class="form-group">
                                <label for="usr">Lastname</label>
                                <input type="text" class="form-control" id="usr" name="lname"  placeholder="Lastname">
                            </div>
                            <div class="form-group">
                                <label for="usr">Email</label>
                                <input type="email" class="form-control" id="usr" name="email"  placeholder="Email">
                            </div>
                            <label for="">Gender</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                  <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" checked>Male
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                  <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female">Female
                                </label>
                              </div>
                            <div class="form-group">
                                <label for="usr">Phone Number</label>
                                <input type="tel" class="form-control" id="usr" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" rows="5" id="comment" name="address"></textarea>
                            </div> 
                            <input type="hidden" value="basicinfo" name="basicinfo">
                            <button class="btn btn-primary btn-block" id="basickbtn" name="basickbtn">Submit</button>
                        </form>
                  </div>
                </div>

          </div>

          <div class="col-md-3"></div>
      </div>
  </div>
</div>
</body>
</html>
<?php include('footer.php') ?>