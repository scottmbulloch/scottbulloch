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
					<h1>Cascading Style Sheets</h1>
					<h2>Measurement Values</h2>
					<div>
						<p>There are several options to choose from when defining the size of an element or font. You should pick the proper units for your intended application. When designing for the screen you will most commonly use <strong>px</strong>, <strong>%</strong> and <strong>em</strong>.</p>
						<table class="centered">
						<tr>
							<th>Units</th>
							<th>Description</th>
						</tr>
						<tr>
							<td>%</td>
							<td>Percentage</td>
						</tr>
						<tr>
							<td>px</td>
							<td>Pixels are the dots on a computer monitor</td>
						</tr>
						<tr>
							<td>em</td>
							<td>Ems are proportional to a user&rsquo;s set font size, 1em equals the current font size, 2em is twice the current font size, etc</td>
						</tr>
						<tr>
							<td>ex</td>
							<td>X-height, 1ex equals the x-height of a font</td>
						</tr>
						<tr>
							<td>in</td>
							<td>Inches</td>
						</tr>
						<tr>
							<td>cm</td>
							<td>Centimeters</td>
						</tr>
						<tr>
							<td>mm</td>
							<td>Millimeters</td>
						</tr>
						<tr>
							<td>pt</td>
							<td>Points, 1pt equals 1/72 inch</td>
						</tr>
						<tr>
							<td>pc</td>
							<td>Picas, 1pc equals 12 points</td>
						</tr>
						</table>
					</div>
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
