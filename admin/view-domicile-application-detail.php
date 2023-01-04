<?php
session_start();
include('includes/db2.php');
$gid=$_GET['view'];

if (strlen($_SESSION['omrsaid']==0)) 
{
  header('location:logout.php');
} 
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System || View Marriage Application</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

<?php 
include_once('includes/header.php');
include_once('includes/sidebar.php');
?>


    <div class="am-pagetitle">
      <h5 class="am-title">View Domicile Application</h5>
     
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">View Domicile Application</h6>
          <div class="table-wrapper" style="padding-top: 20px">
<?php 
$slt= "SELECT * FROM `tbldomicile` WHERE id= '$gid'";
$run= mysqli_query($connection, $slt);
while ($row= mysqli_fetch_array($run)) 
{
  $id= $row['id'];
  $reg= $row['RegistrationNumber'];
  $image= $row['image'];
  $name= $row['Name'];
  $fname= $row['FatherName'];
  $province= $row['Province'];
  $religion= $row['Religion'];
  $mstatus= $row['MartialStatus'];
  $cast= $row['Cast'];
  $dob= $row['DOB'];
  $address= $row['Address'];
  $rdate= $row['RegDate'];
  $status= $row['Status'];
  $remark= $row['Remark'];
}
?>            
            
 <table border="1" class="table table-bordered">
  <tr align="center">
    <td colspan="8" style="font-size:20px;color:red">Registration Number: <?php echo $reg; ?></td>
  </tr>

  <tr align="center">
    <td colspan="9" style="font-size:20px;color:blue">User Details</td>
  </tr>

  <tr>
    <th>Name:</th>
    <td><?php echo $name; ?></td>
    <th>F/Name:</th>
    <td><?php echo $fname; ?></td>
    <th>Martial Status:</th>
    <td><?php echo $mstatus; ?></td>
    <td rowspan="2"><img src="../user/images/<?php echo $image; ?>" width="100px" height="100px"></td>
  </tr>
  <tr>
    <th>Cast:</th>
    <td><?php echo $cast; ?></td>
    <th>DOB:</th>
    <td><?php echo $dob; ?></td>
    <th>Province:</th>
    <td><?php echo $province; ?></td>
  </tr>
  <tr>
    <th>Address:</th>
    <td><?php echo $address; ?></td>
  </tr>
  <tr>
    <th>Status:</th>
    <td>
      <?php
      if($status == "Verified")
      {
        echo "<font color='green'>Application has been verified</font>";
      }
      else
      {
        echo "<font color='red'>Application has been Pending</font>";
      }
      ?>
    </td>
    <th>Remarks:</th>
    <td>
      <?php
      if($remark == "Pending")
      {
        echo "<font color='red'>Still Pending</font>";
      }
      else
      {
        echo "<font color='green'>Done</font>";
      }
      ?>
    </td>
  </tr>
 </table>

 <?php
if ($status== "Pending"){
?> 
<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  
<?php } ?>


<!-- verification Form --> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
  <div class="modal-body">
  <table class="table table-bordered table-hover data-tables">

    <form method="post" name="submit">                          
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr> 
   
 
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control" required="true" >
     <option value="Verified" selected="true">Verified</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->

    
      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
<?php
if(isset($_POST['submit']))
  {
    $update_status=$_POST['status'];
    $update_remark=$_POST['remark'];
    $usql= "update tbldomicile set Status='$update_status', Remark='$update_remark' where id='$gid'";
    $query= mysqli_query($connection, $usql);
    if($query)
    {
    echo '<script>alert("Remark has been updated")</script>';
    
    }
  }
?>
<?php }?>