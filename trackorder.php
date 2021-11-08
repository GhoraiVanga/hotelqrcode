<?php
ob_start();
include"include/link.php";
session_start();
//$_SESSION['mobile']=$_GET['mobile'];
if (!isset($_SESSION['room']) || $_SESSION['room'] == '')
$_SESSION['room']=$_GET['room'];

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

<?php
if(empty($_SESSION['room']))
{
    
?>

<script>
  $(document).ready(function(){
 
 $.confirm({
    title: 'Prompt!',
    content: '' +
    '<form action="trackorder.php" class="formName">' +
    '<div class="form-group">' +
    '<label>Enter something here</label>' +
    '<input type="number" placeholder="Your Room Number" class="room form-control" required />' +
    '</div>' +
    
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                //var value = this.$content.find('.name').val().length;
                var room = this.$content.find('.room').val();
                if(!room){
                    $.alert('provide a room number');
                    return false;
                }
               
                $.alert('Your room Number is  ' + room);
                window.location = "trackorder.php?room=" + room;
            }
        },
        cancel: function () {
            window.location = "trackorder.php";
        },
    },
    onContentReady: function () {
        // bind to events
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
        });
    }
});
 
 
 
  });
</script>

<?php
}

?>


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
 /* margin-top: 20px; */ 
}

.pt45{padding-top:45px;}
.order-tracking{
	text-align: center;
	width: 33.33%;
	position: relative;
	display: block;
}

.order-tracking .is-complete{
	display: block;
	position: relative;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	border: 0px solid #AFAFAF;
	background-color: #dff2ff;
	margin: 0 auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
	z-index: 0;



  
}
.order-tracking .is-complete:after {
	display: block;
	position: absolute;
	content: '';
	height: 14px;
	width: 7px;
	top: -2px;
	bottom: 0;
	left: 5px;
	margin: auto 0;
	border: 0px solid #AFAFAF;
	border-width: 0px 2px 2px 0;
	transform: rotate(45deg);
	opacity: 0;
  
}
/* This is a single-line comment for circle color */
.order-tracking.completed .is-complete{
	border-color: #27aa80;
	border-width: 0px;
	background-color: #27aa80;
  animation: pulse 2s infinite;

  
}
/* This is a single-line comment for inside right logo wright */
.order-tracking.completed .is-complete:after {
	border-color: #fff;
	border-width: 0px 3px 3px 0;
	width: 7px;
	left: 11px;
	opacity: 1;
  
}
.order-tracking p {
	color: #A4A4A4;
	font-size: 16px;
	margin-top: 8px;
	margin-bottom: 0;
	line-height: 20px;
}
.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}

/* This is a single-line comment for line */
.order-tracking::before {
	content: '';
	display: block;
	height: 3px;
	width: calc(100% - 40px);
	background-color: #93bff1;
	top: 13px;
	position: absolute;
	left: calc(-50% + 20px);
	z-index: 0;

}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #08df9b;}

@-webkit-keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
  }
  70% {
      -webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
  }
  100% {
      -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
  }
}
@keyframes pulse {
  0% {
    -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
    box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
  }
  70% {
      -moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
      box-shadow: 0 0 0 10px rgba(204,169,44, 0);
  }
  100% {
      -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
      box-shadow: 0 0 0 0 rgba(204,169,44, 0);
  }
}












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

  <li>
    <a href="totalamount.php">Total Amount</a>
  </li>
  <li>
    <a href="contact.php">Contact</a>
  </li>
  
      <li>
    <a href="scanme.php"  >ScanMe</a>
  </li> 
  
  </ul>
</nav>
<main>

  
  <div class="container">
    <div class="room" ><i class='fa fa-home'></i>Room No: <?php echo $_SESSION['room']  ?></div> 
    


  <?php 
	$i = 0;
$room=	  $_SESSION['room'];
		$course = $conn->query("SELECT * FROM `order_details` WHERE `roomno`= '$room'  AND `paid`='0' ");
		while($row=$course->fetch_assoc()):
		 $i++;
	?>
    
    
<div>Order ID :  <?php echo $i ?>  <span class="badge badge-success" data-id="<?php echo $row[id] ?>"  > Click Me</span> </div> 
    <div class="row">

        <div class="align-self-center col-md-12 hh-grayBox ">
            
        <!-- time of order -->
          <div class="row justify-content-between">
                <?php if($row['timeoforder'] == ''): ?>
            <div class="order-tracking completed">
              <span class="is-complete"></span>
              <p>Ordered<br><span>Mon, June 24</span></p>
            </div>
             <?php else: ?>
              <div class="order-tracking completed">
              <span class="is-complete"></span>
              <p>Ordered<br><span><?php echo $row['timeoforder']?> </span></p>
            </div>
             <?php endif; ?>
             
             
             <!-- time of Approved -->
             <?php if($row['timeofapprove'] == ''){ ?>
            <div class="order-tracking ">
              <span class="is-complete"></span>
              <p>Waiting<br><span></span></p>
            </div>
              <?php } elseif($row['order_status'] == '2' || $row['order_status'] == '1' || $row['order_status'] == '3' ){ ?>
                  <div class="order-tracking completed">
              <span class="is-complete"></span>
              <p>Approve<br><span><?php echo $row['timeofapprove']?></span></p>
            </div>
             <?php } elseif($row['order_status'] == '4'){ ?>
            
            
            <div class="order-tracking completed">
              <span class="is-complete"></span>
              <p>Reject<br><span><?php echo $row['timeofapprove']?></span></p>
            </div>
            
            
            <?php } ?>
             <!-- time of Delevired -->
              <?php if($row['timeofdelivery'] == ''): ?>
            <div class="order-tracking">
              <span class="is-complete"></span>
              <p>Waiting<br><span> </span></p>
            </div>
             <?php else: ?>
                 <div class="order-tracking completed">
              <span class="is-complete"></span>
             <!-- <p>Delivered<br><span>Fri, June 28</span></p> -->
             <p>Delivered<br><span><?php echo $row['timeofdelivery']?></span></p> 
            </div>
             <?php endif; ?>
             
             
            
          </div>
          
       
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
$('.badge').on('touchstart', function(e) {  
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
  
  
  
  
  
  
  

</body>
</html>
