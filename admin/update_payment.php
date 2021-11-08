<div class="container-fluid">
    <form id="status-payment-form">
        <input type="hidden" name="id" value="<?php echo $_GET['oid'] ?>">
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="paid" id="" class="custom-select custol-select-sm">
                <option value="0" <?php echo $_GET['paid'] == 0 ? "selected" : '' ?>>Unpaid</option>
                <option value="1" <?php echo $_GET['paid'] == 1 ? "selected" : '' ?>>Paid</option>
               
            </select>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#status-payment-form').submit(function(e){
            e.preventDefault();
            //start_loader()
            Notiflix.Loading.Hourglass('Loading...');
            $.ajax({
                url:'ajax.php?action=update_payment_status',
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
          Notiflix.Notify.Success('payment successfully Update');
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
            })
        })
    })
</script>