
<!DOCTYPE html>
<!--
	OjbLabs by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OjbLabs</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">OjbLabs</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>						
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
			 <?php
			   $subjectPrefix = 'OjbLabs';
               $emailTo = 'anil@ojblabs.com';
 
			   echo "Anil from Ojb".$emailTo;
			   if($_SERVER['REQUEST_METHOD'] == 'POST') {
				   echo "Post method";
				   $name    = stripslashes(trim($_POST['form-name']));
                   $email   = stripslashes(trim($_POST['form-email']));
                   $phone   =  "12345";
                   $subject = "OjbLabs Contact Info";
                   $message = stripslashes(trim($_POST['form-mensagem']));
                   $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
				   
				   if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
                       die("Header injection detected");
                   }
                   $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
				   
				   if($name && $email && $emailIsValid && $subject && $message){
                     $subject = "$subjectPrefix $subject";
                     $body = "Nome: $name <br /> Email: $email <br /> Telefone: $phone <br /> Mensagem: $message";

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
					echo "<h2>Congrats, email sent successfully</h2>";
                    } 
					else {
                      $hasError = true;
					  echo "<h2>Oopsie, email could not be sent, please try after some time again. Or directly send an email to anil@ojblabs.com</h2>";
                    }	
			   }
			   else {
				   echo "Get method";
			   }
			 ?>			
				
			</section>

		

		

		
		

	</body>
</html>