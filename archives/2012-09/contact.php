<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scott Bulloch: Contact Information</title>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/head.html'); ?>
</head>
<body>

<div id="fixedwidth">

  <div id="column1">
    <div class="content">
      <div id="nav">
        <h1>contact</h1>
        <hr />
        <ul>
        <li><a href="#message">Send A Message</a></li>
        <li><a href="#social">Social Networks</a></li>
        </ul>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <hr />
        <ul>
        <li><a href="#fixedwidth">back to the top</a></li>
        </ul>
      </div><!-- end nav -->
    </div><!-- end content -->
  </div><!-- end column1 -->

  <div id="column2">
  
    <div id="header">
      <div id="menu">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/menu.html'); ?>
      </div><!-- end menu -->
    </div><!-- end header -->
    
    <div class="clear"></div>
    
    <div class="content">
      
      <div id="message">
        <h2>Send A Message</h2>
        <div class="article">
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
            <p class="orange"><strong>Invalid input, please re-enter your information.</strong></p>
            <form method="post" action="contact.php">
            <table class="contactform">
              <tr><td class="inlineright" style="width:20%;">Name:</td><td style="width:80%;"><input name="name" type="text" value="" /></td></tr>
              <tr><td class="inlineright">Email:</td><td><input name="email" type="text" value="" /></td></tr>
              <tr><td class="inlineright">Subject:</td><td><input name="subject" type="text" value="" /></td></tr>
              <tr><td class="inlineright verticaltop">Message:</td><td><textarea name="message" rows="5"></textarea></td></tr>
              <tr><td>&nbsp;</td><td><input name="button" type="submit" value="Send Message" class="formbutton" /></td></tr>
            </table>
            </form>
          <?php
            }
            else{
              $name    = $_REQUEST["name"];
              $email   = $_REQUEST["email"];
              $subject = $_REQUEST["subject"];
              $message = $_REQUEST["message"];
              $to      = "scottbullochdesigns@gmail.com";
              $msg     = "From : $name \r\n Email : $email \r\n Subject : $subject \r\n Message : $message";
              mail($to, "scottbullochdesigns.com Contact Form Submission", $msg, "From: $email");
              print("<p class='alert'>Thank you, I will get in touch with you shortly.</p>");
            }
          }
          else{
          ?>
            <p>Fill out the following form to send me a message directly.</p>
            <form method="post" action="contact.php">
            <table class="contactform">
              <tr><td class="inlineright" style="width:20%;">Name:</td><td style="width:80%;"><input name="name" type="text" value="" /></td></tr>
              <tr><td class="inlineright">Email:</td><td><input name="email" type="text" value="" /></td></tr>
              <tr><td class="inlineright">Subject:</td><td><input name="subject" type="text" value="" /></td></tr>
              <tr><td class="inlineright verticaltop">Message:</td><td><textarea name="message" rows="5"></textarea></td></tr>
              <tr><td>&nbsp;</td><td><input name="button" type="submit" value="Send Message" class="formbutton" /></td></tr>
            </table>
            </form>
          <?php
          }
          ?>
        </div><!-- end article -->
      </div><!-- end message -->
      
      <div id="social">
        <h2>Social Networks</h2>
        <div class="article">
          <p>Here are some other places you can find me on the web.</p>
          <ul>
          <li><a href="http://www.linkedin.com/pub/a/393/997" title="LinkedIn">LinkedIn</a></li>
          <li><a href="http://www.facebook.com/people/Scott-Bulloch/1493168535" title="facebook">facebook</a></li>
          <li><a href="http://delicious.com/scottbulloch" title="delicious">delicious</a></li>
          <li><a href="http://www.myspace.com/scottbullochdesigns" title="MySpace">MySpace</a></li>
          <li><a href="http://scottbulloch.deviantart.com/" title="deviantART">deviantART</a></li>
          </ul>
        </div><!-- end article -->
      </div><!-- end social -->
      
    </div><!-- end content -->
  </div><!-- end column2 -->

  <div id="column3">
    <div class="content">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/side.html'); ?>
    </div><!-- end content -->
  </div><!-- end column3 -->

  <div class="clear"></div>

  <div id="footer">
    <div class="content">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.html'); ?>
    </div><!-- end content -->
  </div><!-- end footer -->

</div><!-- end fixedwidth -->

</body>
</html>