<!doctype html>
<html lang="en">
<head>
  <title>Scott Bulloch: Web Design Resources</title>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/head.html'); ?>
</head>
<body>

<div id="fixedwidth">

  <div id="column1">
    <div class="content">
      <div id="nav">
        <h1>resources</h1>
        <hr />
        <ul>
        <li><a href="#javascript">JavaScript</a>
          <ul>
          <li><a href="#operators">Operators</a></li>
          <li><a href="#keywords">Keywords</a></li>
          <li><a href="#geturlparam">getURLparam Function</a></li>
          <li><a href="#getelementsbyclass">getElementsByClass Function</a></li>
          </ul>
        </li>
        <li><a href="#dom">DOM</a>
          <ul>
          <li><a href="#properties">Properties</a></li>
          <li><a href="#methods">Methods</a></li>
          </ul>
        </li>
        <li><a href="#html">HTML</a>
          <ul>
          <li><a href="#htmlbasics">Basics</a></li>
          <li><a href="#tags">Tag List</a></li>
          <li><a href="#entities">Character Entities</a></li>
          </ul>
        </li>
        <li><a href="#css">CSS</a>
          <ul>
          <li><a href="#cssbasics">Basics</a></li>
          <li><a href="#measurement">Measurement Values</a></li>
          <li><a href="#color">Color Values</a></li>
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
    
      <div id="javascript">
        <h2>javascript</h2>
        <div class="article">
          <p>JavaScript (officially named ECMAScript) is a client side scripting language used to add interactivity to web pages. It is an interpreted programming language which means it is not compiled before it is executed.</p>
        
          <div id="operators">
            <h3>Javascript Operators</h3>
<table>
  <tr><th style="width:20%;">Operator</th><th style="width:80%;">Description</th></tr>
  <tr><td>+</td><td>addition</td></tr>
  <tr><td>-</td><td>subtraction</td></tr>
  <tr><td>*</td><td>multiplication</td></tr>
  <tr><td>/</td><td>division</td></tr>
  <tr><td>%</td><td>modulus (division remainder)</td></tr>
  <tr><td>++</td><td>increment</td></tr>
  <tr><td>--</td><td>decrement</td></tr>
  <tr><td>==</td><td>equal to</td></tr>
  <tr><td>===</td><td>exactly equal to (value and type)</td></tr>
  <tr><td>!=</td><td>not equal to</td></tr>
  <tr><td>&gt;</td><td>greater than</td></tr>
  <tr><td>&lt;</td><td>less than</td></tr>
  <tr><td>&gt;=</td><td>greater than or equal to</td></tr>
  <tr><td>&lt;=</td><td>less than or equal to</td></tr>
  <tr><td>&amp;&amp;</td><td>and</td></tr>
  <tr><td>||</td><td>or</td></tr>
  <tr><td>!</td><td>not</td></tr>
  <tr><td>:</td><td>conditonal assignment</td></tr>
</table>
          </div><!-- end operators -->
        
          <div id="keywords">
            <h3>Javascript Keywords</h3>
            <div class="splitcol1">
              <p>The following is a list of words that have a predetermined definition and use in Javscript. These words should not be used when declaring variables or custom identifiers to avoid scripting errors.</p>
              <ol>
              <li>break</li>
              <li>case</li>
              <li>catch</li>
              <li>continue</li>
              <li>default</li>
              <li>delete</li>
              <li>do</li>
              <li>else</li>
              <li>finally</li>
              <li>for</li>
              <li>function</li>
              <li>if</li>
              <li>in</li>
              <li>instanceof</li>
              <li>new</li>
              <li>return</li>
              <li>switch</li>
              <li>this</li>
              <li>throw</li>
              <li>try</li>
              <li>typeof</li>
              <li>var</li>
              <li>void</li>
              <li>while</li>
              <li>with</li>
              </ol>
            </div>
            <div class="splitcol2">
              <p>These words are not keywords, but are still reserved for possible future use in Javascipt.</p>
              <ol>
              <li>abstract</li>
              <li>boolean</li>
              <li>byte</li>
              <li>char</li>
              <li>class</li>
              <li>const</li>
              <li>debugger</li>
              <li>double</li>
              <li>enum</li>
              <li>export</li>
              <li>extends</li>
              <li>final</li>
              <li>float</li>
              <li>goto</li>
              <li>implements</li>
              <li>import</li>
              <li>int</li>
              <li>interface</li>
              <li>long</li>
              <li>native</li>
              <li>package</li>
              <li>private</li>
              <li>protected</li>
              <li>public</li>
              <li>short</li>
              <li>static</li>
              <li>super</li>
              <li>synchronized</li>
              <li>throws</li>
              <li>transient</li>
              <li>volatile</li>
              </ol>
            </div>
            <div class="clear">&nbsp;</div>
          </div><!-- end keywords -->
        
          <div id="geturlparam">
            <h3>getURLparam Function</h3>
            <p>Here is a nice little script that parses the window.location.href value and returns the value for the parameter you specify using javascript's built in regular expressions. Thank you Justin Barlow at <a href="http://www.netlobo.com/url_query_string_javascript.html">Netlobo</a>.</p>
            <p>Example URL query:<br />http://www.website.com/index.html?num=123&amp;char=abc<br />getURLparam('num'); returns the value '123'<br />getURLparam('char'); return the value 'abc'</p>
<pre>
function getURLparam(name){
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&amp;]"+name+"=([^&amp;#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.href);
  if(results == null)
    return "";
  else
    return results[1];
}
</pre>
          </div><!-- end geturlparam -->
          
          <div id="getelementsbyclass">
            <h3>getElementsByClass Function</h3>
            <p>For some reason, there is no DOM method in JavaScript for grabbing elements by a className. We have getElementById, getElementsByName and getElementsByTagName, so how come there is no getElementsByClass? I'm sure it will be added in the future, but until then here is a great function written by <a href="http://www.dustindiaz.com/getelementsbyclass/">Dustin Diaz</a>.</p>
<pre>
function getElementsByClass(searchClass,node,tag){
  var classElements = new Array();
  if (node == null)
    node = document;
  if (tag == null)
    tag = '*';
  var els = node.getElementsByTagName(tag);
  var elsLen = els.length;
  var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
  for (i = 0, j = 0; i &lt; elsLen; i++){
    if (pattern.test(els[i].className)){
      classElements[j] = els[i];
      j++;
    }
  }
  return classElements;
}
</pre>
          </div><!-- end getelementsbyclass -->
          
        </div><!-- end article -->
      </div><!-- end javscript -->
      
      <div id="dom">
        <h2>document object model [dom]</h2>
        <div class="article">
          <p>The DOM is a language-neutral platform that defines the objects and properties of all elements in a document and provides the methods (interface) to access and manipulate them. The DOM presents a document as a tree structure consisting of nodes; everything in a document is a node.</p>
<pre>
                       Document
                          |
                  Root Element:&lt;html&gt;
                 /                   \
         Element:&lt;head&gt;         Element:&lt;body&gt;
        /                      /              \
Element:&lt;title&gt;        Element:&lt;h1&gt;      Element:&lt;a&gt; - Attribute:"href"
       |                    |                 |
  Text:"Title"        Text:"Heading"     Text:"Link"
</pre>
        
          <div id="properties">
            <h3>Properties</h3>
            <p>&nbsp;</p>
<table>
  <tr><th style="width:30%;">Property</th><th style="width:70%;">Description</th></tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
          </div><!-- end properties -->
        
          <div id="methods">
            <h3>Methods</h3>
            <p>&nbsp;</p>
<table>
  <tr><th style="width:30%;">Method</th><th style="width:70%;">Description</th></tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
          </div><!-- end methods -->
          
        </div><!-- end article -->
      </div><!-- end dom -->
      
      <div id="html">
        <h2>hypertext markup language [html]</h2>
        <div class="article">
          <p>HTML is a markup language that describes web pages. An HTML document is also called a web page.</p>
          
          <div id="htmlbasics">
            <h3>Basics</h3>
            <p><strong>Tags</strong></p>
            <ul>
            <li>Tags are the basic building blocks of HTML.</li>
            <li>Tags are used by the browser to interpret the content of the page.</li>
            </ul>
            <p><strong>Elements</strong></p>
            <ul>
            <li>An element starts with an opening tag and ends with closing tag.</li>
            <li>The element content is everything between the opening and closing tags.</li>
            <li>Some elements have empty content, these are closed in the opening tag (self closing).</li>
            </ul>
            <p><strong>Attributes</strong></p>
            <ul>
            <li>Attributes provide additional information about elements.</li>
            <li>Attributes are always defined in the opening tag.</li>
            <li>Attributes come in name/value pairs</li>
            </ul>
            <p><strong>Example</strong></p>
<pre>
 _____________________html element_____________________
|                                                      |
 opening tag     attribute      content    closing tag
            \       |              |      /
             &lt;a href="index.html"&gt;home&lt;/a&gt;
                 |        |
      attribute name    value
</pre>            
          </div><!-- end htmlbasics -->
          
          <div id="tags">
            <h3>Tag List</h3>
            <p>Complete tag list, highlighted tags are either <span class="purple">new in HTML5</span> or <span class="orange">deprecated</span>.</p>
<table>
  <tr><th style="width:30%;">Tag</th><th style="width:70%;">Description</th></tr>
  <tr><td>&lt;!--&nbsp;--&gt;</td><td>comments inside of code, ignored by browser</td></tr>
  <tr><td>&lt;!DOCTYPE&gt;</td><td>not actually a tag, tells the browser which HTML specification the document uses, must be placed before &lt;html&gt; tag</td></tr>
  <tr><td>&lt;a&gt;</td><td>hyperlink</td></tr>
  <tr><td>&lt;abbr&gt;</td><td>abbreviation or acronym</td></tr>
  <tr><td class="orange">&lt;acronym&gt;</td><td>use the &lt;abbr&gt; tag instead</td></tr>
  <tr><td>&lt;address&gt;</td><td>contact information for the author or owner of a document</td></tr>
  <tr><td class="orange">&lt;applet&gt;</td><td>use the &lt;object&gt; tag instead</td></tr>
  <tr><td>&lt;area&gt;</td><td>area inside of an image map, always nested inside a &lt;map&gt; tag</td></tr>
  <tr><td class="purple">&lt;article&gt;</td><td>external content, independent from the rest of the document</td></tr>
  <tr><td class="purple">&lt;aside&gt;</td><td>related to the surrounding content</td></tr>
  <tr><td class="purple">&lt;audio&gt;</td><td>sound, music or other audio streams</td></tr>
  <tr><td>&lt;b&gt;</td><td>bold text</td></tr>
  <tr><td>&lt;base&gt;</td><td>default URL, and/or a default target, for all elements containing a URL, must be inside the &lt;head&gt; element</td></tr>
  <tr><td class="orange">&lt;basefont&gt;</td><td>default font-color, font-size, or font-family for all text, use styles instead</td></tr>
  <tr><td>&lt;bdo&gt;</td><td>bidirectional override or direction of the text</td></tr>
  <tr><td class="orange">&lt;big&gt;</td><td>bigger text, use styles instead</td></tr>
  <tr><td>&lt;blockquote&gt;</td><td>long quotation block from another source</td></tr>
  <tr><td>&lt;body&gt;</td><td>contains all content of a document</td></tr>
  <tr><td>&lt;br&gt;</td><td>single line break</td></tr>
  <tr><td>&lt;button&gt;</td><td>push button, can contain content, always spedify the type attribute</td></tr>
  <tr><td class="purple">&lt;canvas&gt;</td><td>graphics container, script must be used to display graphics</td></tr>
  <tr><td>&lt;caption&gt;</td><td>table caption, must be immediately after the &lt;table&gt; tag</td></tr>
  <tr><td class="orange">&lt;center&gt;</td><td>center align content, use styles instead</td></tr>
  <tr><td>&lt;cite&gt;</td><td>citation</td></tr>
  <tr><td>&lt;code&gt;</td><td>computer code</td></tr>
  <tr><td>&lt;col&gt;</td><td>attributes for table columns, instead of repeating styles for each cell on each row</td></tr>
  <tr><td>&lt;colgroup&gt;</td><td>attributes for groups of table columns</td></tr>
  <tr><td class="purple">&lt;command&gt;</td><td>command button, only visible if inside a &lt;menu&gt; element</td></tr>
  <tr><td class="purple">&lt;datalist&gt;</td><td>available options for an &lt;input&gt; element, not visible</td></tr>
  <tr><td>&lt;dd&gt;</td><td>description of an item in a definition list</td></tr>
  <tr><td>&lt;del&gt;</td><td>deleted text</td></tr>
  <tr><td class="purple">&lt;details&gt;</td><td>details about document or parts of a document, not visible by default</td></tr>
  <tr><td>&lt;dfn&gt;</td><td>definition term</td></tr>
  <tr><td class="orange">&lt;dir&gt;</td><td>directory list, us the &lt;ul&gt; tag instead</td></tr>
  <tr><td>&lt;div&gt;</td><td>division of a document, used to group and format other elements</td></tr>
  <tr><td>&lt;dl&gt;</td><td>definition list</td></tr>
  <tr><td>&lt;dt&gt;</td><td>item or term in a definition list</td></tr>
  <tr><td>&lt;em&gt;</td><td>emphasized text</td></tr>
  <tr><td class="purple">&lt;embed&gt;</td><td>external interactive content or plugin</td></tr>
  <tr><td>&lt;fieldset&gt;</td><td>groups elements inside a form</td></tr>
  <tr><td class="purple">&lt;figcaption&gt;</td><td>caption of a &lt;figure&gt; element</td></tr>
  <tr><td class="purple">&lt;figure&gt;</td><td>groups stand-alone content used to explain parts of a document</td></tr>
  <tr><td class="orange">&lt;font&gt;</td><td>font face, font size, and font color, use styles instead</td></tr>
  <tr><td class="purple">&lt;footer&gt;</td><td>footer of a document</td></tr>
  <tr><td>&lt;form&gt;</td><td>element for user input to pass data to a server</td></tr>
  <tr><td class="orange">&lt;frame&gt;</td><td>particular window or frame within a frameset, bad for usability</td></tr>
  <tr><td class="orange">&lt;frameset&gt;</td><td>organizes multiple windows or frames, bad for usability</td></tr>
  <tr><td>&lt;h1&gt; to &lt;h6&gt;</td><td>headings, &lt;h1&gt; is largest or most important</td></tr>
  <tr><td>&lt;head&gt;</td><td>information about the document, container for head elements</td></tr>
  <tr><td class="purple">&lt;header&gt;</td><td>introduction to the document</td></tr>
  <tr><td class="purple">&lt;hgroup&gt;</td><td>group of headings</td></tr>
  <tr><td>&lt;hr&gt;</td><td>horizontal rule</td></tr>
  <tr><td>&lt;html&gt;</td><td>defines document as HTML, outermost/root element</td></tr>
  <tr><td>&lt;i&gt;</td><td>italic text</td></tr>
  <tr><td>&lt;iframe&gt;</td><td>inline frame containing another document</td></tr>
  <tr><td>&lt;img&gt;</td><td>image</td></tr>
  <tr><td>&lt;input&gt;</td><td>input field for user data</td></tr>
  <tr><td>&lt;ins&gt;</td><td>inserted text</td></tr>
  <tr><td class="purple">&lt;keygen&gt;</td><td>generated key in a form</td></tr>
  <tr><td>&lt;kbd&gt;</td><td>keyboard text</td></tr>
  <tr><td>&lt;label&gt;</td><td>label for a form control</td></tr>
  <tr><td>&lt;legend&gt;</td><td>caption for &lt;fieldset&gt;, &lt;figure&gt; or &lt;details&gt; elements</td></tr>
  <tr><td>&lt;li&gt;</td><td>list item</td></tr>
  <tr><td>&lt;link&gt;</td><td>defines relationship between a document and an external resource</td></tr>
  <tr><td>&lt;map&gt;</td><td>image map</td></tr>
  <tr><td class="purple">&lt;mark&gt;</td><td>marked text</td></tr>
  <tr><td>&lt;menu&gt;</td><td>list or menu of commands</td></tr>
  <tr><td>&lt;meta&gt;</td><td>provides information about the document, always goes insode the &lt;head&gt; element</td></tr>
  <tr><td class="purple">&lt;meter&gt;</td><td>measurements within a predetermined range</td></tr>
  <tr><td class="purple">&lt;nav&gt;</td><td>a section of navigation</td></tr>
  <tr><td class="orange">&lt;noframes&gt;</td><td>text for browsers that don't support frames</td></tr>
  <tr><td>&lt;noscript&gt;</td><td>alternate content for browsers without script support or scripts disabled</td></tr>
  <tr><td>&lt;object&gt;</td><td>embeds external objects in a document</td></tr>
  <tr><td>&lt;ol&gt;</td><td>ordered (numbered) list</td></tr>
  <tr><td>&lt;optgroup&gt;</td><td>groups related options in a drop-down list</td></tr>
  <tr><td>&lt;option&gt;</td><td>defines values of a &lt;select&gt; of &lt;datalist&gt; element</td></tr>
  <tr><td class="purple">&lt;output&gt;</td><td>result of a calculation</td></tr>
  <tr><td>&lt;p&gt;</td><td>paragraph</td></tr>
  <tr><td>&lt;param&gt;</td><td>parameters or variables for &lt;object&gt; elements</td></tr>
  <tr><td>&lt;pre&gt;</td><td>preformatted text, preserves spaces and line breaks</td></tr>
  <tr><td class="purple">&lt;progress&gt;</td><td>displays progress of a task or function</td></tr>
  <tr><td>&lt;q&gt;</td><td>short quotation</td></tr>
  <tr><td class="purple">&lt;rp&gt;</td><td>what to show if a browser does not support the ruby element</td></tr>
  <tr><td class="purple">&lt;rt&gt;</td><td>explanation or pronunciation of characters</td></tr>
  <tr><td class="purple">&lt;ruby&gt;</td><td>ruby annotation, for East Asian typography</td></tr>
  <tr><td class="orange">&lt;s&gt;</td><td>text that is no longer correct, accurate or relevant</td></tr>
  <tr><td>&lt;samp&gt;</td><td>sample computer code</td></tr>
  <tr><td>&lt;script&gt;</td><td>defines a client-side script</td></tr>
  <tr><td class="purple">&lt;section&gt;</td><td>sections of a document</td></tr>
  <tr><td>&lt;select&gt;</td><td>creates a selectable drop-down list</td></tr>
  <tr><td>&lt;small&gt;</td><td>small text</td></tr>
  <tr><td class="purple">&lt;source&gt;</td><td>resources for media elements, such as &lt;video&gt; and &lt;audio&gt;.</td></tr>
  <tr><td>&lt;span&gt;</td><td>groups inline elements</td></tr>
  <tr><td class="orange">&lt;strike&gt;</td><td>strikethrough text</td></tr>
  <tr><td>&lt;strong&gt;</td><td>strong text</td></tr>
  <tr><td>&lt;style&gt;</td><td>style definitions</td></tr>
  <tr><td>&lt;sub&gt;</td><td>subscripted text</td></tr>
  <tr><td class="purple">&lt;summary&gt;</td><td>header for &lt;details&gt; element</td></tr>
  <tr><td>&lt;sup&gt;</td><td>superscripted text</td></tr>
  <tr><td>&lt;table&gt;</td><td>table</td></tr>
  <tr><td>&lt;tbody&gt;</td><td>table body</td></tr>
  <tr><td>&lt;td&gt;</td><td>standard cell in a table</td></tr>
  <tr><td>&lt;textarea&gt;</td><td>defines a multi-line text input control</td></tr>
  <tr><td>&lt;tfoot&gt;</td><td>groups the footer content in a table</td></tr>
  <tr><td>&lt;th&gt;</td><td>header cell in a table</td></tr>
  <tr><td>&lt;thead&gt;</td><td>groups the header content in a table</td></tr>
  <tr><td class="purple">&lt;time&gt;</td><td>defines date, time or both</td></tr>
  <tr><td>&lt;title&gt;</td><td>document title</td></tr>
  <tr><td>&lt;tr&gt;</td><td>table row</td></tr>
  <tr><td class="orange">&lt;tt&gt;</td><td>teletype text</td></tr>
  <tr><td class="orange">&lt;u&gt;</td><td>underlined text</td></tr>
  <tr><td>&lt;ul&gt;</td><td>unordered (bulleted) list</td></tr>
  <tr><td>&lt;var&gt;</td><td>variable</td></tr>
  <tr><td class="purple">&lt;video&gt;</td><td>video</td></tr>
  <tr><td class="purple">&lt;wbr&gt;</td><td>defines where in a word it would be ok to add a line-break</td></tr>
  <tr><td class="orange">&lt;xmp&gt;</td><td>preformatted text</td></tr>
</table>
          </div><!-- end tags -->
        
          <div id="entities">
            <h3>Character Entities</h3>
            <p>Here is a reference table of all special characters and their corresponding codes.</p>
<table>
  <tr><th style="width:20%;">Character</th><th style="width:20%;">Number</th><th style="width:20%;">Name</th><th style="width:40%;">Description</th></tr>
  <tr><td>&#34;</td><td>&amp;#34;</td><td>&amp;quot;</td><td>quotation mark</td></tr>
  <tr><td>&#39;</td><td>&amp;#39;</td><td>&amp;apos;</td><td>apostrophe</td></tr>
  <tr><td>&#38;</td><td>&amp;#38;</td><td>&amp;amp;</td><td>ampersand</td></tr>
  <tr><td>&#60;</td><td>&amp;#60;</td><td>&amp;lt;</td><td>less-than</td></tr>
  <tr><td>&#62;</td><td>&amp;#62;</td><td>&amp;gt;</td><td>greater-than</td></tr>
  <tr><td>&#160;</td><td>&amp;#160;</td><td>&amp;nbsp;</td><td>non-breaking space</td></tr>
  <tr><td>&#161;</td><td>&amp;#161;</td><td>&amp;iexcl;</td><td>inverted exclamation mark</td></tr>
  <tr><td>&#162;</td><td>&amp;#162;</td><td>&amp;cent;</td><td>cent</td></tr>
  <tr><td>&#163;</td><td>&amp;#163;</td><td>&amp;pound;</td><td>pound</td></tr>
  <tr><td>&#164;</td><td>&amp;#164;</td><td>&amp;curren;</td><td>currency</td></tr>
  <tr><td>&#165;</td><td>&amp;#165;</td><td>&amp;yen;</td><td>yen</td></tr>
  <tr><td>&#166;</td><td>&amp;#166;</td><td>&amp;brvbar;</td><td>broken vertical bar</td></tr>
  <tr><td>&#167;</td><td>&amp;#167;</td><td>&amp;sect;</td><td>section</td></tr>
  <tr><td>&#168;</td><td>&amp;#168;</td><td>&amp;uml;</td><td>spacing diaeresis</td></tr>
  <tr><td>&#169;</td><td>&amp;#169;</td><td>&amp;copy;</td><td>copyright</td></tr>
  <tr><td>&#170;</td><td>&amp;#170;</td><td>&amp;ordf;</td><td>feminine ordinal indicator</td></tr>
  <tr><td>&laquo;</td><td>&amp;#171;</td><td>&amp;laquo;</td><td>left angle quotation</td></tr>
  <tr><td>&#172;</td><td>&amp;#172;</td><td>&amp;not;</td><td>negation</td></tr>
  <tr><td>&#173;</td><td>&amp;#173;</td><td>&amp;shy;</td><td>soft hyphen</td></tr>
  <tr><td>&#174;</td><td>&amp;#174;</td><td>&amp;reg;</td><td>registered trademark</td></tr>
  <tr><td>&#175;</td><td>&amp;#175;</td><td>&amp;macr;</td><td>spacing macron</td></tr>
  <tr><td>&#176;</td><td>&amp;#176;</td><td>&amp;deg;</td><td>degree</td></tr>
  <tr><td>&#177;</td><td>&amp;#177;</td><td>&amp;plusmn;</td><td>plus-or-minus</td></tr>
  <tr><td>&#178;</td><td>&amp;#178;</td><td>&amp;sup2;</td><td>superscript 2</td></tr>
  <tr><td>&#179;</td><td>&amp;#179;</td><td>&amp;sup3;</td><td>superscript 3</td></tr>
  <tr><td>&#180;</td><td>&amp;#180;</td><td>&amp;acute;</td><td>spacing acute</td></tr>
  <tr><td>&#181;</td><td>&amp;#181;</td><td>&amp;micro;</td><td>micro</td></tr>
  <tr><td>&#182;</td><td>&amp;#182;</td><td>&amp;para;</td><td>paragraph</td></tr>
  <tr><td>&#183;</td><td>&amp;#183;</td><td>&amp;middot;</td><td>middle dot</td></tr>
  <tr><td>&#184;</td><td>&amp;#184;</td><td>&amp;cedil;</td><td>spacing cedilla</td></tr>
  <tr><td>&#185;</td><td>&amp;#185;</td><td>&amp;sup1;</td><td>superscript 1</td></tr>
  <tr><td>&#186;</td><td>&amp;#186;</td><td>&amp;ordm;</td><td>masculine ordinal indicator</td></tr>
  <tr><td>&#187;</td><td>&amp;#187;</td><td>&amp;raquo;</td><td>right angle quotation</td></tr>
  <tr><td>&#188;</td><td>&amp;#188;</td><td>&amp;frac14;</td><td>fraction 1/4</td></tr>
  <tr><td>&#189;</td><td>&amp;#189;</td><td>&amp;frac12;</td><td>fraction 1/2</td></tr>
  <tr><td>&#190;</td><td>&amp;#190;</td><td>&amp;frac34;</td><td>fraction 3/4</td></tr>
  <tr><td>&#191;</td><td>&amp;#191;</td><td>&amp;iquest;</td><td>inverted question mark</td></tr>
  <tr><td>&#192;</td><td>&amp;#192;</td><td>&amp;Agrave;</td><td>capital a, grave accent</td></tr>
  <tr><td>&#193;</td><td>&amp;#193;</td><td>&amp;Aacute;</td><td>capital a, acute accent</td></tr>
  <tr><td>&#194;</td><td>&amp;#194;</td><td>&amp;Acirc;</td><td>capital a, circumflex accent</td></tr>
  <tr><td>&#195;</td><td>&amp;#195;</td><td>&amp;Atilde;</td><td>capital a, tilde</td></tr>
  <tr><td>&#196;</td><td>&amp;#196;</td><td>&amp;Auml;</td><td>capital a, umlaut mark</td></tr>
  <tr><td>&#197;</td><td>&amp;#197;</td><td>&amp;Aring;</td><td>capital a, ring</td></tr>
  <tr><td>&#198;</td><td>&amp;#198;</td><td>&amp;AElig;</td><td>capital ae</td></tr>
  <tr><td>&#199;</td><td>&amp;#199;</td><td>&amp;Ccedil;</td><td>capital c, cedilla</td></tr>
  <tr><td>&#200;</td><td>&amp;#200;</td><td>&amp;Egrave;</td><td>capital e, grave accent</td></tr>
  <tr><td>&#201;</td><td>&amp;#201;</td><td>&amp;Eacute;</td><td>capital e, acute accent</td></tr>
  <tr><td>&#202;</td><td>&amp;#202;</td><td>&amp;Ecirc;</td><td>capital e, circumflex accent</td></tr>
  <tr><td>&#203;</td><td>&amp;#203;</td><td>&amp;Euml;</td><td>capital e, umlaut mark</td></tr>
  <tr><td>&#204;</td><td>&amp;#204;</td><td>&amp;Igrave;</td><td>capital i, grave accent</td></tr>
  <tr><td>&#205;</td><td>&amp;#205;</td><td>&amp;Iacute;</td><td>capital i, acute accent</td></tr>
  <tr><td>&#206;</td><td>&amp;#206;</td><td>&amp;Icirc;</td><td>capital i, circumflex accent</td></tr>
  <tr><td>&#207;</td><td>&amp;#207;</td><td>&amp;Iuml;</td><td>capital i, umlaut mark</td></tr>
  <tr><td>&#208;</td><td>&amp;#208;</td><td>&amp;ETH;</td><td>capital eth, Icelandic</td></tr>
  <tr><td>&#209;</td><td>&amp;#209;</td><td>&amp;Ntilde;</td><td>capital n, tilde</td></tr>
  <tr><td>&#210;</td><td>&amp;#210;</td><td>&amp;Ograve;</td><td>capital o, grave accent</td></tr>
  <tr><td>&#211;</td><td>&amp;#211;</td><td>&amp;Oacute;</td><td>capital o, acute accent</td></tr>
  <tr><td>&#212;</td><td>&amp;#212;</td><td>&amp;Ocirc;</td><td>capital o, circumflex accent</td></tr>
  <tr><td>&#213;</td><td>&amp;#213;</td><td>&amp;Otilde;</td><td>capital o, tilde</td></tr>
  <tr><td>&#214;</td><td>&amp;#214;</td><td>&amp;Ouml;</td><td>capital o, umlaut mark</td></tr>
  <tr><td>&#215;</td><td>&amp;#215;</td><td>&amp;times;</td><td>multiplication</td></tr>
  <tr><td>&#216;</td><td>&amp;#216;</td><td>&amp;Oslash;</td><td>capital o, slash</td></tr>
  <tr><td>&#217;</td><td>&amp;#217;</td><td>&amp;Ugrave;</td><td>capital u, grave accent</td></tr>
  <tr><td>&#218;</td><td>&amp;#218;</td><td>&amp;Uacute;</td><td>capital u, acute accent</td></tr>
  <tr><td>&#219;</td><td>&amp;#219;</td><td>&amp;Ucirc;</td><td>capital u, circumflex accent</td></tr>
  <tr><td>&#220;</td><td>&amp;#220;</td><td>&amp;Uuml;</td><td>capital u, umlaut mark</td></tr>
  <tr><td>&#221;</td><td>&amp;#221;</td><td>&amp;Yacute;</td><td>capital y, acute accent</td></tr>
  <tr><td>&#222;</td><td>&amp;#222;</td><td>&amp;THORN;</td><td>capital THORN, Icelandic</td></tr>
  <tr><td>&#223;</td><td>&amp;#223;</td><td>&amp;szlig;</td><td>small sharp s, German</td></tr>
  <tr><td>&#224;</td><td>&amp;#224;</td><td>&amp;agrave;</td><td>small a, grave accent</td></tr>
  <tr><td>&#225;</td><td>&amp;#225;</td><td>&amp;aacute;</td><td>small a, acute accent</td></tr>
  <tr><td>&#226;</td><td>&amp;#226;</td><td>&amp;acirc;</td><td>small a, circumflex accent</td></tr>
  <tr><td>&#227;</td><td>&amp;#227;</td><td>&amp;atilde;</td><td>small a, tilde</td></tr>
  <tr><td>&#228;</td><td>&amp;#228;</td><td>&amp;auml;</td><td>small a, umlaut mark</td></tr>
  <tr><td>&#229;</td><td>&amp;#229;</td><td>&amp;aring;</td><td>small a, ring</td></tr>
  <tr><td>&#230;</td><td>&amp;#230;</td><td>&amp;aelig;</td><td>small ae</td></tr>
  <tr><td>&#231;</td><td>&amp;#231;</td><td>&amp;ccedil;</td><td>small c, cedilla</td></tr>
  <tr><td>&#232;</td><td>&amp;#232;</td><td>&amp;egrave;</td><td>small e, grave accent</td></tr>
  <tr><td>&#233;</td><td>&amp;#233;</td><td>&amp;eacute;</td><td>small e, acute accent</td></tr>
  <tr><td>&#234;</td><td>&amp;#234;</td><td>&amp;ecirc;</td><td>small e, circumflex accent</td></tr>
  <tr><td>&#235;</td><td>&amp;#235;</td><td>&amp;euml;</td><td>small e, umlaut mark</td></tr>
  <tr><td>&#236;</td><td>&amp;#236;</td><td>&amp;igrave;</td><td>small i, grave accent</td></tr>
  <tr><td>&#237;</td><td>&amp;#237;</td><td>&amp;iacute;</td><td>small i, acute accent</td></tr>
  <tr><td>&#238;</td><td>&amp;#238;</td><td>&amp;icirc;</td><td>small i, circumflex accent</td></tr>
  <tr><td>&#239;</td><td>&amp;#239;</td><td>&amp;iuml;</td><td>small i, umlaut mark</td></tr>
  <tr><td>&#240;</td><td>&amp;#240;</td><td>&amp;eth;</td><td>small eth, Icelandic</td></tr>
  <tr><td>&#241;</td><td>&amp;#241;</td><td>&amp;ntilde;</td><td>small n, tilde</td></tr>
  <tr><td>&#242;</td><td>&amp;#242;</td><td>&amp;ograve;</td><td>small o, grave accent</td></tr>
  <tr><td>&#243;</td><td>&amp;#243;</td><td>&amp;oacute;</td><td>small o, acute accent</td></tr>
  <tr><td>&#244;</td><td>&amp;#244;</td><td>&amp;ocirc;</td><td>small o, circumflex accent</td></tr>
  <tr><td>&#245;</td><td>&amp;#245;</td><td>&amp;otilde;</td><td>small o, tilde</td></tr>
  <tr><td>&#246;</td><td>&amp;#246;</td><td>&amp;ouml;</td><td>small o, umlaut mark</td></tr>
  <tr><td>&#247;</td><td>&amp;#247;</td><td>&amp;divide;</td><td>division</td></tr>
  <tr><td>&#248;</td><td>&amp;#248;</td><td>&amp;oslash;</td><td>small o, slash</td></tr>
  <tr><td>&#249;</td><td>&amp;#249;</td><td>&amp;ugrave;</td><td>small u, grave accent</td></tr>
  <tr><td>&#250;</td><td>&amp;#250;</td><td>&amp;uacute;</td><td>small u, acute accent</td></tr>
  <tr><td>&#251;</td><td>&amp;#251;</td><td>&amp;ucirc;</td><td>small u, circumflex accent</td></tr>
  <tr><td>&#252;</td><td>&amp;#252;</td><td>&amp;uuml;</td><td>small u, umlaut mark</td></tr>
  <tr><td>&#253;</td><td>&amp;#253;</td><td>&amp;yacute;</td><td>small y, acute accent</td></tr>
  <tr><td>&#254;</td><td>&amp;#254;</td><td>&amp;thorn;</td><td>small thorn, Icelandic</td></tr>
  <tr><td>&#255;</td><td>&amp;#255;</td><td>&amp;yuml;</td><td>small y, umlaut mark</td></tr>
  <tr><td>&#338;</td><td>&amp;#338;</td><td>&amp;OElig;</td><td>capital ligature OE</td></tr>
  <tr><td>&#339;</td><td>&amp;#339;</td><td>&amp;oelig;</td><td>small ligature oe</td></tr>
  <tr><td>&#352;</td><td>&amp;#352;</td><td>&amp;Scaron;</td><td>capital S with caron</td></tr>
  <tr><td>&#353;</td><td>&amp;#353;</td><td>&amp;scaron;</td><td>small S with caron</td></tr>
  <tr><td>&#376;</td><td>&amp;#376;</td><td>&amp;Yuml;</td><td>capital Y with diaeres</td></tr>
  <tr><td>&#402;</td><td>&amp;#402;</td><td>&amp;fnof;</td><td>f with hook</td></tr>
  <tr><td>&#710;</td><td>&amp;#710;</td><td>&amp;circ;</td><td>modifier letter circumflex</td></tr>
  <tr><td>&#732;</td><td>&amp;#732;</td><td>&amp;tilde;</td><td>small tilde</td></tr>
  <tr><td>&#913;</td><td>&amp;#913;</td><td>&amp;Alpha;</td><td>Alpha</td></tr>
  <tr><td>&#914;</td><td>&amp;#914;</td><td>&amp;Beta;</td><td>Beta</td></tr>
  <tr><td>&#915;</td><td>&amp;#915;</td><td>&amp;Gamma;</td><td>Gamma</td></tr>
  <tr><td>&#916;</td><td>&amp;#916;</td><td>&amp;Delta;</td><td>Delta</td></tr>
  <tr><td>&#917;</td><td>&amp;#917;</td><td>&amp;Epsilon;</td><td>Epsilon</td></tr>
  <tr><td>&#918;</td><td>&amp;#918;</td><td>&amp;Zeta;</td><td>Zeta</td></tr>
  <tr><td>&#919;</td><td>&amp;#919;</td><td>&amp;Eta;</td><td>Eta</td></tr>
  <tr><td>&#920;</td><td>&amp;#920;</td><td>&amp;Theta;</td><td>Theta</td></tr>
  <tr><td>&#921;</td><td>&amp;#921;</td><td>&amp;Iota;</td><td>Iota</td></tr>
  <tr><td>&#922;</td><td>&amp;#922;</td><td>&amp;Kappa;</td><td>Kappa</td></tr>
  <tr><td>&#923;</td><td>&amp;#923;</td><td>&amp;Lambda;</td><td>Lambda</td></tr>
  <tr><td>&#924;</td><td>&amp;#924;</td><td>&amp;Mu;</td><td>Mu</td></tr>
  <tr><td>&#925;</td><td>&amp;#925;</td><td>&amp;Nu;</td><td>Nu</td></tr>
  <tr><td>&#926;</td><td>&amp;#926;</td><td>&amp;Xi;</td><td>Xi</td></tr>
  <tr><td>&#927;</td><td>&amp;#927;</td><td>&amp;Omicron;</td><td>Omicron</td></tr>
  <tr><td>&#928;</td><td>&amp;#928;</td><td>&amp;Pi;</td><td>Pi</td></tr>
  <tr><td>&#929;</td><td>&amp;#929;</td><td>&amp;Rho;</td><td>Rho</td></tr>
  <tr><td>&#931;</td><td>&amp;#931;</td><td>&amp;Sigma;</td><td>Sigma</td></tr>
  <tr><td>&#932;</td><td>&amp;#932;</td><td>&amp;Tau;</td><td>Tau</td></tr>
  <tr><td>&#933;</td><td>&amp;#933;</td><td>&amp;Upsilon;</td><td>Upsilon</td></tr>
  <tr><td>&#934;</td><td>&amp;#934;</td><td>&amp;Phi;</td><td>Phi</td></tr>
  <tr><td>&#935;</td><td>&amp;#935;</td><td>&amp;Chi;</td><td>Chi</td></tr>
  <tr><td>&#936;</td><td>&amp;#936;</td><td>&amp;Psi;</td><td>Psi</td></tr>
  <tr><td>&#937;</td><td>&amp;#937;</td><td>&amp;Omega;</td><td>Omega</td></tr>
  <tr><td>&#945;</td><td>&amp;#945;</td><td>&amp;alpha;</td><td>alpha</td></tr>
  <tr><td>&#946;</td><td>&amp;#946;</td><td>&amp;beta;</td><td>beta</td></tr>
  <tr><td>&#947;</td><td>&amp;#947;</td><td>&amp;gamma;</td><td>gamma</td></tr>
  <tr><td>&#948;</td><td>&amp;#948;</td><td>&amp;delta;</td><td>delta</td></tr>
  <tr><td>&#949;</td><td>&amp;#949;</td><td>&amp;epsilon;</td><td>epsilon</td></tr>
  <tr><td>&#950;</td><td>&amp;#950;</td><td>&amp;zeta;</td><td>zeta</td></tr>
  <tr><td>&#951;</td><td>&amp;#951;</td><td>&amp;eta;</td><td>eta</td></tr>
  <tr><td>&#952;</td><td>&amp;#952;</td><td>&amp;theta;</td><td>theta</td></tr>
  <tr><td>&#953;</td><td>&amp;#953;</td><td>&amp;iota;</td><td>iota</td></tr>
  <tr><td>&#954;</td><td>&amp;#954;</td><td>&amp;kappa;</td><td>kappa</td></tr>
  <tr><td>&#955;</td><td>&amp;#955;</td><td>&amp;lambda;</td><td>lambda</td></tr>
  <tr><td>&#956;</td><td>&amp;#956;</td><td>&amp;mu;</td><td>mu</td></tr>
  <tr><td>&#957;</td><td>&amp;#957;</td><td>&amp;nu;</td><td>nu</td></tr>
  <tr><td>&#958;</td><td>&amp;#958;</td><td>&amp;xi;</td><td>xi</td></tr>
  <tr><td>&#959;</td><td>&amp;#959;</td><td>&amp;omicron;</td><td>omicron</td></tr>
  <tr><td>&#960;</td><td>&amp;#960;</td><td>&amp;pi;</td><td>pi</td></tr>
  <tr><td>&#961;</td><td>&amp;#961;</td><td>&amp;rho;</td><td>rho</td></tr>
  <tr><td>&#962;</td><td>&amp;#962;</td><td>&amp;sigmaf;</td><td>sigmaf</td></tr>
  <tr><td>&#963;</td><td>&amp;#963;</td><td>&amp;sigma;</td><td>sigma</td></tr>
  <tr><td>&#964;</td><td>&amp;#964;</td><td>&amp;tau;</td><td>tau</td></tr>
  <tr><td>&#965;</td><td>&amp;#965;</td><td>&amp;upsilon;</td><td>upsilon</td></tr>
  <tr><td>&#966;</td><td>&amp;#966;</td><td>&amp;phi;</td><td>phi</td></tr>
  <tr><td>&#967;</td><td>&amp;#967;</td><td>&amp;chi;</td><td>chi</td></tr>
  <tr><td>&#968;</td><td>&amp;#968;</td><td>&amp;psi;</td><td>psi</td></tr>
  <tr><td>&#969;</td><td>&amp;#969;</td><td>&amp;omega;</td><td>omega</td></tr>
  <tr><td>&#977;</td><td>&amp;#977;</td><td>&amp;thetasym;</td><td>theta symbol</td></tr>
  <tr><td>&#978;</td><td>&amp;#978;</td><td>&amp;upsih;</td><td>upsilon symbol</td></tr>
  <tr><td>&#982;</td><td>&amp;#982;</td><td>&amp;piv;</td><td>pi symbol</td></tr>
  <tr><td>&#8194;</td><td>&amp;#8194;</td><td>&amp;ensp;</td><td>en space</td></tr>
  <tr><td>&#8195;</td><td>&amp;#8195;</td><td>&amp;emsp;</td><td>em space</td></tr>
  <tr><td>&#8201;</td><td>&amp;#8201;</td><td>&amp;thinsp;</td><td>thin space</td></tr>
  <tr><td>&#8204;</td><td>&amp;#8204;</td><td>&amp;zwnj;</td><td>zero width non-joiner</td></tr>
  <tr><td>&#8205;</td><td>&amp;#8205;</td><td>&amp;zwj;</td><td>zero width joiner</td></tr>
  <tr><td>&#8206;</td><td>&amp;#8206;</td><td>&amp;lrm;</td><td>left-to-right mark</td></tr>
  <tr><td>&#8207;</td><td>&amp;#8207;</td><td>&amp;rlm;</td><td>right-to-left mark</td></tr>
  <tr><td>&#8211;</td><td>&amp;#8211;</td><td>&amp;ndash;</td><td>en dash</td></tr>
  <tr><td>&#8212;</td><td>&amp;#8212;</td><td>&amp;mdash;</td><td>em dash</td></tr>
  <tr><td>&#8216;</td><td>&amp;#8216;</td><td>&amp;lsquo;</td><td>left single quotation</td></tr>
  <tr><td>&#8217;</td><td>&amp;#8217;</td><td>&amp;rsquo;</td><td>right single quotation</td></tr>
  <tr><td>&#8218;</td><td>&amp;#8218;</td><td>&amp;sbquo;</td><td>single low-9 quotation</td></tr>
  <tr><td>&#8220;</td><td>&amp;#8220;</td><td>&amp;ldquo;</td><td>left double quotation</td></tr>
  <tr><td>&#8221;</td><td>&amp;#8221;</td><td>&amp;rdquo;</td><td>right double quotation</td></tr>
  <tr><td>&#8222;</td><td>&amp;#8222;</td><td>&amp;bdquo;</td><td>double low-9 quotation</td></tr>
  <tr><td>&#8224;</td><td>&amp;#8224;</td><td>&amp;dagger;</td><td>dagger</td></tr>
  <tr><td>&#8225;</td><td>&amp;#8225;</td><td>&amp;Dagger;</td><td>double dagger</td></tr>
  <tr><td>&#8226;</td><td>&amp;#8226;</td><td>&amp;bull;</td><td>bullet</td></tr>
  <tr><td>&#8230;</td><td>&amp;#8230;</td><td>&amp;hellip;</td><td>horizontal ellipsis</td></tr>
  <tr><td>&#8240;</td><td>&amp;#8240;</td><td>&amp;permil;</td><td>per mille</td></tr>
  <tr><td>&#8242;</td><td>&amp;#8242;</td><td>&amp;prime;</td><td>minutes</td></tr>
  <tr><td>&#8243;</td><td>&amp;#8243;</td><td>&amp;Prime;</td><td>seconds</td></tr>
  <tr><td>&#8249;</td><td>&amp;#8249;</td><td>&amp;lsaquo;</td><td>single left angle quotation</td></tr>
  <tr><td>&#8250;</td><td>&amp;#8250;</td><td>&amp;rsaquo;</td><td>single right angle quotation</td></tr>
  <tr><td>&#8254;</td><td>&amp;#8254;</td><td>&amp;oline;</td><td>overline</td></tr>
  <tr><td>&#8364;</td><td>&amp;#8364;</td><td>&amp;euro;</td><td>euro</td></tr>
  <tr><td>&#8482;</td><td>&amp;#8482;</td><td>&amp;trade;</td><td>trademark</td></tr>
  <tr><td>&#8592;</td><td>&amp;#8592;</td><td>&amp;larr;</td><td>left arrow</td></tr>
  <tr><td>&#8593;</td><td>&amp;#8593;</td><td>&amp;uarr;</td><td>up arrow</td></tr>
  <tr><td>&#8594;</td><td>&amp;#8594;</td><td>&amp;rarr;</td><td>right arrow</td></tr>
  <tr><td>&#8595;</td><td>&amp;#8595;</td><td>&amp;darr;</td><td>down arrow</td></tr>
  <tr><td>&#8596;</td><td>&amp;#8596;</td><td>&amp;harr;</td><td>left right arrow</td></tr>
  <tr><td>&#8629;</td><td>&amp;#8629;</td><td>&amp;crarr;</td><td>carriage return arrow</td></tr>
  <tr><td>&#8704;</td><td>&amp;#8704;</td><td>&amp;forall;</td><td>for all</td></tr>
  <tr><td>&#8706;</td><td>&amp;#8706;</td><td>&amp;part;</td><td>part</td></tr>
  <tr><td>&#8707;</td><td>&amp;#8707;</td><td>&amp;exist;</td><td>exists</td></tr>
  <tr><td>&#8709;</td><td>&amp;#8709;</td><td>&amp;empty;</td><td>empty</td></tr>
  <tr><td>&#8711;</td><td>&amp;#8711;</td><td>&amp;nabla;</td><td>nabla</td></tr>
  <tr><td>&#8712;</td><td>&amp;#8712;</td><td>&amp;isin;</td><td>isin</td></tr>
  <tr><td>&#8713;</td><td>&amp;#8713;</td><td>&amp;notin;</td><td>notin</td></tr>
  <tr><td>&#8715;</td><td>&amp;#8715;</td><td>&amp;ni;</td><td>ni</td></tr>
  <tr><td>&#8719;</td><td>&amp;#8719;</td><td>&amp;prod;</td><td>prod</td></tr>
  <tr><td>&#8721;</td><td>&amp;#8721;</td><td>&amp;sum;</td><td>sum</td></tr>
  <tr><td>&#8722;</td><td>&amp;#8722;</td><td>&amp;minus;</td><td>minus</td></tr>
  <tr><td>&#8727;</td><td>&amp;#8727;</td><td>&amp;lowast;</td><td>lowast</td></tr>
  <tr><td>&#8730;</td><td>&amp;#8730;</td><td>&amp;radic;</td><td>square root</td></tr>
  <tr><td>&#8733;</td><td>&amp;#8733;</td><td>&amp;prop;</td><td>proportional to</td></tr>
  <tr><td>&#8734;</td><td>&amp;#8734;</td><td>&amp;infin;</td><td>infinity</td></tr>
  <tr><td>&#8736;</td><td>&amp;#8736;</td><td>&amp;ang;</td><td>angle</td></tr>
  <tr><td>&#8743;</td><td>&amp;#8743;</td><td>&amp;and;</td><td>and</td></tr>
  <tr><td>&#8744;</td><td>&amp;#8744;</td><td>&amp;or;</td><td>or</td></tr>
  <tr><td>&#8745;</td><td>&amp;#8745;</td><td>&amp;cap;</td><td>cap</td></tr>
  <tr><td>&#8746;</td><td>&amp;#8746;</td><td>&amp;cup;</td><td>cup</td></tr>
  <tr><td>&#8747;</td><td>&amp;#8747;</td><td>&amp;int;</td><td>integral</td></tr>
  <tr><td>&#8756;</td><td>&amp;#8756;</td><td>&amp;there4;</td><td>therefore</td></tr>
  <tr><td>&#8764;</td><td>&amp;#8764;</td><td>&amp;sim;</td><td>similar to</td></tr>
  <tr><td>&#8773;</td><td>&amp;#8773;</td><td>&amp;cong;</td><td>congruent to</td></tr>
  <tr><td>&#8776;</td><td>&amp;#8776;</td><td>&amp;asymp;</td><td>almost equal</td></tr>
  <tr><td>&#8800;</td><td>&amp;#8800;</td><td>&amp;ne;</td><td>not equal</td></tr>
  <tr><td>&#8801;</td><td>&amp;#8801;</td><td>&amp;equiv;</td><td>equivalent</td></tr>
  <tr><td>&#8804;</td><td>&amp;#8804;</td><td>&amp;le;</td><td>less or equal</td></tr>
  <tr><td>&#8805;</td><td>&amp;#8805;</td><td>&amp;ge;</td><td>greater or equal</td></tr>
  <tr><td>&#8834;</td><td>&amp;#8834;</td><td>&amp;sub;</td><td>subset of</td></tr>
  <tr><td>&#8835;</td><td>&amp;#8835;</td><td>&amp;sup;</td><td>superset of</td></tr>
  <tr><td>&#8836;</td><td>&amp;#8836;</td><td>&amp;nsub;</td><td>not subset of</td></tr>
  <tr><td>&#8838;</td><td>&amp;#8838;</td><td>&amp;sube;</td><td>subset or equal</td></tr>
  <tr><td>&#8839;</td><td>&amp;#8839;</td><td>&amp;supe;</td><td>superset or equal</td></tr>
  <tr><td>&#8853;</td><td>&amp;#8853;</td><td>&amp;oplus;</td><td>circled plus</td></tr>
  <tr><td>&#8855;</td><td>&amp;#8855;</td><td>&amp;otimes;</td><td>cirled times</td></tr>
  <tr><td>&#8869;</td><td>&amp;#8869;</td><td>&amp;perp;</td><td>perpendicular</td></tr>
  <tr><td>&#8901;</td><td>&amp;#8901;</td><td>&amp;sdot;</td><td>dot operator</td></tr>
  <tr><td>&#8968;</td><td>&amp;#8968;</td><td>&amp;lceil;</td><td>left ceiling</td></tr>
  <tr><td>&#8969;</td><td>&amp;#8969;</td><td>&amp;rceil;</td><td>right ceiling</td></tr>
  <tr><td>&#8970;</td><td>&amp;#8970;</td><td>&amp;lfloor;</td><td>left floor</td></tr>
  <tr><td>&#8971;</td><td>&amp;#8971;</td><td>&amp;rfloor;</td><td>right floor</td></tr>
  <tr><td>&#9674;</td><td>&amp;#9674;</td><td>&amp;loz;</td><td>lozenge</td></tr>
  <tr><td>&#9824;</td><td>&amp;#9824;</td><td>&amp;spades;</td><td>spade</td></tr>
  <tr><td>&#9827;</td><td>&amp;#9827;</td><td>&amp;clubs;</td><td>club</td></tr>
  <tr><td>&#9829;</td><td>&amp;#9829;</td><td>&amp;hearts;</td><td>heart</td></tr>
  <tr><td>&#9830;</td><td>&amp;#9830;</td><td>&amp;diams;</td><td>diamond</td></tr>
</table>
          </div><!-- end entities -->
          
        </div><!-- end article -->
      </div><!-- end html -->
      
      <div id="css">
        <h2>cascading style sheets [css]</h2>
        <div class="article">
        
          <div id="cssbasics">
            <h3>Basics</h3>
            <p>Syntax</p>
            <p><strong>Example</strong></p>
<pre>
selector        declaration
        \           |
         h1 {color:purple;} /* comment */
              /         \
         property      value
</pre>            
          </div><!-- end cssbasics -->
        
          <div id="measurement">
            <h3>Measurement Values</h3>
            <p>There are several options to choose from when defining the size of an element or font. You should pick the proper units for your intended application. When designing for the screen you will most commonly use <strong>px</strong>, <strong>%</strong> and <strong>em</strong>.</p>
<table>
  <tr><th style="width:20%;">Units</th><th style="width:80%;">Description</th></tr>
  <tr><td>%</td><td>percentage</td></tr>
  <tr><td>px</td><td>pixels, 1px equals 1 dot on a computer screen</td></tr>
  <tr><td>em</td><td>ems are proportional to a user&rsquo;s set font size, 1em equals the current font size, 2em is twice the current font size, etc</td></tr>
  <tr><td>ex</td><td>x-height, 1ex equals the x-height of a font</td></tr>
  <tr><td>in</td><td>inches</td></tr>
  <tr><td>cm</td><td>centimeters</td></tr>
  <tr><td>mm</td><td>millimeters</td></tr>
  <tr><td>pt</td><td>points, 1pt equals 1/72 inch</td></tr>
  <tr><td>pc</td><td>picas, 1pc equals 12 points</td></tr>
</table>
          </div><!-- end measurement -->
          
          <div id="color">
            <h3>Color Values</h3>
            <p>Defining color values in HTML and CSS can be accomplished in a few different ways, the most common being hexadecimal [hex]. Hex values are defined using the number sign [#] followed by a combination of six numbers and letters. Red, blue and green [RGB] can also be used by defining the number value [rgb(255,0,0)] or percentage value [rgb(100%,0%,0%)]. There are also 140 named colors, but they are not all valid according to the World Wide Web Consortium even though they are supported in all major browsers. Listed below are the 16 valid color names defined by the W3C.</p>
<table>
  <tr><th style="width:25%;">Name</th><th style="width:25%;">HEX</th><th style="width:25%;">RGB</th><th style="width:25%;">Color</th></tr>
  <tr><td>Aqua</td><td>#00FFFF</td><td>rgb(0,255,255)</td><td style="background-color:aqua;">&nbsp;</td></tr>
  <tr><td>Black</td><td>#000000</td><td>rgb(0,0,0)</td><td style="background-color:black;">&nbsp;</td></tr>
  <tr><td>Blue</td><td>#0000FF</td><td>rgb(0,0,255)</td><td style="background-color:blue;">&nbsp;</td></tr>
  <tr><td>Fuchsia</td><td>#FF00FF</td><td>rgb(255,0,255)</td><td style="background-color:fuchsia;">&nbsp;</td></tr>
  <tr><td>Gray</td><td>#808080</td><td>rgb(128,128,128)</td><td style="background-color:gray;">&nbsp;</td></tr>
  <tr><td>Green</td><td>#008000</td><td>rgb(0,128,0)</td><td style="background-color:green;">&nbsp;</td></tr>
  <tr><td>Lime</td><td>#00FF00</td><td>rgb(0,255,0)</td><td style="background-color:lime;">&nbsp;</td></tr>
  <tr><td>Maroon</td><td>#800000</td><td>rgb(128,0,0)</td><td style="background-color:maroon;">&nbsp;</td></tr>
  <tr><td>Navy</td><td>#000080</td><td>rgb(0,0,128)</td><td style="background-color:navy;">&nbsp;</td></tr>
  <tr><td>Olive</td><td>#808000</td><td>rgb(128,128,0)</td><td style="background-color:olive;">&nbsp;</td></tr>
  <tr><td>Purple</td><td>#800080</td><td>rgb(128,0,128)</td><td style="background-color:purple;">&nbsp;</td></tr>
  <tr><td>Red</td><td>#FF0000</td><td>rgb(255,0,0)</td><td style="background-color:red;">&nbsp;</td></tr>
  <tr><td>Silver</td><td>#C0C0C0</td><td>rgb(192,192,192)</td><td style="background-color:silver;">&nbsp;</td></tr>
  <tr><td>Teal</td><td>#008080</td><td>rgb(0,128,128)</td><td style="background-color:teal;">&nbsp;</td></tr>
  <tr><td>White</td><td>#FFFFFF</td><td>rgb(255,255,255)</td><td style="background-color:white;">&nbsp;</td></tr>
  <tr><td>Yellow</td><td>#FFFF00</td><td>rgb(255,255,0)</td><td style="background-color:yellow;">&nbsp;</td></tr>
</table>
          </div><!-- end color -->
          
        </div><!-- end article -->
      </div><!-- end css -->
      
    </div><!-- end content -->
  </div><!-- end column2 -->

  <div id="column3">
    <div class="content">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/side.html'); ?>
    </div><!-- end content -->
  </div><!-- end column2 -->

  <div class="clear"></div>

  <div id="footer">
    <div class="content">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.html'); ?>
    </div><!-- end content -->
  </div><!-- end footer -->

</div><!-- end fixedwidth -->

</body>
</html>