 <div class="am-header">
      <div class="am-header-left">
        <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
        <a href="index.html" class="am-logo">Welcome To DM  System</a>
      </div><!-- am-header-left -->

      <div class="am-header-right">
        <div class="dropdown dropdown-notification">
          <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-bell-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
<?php
$connection= mysqli_connect('localhost','root','','omrsdb');
$aid=$_SESSION['omrsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID='$aid'";
$query = mysqli_query($connection, $sql);
$row= mysqli_fetch_array($query);
$name= $row['AdminName'];
?>
            <span class="logged-name"><span class="hidden-xs-down"><?php  echo $name;?></span> <i class="fa fa-angle-down mg-l-3"></i></span> 
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href="admin-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href="change-password.php"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- am-header-right -->
    </div><!-- am-header -->