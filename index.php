<?php

include "header.php";





?>

<!-- Slider Here -->

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php
              $sql = "Select * from slider where Slider_Status='1'";
              $result = mysqli_query($conn, $sql);
              
              
            if($count=mysqli_num_rows($result)>0){

                $i=0;
              while ($row = mysqli_fetch_array($result)) {
             

                       if($i==0)
                       {
                        echo ' <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
                       }
                  
                        else{
                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class=""></li>';
                        }
                $i++;
            }
                } ?>
                    </ol>

                    <div class="carousel-inner">
                       
                        <?php
              $sql = "Select * from slider where Slider_Status='1'";
              $result = mysqli_query($conn, $sql);
              
              
            if($count=mysqli_num_rows($result)>0){
            $i=0;
                while ($row = mysqli_fetch_array($result)) {

                    if($i==0){
                        echo ' 
                        <div class="carousel-item active">
                        <img class="img-fluid w-100"  src="Slider_images/'.$row['Slider_Image'].'" alt="'.$row['Slider_ALT'].'">
                        </div>  
                        ';
                    }
                    else{
                        echo ' 
                        <div class="carousel-item">
                        <img class="img-fluid w-100"  src="Slider_images/'.$row['Slider_Image'].'" alt="'.$row['Slider_ALT'].'">
                        </div>  
                        ';
                    }
                    $i++;    
                }
               

            }
                           ?>



                                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        
        </div>
    </div>

<!-- Slides Code End Here -->

<?php

include "footer.php";
?>
      
