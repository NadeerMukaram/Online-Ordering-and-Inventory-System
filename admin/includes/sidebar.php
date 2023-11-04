
 <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@500&display=swap" rel="stylesheet">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#" style="font-family: 'Jost', sans-serif;">HantechDesign</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>

      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="../../img/logo_sb.png"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo  $_SESSION["names"]?></strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Reports</span>
          </li>
          <li class="sidebar">
            <a href="dashboard.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
              
            </a>
          
          </li>
        
        
          <li class="sidebar">
            <a href="orders.php">
             <i class="fas fa-clipboard-list"></i>
              <span>Orders</span>
            </a>
         
          </li>
          
              <li class="sidebar">
            <a href="sales.php">
           <i class="fas fa-hand-holding-usd"></i>
              <span>Sales</span>
            </a>
         
          </li>
          <li class="sidebar">
            <a href="log.php">
             <i class="fas fa-clipboard-list"></i>
              <span>Logs</span>
            </a>
          
          </li>
        


          <li class="header-menu">
            <span>Manage</span>
          </li>
            <li>
            <a href="category.php">
             <i class="fas fa-sort"></i>
              <span>Category</span>
            
            </a>
          </li>
         <li>
            <a href="pcode.php">
           <i class="fas fa-tags"></i>
              <span>Promotional Codes</span>
            
            </a>
            </li> 
          </li>
            <li class="sidebar">
            <a href="products.php">
              <i class="fab fa-dropbox"></i>
              <span>Inventory</span>
              
            </a>
           
          </li>
        
            <li class="sidebar">
            <a href="accounts.php">
             <i class="fas fa-users"></i>
              <span>Accounts</span>
            </a>
          
          </li>
            
          
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#" style="cursor: default;" disabled>
        
      </a>
      <a href="#" disable style="cursor: default;">
       
      </a>
      <a href="#" style="cursor: default;">
       
      </a>
      <a href="logout.php">
        Logout
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>