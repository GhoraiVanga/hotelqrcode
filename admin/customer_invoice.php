<?php 
include 'db_connect.php'; 

?>



<!--<form class="needs-validation"  action="#" id="room-invoice" >
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01"> Customer Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Customer Name" name="name"  required>
      <div class="valid-feedback">

      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Mobile No.</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Mobile No."  name="phone" required>
      <div class="valid-feedback">

      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Address</label>
      <div class="input-group">
   
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Customer Address" aria-describedby="inputGroupPrepend" name="address" required>
        <div class="invalid-feedback">
         
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Total Cost</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="Cost"  name="cost" required>
      <div class="invalid-feedback">
      
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Room Check In Date</label>
      <input type="date" class="form-control" id="validationCustom04" placeholder="Room Check In Date" name="checkin" required>
      <div class="invalid-feedback">
        
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Room Check Out Date</label>
      <input type="date" class="form-control" id="validationCustom05" placeholder="Room Check Out Date" name="checkout" required>
      <div class="invalid-feedback">
        
      </div>
    </div>
    
       <div class="col-md-3 mb-3">
      <label for="validationCustom04">Room Number</label>
      <input type="text" class="form-control" id="validationCustom04" placeholder="Room Number" name="room" required>
      <div class="invalid-feedback">
       
      </div>
    </div>
    
 </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>  -->


<!-- Modified Field -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Customer Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="room-invoice" action="#" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                     <input type="text" class="form-control" id="validationCustom01" placeholder="Customer Name" name="name"  required>
                  </div>
                  <div class="form-group">
                        <label for="validationCustom02">Mobile No.</label>
                      <input type="text" class="form-control" id="validationCustom02" placeholder="Mobile No."  name="phone" required>
                  </div>
                  
              
                  

                  
                  
                         <div class="form-group">
                      <label for="validationCustomUsername">Address</label>
                  <input type="text" class="form-control" id="validationCustomUsername" placeholder="Customer Address" aria-describedby="inputGroupPrepend" name="address" required>
                  </div>
                         <div class="form-group">
                     <label for="validationCustom03">Total Cost</label>
                  <input type="text" class="form-control" id="validationCustom03" placeholder="Cost"  name="cost" required>
                  </div>
                         <div class="form-group">
                       <label for="validationCustom04">Room Check In Date</label>
      <input type="date" class="form-control" id="validationCustom04" placeholder="Room Check In Date" name="checkin" required>
                  </div>
    <div class="form-group">
        <label for="validationCustom05">Room Check Out Date</label>
        <input type="date" class="form-control" id="validationCustom05" placeholder="Room Check Out Date" name="checkout" required>
    </div>
                  
           
       <!--     <div class="form-group">
                       <label for="validationCustom04">Room Number</label>
      <input type="text" class="form-control" id="validationCustom04" placeholder="Room Number" name="room" required>
           </div>  -->
                  
          <div class="form-group">
        <label for="" class="control-label">Room Number</label>
          <select class="custom-select selevt"   name="room" requird >
              <option value=" "  readonly></option>
            <?php
                    $qry = $conn->query("SELECT * FROM `qrcode` ");
                    while($row= $qry->fetch_assoc()):
            ?>
            
            
            
              <option value="<?php echo $row['room'] ?>"  ><?php echo $row['room'] ?></option>
         <?php endwhile; ?>
           
          </select>
        </div>  
        
          <div class="form-group">
                    <label for="validationCustom02">Room Type</label>
                     <select class="custom-select selevt"   name="roomtype" requird >
                     <option value="Single Room">Single Room </option>
                     <option value="Double Room"> Double Room</option>
                     <option value="Deluxe Room">Deluxe Room </option>
                     <option value="Double-Double (Twin Double) Room">Double-Double (Twin Double) Room </option>
                     <option value="Twin Room">Twin Room </option>
                     <option value="Duplex Room">Duplex Room </option>
                     <option value="Suite">Suite </option>
                
                    </select>
                      
               </div>
        
        
        
        
        
        
        
        
        
        
        
                  
                  
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <center>      <button type="submit" class="btn btn-primary">Submit</button> </center>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>






















<script>

    $('#room-invoice').submit(function(e){
        e.preventDefault()

       // var category_name = $('#category_name').val()
       // var description = $('#description').val()
        //if(description == '' || category_name == ''){
        //notificationme(); 
       // toastr.error("please Fill up");
       // Notiflix.Report.Failure( 'Failure', 'Please Input All Field', 'Click' ); 

     //return false;
      //  }
        Notiflix.Loading.Dots('Processing...');
       // $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=save_roominvoice',
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































