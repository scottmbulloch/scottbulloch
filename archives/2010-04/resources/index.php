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
		<?php $current = 3; include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/top.inc'); ?>
	</div>
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<h1>Featured Resources</h1>
					<h2>IE NetRenderer</h2>
					<p>While using BrowserShots to try and debug a rendering issue with my website in Internet Explorer 6, I came across another wonderful tool. <a href="http://ipinfo.info/netrenderer/index.php" title="NetRenderer">NetRenderer</a> is a similar tool to Browsershots except it is only for Internet Explorer and there is no waiting. Just enter the URL, select the version of IE you want, then click submit and you get a large screenshot in a few seconds. Statistics will vary from source to source, but it can be agreed that the majority of people still use some version of IE. IE also has the worst history of display and compatibility problems through the different versions. This is an even better tool for quickly finding and fixing IE rendering problems.</p>
					<h2>BrowserShots</h2>
					<p>If you are a designer, developer or website owner then this is a site you need to visit. I am huge proponent of cross-browser compatibility and <a href="http://browsershots.org/" title="BrowserShots">BrowserShots</a> makes it a whole lot easier to test your website in different browsers and operating systems. Just enter your URL, check off the browser versions you want to test and click submit [There are also options for screen size, color depth, Java, JavaScript and Flash]. The following page will give you an estimate of how long it will take to process [usually no more than a few minutes]. Leave the window open and refresh it to see if your screen shots are ready. It even gives you a download link for the images in a .zip file. Truly a developer's best friend during the testing phase of any site build.<a href="http://browsershots.org/" title="BrowserShots"><img src="img/browsershots.jpg" alt="browsershots" class="bordered" /></a></p>
				</div>
				<div id="sidebar">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/side_resources.inc'); ?>
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
