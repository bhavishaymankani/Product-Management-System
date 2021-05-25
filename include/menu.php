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
            <a  href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="purchase_order.php?id=<?php echo $poid+1; ?>">
              <i class="fa fa-th"></i>
              <span>Generate PO</span>
              </a>
          </li>
          <li>
            <a href="generate-po.php">
              <i class="fa fa-eye"></i>
              <span>View All PO</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Products</span>
              </a>
            <ul class="sub">
              <li><a href="add-product.php">Add Product</a></li>
              <li class=""><a href="view-products.php">View All Products</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Party</span>
              </a>
            <ul class="sub">
              <li><a href="new-party.php">Add New Party</a></li>
              <li class=""><a href="view-all-party.php">View All Party</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Department</span>
              </a>
            <ul class="sub">
              <li><a href="add-department.php">Add Department</a></li>
              <li class=""><a href="view-department.php">View All Departments</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Staff</span>
              </a>
            <ul class="sub">
              <li><a href="add-staff.php">Add Staff</a></li>
              <li class=""><a href="view-staff.php">View All Staffs</a></li>
            </ul>
          </li>
           <li>
            <a href="profile.php">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
              
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->