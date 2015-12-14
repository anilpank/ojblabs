<!DOCTYPE HTML>
<html>
<head>
<title>Scheduling software for Psychiatrists</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css" />
<script src="library/jquery/jquery.min.js"></script>
<script src="library/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Scheduling software for Psychiatrists</h1>
			<p>Coming Soon</p>
			<form action="addToList.php" id="mail-list" method="post">
				<div class="row">
					<div class="col-sm-6">
						<input placeholder="Enter Email" class="form-control input-lg" name="form-email"
							id="inputlg" type="text" />
					</div>
					<div class="col-sm-6">
						<button value="Join Mailing List" class="btn btn-primary btn-lg" type="submit">Join Mailing List</button>
					</div>
				</div>
			</form>
			
			<?php
 
 $subjectPrefix = 'OjbLabs';
 $emailTo = 'anil@ojblabs.com';
 
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email   = stripslashes(trim($_POST['form-email']));
   
   $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
   
   if ($email && $emailIsValid) {
      $subject = "OjbLabs New Member";
      $body = "Email: $email <br />";
      
      $headers  = "MIME-Version: 1.1" . PHP_EOL;
      $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
      $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
      $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
      $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
      $headers .= "From: " . "=?UTF-8?B?".base64_encode($name)."?=" . "<$email>" . PHP_EOL;
      $headers .= "Return-Path: $emailTo" . PHP_EOL;
      $headers .= "Reply-To: $email" . PHP_EOL;
      $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
      $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;
      
      mail($emailTo, "=?utf-8?B?".base64_encode($subject)."?=", $body, $headers);
      $emailSent = true;
      echo "<h3>Successfully added to mailing list, Welcome to OjbLabs Family</h3>";      
   }
   else {
       $hasError = true;
	   echo "<h2>Oopsie, email could not be sent, please try after some time again. Or directly send an email to anil@ojblabs.com</h2>";      
   }
 }
 
 else {
     echo "Get Method";
 }
 
?>




		</div>
	</div>
</body>
</html>

