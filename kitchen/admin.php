<?php 
include 'db_connect.php'; 

$qry = $conn->query("SELECT * FROM `hotel_info`");
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}

?>
    
      <div class="row">
          <div class="col-md-4">

          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $name ?></h3>
                
              </div>
              <div class="widget-user-image">
                <img class="img-fluid" src="menu/<?php  echo $photo ?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                        
                                    <?php
                  $Revenue = $conn->query("SELECT sum(`total`) as `Revenue` from `order_details` where paid='1' ")->fetch_object()->Revenue; 
                  
                  ?>
                      <h5 class="description-header"><?php echo $Revenue  ?></h5>
                      <span class="description-text">Revenue</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                                 <?php
                  $Room = $conn->query("SELECT count(`id`) as 'room' from  `qrcode` ")->fetch_object()->room; 
                  
                  ?>
                      <h5 class="description-header"><?php echo $Room ?></h5>
                      <span class="description-text">Room</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                        <?php
                  $active = $conn->query("SELECT count(`id`) as 'active' from  `food_items`  ")->fetch_object()->active; 
                  
                  ?>
                      <h5 class="description-header"><?php  echo $active ?></h5>
                      <span class="description-text">Food</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">

          
          </div>
          <!-- /.col -->
        </div>
        
        
        
        
        
        