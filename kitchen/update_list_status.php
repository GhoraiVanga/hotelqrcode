<div class="container-fluid">
    <form id="status-update-form">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="status" id="" class="custom-select custol-select-sm">
                
                <option value="1" >Available</option>
                
                <option value="0" >Unavailable</option>
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
                url:'ajax.php?action=update_list_status',
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