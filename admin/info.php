      <center><h1> HOTEL INFO </h1></center>
      <?php include('db_connect.php');?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Category: Menu catagory</h3>
                <?php
$qry = $conn->query("SELECT COUNT(*) FROM `hotel_info`  ");
$info= mysqli_fetch_row($qry);
$total=$info[0];


if(!empty($total)){

?>
<?php }
else {
    
?>

<span class="float:right">
            <a class="btn bg-success btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_hotel">
					<i class="fa fa-plus"></i> New Entry
				</a></span>

<?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Hotel Name</th>
                    <th>Tag Line</th>
                    <th>Address</th>
                    <th>Working Hours</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
		$i = 1;
		$course = $conn->query("SELECT * FROM `hotel_info` ");
		while($row=$course->fetch_assoc()):
		?>
            <tr>
                <td><?php echo $row['name']  ?></td>
                <td><?php echo $row['tagline']  ?></td>
                <td><?php echo $row['address']  ?></td>
                <td><?php echo $row['working_hours']  ?></td>
                <td><?php echo $row['email']  ?></td>
                <td><?php echo $row['phone']  ?></td>
<td>
                <center>    <img src="menu/<?php echo $row['photo']; ?>" style="width:50px;height:50px!important;border-radius: 50%;" alt="[resize output image]">
               </center> 
               </td> 
               <td class="text-center">
				<button class="btn btn-sm btn-outline-primary edit_hotel" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
				<button class="btn btn-sm btn-outline-danger delete_hotel" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	$('#new_hotel').click(function(){
		uni_modal("Hotel Info","hotel_info.php",'large')
		
	})

	$('.edit_hotel').click(function(){
		uni_modal("Edit Hotel Information","hotel_info.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.delete_hotel').click(function(){
		_conf("Are you sure to delete this course?","delete_hotel",[$(this).attr('data-id')])
	})
	
	function delete_hotel($id){
		//start_load()
    Notiflix.Loading.Hourglass('Loading...');
		$.ajax({
			url:'ajax.php?action=delete_hotel',
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




     