<!doctype php>
<?php
if(isset($_POST['submit'])){
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$subject = 'Subject';
	
$to = "email here";
$from = $email;

$body = "From: $fname $lname\n Phone: $phone\n  E-Mail: $email\n Message:\n $message";
	
//checking for error
if (!$_POST['first_name']) {
	$errfName = 'Please enter your first name';
}
 if (!$_POST['last_name']) {
	$errlName = 'Please enter your last name';
}
	
// Check if email has been entered and is valid
if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errEmail = 'Please enter a valid email address';
}
 
//Check if message has been entered
if (!$_POST['message']) {
	$errMessage = 'Please enter your message';
}
//Check if simple anti-bot test is correct
/*if ($human !== 5) {
	$errHuman = 'Your anti-spam is incorrect';
}*/
if (!$errfName && !$errlName && !$errEmail && !$errMessage) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<h3>Thank You! We will be in touch</div>';
	} else {
		$result='<div class="alert"><h3>Sorry there was an error sending your message. Please try again later</h3></div>';
	}	
}
}
?>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact</title>
<link href="contact-form-style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    
<!--javaScript code for menu icon--->
<script>function myFunction() {
    var x = document.getElementById("mymain-nav");
    if (x.className === "main-nav") {
        x.className += " responsive";
    } else {
        x.className = "main-nav";
    }
}</script>
</head>
<body>
<!-- Main Container -->
<div class="container">
  <!-- Navigation -->
  <header> 
	<div class="main-nav" id="mymain-nav">
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    		<i class="fa fa-bars"></i>
	  </a>
      <a href="index.html">Home</a>
      <a href="#">Link</a>
	  <a href="#">Link</a>
      <a href="contact.php" class="active">Contact</a>
    </div>
	</header>
  
  <!-- Hero Section -->  
	<section class="hero" id="hero">
     <h2 class="hero_header">CONTACT <span class="light">US</span></h2>
    <p class="tagline">For any Question</p>
  </section>
	
	
<div class="container">
	<form class="forma" id="contact-form" action="contact.php" method="post">
    <?php echo "<div>$result</div>";?>
    <h3>Quick Contact</h3>
      
	  <input name="first_name" placeholder="First Name" type="text" required autofocus><?php echo "<p class=\"alert\">$errfName</p>";?>
		
	  <input name="last_name" placeholder="Last Name" type="text" required autofocus><?php echo "<p class=\"alert\">$errlName</p>";?>
	
	  <input name="email" placeholder="Your Email Address" type="email" required><?php echo "<p class=\"alert\">$errEmail</p>";?>
	  
	<input name="phone" placeholder="Your Phone Number" type="tel">
	
	  <textarea name="message" placeholder="Type your Message Here...." required></textarea><?php echo "<p class=\"alert\">$errMessage</p>";?>
	  
	  <input name="submit" value="Submit" type="submit" class="button">
	  
  </form>
</div>	

	<!---end of container-->
		</div>
    </body>
</html>