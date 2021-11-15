<?php
error_reporting(0);
include('libs/phpqrcode/qrlib.php'); 
include("db_connect.php");



if(isset($_POST['submit']) ) {
	$tempDir = 'QRCODE/'; 
	$room = $_POST['room'];
	$link=  $_POST['link'];
	$filename =$room;
  //$codeContents =$link;

  //encripted Id 

  $string = $room ;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'SUMANGHORAI'; // user define private key
    $secret_iv = 's1f4r8p9'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $encrypted = base64_encode($output);
    $id="?room_no=";
    $codeContents=$link ."".$id."".$encrypted ; 




  $qry = $conn->query("SELECT * FROM `qrcode`  WHERE `room`= '$room'");
  $total=$qry->num_rows > 0;
  if($total > 0)
  {
    $qry = $conn->query("UPDATE `qrcode` SET `url`='$codeContents' WHERE `room`='$room'");
    
  }
  else{

    $qry = $conn->query("INSERT INTO `qrcode`(`id`, `url`, `status`, `room`) VALUES ('','$codeContents','1','$room')");
  }
	
	  
     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>

 <?php 
         $qry = $conn->query("SELECT `base_url` FROM `hotel_info`");
      foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    
        ?>




<div class="row">
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class=" user-block d-inline-flex">
                <i class='fas fa-qrcode' style='font-size:30px;color:red'></i>
                  <span class="username"><a href="#">GENERATE YOUR QR-CODE</a></span>
                  
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
              
                </div>

               <!-- Card Body -->
            <div class="card-body">
                <form method="post" action="index.php?page=qrcode">
				
                <div class="form-group">
				
						<input type="number" class="form-control" name="room" style="width:20em;" placeholder="Enter your room no" value="<?php echo @$number; ?>" required />
					</div>
					<div class="form-group">
                   <textarea rows="5" cols="30" type="text" class="form-control" name="link" style="width:20em;" value="<?php echo $base_url ?>"  readonly><?php echo $base_url ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
            </div>


        </div>
            
            
          </div>
</div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block d-inline-flex">
               <i class='fas fa-download' style='font-size:30px;color:red'></i>
                  <span class="username"><a style="color: #007bff"> QR-CODE</a></span>
                  
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
            
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              
                </div>
                <!-- /.card-tools -->
              </div>
<style>
.qr-field {
  position: absolute;
  top: 57%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
    <!-- Card Body -->
    <div class="card-body wekart">
        <img src="Media/SCAN.png" alt="Back" style="width:100%;">
        <div class="qr-field">
			<center>
				<div class="qrframe" style="border:2px solid white; width:250px; height:250px;">
						<?php echo '<img src="QRCODE/'. @$filename.'.png" style="width:220px; height:220px;"><br>'; ?>
				</div>
			</center>
			<h5 style="text-align:center"><b>ROOM NO : <?=$room?></b></h5>
		</div>
    </div>
    
    
    
    </div>
	<center>
	 <button type="button" class="btn btn-default" onclick="myFunction()">DOWNLOAD QR-CODE</button>  
	    
	</center>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
<script src='https://superal.github.io/canvas2image/canvas2image.js'></script>
            
 <script >
 function myFunction() {
        html2canvas(document.querySelector('.wekart'), {
            onrendered: function(canvas) {
                // document.body.appendChild(canvas);
              return Canvas2Image.saveAsPNG(canvas);
            }
        });
    }


</script>           





            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


    