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
					<col width="20%">
					<col width="20%">
					<col width="40%">
			
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>ROOM NO</th>
						<th>URL</th>
                        <th>Link Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * FROM `qrcode` ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							
							<td><?php echo $row['room'] ?></td>
							<td class="text-right"><?php echo $row['url'] ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge  badge-success">Activate</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Deactivate</span>
                                <?php endif; ?>
                            </td>
					
                            <td class="text-center">
				<button class="btn btn-sm btn-outline-primary view_qr" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
                <button class="btn btn-sm btn-outline-success update_link" id="update_link" type="button" data-id="<?php echo $row['id'] ?>">Link</button>
				<button class="btn btn-sm btn-outline-danger delete_qrcode" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
				</td>



						</tr>
               
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('.update_link').click(function(){
		uni_modal("update_link","update_link.php?id="+$(this).attr('data-id'))
		
	})

	$('.view_qr').click(function(){
		uni_modal("View Qrcode","view_qr.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.delete_qrcode').click(function(){
		_conf("Are you sure to delete this QRCODE?","delete_qrcode",[$(this).attr('data-id')])
	})
	
	function delete_qrcode($id){
		//start_load()
    Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
			url:'ajax.php?action=delete_qrcode',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
          //notificationme(); 
          //toastr.success("Data successfully deleted.")
          Notiflix.Notify.Success('Qrcode successfully deleted');
				
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

