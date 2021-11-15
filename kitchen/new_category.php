<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `food_category` WHERE id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 
?>
<div class="container-fluid">
    <form action="" id="new-category">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class="form-group"></div>
        <div class="form-group">
            <label for="" class="control-label">Category Name</label>
            <input type="text" id="category_name" class="form-control" name="category_name"  value="<?php echo isset($category_name) ? $category_name :'' ?>" readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Description</label>
            <input type="text" class="form-control" id="description"  name="description"  value="<?php echo isset($description) ? $description :'' ?>" readonly>
        </div>
        
        <div class="form-group">
				<label for="status" class="control-label">Status</label>
                <select name="status" id="status" class="custom-select selevt">
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
		</div>
      
   
    </form>
</div>
<script>
    $('#new-category').on('reset',function(){
        $('#msg').html('')
        $('input:hidden').val('')
    })
    $('#new-category').submit(function(e){
        e.preventDefault()

        var category_name = $('#category_name').val()
        var description = $('#description').val()
        if(description == '' || category_name == ''){
        //notificationme(); 
       // toastr.error("please Fill up");
        Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 

     return false;
        }
        Notiflix.Loading.Dots('Processing...');
       // $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_category',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                   //toastr.success("Data successfully saved.")
                   //Notiflix.Notify.success("Data successfully saved.");
                   Notiflix.Notify.Success("Data successfully saved.");
                  // Notiflix.Report.Success( 'Data successfully saved', 'Your Data Has been Saved into Database.', 'Click' ); 

                 setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                    Notiflix.Report.Warning( ' Warning', 'Category already exist', 'Click' ); 

               // $('#msg').html('<div class="alert alert-danger mx-2">#Category already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();
                }   
            }
        })
    })


</script>