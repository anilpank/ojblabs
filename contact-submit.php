
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
						<li><a href="generic.html">Generic</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="#" class="button special">Sign Up</a></li>
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

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Services</h2>
						<p>Agile. Responsive. You need to be both to stay out in front. </p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>Business Services</h3>
								<p>Business Applications, Business Intelligence, Digital, Oracle implementation, SAP implementation</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Technology Services</h3>
								<p>Application Management, Cloud, Infrastructure and Security, Engineering Services, Enterprise Mobility, Internet of Things (IoT), Testing</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>Consulting</h3>
								<p>Customer Relationship Management, Engineering & Manufacturing solutions, Enterprise Risk & Security Solutions</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Management Team</h2>
						<p>Meet the team behind OjbLabs</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Anupam Kaushal</h4>
								<p>Founder</p>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>RJ Verma</h4>
								<p>VP Operations</p>
							</section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Anil</h4>
								<p>General Manager</p>
							</section>
							<section class="3u$ 6u$(medium) 12u$(xsmall) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<h4>Mayank</h4>
								<p>Member, Advisory board</p>
							</section>
						</div>
					</section>
					<footer>
						<p>OjbLabs helps customers do business better by leveraging our industry-wide experience, deep technology expertise, comprehensive portfolio of services and vertically aligned business model.</p>
						<ul class="actions">
							<li>
								<a href="#" class="button big">Case Studies</a>
							</li>
						</ul>
					</footer>
				</div>
			</section>

		
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Business Services</h3>
								<ul class="unstyled">
									<li><a href="assurance-services.html">Assurance Services</a></li>
									<li><a href="#">BI & Performance Management</a></li>
									<li><a href="#">Business Process Services</a></li>
									<li><a href="#">Consulting</a></li>
									<li><a href="#">Digital Enterprise</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Industries</h3>
								<ul class="unstyled">
									<li><a href="#">Banking & Financial Services</a></li>
									<li><a href="#">Energy - Oil & Gas, Oil Field Services and Renewables</a></li>
									<li><a href="#">Government</a></li>
									<li><a href="#">HealthCare</a></li>
									<li><a href="#">High Tech</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>More industries</h3>
								<ul class="unstyled">
									<li><a href="#">Insurance</a></li>
									<li><a href="#">Life Sciences</a></li>
									<li><a href="#">Manufacturing</a></li>
									<li><a href="#">Media and information services</a></li>
									<li><a href="#">Telecom</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Technology Services</h3>
								<ul class="unstyled">
									<li><a href="#">Application Management</a></li>
									<li><a href="#">Cloud, Infrastructure and Security</a></li>
									<li><a href="#">Enterprise Mobility</a></li>
									<li><a href="#">Internet of Things (IoT)</a></li>
									<li><a href="#">Testing</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; OjbLabs. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>