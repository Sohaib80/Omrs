<?php
session_start();
$connection= mysqli_connect('localhost','root','','omrsdb');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System || Verified Marriage Application</title>

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

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>



    <div class="am-pagetitle">
      <h5 class="am-title">Verified Domicile Application</h5>
     
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">View Domicile Application</h6>
        

          <div class="table-wrapper" style="padding-top: 20px">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">S.No</th>
                
                  <th class="wd-15p">Reg Number</th>
                  <th class="wd-20p">Name</th>
                  <th class="wd-10p">F/Name</th>
                  <th class="wd-10p">Address</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
<?php
$uid=$_SESSION['omrsuid'];
$sql="SELECT * from tbldomicile where UserID='$uid'";
$sql_run= mysqli_query($connection, $sql);
$no= 1;
while ($row= mysqli_fetch_array($sql_run)) 
{
  $id= $row['id'];
  $regNo= $row['RegistrationNumber']; 
  $name= $row['Name']; 
  $fname= $row['FatherName']; 
  $address= $row['Address']; 
  $status= $row['Status']; 

?>
              <tr>
                <td><?php echo $no++; ?></td>
                  <td><?php echo $regNo; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $fname; ?></td>
                  <td><?php echo $address; ?></td>
                  <td><?php echo $status ?></td>
                  <?php } ?>
                   <?php if($status=="Verified"){ ?>
                  <td>
                    <a href="view-domicile-application-detail.php?viewid=<?php echo $id;?>">
                      <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                  </td>
                  <?php } else { ?> 
                    <td><i class="fa fa-exclamation-circle"></i></td>
              </tr>  
              <?php } ?> 
              </tbody>
            </table>
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
<?php }  ?>
