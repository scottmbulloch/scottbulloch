<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Scott Bulloch Designs</title>
<meta name="description" content="personal website of scott bulloch, freelance graphic designer and web developer in phoenix, arizona" />
<meta name="keywords" content="scott bulloch, scott, bulloch, freelance, freelancer, web, website, graphic, designer, design, developer, development, web designer, web design, web developer, web development, graphic designer, graphic design, web site design, website design, site, website, phoenix, az, arizona, scottsdale, glendale, tempe, gilbert, chandler" />
<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/head.inc'); ?>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<?php $current = 4; include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/top.inc'); ?>
	</div>
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<h1>Send A Message</h1>
					<?php
					function spamcheck($field) {
						$field=filter_var($field, FILTER_SANITIZE_EMAIL);
						if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
							return TRUE;
						}
						else {
							return FALSE;
						}
					}
					if (isset($_REQUEST["email"])) {
						$mailcheck = spamcheck($_REQUEST["email"]);
                        if ($mailcheck==FALSE) { ?>
						<p class="alert">Invalid input, please re-enter your information.</p>
						<form method="post" action="index.php">
							Name:<br /><input name="name" type="text" size="50" value="" /><br />
							Email:<br /><input name="email" type="text" size="50" value="" /><br />
							Subject:<br /><input name="subject" type="text" size="50" value="" /><br />
							Message:<br /><textarea name="message" rows="15" cols="40"></textarea><br />
							<input name="button" type="submit" value="Send Message" />
						</form>
						<?php }
						else {
							$name    = $_REQUEST["name"];
							$email   = $_REQUEST["email"];
							$subject = $_REQUEST["subject"];
							$message = $_REQUEST["message"];
							$to      = "scottbullochdesigns@gmail.com";
							$msg     = "From : $name \r\n Email : $email \r\n Subject : $subject \r\n Message : $message";
							mail($to, "scottbullochdesigns.com Contact Form Submission", $msg, "From: $email");
							print ("<p>Thank you, I will get in touch with you shortly.</p>");
						}
					}
					else { ?>
						<form method="post" action="index.php">
							Name:<br /><input name="name" type="text" size="50" value="" /><br />
							Email:<br /><input name="email" type="text" size="50" value="" /><br />
							Subject:<br /><input name="subject" type="text" size="50" value="" /><br />
							Message:<br /><textarea name="message" rows="15" cols="40"></textarea><br />
							<input name="button" type="submit" value="Send Message" />
						</form>
					<?php } ?>
				</div>
				<div id="sidebar">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/side_contact.inc'); ?>
					<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/side_all.inc'); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div id="footer">
		<?php $lastmod = date("F j, Y", filemtime(__FILE__)); include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/bottom.inc'); ?>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/analytics.inc'); ?>
</body>
</html>
