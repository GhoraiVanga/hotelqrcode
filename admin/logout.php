<script>
    
$( document ).ready(function() {
    
       // Notiflix.Confirm.Show();
         Notiflix.Confirm.Show( 'Logout', 'Are You sure?', 'Yes', 'No',    function(){
        //start_loader()
         // path=$(this).attr('data-path');

         Notiflix.Loading.Hourglass('Loading...');
        
         var id= $('#rem_img').val();

          $.ajax({
            url: 'ajax.php?action=logout',
            method:'POST',
           
            error:err=>{
                console.log(err)
                //alert_toast("An error occured while deleting an Image","error");
                //end_loader()
                Notiflix.Notify.Failure('An error occured while logout');
                Notiflix.Loading.Remove();
            },
            success:function(resp){
                if(resp==1){
                   //toastr.success("Data successfully saved.")
                   //Notiflix.Notify.success("Data successfully saved.");
                   Notiflix.Notify.Success("Successfully logout.");
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
    }, function(){
        
      location.href='index.php?page=home';  
        
    } );   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});
</script>