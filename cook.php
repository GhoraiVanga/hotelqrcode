<?php
ob_start();
include"include/link.php";


$qry = $conn->query("SELECT name FROM `hotel_info`");
foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Track Order</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<style>
@import url("https://fonts.googleapis.com/css?family=Nunito+Sans");
:root {
  --blue: #0e0620;
  --white: #fff;
  --green: #2ccf6d;
}

html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Nunito Sans";
  color: var(--blue);
  font-size: 1em;
}

button {
  font-family: "Nunito Sans";
}

ul {
  list-style-type: none;
  -webkit-padding-start: 35px;
          padding-inline-start: 35px;
}

svg {
  width: 100%;
  visibility: hidden;
}

h1 {
  font-size: 7.5em;
  margin: 15px 0px;
  font-weight: bold;
}

h2 {
  font-weight: bold;
}

.hamburger-menu {
  position: absolute;
  top: 0;
  left: 0;
  padding: 35px;
  z-index: 2;
  
}
.hamburger-menu button {
  position: relative;
  width: 30px;
  height: 22px;
  border: none;
  background: none;
  padding: 0;
  cursor: pointer;
}
.hamburger-menu button span {
  position: absolute;
  height: 3px;
  background: #000;
  width: 100%;
  left: 0px;
  top: 0px;
  transition: 0.1s ease-in;
}
.hamburger-menu button span:nth-child(2) {
  top: 9px;
}
.hamburger-menu button span:nth-child(3) {
  top: 18px;
}
.hamburger-menu [data-state=open] span:first-child {
  transform: rotate(45deg);
  top: 10px;
}
.hamburger-menu [data-state=open] span:nth-child(2) {
  width: 0%;
  opacity: 0;
}
.hamburger-menu [data-state=open] span:nth-child(3) {
  transform: rotate(-45deg);
  top: 10px;
}

nav {
  position: absolute;
  height: 100%;
  top: 0;
  left: 0;
  background: var(--green);
  color: var(--blue);
  width: 300px;
  z-index: 1;
  padding-top: 80px;
  transform: translateX(-100%);
  transition: 0.24s cubic-bezier(0.52, 0.01, 0.8, 1);
}
nav li {
  transform: translateX(-5px);
  transition: 0.16s cubic-bezier(0.44, 0.09, 0.46, 0.84);
  opacity: 0;
}
nav a {
  display: block;
  font-size: 1.75em;
  font-weight: bold;
  text-decoration: none;
  color: inherit;
  transition: 0.24s ease-in-out;
}
nav a:hover {
  text-decoration: none;
  color: var(--white);
}
nav[data-state=open] {
  transform: translateX(0%);
}
nav[data-state=open] ul li:nth-child(1) {
  transition-delay: 0.16s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(2) {
  transition-delay: 0.32s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(3) {
  transition-delay: 0.48s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(4) {
  transition-delay: 0.64s;
  transform: translateX(0px);
  opacity: 1;
}

.btn {
  z-index: 1;
  overflow: hidden;
  background: transparent;
  position: relative;
  padding: 8px 50px;
  border-radius: 30px;
  cursor: pointer;
  font-size: 1em;
  letter-spacing: 2px;
  transition: 0.2s ease;
  font-weight: bold;
  margin: 5px 0px;
  color: var(--white);
  background: var(--green);
  transition: 0.2s ease;
}
.btn.green {
  border: 4px solid var(--green);
  color: var(--blue);
}
.btn.green:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 0%;
  height: 100%;
  background: var(--green);
  z-index: -1;
  transition: 0.2s ease;
}
.btn.green:hover {
  color: var(--white);
  background: var(--green);
  transition: 0.2s ease;
}
.btn.green:hover:before {
  width: 100%;
}

@media screen and (max-width: 768px) {
  body {
    display: block;
  }

  .container {
    margin-top: 70px;
    margin-bottom: 70px;
  }
  .room{
    text-align: center;
  }

}

.hh-grayBox {
	background-color: #F8F8F8;
	margin-bottom: 20px;
	padding: 35px; 
  border: 1px solid #6c757d; 
 /* margin-top: 20px; */ 
}

.pt45{padding-top:45px;}


</style>


</head>
<body>
   <div class="room" > <?php echo $name ?></div> 
<!-- partial:index.partial.html -->
<div class="hamburger-menu">
  <button class="burger" data-state="closed">
    <span></span>
    <span></span>
    <span></span>
  </button>
</div>
<nav data-state="closed">
  <ul>
  <li>
    <a href="trackorder.php"  style="color:white">Home</a>
  </li>
</ul>
</nav>
<main>

  
  <div class="container">
    <div class="room" ><i class='fa fa-home'></i>Cook Name: </div> 
    


  <?php 
	$i = 0;
$course = $conn->query("SELECT * FROM `order_details` WHERE  `paid`='0' ");
while($row=$course->fetch_assoc()):
$i++;
	?>
    
    
<div>Order ID :  <?php echo $i ?>  <span class="badge badge1  badge-success" data-id="<?php echo $row['id'] ?>"  > View Order</span> </div> 
    <div class="row">

        <div class="align-self-center col-md-12 hh-grayBox ">

   

    <div class="room "  id="room">

    <?php 
    $order_status=$row['order_status'];

                    switch($order_status){
                        case '0':
                            echo '<span class="badge badge-dark " style="font-size: 3.1em;">Pending</span>';
	                    break;
                        case '1':
                            echo '<span class="badge badge-primary" style="font-size: 3.1em;">Packed</span>';
	                    break;
                        case '2':
                            echo '<span class="badge badge-warning" style="font-size: 3.1em;">Approved</span>';
	                    break;
                        case '3':
                            echo '<span class="badge badge-success" style="font-size: 3.1em;">Delivered</span>';
	                    break;
                        default:
                            echo '<span class="badge badge-danger" style="font-size: 3.1em;">Cancelled</span>';
	                    break;
                    }
                ?>

    </div>
  

      <?php 
if($row['order_status']==0) :

?>
        <!-- time of order -->
          <div class="row" id="room">
    
         <form action="#" id="new-Accept">
           <input type="hidden" name="id" value="<?php echo $row['id'] ?>" ?>
            <button  type="submit" id="btnSubmit" class="btn btn-success">Accept</button>
          
      </form>
&nbsp;&nbsp;
      <form action="#" id="new-Cancel">
           <input type="hidden" name="id" value="<?php echo $row['id'] ?>" ?>
          <button  type="submit" id="btnSubmit" class="btn btn-danger">Cancel</button>
      </form>





      </div>


      <?php endif ?>




</div>
        
    
  </div>
  
  
  <?php endwhile; ?>




  </div>
  
</main>


<!-- partial -->

  <script>
const burger = document.querySelector('.burger');
const nav = document.querySelector('nav');

burger.addEventListener('click', e => {
  burger.dataset.state === 'closed' ? burger.dataset.state = "open" : burger.dataset.state = "closed";
  nav.dataset.state === "closed" ? nav.dataset.state = "open" : nav.dataset.state = "closed";
});
  
  
  </script>
  
  
 <script>
$('.badge1').on('touchstart', function(e) {  
    $.confirm({
    title: 'Your Order ',
 
    content: 'url:order.php?id='+$(this).attr('data-id'),
    onContentReady: function () {
        var self = this;
        this.setContentPrepend('<div>all ordering item</div>');
        setTimeout(function () {
            self.setContentAppend('<div>Thanks For Your Order</div>');
        }, 2000);
    },
    columnClass: 'medium',
});
});  
 </script> 
  
  
  <script>
   $('#new-Accept').submit(function(e){
        e.preventDefault()

      
        $.ajax({
            url:'orderstatus.php?action=accept',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
               
                  
                 setTimeout(function(){
                            location.reload()
                        },1000)
                  
            }
        })
    })

  </script>
  
  <script>
   $('#new-Cancel').submit(function(e){
        e.preventDefault()

      
        $.ajax({
            url:'orderstatus.php?action=Cancel',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
               
                  
                 setTimeout(function(){
                            location.reload()
                        },1000)
                  
            }
        })
    })

  </script>

  
  

</body>
</html>
