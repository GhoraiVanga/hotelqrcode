<?php include('db_connect.php');?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Rooms</h3>
		<!-- <div class="card-tools">
			<a href="?page=order/manage_order" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
		
        <div class="container-fluid">
		<table id="example1" class="table table-bordered table-stripped dataTable">

				<thead>
					<tr>
						<th>#</th>
						<th>ROOM</th>
						<th>URL</th>
                        <th>STATUS</th>
						<th>ACTION</th>
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
							<td class="text-right"><a href=<?php echo $row['url'] ?> target="_blank">GO</a></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge  badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
					
                            <td class="text-center">
				<button class="btn btn-sm btn-outline-success view_qr" type="button" data-id="<?php echo $row['id'] ?>" ><i class="fa fa-eye"></i></button>
                <button class="btn btn-sm btn-outline-primary update_link" id="update_link" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
				<button class="btn btn-sm btn-outline-danger delete_qrcode" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
				</td>



						</tr>
               
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>


<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
//	$('.update_link').click(function(){
$(".dataTable").on('click','.update_link', function () { 
		uni_modal("update_link","update_link.php?id="+$(this).attr('data-id'))
		
	})

//	$('.view_qr').click(function(){
$(".dataTable").on('click','.view_qr', function () { 
		uni_modal("View QR Code","view_qr.php?id="+$(this).attr('data-id'),'large')
		
	})
//	$('.delete_qrcode').click(function(){
$(".dataTable").on('click','.delete_qrcode', function () { 
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
          Notiflix.Notify.Success('QR Code successfully deleted');
				
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

