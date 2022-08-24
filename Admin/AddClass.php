<?php

include "header.php";
$Message = '';
date_default_timezone_set('Asia/Kolkata');
//echo date_default_timezone_get();

if (isset($_POST['AddClass'])) {
  $className = $_POST['ClassName'];
  //date_default_timezone_set();

  $Class_Image = date("dmyHis") . $_FILES['fileToUpload']["name"];

  if (!empty($_POST['ClassName']) and !empty($Class_Image)) {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($Class_Image);
    //$uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //image Move to uploaded folder -START

    //echo "File is an image - " . $check["mime"] . ".";
    //image Move to uploaded folder -END
    $query = "INSERT INTO `classname`(`Class_Name`,`Class_Image`) VALUES ('$className','$Class_Image')";
    //Record Check

    $query_Check = "Select Class_Name from classname where Class_Name='$className'";
    $res = mysqli_query($conn, $query_Check);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $Message = '<p class="text-danger">Class Already Exists</p>';
    } else {
      $result = mysqli_query($conn, $query);
      if ($result) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $Message = '<p class="text-danger">Class Added</p>';
      } else {
      }
    }
  } else {
    // $Message='<p class="text-danger">Enter Class Name</p>';
    $message = $Class_Image;
  }
}

?>


<section>
  <div class="container py-5">
    <div class="row">


      <div class="col-md-4">
        <form method="POST" enctype="multipart/form-data">

          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Class Name</label>
            <input type="text" id="form1Example13" name="ClassName" class="form-control form-control-lg" />

          </div>
          <div class="mb-4">
            <label class="form-label" for="form1Example13">Class Image</label>
            <input type="file" id="form1Example13" name="fileToUpload" class="" />

          </div>


          <input type="submit" name="AddClass" class="btn btn-success btn-lg btn-block" value="Add CLass">

          <?php
          if (!empty($Message)) {
            echo $Message;
          }
          ?>


        </form>
      </div>
      <div class="col-md-8">
        <table class="table table-bordered table-hover table-striped">
          <h4>All Classes</h4>
          <thead>
            <tr>

              <th>Sr. No</th>
              <?php
              $sql = "SHOW COLUMNS FROM classname";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
              ?>

                <th><?php echo $row['Field']; ?></th>
              <?php } ?>
              <th>Edit - Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $Select_ALL = "Select * from classname";
            $res = mysqli_query($conn, $Select_ALL);
            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
              <tr>
                <td scope="row"><?php echo $i; ?></td>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Class_Name']; ?></td>
                <td><?php echo $row['Class_Image']; ?></td>
                <td>
                  <!-- Button trigger modal -->

                  <a href="UPdateDATA.php?update_id=<?php echo $row['Id'] ?>"><i class="fa fa-edit"></i></a>
                  &nbsp;&nbsp; <a href="Manage_Class.php?delete_id=<?php echo $row['Id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php
              $i++;
            }
            ?>
          </tbody>
        </table>

      </div>

    </div>
</section>


<?php

?>


<?php

include "footer.php";
?>