<?php
// include() require(); require_once();
session_start();

if (isset($_SESSION['USER_NAME'])) {

  header('location:Admin/index.php');
}

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uNAME = $_POST["UserName"];
  $uPass = $_POST["UserPass"];

  $query = "Select id from adm_login where username='$uNAME' AND BINARY password='$uPass'";

  $LoginCheck = mysqli_query($conn, $query);
  $count = mysqli_num_rows($LoginCheck);
  if ($count == 1) {
    //session_start();
    $_SESSION['start'] = time(); // Taking now logged in time.
    // Ending a session in 30 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
    // Checking the time now when home page starts.
    $_SESSION['USER_NAME'] = $uNAME;
    header("location:Admin/index.php");
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Admin_Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="text-center bg-success text-white p-3 fixed-top">

    <h5> Admin Panel Login</h5>
  </div>


  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 col-sm-6 col-xl-5 d-none d-sm-block">
          <img src="images/login1.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-6 col-sm-6 col-xl-7">
          <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form1Example13" autocomplete="off" name="UserName" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example13">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="text" id="form1Example23" autocomplete="off" name="UserPass" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Password</label>
            </div>
            <!--
          <div class="d-flex justify-content-around align-items-center mb-4">

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>
         -->
            <input type="submit" name="login" class="btn btn-success btn-lg btn-block" value="Login">
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="text-center text-white " style="background-color: #f1f1f1;">


    <!-- Copyright -->
    <div class="text-center text-primary p-3" style="background-color: #f1f1f1;">
      Student Management System © 2022 Copyright

    </div>
    <!-- Copyright -->
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>