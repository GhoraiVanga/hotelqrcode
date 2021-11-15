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
                <table id="example1" class="table table-bordered table-striped dataTable">
                  <thead>
                  <tr>
                    <th>Room No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Check-IN</th>
                    <th>Check-OUT</th>
                    <th>Bill Amount</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT * FROM `room` order by `id` desc ");
		while($row=$course->fetch_assoc()):
		?>
		
		
  
            <tr>
                <td><?php echo $row['roomno']  ?></td>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['address']  ?></td>
                <td><?php echo $row['checkin']  ?></td>
                <td><?php echo $row['checkout']  ?></td>
                 <td>&#8377; <?php echo $row['price']  ?></td>
                
                
                
                
                
          
               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_roominvoice" type="button" data-id="<?php echo $row['id'] ?>" >View Invoice</button>
				
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


//	$('.edit_roominvoice').click(function(){
$(".dataTable").on('click','.edit_roominvoice', function () {
	    
		uni_modal("Manage Invoice","generate_room_invoice.php?id="+$(this).attr('data-id'),'large')
		
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




