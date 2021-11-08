
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - 404 Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="Scripts/html5-qrcode.min.js"></script>
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
  color: #dd0e0e;
}






button {
  font-family: "Nunito Sans";
    z-index: 0;
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
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  border: 4px solid var(--green);
  color: var(--blue);
}

#reader__camera_selection
{
     border: 2px solid var(--red);
  color: var(--blue);
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

.root {
  padding: 1rem;
  border-radius: 5px;
  box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
}

figure {
  display: flex;
}
figure img {
  width: 8rem;
  height: 8rem;
  border-radius: 15%;
  border: 1.5px solid #f05a00;
  margin-right: 1.5rem;
  padding:1rem;
}
figure figcaption {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
figure figcaption h4 {
  font-size: 1.4rem;
  font-weight: 500;
}
figure figcaption h6 {
  font-size: 1rem;
  font-weight: 300;
}
figure figcaption h2 {
  font-size: 1.6rem;
  font-weight: 500;
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
    <a href="trackorder.php">Home</a>
  </li>
  <li>
    <a href="totalamount.php" >Total Amount</a>
  </li>

  <li>
    <a href="contact.php"  >Contact</a>
  </li>
  
    <li>
    <a href="scanme.php" style="color:white" >ScanMe</a>
  </li> 
  
  
  </ul>
</nav>
  
<main>
    
  
  <div class="container">
    <div class="row">
      <div class="col-md-12 align-self-center">
        <section class="root">
          <figure>
          
            <figcaption>
     
   <div id="result"></div>
  
    <div  id="reader"></div>



     
     
     
            </figcaption>
          </figure>
     
        </section>
       
      </div>

    </div>
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
  
  
 <script type="text/javascript">

  
  
function onScanSuccess(qrCodeMessage) {
    //document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
    window.navigator.vibrate(200);
      html5QrcodeScanner.clear();
      window.location.replace(qrCodeMessage);
      
}

function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner(
   

    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);











</script>

</body>
</html>
