<?php
/* Phorm Function Library */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 * Copyright (c) 1999-2002 Holotech Enterprises (phorm@holotech.net)
 *
 * You may freely distribute this program as-is, without modifications,
 * and with the accompanying example files and documentation. You may use
 * this program freely, and modify it for your own purposes. There is no
 * charge for this program, but you are encouraged to register it if you
 * find it useful.
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

 $ph_LibLoad = true;
 $ph_LibVersion = "Phorm v3.5.1";
 $ph_oveuh.= "VGhvbWFzIEplZmZlcnNvbiIsIkEgZ29vZCBw";

/*
  Function to check the PHP or Phorm version. */
  function CheckVers($CheckVers, $Which = "PHP") {
    global $ph_Vers;

    if (!strlen($CheckVers) || !strlen($Which)) return false;

    switch ($Which) {
    case "PHP":
      $PgmVers = phpversion();
      break;

    case "Phorm":
      $PgmVers = str_replace("Phorm v", "", $ph_Vers);
      break;

    default:
      $PgmVers = $Which;
      break;
    }

    list($pMaj, $pMin, $pSub) = explode(".", $PgmVers);
    list($cMaj, $cMin, $cSub) = explode(".", $CheckVers);

    if ($pMaj > $cMaj) return true;
    if ($pMaj < $cMaj) return false;

    if ($pMin > $cMin) return true;
    if ($pMin < $cMin) return false;

    if ($pSub > $cSub) return true;
    if ($pSub < $cSub) return false;
    return true;
  }

/*
  Function to substitute for PHP function in v < 4.0 */
  if (!CheckVers("4.0.0")) {
  function array_reverse($array) {
    $c = count($array) - 1;
    for ($x=$c; $x>=0; $x--) {
      $n[] = $array[$x];
    }
    return $n;
  }
  }

/*
  Function to maintain variable values for plugins */
  function PlugStat($VarList, $Mode="Set/Restore") {
    static $PlugVars, $Initialized;
    global $ph_plfile;

    switch ($Mode) {
    case "Set/Restore":
      $VarList = split(", *", $VarList);

      if (!$Initialized[$ph_plfile]) {
        $Initialized[$ph_plfile] = true;
        while (list(,$var) = each($VarList)) {
          global $$var;

          if (isset($$var)) $PlugVars[$ph_plfile][$var] = $$var;
          else $PlugVars[$ph_plfile][$var] = "";
        }
      }
      else {
        while (list(,$var) = each($VarList)) {
          global $$var;

          $$var = $PlugVars[$ph_plfile][$var];
        }
      }
      break;

    case "Store":
      if (isset($PlugVars[$ph_plfile])) {
        while (list($var) = each($PlugVars[$ph_plfile])) {
          global $$var;
          $PlugVars[$ph_plfile][$var] = $$var;
        }
        reset($PlugVars[$ph_plfile]);
      }
      break;
    }
  } $ph_oveuh.= "dW4gaXMgaXRzIG93biByZXdvcmQuIiwiXCJJ";

/*
  Function to substitute for in_array() in versions < 4.0.0 */
  $ph_oveuh.= "IGFtIGVub3VnaCBvZiBhbiBhcnRpc3QgdG8g";
  if (!CheckVers("4.0.0")) {
  function in_array($needle, $haystack) {
    while (list(, $straw) = each($haystack))
      if ($straw == $needle) return true;
    return false;
  }
  }

/*
  Function to substitute for krsort() in versions < 3.0.13 */
  $ph_oveuh.= "ZHJhdyBmcmVlbHkgdXBvbiBteSBpbWFnaW5h";
  $ph_oveuh.= "dGlvbi4gSW1hZ2luYXRpb24gaXMgbW9yZSBp";
  if (!CheckVers("3.0.13")) {
  function krsort(&$Array, $sort_flags=SORT_REGULAR) {
    while (list($aKeys[]) = each($Array)) $nutn = $nutn;
    rsort($aKeys, $sort_flags);
    while (list(,$aKey) = each($aKeys)) $Result[$aKey] = $Array[$aKey];
    $Array = $Result;
  }
  }

  function VarSub(&$ph_string, $ph_BuildList = false) {
    global $ph_vReg, $ph_AttachList, $ph_FileTable, $ph_upd, $ph_UpLoads,
           $ph_stage, $HTTP_POST_VARS, $HTTP_GET_VARS, $REQUEST_METHOD, $ph_debug35,
           $ph_debug36;

    $ph_pstring = $ph_string;

    $ph_varreg = ($PHORM_VARREG)
      ? "^([A-Za-z_][A-Za-z0-9_]*)"
      : "^([A-Za-z_€-ÿ][A-Za-z0-9_]*)";

    while (ereg($ph_vReg, $ph_pstring, $ph_regs)) {
      $ph_SubVal = ""; $ph_SubVar = "";
      unset($ph_regs1); unset($ph_regs2);

      $ph_pstring = str_replace($ph_regs[0], "", $ph_pstring);
      $ph_SubVar = ereg_replace("^\\$", "", $ph_regs[1]);

      @ereg($ph_varreg, $ph_SubVar, $ph_regs2);
      $ph_gSubVar = $ph_regs2[1];
      global $$ph_gSubVar;
      if ($ph_debug35) echo "$ph_regs[0] -> $ph_gSubVar => ";

      if (ereg("^ph_FORMVARS_?(P?F?)", $ph_SubVar, $ph_regsv)) {
        $ph_FullVars  = ereg("F", $ph_regsv[1]);
        $ph_PhormVars = ereg("P", $ph_regsv[1]);
        $ph_SubVal = "";

        if     ($REQUEST_METHOD == "POST" && is_array($HTTP_POST_VARS)) $ph_DumpArray = $HTTP_POST_VARS;
        elseif ($REQUEST_METHOD == "GET" && is_array($HTTP_GET_VARS))   $ph_DumpArray = $HTTP_GET_VARS;
        else                                                            $ph_DumpArray = $GLOBALS;

        while (list($ph_var, $ph_val) = each($ph_DumpArray)) {
          if (ereg("^ph_", $ph_var) || (ereg("^[a-z]?PHORM_", $ph_var) && !$ph_PhormVars)) continue;
          if ($ph_val || $ph_FullVars) {
            if ($ph_stage == "<ackpg") $ph_SubVal.= "<B>$ph_var:</B> $ph_val<BR>";
            else $ph_SubVal.= "$ph_var: $ph_val\n";
          }
        }
      }
      else {
        if ($ph_debug36) 
          echo "<B>VarSub@".(__LINE__ + 1)."</B> \$ph_SubVal = \$$ph_SubVar;<BR>";
        eval("\$ph_SubVal = \$$ph_SubVar;");
      }

      if ($ph_BuildList && $ph_UpLoads && ereg("^PHORM_FILE([0-9]{2})$", $ph_regs[1], $ph_regs2)) {
        $ph_fidx = $ph_regs2[1];
        if (!ereg("[12]", $ph_FileTable[$ph_fidx]['stat']))
          $ph_AttachList[$ph_fidx] = "$ph_upd/".$ph_FileTable[$ph_fidx]['full'];
        $ph_regs[1] = "ph_nutnhunny";
        $ph_SubVal = "";
      }
      if ($ph_debug35) echo "$ph_SubVal<BR>\n";
      $ph_string = str_replace($ph_regs[0], $ph_SubVal, $ph_string);
    }
  } $ph_oveuh.= "bXBvcnRhbnQgdGhhbiBrbm93bGVkZ2UuIEtu";

/*
  Function to validate a credit card number with the Luhn Mod 10 formula.
  Returns true if the number is valid, false otherwise. */
  $ph_oveuh.= "b3dsZWRnZSBpcyBsaW1pdGVkLiBJbWFnaW5h";
  function ph_luhn($CCNum) {
    $Total = 0;
    $CCNum = strrev($CCNum);

    for ($x=0; $x<strlen($CCNum); $x++) {
      $digit = substr($CCNum,$x,1);
      if ($x/2 != floor($x/2)) {
        $digit *= 2;
        if (strlen($digit) == 2)
          $digit = substr($digit,0,1) + substr($digit,1,1);
      }
      $Total += $digit;
    }
    if ($Total % 10 == 0) return true; else return false;
  } $ph_oveuh.= "dGlvbiBlbmNpcmNsZXMgdGhlIHdvcmxkLlwi";

  function MailChek($Addr, $Level, $Timeout = 15000) {
//  Valid Top-Level Domains
    $gTLDs = "com:net:org:edu:gov:mil:int:arpa:aero:biz:coop:info:museum:name:";
    $CCs   = "ad:ae:af:ag:ai:al:am:an:ao:aq:ar:as:at:au:aw:az:ba:bb:bd:be:bf:".
             "bg:bh:bi:bj:bm:bn:bo:br:bs:bt:bv:bw:by:bz:ca:cc:cf:cd:cg:ch:ci:".
             "ck:cl:cm:cn:co:cr:cs:cu:cv:cx:cy:cz:de:dj:dk:dm:do:dz:ec:ee:eg:".
             "eh:er:es:et:fi:fj:fk:fm:fo:fr:fx:ga:gb:gd:ge:gf:gh:gi:gl:gm:gn:".
             "gp:gq:gr:gs:gt:gu:gw:gy:hk:hm:hn:hr:ht:hu:id:ie:il:in:io:iq:ir:".
             "is:it:jm:jo:jp:ke:kg:kh:ki:km:kn:kp:kr:kw:ky:kz:la:lb:lc:li:lk:".
             "lr:ls:lt:lu:lv:ly:ma:mc:md:mg:mh:mk:ml:mm:mn:mo:mp:mq:mr:ms:mt:".
             "mu:mv:mw:mx:my:mz:na:nc:ne:nf:ng:ni:nl:no:np:nr:nt:nu:nz:om:pa:".
             "pe:pf:pg:ph:pk:pl:pm:pn:pr:pt:pw:py:qa:re:ro:ru:rw:sa:sb:sc:sd:".
             "se:sg:sh:si:sj:sk:sl:sm:sn:so:sr:st:su:sv:sy:sz:tc:td:tf:tg:th:".
             "tj:tk:tm:tn:to:tp:tr:tt:tv:tw:tz:ua:ug:uk:um:us:uy:uz:va:vc:ve:".
             "vg:vi:vn:vu:wf:ws:ye:yt:yu:za:zm:zr:zw:";

//  The countries can have their own 'TLDs', e.g. mydomain.com.au
    $cTLDs = "com:net:org:edu:gov:mil:co:ne:or:ed:go:mi:aero:biz:coop:info:".
             "museum:name:govt:ac:";

    $fail = 0;

//  Shift the address to lowercase to simplify checking and trim
    $Addr = trim(strtolower($Addr));

//  Check for spaces
    if (ereg(" ", $Addr)) $fail = 1;

//  Split the Address into user and domain parts
    $UD = explode("@", $Addr);
    if (sizeof($UD) != 2 || !$UD[0]) $fail = 1;

//  Split the domain part into its Levels
    $Levels = explode(".", $UD[1]); $sLevels = sizeof($Levels);
    if (!$Levels[0] || !$Levels[1]) $fail = 1;

//  Get the TLD, strip off trailing ] } ) > and check the length
    $tld = $Levels[$sLevels-1];
    $tld = ereg_replace("[>)}]$|]$", "", $tld);
    if (strlen($tld) < 2
    || (strlen($tld) > 3 && !ereg(":$tld:", ":arpa:aero:coop:info:museum:name:"))) $fail = 1;

    $Level--;

//  If the string after the last dot isn't in the generic TLDs or country codes, it's invalid.
    if ($Level && !$fail) {
    $Level--;
    if (!ereg($tld.":", $gTLDs) && !ereg($tld.":", $CCs)) $fail = 2;
    }

//  If it's a country code, check for a country TLD; add on the domain name.
    if ($Level && !$fail) {
    $cd = $sLevels - 2; $domain = $Levels[$cd].".".$tld;
    if (ereg($Levels[$cd].":", $cTLDs)) { $cd--; $domain = $Levels[$cd].".".$domain; }
    }

//  See if there's an MX record for the domain
    if ($Level && !$fail) {
    $Level--;
    if (!getmxrr($domain, $mxhosts, $weight)) $fail = 3;
    }

//  Attempt to connect to port 25 on an MX host
    if ($Level && !$fail) {
    $Level--;
    while (!$sh && list($nul, $mxhost) = each($mxhosts))
      $sh = fsockopen($mxhost, 25);
    if (!$sh) $fail=4;
    }

//  See if anyone answers
    if ($Level && !$fail) {
    $Level--;
    set_socket_blocking($sh, false);
    $out = ""; $t = 0;
    while ($Timeout-- && !$out)
      $out = fgets($sh, 256);
    if (!ereg("^220", $out)) $fail = 5;
    }

    if ($sh) fclose($sh);

    return $fail;
  } //MailChek

/*
  Function to parse specified tags from an HTML document */
  $ph_oveuh.= "PEJSPiZuYnNwOyZuYnNwOy0tIEFsYmVydCBF";
  function ParseHTML($HTML, $TagList) {
    $TagList = strtoupper($TagList);
    $HTMLUC  = strtoupper($HTML);

    $TagList = split(", *", $TagList);

    while (list(,$TagType) = each($TagList)) {
      $TagEnd = 0;
      while ($TagStart = strpos($HTMLUC, "<$TagType", $TagEnd)) {
        $TagEnd = strpos($HTMLUC, ">", $TagStart) + 1;
        $TagLen = $TagEnd - $TagStart;

        $Tag = substr($HTML, $TagStart, $TagLen);

        $TagTable[$TagStart]['dtag'] = $Tag;
        $TagTable[$TagStart]['lnth'] = $TagLen;
        $ix++;
      }
    }
    if (is_array($TagTable)) {
      krsort($TagTable);
      return $TagTable;
    }
    else return false;
  } $ph_oveuh.= "aW5zdGVpbiIsIkkgZG8gd2hhdCBteSByaWNl";

/*
  Function to parse attributes from an HTML tag */
  $ph_oveuh.= "IGtyaXNwaWVzIHRlbGwgbWUgdG8uIiwiR2l2";
  function ParseTag($Tag) {
    $QPat = "^\"[^\"]*\"";
    $TagType = true;

    $Tag = ereg_replace("<|>", "", $Tag);

    while ($AttLen = ereg("^[/A-Za-z0-9_-]+", $Tag, $regs)) {
      $Tag = substr($Tag, $AttLen);
      $regs[0] = strtoupper($regs[0]);
      $Tag = ereg_replace("^[[:space:]]*", "", $Tag);
      if ($TagType) {
        $Tag = ereg_replace("^[[:space:]]*", "", $Tag);
        $Atts["TAG"] = $regs[0];
        $TagType = false;
        continue;
      }
      if (ereg("^=", $Tag, $nul)) {
        $Tag = ereg_replace("^=[[:space:]]*", "", $Tag);
        if (ereg("^\"", $Tag, $nul)) {
          $nul = ereg($QPat, $Tag, $aregs);
          $Atts[$regs[0]] = ereg_replace("\"", "", $aregs[0]);
          $Chop = "^$aregs[0][[:space:]]*";
          $Tag = ereg_replace($Chop, "", $Tag);
        }
        else {
          $nul = ereg("^[^[:space:]]*", $Tag, $aregs);
          $Atts[$regs[0]] = $aregs[0];
          $Chop = "^$aregs[0][[:space:]]*";
          $Tag = ereg_replace($Chop, "", $Tag);
        }
      }
      else {
        $Atts[$regs[0]] = true;
        $Tag = ereg_replace("^[[:space:]]*", "", $Tag);
      }
    }
    return $Atts;
  }

/*
  User formatting function. Convert an array to a list */
  $ph_oveuh.= "ZSBzb21lIHBlb3BsZSBhbiBhdHRvcGFyc2Vj";
  function ArrayToList(&$array, $separator = ", ", $conjunction = "and") {
    for ($x=0; $x<sizeof($array); $x++) {
      list($key, $item) = each($array);
      if (strlen($list)) {
        if ($x+1 == sizeof($array) && strlen($conjunction)) $list.= " $conjunction ";
        else $list.= $separator;
      }
      $list.= $array[$key];
    }
    $array = $list;
  }

/*
  Internal function used by ArrayToTable() */
  function array_trim(&$array) {
    foreach ($array as $key => $val) {
      if (!strlen($val)) unset($array[$key]);
    }
  }

/*
  User formatting function. Convert arrays to a table */
  function ArrayToTable() {
    global $PHORM_LINEBRK, $ph_tpd;

    if (!$PHORM_LINEBRK) $PHORM_LINEBRK = str_replace(" ", "", "
    ");
    $PHORM_LINEBRK = str_replace("CR", "\r", $PHORM_LINEBRK);
    $PHORM_LINEBRK = str_replace("LF", "\n", $PHORM_LINEBRK);

    $Args    = func_get_args();
    $NumArgs = count($Args);
    $LastArg = $NumArgs - 1;

//  See if there's a delimiter or template as the last arg.
    if (!is_array($Args[$LastArg])) {
      $L_arg = $Args[$LastArg];

      if (ereg("^\|\|(.+$)", $L_arg, $regs)) $Template  = trim($regs[1]);
      else                                   $Delimiter = $L_arg;

//    Check for a super delimiter
      if (ereg("^>>", $L_arg)) {
        $SuperDelim = true;
        $Delimiter = substr($Delimiter, 2);
      }

      unset($Args[$LastArg]);
      $NumArgs--;
    }

//  Convert all args to scalars and find the largest
    for ($lx=0; $lx<$NumArgs; $lx++) {
      array_trim($Args[$lx]);
      $Args[$lx] = array_values($Args[$lx]);
      $ThisItems = count($Args[$lx]);

      $MaxItems = max($MaxItems, $ThisItems);

      if ($SuperDelim) {
        $TheLongest = 0;
        for ($sx=0; $sx<$ThisItems; $sx++) {
          $TheLongest = max($TheLongest, strlen($Args[$lx][$sx]));
        }
        $Longest[$lx] = $TheLongest;
      }
    }

//  Load or form the template
    if (strlen($Template)) {
      $Template = @implode("", file("$ph_tpd/$Template"));
    }

    if (!strlen($Template)) {
      if (!strlen($Delimiter)) $Delimiter = "\t";
      for ($tx=1; $tx<=$NumArgs; $tx++) {
        $Template.= "{{{$tx}}}".$Delimiter;
      }
      $qDelim = quotemeta(str_replace("|", "\|", $Delimiter));
      $Template = ereg_replace($qDelim."$", "", $Template).$PHORM_LINEBRK;
    }

//  Parse the template
    while (ereg('([^{]*){{([0-9]+)}}', $Template, $regs)) {
      $Chunk    = $regs[1];
      $ChunKey  = $regs[2];

      $ChunkLen = strlen($Chunk) + strlen($ChunKey) + 4;
      $Template = substr($Template, $ChunkLen);

      $Chunks[$ChunKey] = $Chunk;
    }
    $LastChunk = $Template;

//  Do it
    for ($Row=0; $Row<$MaxItems; $Row++) {
      while (list($Col, $tChunk) = each($Chunks)) {
        $tKey  = $Col - 1;
        $Item  = $Args[$Col - 1][$Row];
        $Delim = $tChunk;

        if ($SuperDelim) {
          $LastCol = $Args[$tKey - 1][$Row];
          $Padding = ($Longest[$tKey - 1] - strlen($LastCol)) + 2;
          $Delim = str_repeat($Delim, $Padding);
        }

        $Return.= $Delim.$Item;
      }
      $Return.= $LastChunk;
      reset($Chunks);
    }
    return $Return;
  }

/*
  User formatting function. Convert a string to title case */
  $ph_oveuh.= "IGFuZCB0aGV5J2xsIHRha2UgMTYuMDkzNSBU";
  function TitleCase(&$string, $separators = " \9\10\11\12\13") {
    if (!strlen($separators))  $separators = " \9\10\11\12\13"; // Idiot-proofing
    if ($separators[0] == "+") $separators = " \9\10\11\12\13".substr($separators, 1);

//  If there's a hyphen move it to the end for the regex
    if (ereg("-", $separators)) $separators = str_replace("-", "", $separators)."-";

    $string = $separators[0].$string;
    $separators = str_replace("^", "\^", $separators);
    while (ereg("([$separators])([a-z])", $string, $regs)) {
      $string = str_replace($regs[0], $regs[1].strtoupper($regs[2]), $string);
    }
    $string = substr($string, 1);
  }

/*
  User formatting function. Convert a string to upper case */
  function UpperCase(&$string) {
    $string = strtoupper($string);
  }

/*
  User formatting function. Convert a string to lower case */
  function LowerCase(&$string) {
    $string = strtolower($string);
  }

/*
  User formatting function. Trim a string */
  function TrimSpace(&$string) {
    $string = trim($string);
  }

/*
  User formatting function. Line-wrap a string */
  $ph_oveuh.= "ZXJhLWFuZ3N0cm9tcyEiLCJcIkNpdmlsaXph";
  function LineWrap(&$string, $width = 75, $break = -1) {
    if ($break == -1) $break = str_replace(" ", "", "
    ");

    $rstr = ""; $cptr = 0;
    $strlen = strlen($string);

    while ($cptr < $strlen) {
      $chunk = substr($string, $cptr, $width);
      if (strlen($chunk) == $width)
        $chunk = ereg_replace("([ -])[^ -]*$", "\\1", $chunk);
      $cptr+= strlen($chunk); $rstr.= "$chunk$break";
    }
    $string = $rstr;
  }

/*
  Debugging Functions */
  $ph_oveuh.= "dGlvbiBpcyBub3Qgc29tZXRoaW5nIGluYm9y";
  function gdump($array = "GLOBALS", $nest = 1) {
    if (!is_array($array)) {
      echo "<B>$array"."[]</B><BR>\n";
      $nest++;
      global $$array;
      $array = $$array;
    }
    $Spacer = "";
    for ($sp=1; $sp<$nest; $sp++) $Spacer.= "&nbsp;&nbsp;";
    while (list($key,$el) = each($array)) {
      if (is_array($el)) {
        echo "$Spacer<B>$key</B><BR>\n";
        gdump($el, ++$nest);
        $nest--;
      }
      else echo "$Spacer$key -> $el<BR>\n";
    }
    exit;
  }

  function ArrayDump($array, $nest = 0) {
    if (!is_array($array)) return;
    $l = substr($encap, 0, 1);
    $r = substr($encap, -1);
    $Spacer = "";
    for ($sp=0; $sp<$nest; $sp++) $Spacer.= "&nbsp;&nbsp;";
    while (list($key,$el) = each($array)) {
      if (is_array($el)) {
        echo "$Spacer<B>$key</B><BR>\n";
        ArrayDump($el, $html, $encap, ++$nest);
        $nest--;
      }
      else {
        if ($html) {
          $el = str_replace("&", "&amp;", $el);
          $el = str_replace("<", "&lt;", $el);
        }
        echo "$Spacer$l$key$r -> $l$el$r<BR>\n";
      }
    }
  } $ph_oveuh.= "biBvciBpbXBlcmlzaGFibGU7IGl0IG11c3Qg";
?>