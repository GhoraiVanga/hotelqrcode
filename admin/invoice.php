<?php include('db_connect.php');?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title "> Invoice </h3>
         </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Room No</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT SUM(total) as total,roomno,paid FROM order_details WHERE `paid`='0' GROUP BY roomno");
		while($row=$course->fetch_assoc()):
		?>
		
		
  
            <tr>
                <td><?php echo $row['roomno']  ?></td>
                <td>&#8377; <?php echo $row['total']  ?></td>
                <td class="text-center">
                                <?php if($row['paid'] == 0): ?>
                                    <span class="badge badge-danger">unpaid</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">paid</span>
                                <?php endif; ?>
                            </td>
               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_category" type="button" data-id="<?php echo $row['roomno'] ?>" >Show Invoice</button>
				
				</td>
              
            </tr>
         <?php endwhile; ?> 
        </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          
      
        </div>
       
      </div>
     

 <script>
	$(document).ready(function(){
		$('table').dataTable()
	})


	$('.edit_category').click(function(){
		uni_modal("Manage Invoice","generate_invoice.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.delete_category').click(function(){
		_conf("Are you sure to delete this course?","delete_category",[$(this).attr('data-id')])
	})
	
	function delete_category($id){
		//start_load()
    Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
			url:'ajax.php?action=delete_category',
			method:'POST',
			data:{id:$id},
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
</script>




