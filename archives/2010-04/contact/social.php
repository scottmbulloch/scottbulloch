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
					<h1>Social Networks</h1>
					<p>Here are some other places you can find me on the web.</p>
					<ul>
						<li><a href="http://www.linkedin.com/pub/a/393/997" title="LinkedIn">LinkedIn</a></li>
						<li><a href="http://www.facebook.com/people/Scott-Bulloch/1493168535" title="facebook">facebook</a></li>
						<li><a href="http://delicious.com/scottbulloch" title="delicious">delicious</a></li>
						<li><a href="http://www.myspace.com/scottbullochdesigns" title="MySpace">MySpace</a></li>
						<li><a href="http://scottbulloch.deviantart.com/" title="deviantART">deviantART</a></li>
						<li><a href="http://member.nin.com/member/scottbulloch" title="nin.com">nin.com</a></li>
					</ul>
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
