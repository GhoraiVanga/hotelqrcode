<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `qrcode` WHERE id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 
?>

<div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header bg-secondary">
                <div class="user-block ">
                <h2 style="text-align:center">QR Code For Room No:  <?php echo  $room ?> </h2>
               
                </div>
                
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              
                </div>
                <!-- /.card-tools -->
              </div>

    <!-- Card Body -->
    <div class="card-body">

	<div class="qr-field">
				
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:220px;">
							<?php echo '<img src="QRCODE/'. @$room.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-default submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $room; ?>.png ">Download QR Code</a>
				</center>
			</div>
</div>
 </div>
</div>

<!-- Submit Button Hiding -->
<script>

document.getElementById('submit').style.visibility='hidden';
</script>