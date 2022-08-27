<?php

include "header.php";
$msg = '';
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST['submit'])) {

  if (!empty($_POST['Name']) and !empty($_POST['Father_Name']) and !empty($_POST['Mobile_Number']) and !empty($_POST['AdharCard_Number']) and !empty($_POST['Class']) and !empty($_POST['DOB']) and !empty($_POST['Password'])) {

    $name = mysqli_real_escape_string($conn, $_POST["Name"]);
    $fname = mysqli_real_escape_string($conn, $_POST["Father_Name"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["Mobile_Number"]);
    $uid = mysqli_real_escape_string($conn, $_POST["AdharCard_Number"]);
    $class = mysqli_real_escape_string($conn, $_POST["Class"]);
    $dob = mysqli_real_escape_string($conn, $_POST["DOB"]);
    $password = mysqli_real_escape_string($conn, $_POST["Password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);

    //image here
    $picture = date("dmyHis") . $_FILES['Profile_Picture']["name"];
    $target_dir = "stu_images/";
    $msg = $picture;
    $target_file = $target_dir . basename($picture);

    //$uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $query = "INSERT INTO `students`(`Name`, `Stu_PIC`, `Class_ID`, `Father_Name`, `DOB`, `CellNo`, `Adhar_card`, `Password`) VALUES ('$name','$picture','$class','$fname','$dob','$mobile','$uid','$password')";

    //$msg= $query;
    //Record Check
    $query_Check = "SELECT * FROM `students` WHERE CellNo='$mobile' OR Adhar_card='$uid'";
    $res = mysqli_query($conn, $query_Check);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $msg = '<p class="text-danger">Mobile nUmber or Adhar Card Already Exists</p>';
    } else {
      $result = mysqli_query($conn, $query);
      if ($result) {
        move_uploaded_file($_FILES["Profile_Picture"]["tmp_name"], $target_file);

        $name='';$class='';
        $msg = '<p class="text-danger">Registration Successfull..!</p>';
      }
    }
  } else {
    $msg = "in empty else";
  }
}



?>
<section class="h-100 bg-dark">
  <div class="container mb-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <!-- <div class="col-xl-6 d-none d-xl-block">
              <img src="images/RegIstraion_STUDENTS.PNG"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div> -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="col-xl-12">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Student registration form</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1m">Name</label>
                        <input type="text" id="form3Example1m" name="Name" placeholder="Enter Name" class="form-control " />

                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1n">Father Name</label>
                        <input type="text" id="form3Example1n" name="Father_Name" placeholder="Enter Father Name" class="form-control " />

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1m1">Mobile No.</label>
                        <input type="text" id="form3Example1m1" name="Mobile_Number" placeholder="Enter Mobile Number" class="form-control " />

                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1n1">AdharCard Number</label>
                        <input type="text" id="form3Example1n1" name="AdharCard_Number" placeholder="Enter AdharCard Number" class="form-control " />

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="form3Example9">Select Class</label>
                      <select name='Class' class="form-control">
                        <option value="">Select Class</option>
                        <?php
                        $select = "Select * from classname where Status='1'";
                        $res = mysqli_query($conn, $select);


                        while ($data = mysqli_fetch_assoc($res)) {
                        ?>

                          <option value="<?php echo $data['Id']; ?>"><?php echo $data['Class_Name']; ?></option>


                        <?php
                        }
                        ?>
                      </select>

                    </div>
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="form3Example9">DOB</label>
                      <input type="date" id="form3Example9" name="DOB" class="form-control " />
                    </div>
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="form3Example90">Password</label>
                      <input type="text" id="form3Example90" name="Password" placeholder="Enter your password" class="form-control " />

                    </div>
                    <div class="col-md-6 mb-4 custom-file">
                      <label class="form-label" for="form3Example90">Select Profile Picture</label>
                      <input class="form-control-file" type="file" id="form3Example90" name="Profile_Picture" />
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6 justify-content-end ">
                    <input type="submit" class="btn btn-primary w-100" name="submit" value="Submit">
                   
                  </div>
                  <div class="col-md-6 justify-content-end "> 
                    <?php echo "<b>".$msg."</b>" ?>
                  </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

include "footer.php";
?>