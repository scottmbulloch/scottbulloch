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
					<h1>JavaScript</h1>
					<h2>getURLparam Function</h2>
					<div>
						<p>Here is a nice little script that parses the window.location.href value and returns the value for the parameter you specify using javascript's built in regular expressions. Thank you Justin Barlow at <a href="http://www.netlobo.com/url_query_string_javascript.html">Netlobo</a>.</p>
						<p>Example URL query:<br />http://www.website.com/index.html?num=123&char=abc<br />getURLparam('num'); returns the value '123'<br />getURLparam('char'); return the value 'abc'</p>
						<pre><code>
function getURLparam(name) {
	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var results = regex.exec( window.location.href );
	if( results == null )
		return "";
	else
		return results[1];
}
						</code></pre>
					</div>
					<h2>getElementsByClass Function</h2>
					<div>
						<p>For some reason, there is no DOM method in JavaScript for grabbing elements by a className. We have getElementById, getElementsByName and getElementsByTagName, so how come there is no getElementsByClass? I'm sure it will be added in the future, but until then here is a great function written by <a href="http://www.dustindiaz.com/getelementsbyclass/">Dustin Diaz</a>.</p>
						<pre><code>
function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	for (i = 0, j = 0; i &lt; elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}
						</code></pre>
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