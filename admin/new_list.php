<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `food_items` WHERE id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 
?>
<div class="container-fluid">
    <form action="" id="list-category">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
       
        <div id="msg" class="form-group">

        </div>
        <div class="form-group">
            <label for="" class="control-label">Food Name</label>
            <input type="text" id="title" class="form-control" name="title"  value="<?php echo isset($title) ? $title :'' ?>" required>
        </div>

        <div class="form-group">
        <label for="" class="control-label">Catagory Type</label>
          <select class="custom-select selevt"   name="fcid" id="fcid" >
              <option value=" "  readonly></option>
            <?php
                    $qry = $conn->query("SELECT * FROM `food_category` order by category_name asc");
                    while($row= $qry->fetch_assoc()):
            ?>
            
            
            
              <option value="<?php echo $row['id'] ?>" <?php echo isset($id) && $fcid == $row['id'] ? 'selected' : '' ?> ><?php echo $row['category_name'] ?></option>
         <?php endwhile; ?>
           
          </select>
        </div>


        <div class="form-group">
            <label for="" class="control-label">Description</label>
            <input type="text" class="form-control" id="description"  name="description"  value="<?php echo isset($description) ? $description :'' ?>" required>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Type</label>
              <select name="type" id="status" class="custom-select selevt">
                  <option value=" "  readonly></option>
                <option value="veg" <?php echo isset($type) && $type == "veg" ? 'selected' : '' ?>>veg</option>
                <option value="nonveg" <?php echo isset($status) && $type == "nonveg" ? 'selected' : '' ?>>nonveg</option>
                </select>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">price</label>
            <input type="text" class="form-control" id="price"  name="price"  value="<?php echo isset($price) ? $price :'' ?>" required>
        </div>
         
     <!--   <div class="form-group">
            <label for="" class="control-label">price</label>
            <input type="text" class="form-control" id="price"  name="price"  value="<?php echo isset($price) ? $price :'' ?>" required>
        </div> -->

        <div class="form-group">
				<label for="status" class="control-label">Status</label>
                <select name="status" id="status" class="custom-select selevt">
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
		</div>


        <div class="form-group">
				<label for="status" class="control-label">Available</label>
                <select name="available" id="available" class="custom-select selevt">
                <option value="1" <?php echo isset($available) && $available == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?php echo isset($available) && $available == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
		</div>


        
        <div class="form-group">
				<label for="" class="control-label">Images</label>
				<div class="custom-file">
	              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" multiple accept="image/*" >
	              <label class="custom-file-label" for="customFile">Choose file</label>
	            </div>
		</div>

        <?php 
            if(!empty($photo)):
            //$upload_path = "uploads/product_".$id;
           // if(is_dir(base_app.$upload_path)): 
         ?>

<div class="d-flex w-100 align-items-center img-item">
                    <span><img src="menu/<?php echo $photo ?>" width="150px" height="100px" style="object-fit:cover;" class="img-thumbnail" alt=""></span>
                    <span class="ml-4"><button class="btn btn-sm btn-default text-danger rem_img" type="button"  id="rem_img" value="<?php echo $id ?>"><i class="fa fa-trash"></i></button></span>
</div>
<?php endif; ?>
   
    </form>
</div>






<script>
    $('#list-category').on('reset',function(){
        $('#msg').html('')
        $('input:hidden').val('')
    })

    $(document).ready(function(){
        $('.rem_img').click(function(){
           // _conf("Are sure to delete this image permanently?",'delete_img',["'"+$(this).attr('data-path')+"'"])
            //Notiflix.Confirm.Show( 'Notiflix Confirm', 'Do you agree with me?', 'Yes', 'No', function(){ // Yes button callback alert('Thank you.'); }, function(){ // No button callback alert('If you say so...'); } ); 

            //Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 

           // Notiflix.Confirm.Show();
         Notiflix.Confirm.Show( 'Notiflix Confirm', 'Do you agree with me?', 'Yes', 'No',    function(){
        //start_loader()
         // path=$(this).attr('data-path');

         Notiflix.Loading.Hourglass('Loading...');
        
         var id= $('#rem_img').val();

          $.ajax({
            url: 'ajax.php?action=delete_img',
            data:{'id':id},
            method:'POST',
            dataType:"json",
            error:err=>{
                console.log(err)
                //alert_toast("An error occured while deleting an Image","error");
                //end_loader()
                Notiflix.Notify.Failure('An error occured while deleting an Image');
                Notiflix.Loading.Remove();
            },
            success:function(resp){
                if(resp==1){
                   //toastr.success("Data successfully saved.")
                   //Notiflix.Notify.success("Data successfully saved.");
                   Notiflix.Notify.Success("Images successfully delete.");
                  // Notiflix.Report.Success( 'Data successfully saved', 'Your Data Has been Saved into Database.', 'Click' ); 

                 setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                    Notiflix.Report.Warning( 'Warning', 'Error', 'Click' ); 

               // $('#msg').html('<div class="alert alert-danger mx-2">#Category already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();
                }   
            }
        })
    }, function(){  } ); 

        })
  
    })

    $('#list-category').submit(function(e){
        e.preventDefault()

        var title = $('#title').val();
        var description = $('#description').val();
        var type = $('#type').val();
        var price = $('#price').val();
        var fcid = $('#fcid').find(":selected").text();
        
        if(title == '' || description == '' || type == '' || price == '' || fcid == ''){
        //notificationme(); 
        //toastr.error("please Fill up");

        Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 
     return false;
        }
        //start_load()
        Notiflix.Loading.Dots('Processing...');
       $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_food',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                   // toastr.success("Data successfully saved.")
                   Notiflix.Notify.Success("Data successfully saved.");

                        setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                    Notiflix.Report.Warning( ' Warning', 'This Type OF  food  already exist', 'Click' );
                //$('#msg').html('<div class="alert alert-danger mx-2">#food  already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();

                }   
            }
        })
    })


</script>

