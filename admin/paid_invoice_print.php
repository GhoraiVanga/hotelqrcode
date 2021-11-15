  <?php 
date_default_timezone_set('Asia/Kolkata');
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `hotel_info`");
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 

$date=date('d-m-Y');
?>
 
 
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
   <!--         <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>  -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> <?php echo $name ?>
                    <small class="float-right">Date: <?php echo date('d-m-Y');  ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $name ?></strong><br>
                    <?php echo $tagline ?><br>
                    <?php echo $address ?><br>
                    Email: <?php echo $email ?><br>
                    Phone: <?php echo $phone?>
                  </address>
                </div>
                <!-- /.col -->
                
                <?php 
                $invoiceid=$_GET['id'];
                $qry = $conn->query("SELECT * FROM `invoice` WHERE `id`='$invoiceid'");
            foreach($qry->fetch_array() as $k => $val){
                $$k=$val;
           }
                
                ?>
                
                
                <div class="col-sm-4 invoice-col">
                  To : <strong><?php echo  $customaername ?></strong><br>
                  <address>
                    
                 
                     
                    Address: <?php  echo $phnumber  ?> <br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice : <?php echo $_GET['id']  ?></b><br>
                  <br>
                  <b>Order Room No :</b><strong><?php echo $roomno  ?></strong><br>
            <b>Payment :</b> Paid<br> 
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>UNIT</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
               
          //  $invoiceid=$_GET['id'];
            
	//	$oid = $conn->query("SELECT * FROM `invoice` WHERE `invoiceid`= '$invoiceid' ");
	//	while($row1=$oid->fetch_assoc()){
	

	
		  $arr = explode(',',$oid);
		  foreach($arr as $i){
		  
		  $oid = $conn->query("SELECT * FROM `order_details` WHERE `id` = '$i' ");
		  while($row1=$oid->fetch_assoc()){
		
		?>
	<tr>
          <td colspan="5">ORDER OF ROOM NO : <?php echo $row1[roomno] ?> || DATE : <?php echo $row1[timeoforder] ?> </td>
        </tr>  <?php } ?>
                <?php 
                 $id = 0;
                $product = $conn->query("SELECT * FROM `order_content` WHERE `oid` = '$i' ");
                while($row2 = mysqli_fetch_array($product, MYSQLI_ASSOC))
                 {
                        $id++;        
                  ?>
                
                    <tr>
                      <td><?php echo $id ?></td>
                      <td><?php echo $row2[food] ?></td>
                      <td><?php  echo $row2[price] ?></td>
                      <td><?php echo $row2[unit] ?></td>
                      <td><?php echo $row2[price]*$row2[unit]   ?></td>
                    </tr>
                    <?php
                    
                    $subtotal=$subtotal+($row2[price]*$row2[unit])   ;
                    } ?>  
                    <?php }?> 
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    
                    <!--    -->
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due : <?php echo $date ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Sub Total:</th>
                        <td><?php echo $subtotal ?></td>
                      </tr>
                      <tr>
                        <th>CGST @ (2.5%) On <?php echo $subtotal ?></th>
                        <td><?php echo .025* $subtotal ?></td>
                      </tr>
                      <tr>
                        <th>SGST @ (2.5%) On <?php echo $subtotal ?></th>
                        <td><?php echo .025* $subtotal ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo (.05* $subtotal)+$subtotal ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
              <center> 
              
              
              <a href="index.php?page=paid_invoice_print&id=<?php echo $_GET['id'] ?>"  rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Invoice</a>
              </center> 
         
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    

        <script>
  window.addEventListener("load", window.print());
</script>
    
    
    
    
    
    
    
    