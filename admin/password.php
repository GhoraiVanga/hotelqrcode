
<div class="hold-transition login-page">

<div class="login-box">
  <div class="card card-outline card-primary">

    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password</p>
      <form  action="" id="password-form">
        <div class="input-group mb-3">
          <input type="password" id="password1" class="form-control" placeholder="Privious password" name="password1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" placeholder="New Password" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>


</div>

<script>
     $('#password-form').submit(function(e){
        e.preventDefault()

        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
  
        
        if(password1 == '' || password2 == '' ){
        //notificationme(); 
        //toastr.error("please Fill up");

        Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 
     return false;
        }
        
        else if(password1 == password2)
        {
             Notiflix.Report.Failure( 'Equal Password', 'password should be Different', 'Click' ); 
             return false;
        }
        
        
        //start_load()
        Notiflix.Loading.Dots('Processing...');
       $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=change_password',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                   // toastr.success("Data successfully saved.")
                   Notiflix.Notify.Success("Data successfully changed.");

                        setTimeout(function(){
                            location.reload()
                        },1000)
                } else if(resp == 2){
                    Notiflix.Report.Warning( 'Warning', 'Privious Password Did Not Match', 'Click' );
                //$('#msg').html('<div class="alert alert-danger mx-2">#food  already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();

                } 
                
                
                
                
            }
        })
    })

    
</script>










