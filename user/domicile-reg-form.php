<?php 
session_start();
if(strlen($_SESSION['omrsuid']==0)) 
{
  header('location:logout.php');
} 
else
{
  if(isset($_POST['submit']))
  {
    $connection= mysqli_connect('localhost','root','','omrsdb');
    $uid=$_SESSION['omrsuid'];
    $regnumber=mt_rand(100000000, 999999999);
    $date= $_POST['date'];

    $image= $_FILES['image']['name'];
    $temp_name= $_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name, "images/$image");

    $Name= $_POST['name'];
    $fname= $_POST['f_name'];
    $Province= $_POST['province'];
    $Religion= $_POST['religion'];
    $Cast= $_POST['cast'];
    $DOB= $_POST['dob'];
    $MartialStatus= $_POST['m_status'];
    $Address= $_POST['address'];
    $remarks= "Pending";
    $Status= "Pending";

    $qryInsert= "INSERT INTO `tbldomicile`(`RegistrationNumber`, `UserID`, `image`, `Name`, `FatherName`, `Province`, `Religion`, `Cast`, `DOB`, `MartialStatus`, `Address`, `RegDate`, `Status`, `Remark`) VALUES ('$regnumber','$uid', '$image', '$Name', '$fname', '$Province', '$Religion', '$Cast', '$DOB', '$MartialStatus', '$Address', '$date', '$Status', '$remarks')";
    $run= mysqli_query($connection, $qryInsert);
    if($run) 
    {
      echo "<script>alert('inserted');</script>";
      header('location:status-domicile-application.php');
    }
    else
    {
      echo "<script>alert('SomeThing Wrong');</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Marriage Registration System !! Form</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">
    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
</head>
<body>
   <?php
include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>
	<div class="am-pagetitle">
      <h5 class="am-title">Domicile Registration Form</h5>

    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

      

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h3>Domicile Registration Form</h3>
               <form id="basic-form" action="domicile-reg-form.php" method="post" enctype="multipart/form-data">
      
                <div class="row">
                  <label class="col-sm-4 form-control-label">Date of Submission: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="date">
                  </div>
                </div>


                <!-- wd-200 -->
                <h3  class="card-body-title" style="padding-top: 20px;color: red">Applicant Details</h3>
                <hr />
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Photo: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="file" name="image" value="" class="form-control" required='true'>
                  </div>
                </div><!-- row -->

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="name" value="" class="form-control" required='true'>
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Father Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="f_name" value="" class="form-control" required='true'>
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Province: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select type="text" name="province" value="" class="form-control" required='true'>
                      <option value="">Select Status</option>
                      <option value="Bachelor">KPK</option>
                      <option value="Married">Punjab</option>
                      <option value="Divorsee">Sindh</option>
                      <option value="Widower">Balochistan</option>
                    </select>
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Religion: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="religion" value="" class="form-control" required='true'>
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Cast: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="cast" placeholder="i.e Khattak, Wazir, Punjabi, Sindhi" value="" class="form-control" required='true'>
                  </div>
                </div>


                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" id="hdob" name="dob">
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Marital Status Before Marriage: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select type="text" name="m_status" value="" class="form-control" required='true'>
                      <option value="">Select Status</option>
                      <option value="Bachelor">Bachelor</option>
                      <option value="Married">Married</option>
                      <option value="Divorsee">Divorsee</option>
                      <option value="Widower">Widower</option>
                    </select>
                  </div>
                </div>

                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <textarea type="file" name="address" value="" required="true" class="form-control"></textarea>
                  </div>
                </div>
              
                <div class="form-layout-footer mg-t-30">
                  <p style="text-align: center;">
                    <button class="btn btn-info mg-r-5" name="submit" id="submit">Submit</button>
                  </p>
                </div>
                </form>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->
      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>
    <script>  
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

      $('#datepickerNoOfMonths').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        numberOfMonths: 2
      })
      $('.hdob').datepicker({
        multidate: true,
        format: 'yyyy-mm-dd'
      });
   </script>
    
  </body>
</html>
<?php }?>