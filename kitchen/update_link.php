<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `qrcode` WHERE id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 
?>

<div class="container-fluid">
    <form id="link-update-form">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="status" id="" class="custom-select custol-select-sm">
                <option value="0" <?php echo $status == 0 ? "selected" : '' ?>>Deactivate</option>
                <option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Activate</option>

            </select>
        </div>
    </form>
</div>

<!-- Visible Submit Button -->
<script>
  
document.getElementById('submit').style.visibility='visible';
</script>


<script>
    $(function(){
        $('#link-update-form').submit(function(e){
            e.preventDefault();
            //start_loader()
            Notiflix.Loading.Hourglass('Loading...');
            $.ajax({
                url:'ajax.php?action=update_link_status',
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                   // alert_toast("An error occured","error")
                    //end_loader()
                },
                success:function(resp){
				if(resp==1){
          //notificationme(); 
          //toastr.success("Data successfully deleted.")
          Notiflix.Notify.Success('link successfully Update');
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
            })
        })
    })
</script>





