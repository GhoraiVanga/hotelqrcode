<?php include('db_connect.php');?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Category: Food List</h3>
                <span class="float:right">
            <a class="btn bg-success btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_list">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Food Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Status</th>
                     <th>Available</th>
                     <th>Images </th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT * FROM `food_items`  order by id asc ");
		while($row=$course->fetch_assoc()):
		?>
            <tr>
                <td><?php echo $row['title']  ?></td>
                <td><?php echo $row['type']  ?></td>
                <td><?php echo $row['price']  ?></td>
                <td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                </td>
                <td class="text-center">
                                <?php if($row['available'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                </td>
                
                <td>
               <center>    <img src="menu/<?php echo $row['photo']; ?>" style="width:50px;height:50px!important;border-radius: 50%;" alt="[resize output image]">
               </center> 
            </td>


               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_food" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
				<button class="btn btn-sm btn-outline-danger delete_food" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	$('#new_list').click(function(){
		uni_modal("New Food","new_list.php",'large')
		
	})

	$('.edit_food').click(function(){
		uni_modal("Manage Food","new_list.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.delete_food').click(function(){
		_conf("Are you sure to delete this food?","delete_food",[$(this).attr('data-id')])
	})
	
	function delete_food($id){
	//	start_load()
  Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
			url:'ajax.php?action=delete_food',
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
