<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `hotel_info` WHERE id= ".$_GET['id']);
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
            <label for="" class="control-label">name</label>
            <input type="text" id="name" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
        </div>

     


        <div class="form-group">
            <label for="" class="control-label">tagline</label>
            <input type="text" class="form-control" id="tagline"  name="tagline"  value="<?php echo isset($tagline) ? $tagline :'' ?>" required>
        </div>
        <div class="form-group">
            <label for="" class="control-label">	address</label>
            <input type="text" class="form-control" id="address"  name="address"  value="<?php echo isset($address) ? $address :'' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">working_hours</label>
            <input type="text" class="form-control" id="working_hours"  name="working_hours"  value="<?php echo isset($working_hours) ? $working_hours :'' ?>" required>
        </div>

     <div class="form-group">
            <label for="" class="control-label">email</label>
            <input type="text" class="form-control" id="email"  name="email"  value="<?php echo isset($email) ? $email :'' ?>" required>
        </div> 

        <div class="form-group">
            <label for="" class="control-label">phone</label>
            <input type="text" class="form-control" id="phone"  name="phone"  value="<?php echo isset($phone) ? $phone :'' ?>" required>
        </div>


        <div class="form-group">
				<label for="" class="control-label">photo</label>
				<div class="custom-file">
	              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" multiple accept="image/*" onchange="displayImg(this,$(this))">
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
         Notiflix.Confirm.Show( ' Confirm', 'Do you agree with me?', 'Yes', 'No',    function(){
        //start_loader()
         // path=$(this).attr('data-path');

         Notiflix.Loading.Hourglass('Loading...');
        
         var id= $('#rem_img').val();

          $.ajax({
            url: 'ajax.php?action=delete_info_img',
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

        var name = $('#name').val();
        var description = $('#tagline').val();
        var address = $('#address').val();
        var working_hours = $('#working_hours').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        







        
        if(name == '' || description == '' || address == '' || working_hours == '' || email == '' || phone == '' ){
        //notificationme(); 
        //toastr.error("please Fill up");

        Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 
     return false;
        }
        //start_load()
        Notiflix.Loading.Dots('Processing...');
       $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_info',
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

