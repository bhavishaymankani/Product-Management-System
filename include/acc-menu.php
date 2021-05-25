<?php
include('connect.php');
  $q=mysqli_query($conn,"SELECT MAX(id) as id FROM purchase ")or die(mysqli_error());

  while($f=mysqli_fetch_array($q)){

  $poid=$f['id'];
}

?>


<!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo" ><img src="img/logo.png"style="width: 40px; height: 35px; " ></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- ******* MAIN SIDEBAR MENU  -->
        
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $user;?></h5>
          <li class="mt">
            <a  href="account-dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>
          
          <li>
            <a href="acc-po.php">
              <i class="fa fa-eye"></i>
              <span>View All PO</span>
              </a>
          </li>
          <li>
            <a href="acc-profile.php">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
              
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->