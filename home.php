<?php
include 'db.php';
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  //$phone = $_POST['phone'];
  $password = $_POST['password'];
  $image = $_FILES['image'];
  
  $fileName = $image['name'];
  $fileTemp = $_FILES['image']['tmp_name'];
  $fileType = explode('.', $fileName)[1];
  $imagename = 'user_' . time() . '.' . $fileType;
  
 
  
  $extension = array('jpeg', 'jpg', 'png');
  if (in_array(strtolower($fileType), $extension)) {
      $upload_image = 'images/' . $imagename;
      move_uploaded_file($fileTemp, $upload_image);
      $sql = "INSERT INTO `nwork`(
                      `first_name`,
                      `last_name`,
                      `email`,
                      -- `phone`,
                      `password`,
                      `image`) 
                      value(
                        '$fname',
                        '$lname',
                        '$email',
                        -- '$phone',
                        '$password',
                        '$upload_image')";
      $result = mysqli_query($con, $sql);
      if ($result) {
          echo '<div class="alert alert-success" role="alert">
          <strong>Success</strong>Data inserted successfully!
        </div>';
      } else {
          die(mysqli_error($con));
      }
  }
}


?>
  <!--$sql = "INSERT INTO crud (name,email,phone,password) value('$name','$email','$phone','$password')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo 'Data inserted successfully';
  } else {
    die(mysqli_error($con));
  }
}
?-->




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  <title>Crud Operation</title>
</head>

<body>

  <div class="container my-5">
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="fname" placeholder="Enter Your First Name" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
      </div>
      <!--div class="form-group">
        <label>phone</label>
        <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number" autocomplete="off">
      </div-->
      <div class="form-group">
        <label>Password</label>
        <input type="Password" class="form-control" name="password" placeholder="Enter your Password" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Profile Picture</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

  </div>

</body>

</html>