<div class="container-fluid">
    <form id="status-update-form">
        <input type="hidden" name="id" value="<?php echo $_GET['oid'] ?>">
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="status" id="" class="custom-select custol-select-sm">
                
                <option value="2" <?php echo $_GET['status'] == 2 ? "selected" : '' ?>>Accept Order</option>
                
                <option value="4" <?php echo $_GET['status'] == 4 ? "selected" : '' ?>>Cancel Order</option>
            </select>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#status-update-form').submit(function(e){
            e.preventDefault();
            //start_loader()
            Notiflix.Loading.Hourglass('Loading...');
            $.ajax({
                url:'ajax.php?action=update_order_status',
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
          Notiflix.Notify.Success('Data successfully Update');
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
            })
        })
    })
</script>