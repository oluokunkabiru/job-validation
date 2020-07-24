<?php 
session_start();
include('header.php');
include('db/db.php');
if(isset($_SESSION['admin'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmin</title>
    
</head>
<body>
    <div class="jumbotron">
        <div class="card">
            <div class="card-title"> <h1 class="text-center font-weight-bold">Applicant</h1></div>
            <div class="card-body">
            <div class="container">         
  <table class="table table-striped table-sm-responsive">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>National ID</th>
        <th>CV</th>
        <th>More</th>
       
      </tr>
    </thead>
    <tbody>
        <?php 
            $query = mysqli_query($conn, "SELECT* FROM applicant");
            $no =0;
            while($applicant=mysqli_fetch_array($query)){
                $name = "";
                $names = explode(",", $applicant['name']);
                foreach($names as $nam){
                    $name .=$nam.' '; 
                }
                $id = $applicant['applicantid'];
                $cv =$applicant['cv'];
                $nid =$applicant['nationalid'];
                // echo $nid.'<br>'.$cv.'<br>'.$id;

                echo '<tr>
                <td>'.++$no.'</td>
                <td>'.$name.'</td>
                <td>'.$applicant['email'].'</td>
                <td>'.$applicant['phone'].'</td>
                <td><a href="upload/'.$nid.'" download>'.$nid.'</a> </td>
                <td><a href="upload/'.$cv.'" download>'.$cv.'</a> </td>
                <td><a href="detail.php?applicant='.$id.'">View More</a> </td>
                </tr>';
            }
        ?>
      <tr>
       
      </tr>
    </tbody>
  </table>
</div>

            </div>
        </div>
       

    </div>
</body>
</html>
<?php include('footer.php'); 

        }
        
        else{
            
            header('location:index.php');
        }?>
