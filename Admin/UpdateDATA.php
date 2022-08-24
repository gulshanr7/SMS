<?php

include "header.php";
$Message = '';
date_default_timezone_set('Asia/Kolkata');
//echo date_default_timezone_get();

$GetID=$_GET['update_id'];
$SelectData = "Select Class_Name,Class_Image from classname where Id='$GetID'";
$res = mysqli_query($conn, $SelectData);
$row=mysqli_fetch_assoc($res);




if (isset($_POST['UpdateClass'])) {
  $className = $_POST['ClassName'];
  //date_default_timezone_set();
  if(isset($_FILES["fileToUpload"]["name"]))
  {
    $Class_Image = date("dmyHis").$_FILES['fileToUpload']["name"];
   
  }
  else{
  
    $Class_Image=$row['Class_Image'];
    
  }

  if (!empty($_POST['ClassName']) and !empty($Class_Image)) {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($Class_Image);
    //$uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //image Move to uploaded folder -START

    //echo "File is an image - " . $check["mime"] . ".";
    //image Move to uploaded folder -END
    $Update = "UPDATE classname SET Class_Name='$className',Class_Image='$Class_Image' WHERE Id=$GetID";
    //Record Check

    $query_Check = "Select Class_Name from classname where Class_Name='$className' AND Id!='$GetID'";
    $res = mysqli_query($conn, $query_Check);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $Message = '<p class="text-danger">Class Already Exists</p>';
    } else {
        echo $Update;
      $result = mysqli_query($conn, $Update);
      if ($result) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        header('location:AddClass.php ');
      } else {
      }
    }
  } else {
    $Message='<p class="text-danger">Enter Class Name</p>';
        
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
            <input type="text" id="form1Example13" value="<?php echo $row['Class_Name'] ?>" name="ClassName" class="form-control form-control-lg" />

          </div>
          <div class="mb-4">
            <label class="form-label" for="form1Example13">Class Image</label>
           
            <input type="file" id="form1Example13" name="fileToUpload" class="" />
            <a href="../Images/<?php echo $row['Class_Image'] ?>" target="_blank" ><img style="width:150px" src="../Images/<?php echo $row['Class_Image'] ?>" /></a>
            <?php echo $row['Class_Image'] ?>
          </div>


          <input type="submit" name="UpdateClass" class="btn btn-success btn-lg btn-block" value="Update CLass">

          <?php
          if (!empty($Message)) {
            echo $Message;
          }
          ?>


        </form>
      </div>


    </div>
</section>


<?php

?>


<?php

include "footer.php";
?>