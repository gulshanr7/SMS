<?php
include 'header.php';
$Message='';
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['AddSlider'])){
    if(!empty($_POST['ImageName']) AND !empty($_FILES['fileToUpload']['name'])){
        $Slider_ALT=$_POST['ImageName'];
        $Slider_src=date("dmyHis") .$_FILES['fileToUpload']['name'];
       // Slider_Images
       $target_dir = "../Slider_Images/";
       $target_file = $target_dir . basename($Slider_src);
        $SliderInsert = "INSERT INTO `slider`(`Slider_Image`,`Slider_ALT`,Slider_Status) VALUES ('$Slider_src','$Slider_ALT',1)";
            $result = mysqli_query($conn,$SliderInsert);
            if ($result) {

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                $Message = '<p class="text-danger">Slider Added</p>';
            } else {
                $message='Not Added!';
            }

    }
    else{

        $Message='Enter All Fields';

    }
}

?>

<section>
  <div class="container py-5">
    <div class="row">


      <div class="col-md-4">
        <form method="POST" enctype="multipart/form-data">

          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Image Alternate Name</label>
            <input type="text" id="form1Example13" name="ImageName" class="form-control form-control-lg" />

          </div>
          <div class="mb-4">
            <label class="form-label" for="form1Example13">Selesct Slider Image</label>
            <input type="file" id="form1Example13" name="fileToUpload" class="" />
            <input type="submit" name="AddSlider" class="btn btn-success btn-lg btn-block mt-3" value="Add CLass">
          </div>
          
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
              <th>Image Name</th>
              <th>Image ALT Name</th>
              <th>Edit - Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $Select_ALL = "Select * from slider";
            $res = mysqli_query($conn, $Select_ALL);
            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
              <tr>
                <td scope="row"><?php echo $i; ?></td>
                
                <td><?php echo $row['Slider_Image']; ?></td>
                <td><?php echo $row['Slider_ALT']; ?></td>
                <td>
                  <!-- Button trigger modal -->

                  <a href="UpdateSlider.php#?Slider_id=<?php echo $row['Slider_Id'] ?>"><i class="fa fa-edit"></i></a>
                  &nbsp;&nbsp; <a href="#.php?delete_id=<?php echo $row['Slider_Id'] ?>"><i class="fa fa-trash"></i></a>
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
    </div>
</section>

<php

include 'footer.php';
?>