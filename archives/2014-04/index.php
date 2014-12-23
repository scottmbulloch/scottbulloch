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
    <title>Web Designer &amp; Developer Scott Bulloch</title>
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
<?php $current=1; include 'includes/nav-menu.php'; ?>
        </nav>
      </header>
    </div>

    <div id="main-container">
      <article>
        <div id="main-title">
          <img class="logo hatch" src="img/main-title-logo.png" />
          <h1 class="home-heading">Web Development Focused on User Experience and Responsive Design</h1>
        </div>
        <div id="main-content">

          <div class="color1 clearfix">
            <section>
              <h2>Welcome</h2>
              <div class="static-content clearfix">
                <p>Hi there, my name is Scott and I am a web developer and designer currently living and working in Phoenix, AZ. My passion is finding ways to make the web a better place through code and an eye for detail. I enjoy the continual learning process necessary to work in perpetually advancing web technologies.</p>
                <p>If you are a potential employer, please take a look at <a href="resume.php">my resume</a> for qualifications and work history or <a href="portfolio.php">my portfolio</a> for examples projects I have worked on.</p>
              </div>
            </section>
          </div> <!-- .color1 -->

        </div> <!-- #main-content -->
      </article>
    </div> <!-- #main-container -->

    <div id="foot-container">
      <footer>
        <p>Copyright &copy; 2014 Scott Bulloch. Updated on <?php echo date("l, F j, Y",getlastmod()); ?>.</p>
        <nav id="foot-menu">
<?php $current=1; include 'includes/nav-menu.php'; ?>
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