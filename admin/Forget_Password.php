<?php 
ob_start();
//without it header redirct not working :suman ghorai
session_start();

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>QRCODE</title>
 <link rel="icon" href="QRCODE/qrcode.gif" type="image/gif" sizes="16x16">
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>
  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<head>
    <meta charset="utf-8">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
*{
  
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{

 /* background: linear-gradient(120deg,#2980b9, #8e44ad); */
  
     background-image: url("bgimage/forget.jpg");
background-repeat:no-repeat;
-webkit-background-size:cover;
-moz-background-size:cover;
-o-background-size:cover;
background-size:cover;
background-position:center;
 
  height: 100vh;
  overflow: hidden;

}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.center h1{
  text-align: center;
  padding: 20px 0;
  border-bottom: 1px solid silver;
}
.center form{
  padding: 0 40px;
  box-sizing: border-box;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
}
.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}
.pass:hover{
  text-decoration: underline;
}
input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #2691d9;
  transition: .5s;
}
.signup_link{
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #666666;
}
.signup_link a{
  color: #2691d9;
  text-decoration: none;
}
.signup_link a:hover{
  text-decoration: underline;
}

</style>
  </head>
  <body>
    <div class="center">
      <h1>Forget Password</h1>
      <form  method="post" id="Forget-form">
          
        <div class="txt_field">
          <input type="text" name="email"  id="email"  >
          <span></span>
          <label>Email</label>
        </div>
        

        
    <div class="pass"><a href="login.php">Login</a>  </div>
        <input type="submit" value="Submit">
        <div class="signup_link">
         
        </div>
      </form>
    </div>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- notiflix js  -->
<script src="dist/js/notiflix-2.7.0.min.js" ></script>
<script src="dist/js/notiflix-aio-2.7.0.min.js" ></script>

<!-- Notiflix CSS -->

<link rel="stylesheet" href="dist/css/notiflix-2.7.0.min.css">



<script>
     $('#Forget-form').submit(function(e){
        e.preventDefault()

        var email = $('#email').val();
        
       if(email == ''){
        //notificationme(); 
        //toastr.error("please Fill up");

        Notiflix.Report.Failure( 'Failure', 'Please Type your Email', 'Click' ); 
     return false;
        }
        
     //start_load()
        Notiflix.Loading.Dots('Processing...');
       $('#msg').html('')
        $.ajax({
            url:'ajax.php?action=forget_password',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                   // toastr.success("Data successfully saved.")
                   Notiflix.Notify.Success("Please Check Your Email ");

                        setTimeout(function(){
                            location.reload()
                        },1000)
                } else if(resp == 2){
                    Notiflix.Report.Warning( 'Warning', 'Email Did Not Match', 'Click' );
                //$('#msg').html('<div class="alert alert-danger mx-2">#food  already exist.</div>')
                //end_load()
                Notiflix.Loading.Remove();

                } 
                
                
                
                
            }
        })
    })

    
</script>	













  </body>
</html>