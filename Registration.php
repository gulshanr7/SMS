<?php

include "header.php";
?>


<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <!-- <div class="col-xl-6 d-none d-xl-block">
              <img src="images/RegIstraion_STUDENTS.PNG"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div> -->
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
                    <select class="form-control">
                      <option value="">Select Class</option>
                      <option value="2">Option 1</option>
                      <option value="3">Option 2</option>
                      <option value="4">Option 3</option>
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
                    <input class="form-control-file" type="file" id="form3Example90" name="Profile_Picture"/>

                  </div>
                </div>





                <div class="d-flex justify-content-end ">
                  
                  <input type="submit" class="btn btn-primary ms-2" name="submit" value="Submit">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

include "footer.php";
?>