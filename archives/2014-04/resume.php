<!DOCTYPE html>
<!-- 
    Welcome to my code, this site is built with HTML5 Boilerplate

    .o oOOOOOOOo                                            OOOo
    Ob.OOOOOOOo  OOOo.      oOOo.                      .adOOOOOOO
    OboO"""""""""""".OOo. .oOOOOOo.    OOOo.oOOOOOo.."""""""""'OO
    OOP.oOOOOOOOOOOO "POOOOOOOOOOOo.   `"OOOOOOOOOP,OOOOOOOOOOOB'
    `O'OOOO'     `OOOOo"OOOOOOOOOOO` .adOOOOOOOOO"oOOO'    `OOOOo
    .OOOO'            `OOOOOOOOOOOOOOOOOOOOOOOOOO'            `OO
    OOOOO                 '"OOOOOOOOOOOOOOOO"`                oOO
   oOOOOOba.                .adOOOOOOOOOOba               .adOOOOo.
  oOOOOOOOOOOOOOba.    .adOOOOOOOOOO@^OOOOOOOba.     .adOOOOOOOOOOOO
 OOOOOOOOOOOOOOOOO.OOOOOOOOOOOOOO"`  '"OOOOOOOOOOOOO.OOOOOOOOOOOOOO
 "OOOO"       "YOoOOOOOOOOOOOOO"`  .   '"OOOOOOOOOOOOoOP"     "OOO"
    Y           'OOOOOOOOOOOOOO: .oOOo. :OOOOOOOOOOO?'         :`
    :            .oO%OOOOOOOOOOo.OOOOOO.oOOOOOOOOOOOO?         .
    .            oOOP"%OOOOOOOOoOOOOOOO?oOOOOO?OOOO"OOo
                 '%o  OOOO"%OOOO%"%OOOOO"OOOOOO"OOO':
                      `P"  `OOOO' `O"Y ' `OOOO'  o
                       .     OP"          : o    .
                              :
-->
<!--[if lt IE 9]>      <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <title>Resume of Scott Bulloch</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Crimson+Text|Marcellus+SC" />
  </head>
  <body>

    <div id="head-container">
      <header>
        <div id="head-title">Scott Bulloch</div>
        <nav id="mobile-menu"></nav>
        <nav id="head-menu">
<?php $current=2; include 'includes/nav-menu.php'; ?>
        </nav>
      </header>
    </div>

    <div id="main-container">
      <article>
        <div id="main-title">
          <img class="logo hatch" src="img/main-title-logo.png" />
          <h1>Resume</h1>
          <div class="static-content" id="resume-contact">541 West Cypress Street<br />Phoenix, AZ 85003<br />602-502-5743<br />drkgry@gmail.com<br />scottbulloch.com</div>
          <div class="static-content mobile-hide" id="resume-print">This page is optimized for printing, for a physical copy, please <a href="javascript:window.print()">print this page</a>.</div>
        </div>
        <div id="main-content">

          <div class="color1 clearfix">
            <section>
              <h2 class="toggle-switch">education</h2>
              <div class="toggle-content clearfix">
                <ul>
                  <li>Bachelor of Arts in Visual Communications :: Collins College, 2003</li>
                  <li>1 year of study in Computer Science :: University of Texas at Austin, 1999</li>
                </ul>
              </div>
            </section>
          </div> <!-- .color1 -->

          <div class="color2 clearfix">
            <section>
              <h2 class="toggle-switch">work history</h2>
              <div class="toggle-content clearfix">
                <ul class="spaced-list">
                  <li><strong>Freelance &amp; Pro Bono</strong><br />2003 - Present</li>
                  <li><strong>29th Drive</strong><br />Contract :: Oct 2013 - Jan 2014</li>
                  <li><strong>Pearson Education</strong><br />Full Time :: Jul 2009 - May 2013</li>
                  <li><strong>TriWest Healthcare Alliance</strong><br />Contract :: Feb 2009 - Mar 2009</li>
                  <li><strong>WebsiteAZ</strong><br />Contract :: Nov 2008 - Jan 2009</li>
                  <li><strong>Arizona Game &amp; Fish Department</strong><br />Contract :: Jun 2008 - Nov 2008</li>
                  <li><strong>Art &amp; Framing Designs</strong><br />Full Time :: Mar 2003 - Apr 2004</li>
                  <li><strong>Sonik Magazine</strong><br />Internship :: Oct 2001 - Mar 2002</li>
                </ul>
              </div>
            </section>
          </div> <!-- .color2 -->

          <div class="color3 clearfix">
            <section>
              <h2 class="toggle-switch">skills</h2>
              <div class="toggle-content clearfix">
                <p>Software proficiency:</p>
                <ul>
                  <li>Adobe CS6 [Dreamweaver, Photoshop, Illustrator]</li>
                  <li>VCS [Git, GitHub]</li>
                  <li>CMS [WordPress, Joomla, etc]</li>
                  <li>Microsoft Office 2010 [Outlook, Excel, Word]</li>
                  <li>OSX, Windows</li>
                </ul>
                <p>Web authoring and development languages:</p>
                <ul>
                  <li>HTML5, XHTML</li>
                  <li>CSS3, LESS, SCSS, SASS</li>
                  <li>JavaScript, AJAX, DOM, jQuery</li>
                  <li>PHP5</li>
                  <li>SQL, MySQL</li>
                  <li>JSON, XML</li>
                </ul>
                <p>Frameworks and templating:</p>
                <ul>
                  <li>Bootstrap3</li>
                  <li>HTML5BP</li>
                  <li>Jekyll</li>
                  <li>Haml</li>
                </ul>
                <p>Development focus:</p>
                <ul>
                  <li>Responsive design</li>
                  <li>User experience</li>
                  <li>Cross-browser compatibility</li>
                  <li>Progressive enhancement</li>
                  <li>Graceful degradation</li>
                  <li>Cross-browser compatibility</li>
                  <li>Graphic optimization &amp; sprites</li>
                  <li>SEO best practices</li>
                  <li>Accessibility</li>
                  <li>Email design
                    <ul>
                      <li>Table based layout</li>
                      <li>Cross-client compatibility</li>
                      <li>Deliverability &amp; best practices</li>
                    </ul>
                  </li>
                </ul>
                <p>Additional server side experience:</p>
                <ul>
                  <li>ColdFusion</li>
                  <li>ASP.NET</li>
                  <li>SharePoint</li>
                </ul>
              </div>
            </section>
          </div> <!-- .color3 -->

        </div> <!-- #main-content -->
      </article>
    </div> <!-- #main-container -->

    <div id="foot-container">
      <footer>
        <p>Copyright &copy; 2014 Scott Bulloch. Updated on <?php echo date("l, F j, Y",getlastmod()); ?>.</p>
        <nav id="foot-menu">
<?php $current=2; include 'includes/nav-menu.php'; ?>
        </nav>
      </footer>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
      var _gaq=[['_setAccount','UA-31883111-1'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>