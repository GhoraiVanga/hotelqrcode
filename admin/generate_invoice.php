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
                <div class="col-sm-4 invoice-col">
              
    To : <strong><?php echo $_GET['id'] ?></strong><br>          
                  <form action="#">
  <label for="fname">Customer Name</label>
  <input type="text" id="name" name="fname"><br><br>
  <label for="lname">Address</label>
  <input type="text" id="address" name="address">

</form>  
                    
                
                 
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice :
                      <?php
                //  $length=5;
//$min = pow(10, $length - 1) ;
  //$max = pow(10, $length) - 1;
//echo mt_rand($min, $max);  
?>
</b><br>
                  <br>
                  <b>Order Room No :</b><strong><?php echo $_GET['id'] ?></strong><br>
                 <b>Payment :</b> UnPaid<br> 
                  
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
               
            $roomno=$_GET['id'];
		$oid = $conn->query("SELECT * FROM `order_details` WHERE `roomno`='$roomno' AND paid='0' ");
		while($row1=$oid->fetch_assoc()){
		  
		
		?>
		<tr>
          <td colspan="5">ORDER OF ROOM NO : <?php echo $row1[roomno] ?> || DATE : <?php echo $row1[timeoforder] ?> </td>
        </tr>
                <?php 
                 $i = 0;
                $product = $conn->query("SELECT * FROM `order_content` WHERE `oid` = ".$row1['id']);
                while($row2 = mysqli_fetch_array($product, MYSQLI_ASSOC))
                 {
                        $i++;        
                  ?>
                
                    <tr>
                      <td><?php echo $i ?></td>
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
<!--                  <a href="index.php?page=invoice_print&id=<?php echo $_GET['id'] ?>"  rel="noopener" target="_blank" class="btn btn-default">
                      <i class="fas fa-print"></i> Print</a>
-->
                  <button type="button"  class=" rem_img btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
<script>

  $(document).ready(function(){
        $('.rem_img').click(function(){
           // _conf("Are sure to delete this image permanently?",'delete_img',["'"+$(this).attr('data-path')+"'"])
            //Notiflix.Confirm.Show( 'Notiflix Confirm', 'Do you agree with me?', 'Yes', 'No', function(){ // Yes button callback alert('Thank you.'); }, function(){ // No button callback alert('If you say so...'); } ); 

            //Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 

           // Notiflix.Confirm.Show();
         Notiflix.Confirm.Show( ' Confirm', 'Do you agree with me?', 'Yes', 'No',    function(){
        //start_loader()
         // path=$(this).attr('data-path');

         
        
         var id= <?php echo $_GET['id'] ?> ;
         var name=document.getElementById("name").value;  
         var address=document.getElementById("address").value;
         
        if(name == '' || address == ''){
        //notificationme(); 
       // toastr.error("please Fill up");
        Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 
         return true;
        }
         
        Notiflix.Loading.Hourglass('Loading...'); 

          $.ajax({
            url: 'ajax.php?action=payment_success',
            data:{'id':id,'name':name,'address':address},
            method:'POST',
            dataType:"json",
            error:err=>{
                console.log(err)
                //alert_toast("An error occured while deleting an Image","error");
                //end_loader()
                Notiflix.Notify.Success("Payment Succesfully Update.");
                Notiflix.Loading.Remove();       
                   setTimeout(function(){
                            location.reload()
                        },1000)
                
            },
            success:function(resp){
                if(resp==1){
                   //toastr.success("Data successfully saved.")
                   //Notiflix.Notify.success("Data successfully saved.");
                   Notiflix.Notify.Success("Payment Succesfully Update.");
                  // Notiflix.Report.Success( 'Data successfully saved', 'Your Data Has been Saved into Database.', 'Click' ); 

                 setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                    Notiflix.Report.Warning( 'Warning', 'Error', 'Click' ); 

               // $('#msg').html('<div class="alert alert-danger mx-2">#Category already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();
                }   
            }
        })
    }, function(){  } ); 

        })
  
    })

    
</script>
    
    
    
    
    
    
    
    