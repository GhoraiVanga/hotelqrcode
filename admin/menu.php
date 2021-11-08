<?php include('db_connect.php');?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Category: Menu catagory</h3>
                <span class="float:right">
            <a class="btn bg-success btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_category">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT * FROM food_category  order by id asc ");
		while($row=$course->fetch_assoc()):
		?>
            <tr>
                <td><?php echo $row['category_name']  ?></td>
                <td><?php echo $row['description']  ?></td>
                <td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_category" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
				<button class="btn btn-sm btn-outline-danger delete_category" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	$('#new_category').click(function(){
		uni_modal("New Category","new_category.php",'large')
		
	})

	$('.edit_category').click(function(){
		uni_modal("Manage Category","new_category.php?id="+$(this).attr('data-id'),'large')
		
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


