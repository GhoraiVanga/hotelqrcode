<?php include('db_connect.php');?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Category: Food List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                     <thead>
                  <tr>
                    <th>Food Name</th>
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
                <td class="text-center">
                                <?php if($row['available'] == 1): ?>
                                    <span class="badge badge-success">Available</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Unavailable</span>
                                <?php endif; ?>
                </td>
                
                <td>
               <center>    <img src="menu/<?php echo $row['photo']; ?>" style="width:50px;height:50px!important;border-radius: 50%;" alt="[resize output image]">
               </center> 
            </td>


               <td class="text-center">
				<button id="update_status"  class="btn btn-sm btn-outline-primary edit_food" type="button" data-id="<?php echo $row['id'] ?>" ><i class="fa fa-edit"></i></button>
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
    $(function(){
        $('#update_status').click(function(){
            uni_modal("Update  Order Status", "update_list_status.php?id="+$(this).attr('data-id'))
        })
    })
</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
