<?php
ob_start();
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <?php include"include/head.php";?>
 <?php
  
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 
   
   
 ?>
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- alert toast --->


<!-- alert toast End Here  --->

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include"include/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?page=home" class="brand-link">
      <img src="dist/img/hotel.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMART HOTEL</span>
    </a>

    <!-- Sidebar -->
   <?php include"include/sidebar.php" ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->
    <section class="content">

    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
  	<?php include $page.'.php' ?>

    </section>
    <!-- /.content -->


    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>




  
  </div>
  <!-- /.content-wrapper -->
<!-- This Style code for Pop up Model -->
  <style>

  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }
</style>

<!-- This Style code for Pop up Model  End Here-->

<!-- Pop Up ---->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
     
    </div>
   <center> <strong>Copyright &copy; 2021-2022 <a href="https://wekart.co.in/">WeKart Incorporation</a>.</strong></center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- pace-progress -->
<script src="plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>




<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>







<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url='',$size=""){
   // start_load()
   Notiflix.Loading.Dots('Processing...');
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
              
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
               // end_load()
               //Notiflix.Loading.Standard();
               Notiflix.Loading.Remove();
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
  
 </script>	




<script>
    $('#manage-course').on('reset',function(){
        $('#msg').html('')
        $('input:hidden').val('')
    })
 
 
 
    $('#manage-course').submit(function(e){
        e.preventDefault()
        start_load()
        $('#msg').html('')
        var value = $('#fee-list').val();
 if (value.length <=0) {
    alert_toast("Please insert atleast 1 row in the Courses table",'danger')
            end_load()
            return false;
 }
        $.ajax({
            url:'ajax.php?action=save_course',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully saved.",'success')
                        setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                $('#msg').html('<div class="alert alert-danger mx-2">Course Name & Level already exist.</div>')
                end_load()
                }   
            }
        })
    })


</script>


<?php
$qry = $conn->query("SELECT COUNT(*) FROM `order_details` order by unix_timestamp(`timeoforder`) desc ");
$rows= mysqli_fetch_row($qry);
$total=$rows[0];


?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>




<!-- Sound Notification from Start Here -->

<script>
    var TOTAL_ORDER = <?=$total?>;
    setInterval(function()
    {
        checkUpdate();
},3000);

function checkUpdate()
{
    $.post("order_process.php", function(data)
    {
		var data=jQuery.parseJSON(data);
       if (data.sound==TOTAL_ORDER)
       {
          
		

       }

       else if (data.sound>=TOTAL_ORDER)
	   {
		playSound();
	   }



    } );
}

function playSound()
{
	    // get all the order notifications
		var audioogg = new Audio('Media/call-waiter.mp3');
    //var audiomp3 = new Audio(siteurl + 'includes/assets/audio/message.mp3');
    //var callWaiterMp3 = new Audio(siteurl + 'includes/assets/audio/call-waiter.mp3');
    // var audio = new Audio('http://www.rangde.org/static/bell-ring-01.mp3');
   //audioogg.play();
  // audioogg.muted = true; // without this line it's not working although I have "muted" in HTML
   audioogg.play();
   Notiflix.Report.Success( 'New Order', 'You Have a New Order', 'View Order',  function cb() {
	window.location ="index.php?page=order"
    
  } ); 

}

</script>




</body>
</html>
