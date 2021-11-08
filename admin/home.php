<?php include('db_connect.php');?>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <?php
                  $total = $conn->query("SELECT COUNT('id') as `total` from `order_details`  ")->fetch_object()->total; 
                  
                  ?>
                <h3><?php echo $total ?></h3>

                <p>Total Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?page=order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                       <?php
                  $Revenue = $conn->query("SELECT sum(`total`) as `Revenue` from `order_details` where paid='1' ")->fetch_object()->Revenue; 
                  
                  ?>
                <h3><?php 
                if(empty($Revenue))
                {
                    echo "0";
                }
                
                else{
                    echo $Revenue;
                }
                 ?></h3>

                <p>Total Revenue</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  
                         <?php
                  $Room = $conn->query("SELECT count(`id`) as 'room' from  `qrcode` ")->fetch_object()->room; 
                  
                  ?>   
                  
                  
                <h3><?php echo $Room; ?></h3>

                <p>Total Room</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index.php?page=viewcode" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  
                              <?php
                  $active = $conn->query("SELECT count(`id`) as 'active' from  `qrcode` where `status`='1' ")->fetch_object()->active; 
                  
                  ?>
                  
                <h3><?php  echo $active  ?></h3>

                <p>Active Room Link</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="index.php?page=viewcode" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  
                                    <?php
                  $deactive = $conn->query("SELECT count(`id`) as 'deactive' from  `qrcode` where `status`='0' ")->fetch_object()->deactive; 
                  
                  ?>
                  
                <h3><?php  echo $deactive  ?></h3>

                <p>Deactive Room Link</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?page=viewcode" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                                             <?php
                  $Factive = $conn->query("SELECT count(`id`) as 'Factive' from  `food_category` where `status`='1' ")->fetch_object()->Factive; 
                  
                  ?>  
                  
                <h3><?php echo $Factive  ?></h3>

                <p>Activate Food Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?page=menu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  
                                              <?php
                   $FDactive = $conn->query("SELECT count(`id`) as 'FDactive' from  `food_category` where `status`='0' ")->fetch_object()->FDactive; 
                  
                  ?> 
                <h3><?php  echo $FDactive;  ?></h3>

                <p>Deactive Food  Catagory</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index.php?page=menu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                   $fooditems = $conn->query("SELECT count(`id`) as 'fooditems' from  `food_items`  ")->fetch_object()->fooditems; 
                  
                  ?>
                  
                <h3><?php echo $fooditems; ?></h3>

                <p>Number Of Food Item </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="index.php?page=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Lattest Order
                </h3>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="padding:0px">
     
                <table  class="table table-bordered table-striped">
               
                  <tbody>
      	<?php 
					$i = 1;
						$qry = $conn->query("SELECT * FROM `order_details` ORDER BY id DESC LIMIT 10");
						while($row = $qry->fetch_assoc()):
					?> 
            <tr>
                <td>     <span class="handle ">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span></td>
                <td> <span class="text"> Room No : <?php echo $row['roomno'] ?></span></td>
                <td class="text-center">
                    <small class="badge badge-danger"><i class="far fa-clock"></i> <?php echo date("Y-m-d H:i",strtotime($row['timeoforder'])) ?></small> 
                            </td>
               <td class="text-center">
				<small ><?php if($row['order_status'] == 0): ?>
                                    <span class="badge badge-light">Pending</span>
                                <?php elseif($row['order_status'] == 1): ?>
                                    <span class="badge badge-primary">Packed</span>
								<?php elseif($row['order_status'] == 2): ?>
                                    <span class="badge badge-warning">Approved</span>
								<?php elseif($row['order_status'] == 3): ?>
                                    <span class="badge badge-success">Delivered</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Cancelled</span>
                                <?php endif; ?></small>
				</td>
				
				
				   <td>  <a href="index.php?page=view_order&id=<?php  echo $row[id] ?>"          <i class="fas fa-eye"></i>  </a></td>
				
              
            </tr>
         <?php endwhile; ?> 
        </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
      
     
              <!-- /.card-body -->
            
            </div>
        
        <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Active Link -->

