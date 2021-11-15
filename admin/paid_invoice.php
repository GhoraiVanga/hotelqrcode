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
                    <th>Invoice ID</th>
                    <th>Total</th>
                    <th>Customaer Name</th>
                    <th>Mobile Number</th>
                     <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT * FROM `invoice` ORDER BY  `id` DESC ");
		while($row=$course->fetch_assoc()):
		?>
		
		
  
            <tr>
                <td><?php echo $row['roomno']  ?></td>
                <td><?php echo $row['id']  ?></td>
                <td> <?php echo $row['total']  ?></td>
                <td> <?php echo $row['customaername']  ?></td>
                <td><?php echo $row['phnumber']  ?></td>
                <td class="text-center">
                            
                 <span class="badge badge-success">paid</span>
                               
                </td>
               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_category" type="button" data-id="<?php echo $row['id'] ?>" >Show Invoice</button>
				
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



//	$('.edit_category').click(function(){
$(".dataTable").on('click','.edit_category', function () {
		uni_modal("Manage Invoice","generate_paid_invoice.php?id="+$(this).attr('data-id'),'large')
		
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