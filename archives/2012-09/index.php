<!doctype html>
<html lang="en">
<head>
  <title>Scott Bulloch: Web Development + Graphic Design</title>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/head.html'); ?>
</head>
<body>

<div id="fixedwidth">

  <div id="column1">
    <div class="content">
      <div id="nav">
        <h1>home</h1>
        <hr />
        <ul>
        <li><a href="#about">About Me</a></li>
        <li><a href="#resume">Resume</a>
          <ul>
          <li><a href="#education">Education</a></li>
          <li><a href="#work">Work History</a></li>
          <li><a href="#skills">Skills</a></li>
          </ul>
        </li>
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
    
      <div id="about">
        <h2>About Me</h2>
        <div class="article">
          <p>If you have wandered onto this page it is probably because you have some interest in me and my career. I am a professional graphic designer and web developer currently living in Phoenix, Arizona. My full time gig is working for Pearson Education in the marketing department, coding emails and building informative landing environments within the framework of <a href="www.pearsonschool.com">pearsonschool.com</a>. My professional life goes beyond the corporate world and I spend my free time testing new ideas, expanding my knowledge and excercising my creativity by building websites for my friends and family.</p>
            <p>Although formally trained as a designer, my career has mostly consisted of web development. My strength and weakness both lie in my attention to detail and relentless pursuite of perfection. I am always striving to be better and continue to evolve with the ever changing landscape of technology.</p>
        </div><!-- end article -->
      </div><!-- end about -->
      
      <div id="resume">
        <h2>Resume</h2>
        <div class="article">
        
          <div id="education">
            <h3>Education</h3>
            <ul>
            <li>Bachelor of Arts in Visual Communications - Collins College, 2003</li>
            <li>1 year of Computer Science - University of Texas at Austin, 1999</li>
            </ul>
          </div><!-- end education -->
          
          <div id="work">
            <h3>Work History</h3>
            <ul>
            <li>Freelance - Always!</li>
            <li>Pearson Education - Term of Project</li>
            <li>TriWest Healthcase Alliance - Contract</li>
            <li>WebsiteAZ - Contract</li>
            <li>Arizona Game &amp; Fish Department - Multiple Contracts</li>
            <li>Art &amp; Framing Designs - Full Time</li>
            <li>Sonik Magazine - Internship</li>
            </ul>
          </div><!-- end work -->
          
          <div id="skills">
            <h3>Skills</h3>
            <p>Software used:</p>
            <ul>
            <li>Adobe CS5 Design Premium</li>
            <li>MS Office 2007</li>
            </ul>
            <p>My expertise in web technologies include:</p>
            <div class="splitcol3">
              <ul>
              <li>Polyglot coding:
                <ul>
                <li>HTML5</li>
                <li>XHTML 1.1</li>
                </ul>
              </li>
              <li>CSS3</li>
              <li>AJAX</li>
              <li>PHP</li>
              <li>MySQL</li>
              <li>Flash</li>
              <li>Forms</li>
              <li>eCommerce</li>
              <li>SEO</li>
              </ul>
            </div>
            <div class="splitcol3">
              <ul>
              <li>JavaScript frameworks:
                <ul>
                <li>jQuery</li>
                <li>Prototype</li>
                <li>MooTools</li>
                </ul>
              </li>
              <li>Content Management Systems:
                <ul>
                <li>Wordpress</li>
                <li>Joomla</li>
                <li>Drupal</li>
                <li>Custom</li>
                </ul>
              </li>
              </ul>
            </div>
            <div class="clear"></div>
            <p>I also have limited experience in:</p>
            <ul>
            <li>ASP.NET</li>
            <li>ColdFusion</li>
            <li>SharePoint</li>
            </ul>
            <p>Traditional graphic design skills:</p>
            <div class="splitcol3">
              <ul>
              <li>Typography</li>
              <li>Color &amp; Value</li>
              <li>Shape &amp; Line</li>
              <li>Spacial Relation</li>
              <li>Texture</li>
              </ul>
            </div>
            <div class="splitcol3">
              <ul>
              <li>User Experience</li>
              <li>Page Layout</li>
              <li>Image Editing</li>
              <li>Graphic Formats</li>
              <li>Logo Design</li>
              </ul>
            </div>
            <div class="clear"></div>
            <p>Experience in printing:</p>
            <div class="splitcol3">
              <ul>
              <li>Business Cards</li>
              <li>Advertisements</li>
              <li>Brochures</li>
              <li>Postcards</li>
              <li>Invitations</li>
              </ul>
            </div>
            <div class="splitcol3">
              <ul>
              <li>Posters</li>
              <li>Magazines</li>
              <li>Newsletters</li>
              <li>T-shirts</li>
              <li>Product Packaging</li>
              </ul>
            </div>
            <div class="clear"></div>
          </div><!-- end skills -->
          
        </div><!-- end article -->
      </div><!-- end resume -->
      
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