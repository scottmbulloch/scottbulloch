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
    <title>Contact Scott Bulloch</title>
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
<?php $current=4; include 'includes/nav-menu.php'; ?>
        </nav>
      </header>
    </div>

    <div id="main-container">
      <article>
        <div id="main-title">
          <img class="logo hatch" src="img/main-title-logo.png" />
          <h1>Contact</h1>
        </div>
        <div id="main-content">

          <div class="color3 clearfix">
            <section>
              <h2>drop me a line</h2>
              <div class="static-content clearfix">
                <?php
                function spamcheck($field){
                  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
                  if(filter_var($field, FILTER_VALIDATE_EMAIL)){
                    return TRUE;
                  }
                  else{
                    return FALSE;
                  }
                }
                if (isset($_REQUEST["email"])){
                  $mailcheck = spamcheck($_REQUEST["email"]);
                  if ($mailcheck==FALSE){
                ?>
                <p class="alert">Invalid input, please re-enter your information.</p>
                <form method="post" action="contact.php" id="contact-form">
                  <label for="name">Name</label><input type="text" name="name" />
                  <label for="email">Email</label><input type="text" name="email" />
                  <label for="comment">Comment</label><textarea name="comment"></textarea>
                  <input type="submit" value="send" />
                </form>	
                <?php
                  }
                  else{
                    $name    = $_REQUEST["name"];
                    $email   = $_REQUEST["email"];
                    $comment = $_REQUEST["comment"];
                    $to      = "drkgry@gmail.com";
                    $msg     = "From : $name \r\n Email : $email \r\n Comment : $comment";
                    mail($to, "scottbulloch.com Contact Form Submission", $msg, "From: $email");
                    print("<p class='alert'>Thank you, I will get in touch with you shortly.</p>");
                  }
                }
                else{
                ?>
                <p>Connect with me through <a href="http://www.linkedin.com/pub/scott-bulloch/a/393/997" title="LinkedIn">LinkedIn</a> or fill out the following form to send me a message directly.</p>
                <form method="post" action="contact.php" id="contact-form">
                  <label for="name">Name</label><input type="text" name="name" />
                  <label for="email">Email</label><input type="text" name="email" />
                  <label for="comment">Comment</label><textarea name="comment"></textarea>
                  <input type="submit" value="send" />
                </form>	
                <?php
                }
                ?>
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
<?php $current=4; include 'includes/nav-menu.php'; ?>
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