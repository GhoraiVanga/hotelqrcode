<?php include('db_connect.php');?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Orders</h3>
		<!-- <div class="card-tools">
			<a href="?page=order/manage_order" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Order</th>
						<th>Client</th>
						<th>Room No</th>
						<th>Total Amount</th>
						<th>Order Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * FROM `order_details` ORDER BY id DESC");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['timeoforder'])) ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['roomno'] ?></td>
							<td class="text-right"><?php echo number_format($row['total']) ?></td>
							<td class="text-center">
                                <?php if($row['mark'] == 0): ?>
                                    <span class="badge badge-danger">OLD Order</span>
                                <?php else: ?>
                                    <span class="badge badge-success">New Order</span>
                                <?php endif; ?>
                            </td>
							<td class="text-center">
                                <?php if($row['order_status'] == 0): ?>
                                    <span class="badge badge-light">Pending</span>
                                <?php elseif($row['order_status'] == 1): ?>
                                    <span class="badge badge-primary">Packed</span>
								<?php elseif($row['order_status'] == 2): ?>
                                    <span class="badge badge-warning">Approved</span>
								<?php elseif($row['order_status'] == 3): ?>
                                    <span class="badge badge-success">Delivered</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Cancelled</span>
                                <?php endif; ?>
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="index.php?page=view_order&id=<?php echo $row['id'] ?>">View Order</a>
									<?php if($row['mark'] == 1 ): ?>
				                    <a class="dropdown-item mark_order" href="javascript:void(0)"  data-id="<?php echo $row['id'] ?>">Mark as Old Order </a>
									<?php endif; ?>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>



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
   Notiflix.Report.Success( 'New Order', 'You Have a New Order', 'Click',  function cb() {
	location.reload();
    
  } ); 

}

</script>

<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this order permanently?","delete_order",[$(this).attr('data-id')])
		})
		$('.mark_order').click(function(){
			_conf("Are you sure to mark this order as  Old ?","mark_order",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	
	function mark_order($id){
		//start_loader();
		Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
		    url:'ajax.php?action=mark_order',
			method:"POST",
			data:{id: $id},
			
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(resp==1){
          //notificationme(); 
          //toastr.success("Data successfully deleted.")
          Notiflix.Notify.Success('Data successfully deleted');
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	



	function delete_order($id){
		//start_loader();
		Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
		    url:'ajax.php?action=delete_order',
			method:"POST",
			data:{id: $id},
			
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(resp==1){
          //notificationme(); 
          //toastr.success("Data successfully deleted.")
          Notiflix.Notify.Success('Order Successfully Deleted');
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}












</script>



