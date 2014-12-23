<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
		<?php $current = 1; include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/top.inc'); ?>
	</div>
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<h1>Old News</h1>
					<h2>June 26, 2009</h2>
					<div>
						<p>I fixed a rendering issue with my website in Internet Explorer 5-6. It seems I was a victim of the hasLayout bug which can cause many display problems, especially with floats and backgrounds. The hasLayout property is unique to IE 5-6 and carries a true or false value. Certain CSS properties trigger this value in your web page elements. In my case, two divs containing background images were displaying improperly and I needed to trigger the hasLayout property for these divs. Here is the fix I used:</p>
						<pre><code>
/* \*/
* html #problemDiv { height: 1%; }
/* */
						</code></pre>
						<p>I believe is the most solid fix for my problem and it is still valid CSS. There are several different ways to implement this fix which might be better in other circumstances. I found a <a href="http://www.satzansatz.de/cssd/onhavinglayout.html" title="">great article</a> explaining this problem and here is <a href="http://websitetips.com/css/solutions/" title="">another site</a> with several resources for other browser issues, bugs and compatibility problems.</p>
					</div>
					<h2>June 10, 2009</h2>
					<p>BrowserShots was added as the new <a href="/resources/" title="Resources">featured resource</a>.</p>
					<h2>April 14, 2009</h2>
					<p>The <a href="/portfolio/logos.php" title="Portfolio Logos">logo designs</a> and <a href="/portfolio/printed.php" title="Portfolio Printed">printed designs</a> sections of my portfolio are complete.</p>
					<h2>April 2, 2009</h2>
					<p>The websites section of my portfolio is complete. Please <a href="/portfolio/websites.php" title="Portfolio Websites">take a look</a>.</p>
					<h2>March 27, 2009</h2>
					<p>New design implemented on my website. Complete redesign from the ground up using PHP and jQuery.</p>
				</div>
				<div id="sidebar">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/archives/2010-04/inc/side_home.inc'); ?>
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