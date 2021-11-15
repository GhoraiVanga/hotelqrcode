<div class="sidebar">
      <!-- Sidebar user (optional) -->
   <!--   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Wekart Incorporation</a>
        </div>
      </div>   --?

      <!-- SidebarSearch Form -->
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item nav-home">
            <a href="index.php?page=home" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
   
          </li><li class="nav-item nav-info ">
            <a href="index.php?page=info" class="nav-link nav-info ">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Hotel Details
                
              </p>
            </a>
   
          </li>
       
          <li class="nav-item nav-menu">
            <a href="" class="nav-link nav-list nav-menu" >
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Manage Menu Card
                <i class="fas fa-angle-down right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=menu" class="nav-link nav-menu">
                    <i class="nav-icon fas fa-hamburger"></i>
                  
                  <p>Food Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=list" class="nav-link nav-list">
                    <i class="nav-icon fas fa-cookie-bite"></i>
                  
                  <p>Food List</p>
                </a>
              </li>
          
      
            </ul>

          </li>
          
          
          
          <li class="nav-item nav-qrcode ">
            <a href="index.php?page=qrcode" class="nav-link nav-qrcode ">
            <i class=" nav-icon fas fa-qrcode"></i>
              <p>
               Generate QR Code 
                
              </p>
            </a>
   
          </li>

          <li class="nav-item nav-viewcode ">
            <a href="index.php?page=viewcode" class="nav-link nav-viewcode ">
            <i class=" nav-icon fas fa fa-link"></i>
              <p>
              Manage QR Code 
                
              </p>
            </a>
   
          </li>


          <li class="nav-item nav-order ">
            <a href="index.php?page=order" class="nav-link nav-order ">
              <i class="nav-icon fa fa-barcode"></i>
              <p>
                Manage Orders
                
              </p>
            </a>
   
          </li>
              
          
            <li class="nav-item nav-invoice ">
            <a href="index.php?page=invoice" class="nav-link nav-invoice ">
            <i class=" nav-icon fa fa-shopping-cart"></i>
              <p>
              Guest Checkout 
                
              </p>
            </a>
   
          </li>
          
            <li class="nav-item nav-invoice ">
            <a href="index.php?page=paid_invoice" class="nav-link nav-paid_invoice ">
            <i class=" nav-icon fas fa-file-invoice"></i>
              <p>
              Print Food Invoice
                
              </p>
            </a>
   
          </li>
       
          
           <li class="nav-item nav-room ">
            <a href="index.php?page=room" class="nav-link nav-room ">
            <i class=" nav-icon fas fa fa-door-open "></i>
              <p>
               Available Rooms
                
              </p>
            </a>
   
          </li>
          
          
          
          
        <li class="nav-item nav-qrcode ">
            <a href="index.php?page=customer_invoice" class="nav-link nav-customer_invoice ">
            <i class=" nav-icon fas fa fa-users "></i>
              <p>
              Add Guest Details
                
              </p>
            </a>
   
          </li>
          
          
        <li class="nav-item nav-qrcode ">
            <a href="index.php?page=customer_invoice_generate" class="nav-link nav-customer_invoice_generate">
            <i class=" nav-icon fas fa fa-book "></i>
              <p>
              Print Room Invoice
                
              </p>
            </a>
   
          </li>
          
         <li class="nav-item nav-qrcode ">
            <a href="index.php?page=password" class="nav-link nav-password ">
            <i class=" nav-icon  fas fa-cog"></i>
              <p>
               Change  Password
                
              </p>
            </a>
   
          </li>
          
          
           <li class="nav-item nav-qrcode ">
            <a href="index.php?page=cook_password" class="nav-link nav-cook_password ">
            <i class=" nav-icon  fas fa-cog"></i>
              <p>
                Kitchen Password
                
              </p>
            </a>
   
          </li>
          
          
          <li class="nav-item nav-qrcode ">
            <a href="index.php?page=logout" class="nav-link nav-logout ">
            <i class=" nav-icon fas fa-power-off "></i>
              <p>
               Logout
                
              </p>
            </a>
   
          </li>
          
          
          <li class="nav-item nav-wekart ">
            <a href="index.php?page=wekart" class="nav-link nav-wekart">
            <i class=" nav-icon fab fa-wikipedia-w "></i>
              <p>
              Wekart Support
                
              </p>
            </a>
   
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>



 <script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>