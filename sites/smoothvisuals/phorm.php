<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 * Copyright (c) 1998-2003 Holotech Enterprises (support@phorm.com)
 *
 * You may freely distribute this program as-is, without modifications,
 * and with all accompanying example files, modules and documentation in
 * the original distribution. If you are not sure whether you have a
 * valid distribution, you can obtain one from http://www.phorm.com/.
 * You may use this program freely, and modify it for your own purposes.
 * There is no charge for this program, but if you register it, you will:
 *
 *   1) Encourage me to continue developing it
 *   2) Automatically receive future releases
 *   3) Have free technical support for Phorm
 *   4) Earn my eternal gratitude
 *
 * Also, if you register, you will receive the file upload and file
 * attachment modules. Register at http://www.phorm.com/register/,
 * or include at least your name and email address, and send US$10 to:
 *
 *      Alan Little
 *      Holotech Enterprises
 *      775 Wagner Dr. #11
 *      Battle Creek, Michigan  49017  USA
 *
 * Please make checks and money orders payable to Alan Little.
 *
 * I hope you find this program useful. Aloha.
 *                                                 Alan Little
 *                                                 January 2004
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// Return a message with simple variable substitution.
  function ph_Message($MessageKey) {
    global $ph_Messages;
    $Message = $ph_Messages[$MessageKey];
    while (ereg("\\{\\{([^}]*)\\}\\}", $Message, $regs)) {
      $var = $regs[1]; global $$var;
      $Message = str_replace($regs[0], $$var, $Message);
    }
    return $Message;
  }

  if ($HTTP_HOST != "www.phorm.loc") error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Extract POST, GET, COOKIE, FILE and SERVER arrays in case register_globals is off
  if (is_array($HTTP_POST_VARS)) {
    while (list($ph_var, $ph_val) = each($HTTP_POST_VARS))
      if (!ereg("^ph_", $ph_var)) $$ph_var = $ph_val;
    reset($HTTP_POST_VARS);
  }
  if (is_array($HTTP_GET_VARS)) {
    while (list($ph_var, $ph_val) = each($HTTP_GET_VARS))
      if (!ereg("^ph_", $ph_var)) $$ph_var = $ph_val;
    reset($HTTP_GET_VARS);
  }
  if (is_array($HTTP_COOKIE_VARS)) {
    while (list($ph_var, $ph_val) = each($HTTP_COOKIE_VARS))
      if (!ereg("^ph_", $ph_var)) $$ph_var = $ph_val;
    reset($HTTP_COOKIE_VARS);
  }

  if (is_array($HTTP_SERVER_VARS)) extract($HTTP_SERVER_VARS);

  if (is_array($HTTP_POST_FILES)) {
    while (list($ph_var, $ph_val) = each($HTTP_POST_FILES))
      $$ph_var = $ph_val['tmp_name'];
    reset($HTTP_POST_FILES);
  }

/*
  Unset any ph_ variables to prevent anyone from trying to sneak something
  in (such as ph_debug variables!) */
  $ph_section = "unset ph";
  while (list($ph_var, $ph_val) = each($GLOBALS)) {
    if (ereg("^ph_", $ph_var)) {
      unset($$ph_var);
      unset($ph_var);
    }
  }
  reset($GLOBALS);
  $ph_oveuh.= "JHBoX1F1b3Rlcz1hcnJheSgiXCJJZiBhIE5h";

  if (!isset($ph_ForceDec)) $ph_ForceDec = true;

  $ph_Vers = "Phorm v3.5.1";
  $ph_PHMVers = str_replace("Phorm v", "", $ph_Vers);
  $ph_FILVers = "3.5.0";
  $ph_PHPMinVers = "3.0.8";

// Set up paths
  $ph_root = getenv("PHORM_ROOT");
  if (!$ph_root) $ph_root = ".";
  $ph_root = ereg_replace("[/\\\]$", "", $ph_root);
  $ph_oveuh.= "dCBpZ25vcmFuY2UgYW5kIHJlbWFpbiBmcmVl";
  $ph_cwd = $ph_root;
  $ph_tpd = $ph_cwd; $ph_atd = $ph_cwd; $ph_upd = $ph_cwd;
  if (is_dir("$ph_cwd/templates"))   $ph_tpd.= "/templates";
  if (is_dir("$ph_cwd/attachments")) $ph_atd.= "/attachments";
  if (is_dir("$ph_cwd/uploads"))     $ph_upd.= "/uploads";

  if (file_exists("debugz.php")) include("debugz.php");
  $ph_oveuh.= "dGlvbiBleHBlY3RzIHRvIGJlIGlnbm9yYW50";

// Load the alert and error messages
  if (file_exists("$ph_root/lib/messages.txt")) {
    $ph_msgfile = file("$ph_root/lib/messages.txt");
    while (list(,$ph_mline) = each($ph_msgfile)) {
      $ph_mline = trim($ph_mline);
      if (!$ph_mline || ereg("^#", $ph_mline)) continue;
      // split() instead of explode() for the limit parm in PHP3
      list($ph_mkey, $ph_msg) = split(" ", $ph_mline, 2);
      $ph_Messages[$ph_mkey] = $ph_msg;
    }
  }

  $ph_oveuh.= "IGFuZCBmcmVlIGluIGEgc3RhdGUgb2YgY2l2";
  $ph_oveuh.= "aWxpemF0aW9uLCBpdCBleHBlY3RzIHdoYXQg";
  $ph_oveuh.= "bmV2ZXIgd2FzIGFuZCBuZXZlciB3aWxsIGJl";

// Load the plugins registry.
  $ph_oveuh.= "LiBJZiB3ZSBhcmUgdG8gZ3VhcmQgYWdhaW5z";
  if (is_readable("$ph_root/plugins/registry.php") && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Registry Load<BR>";
    $ph_registry = file("$ph_root/plugins/registry.php");
    while (list(, $ph_regline) = each($ph_registry)) {
      $ph_regline = trim($ph_regline);
      if (!$ph_regline || ereg("^<\?|^#|^\*", $ph_regline)) continue;

      list($ph_beaf, $ph_stage, $ph_plfile) = explode(" ", trim($ph_regline));
      $ph_plfile = basename($ph_plfile);
      $ph_plugbase = str_replace(strrchr($ph_plfile, "."), "", $ph_plfile);

      if (file_exists("$ph_root/plugins/$ph_plugbase/$ph_plfile"))
        $ph_plfile = "$ph_plugbase/$ph_plfile";

      if ($ph_debug32) echo "<B>Plugin:</B> $ph_beaf|$ph_stage|$ph_plfile<BR>";

      $ph_stage = $ph_beaf.$ph_stage;
      $ph_Plugins[$ph_stage].= "$ph_plfile|";
    }
  }

// Load the function library and MIME types
  $ph_section = "setup";
  $ph_LibLoad = false;
  $ph_oveuh.= "LCBpdCBpcyB0aGUgcmVzcG9uc2liaWxpdHkg";
  if (!$ph_Abort) {
    $ph_oveuh.= "b2YgZXZlcnkgQW1lcmljYW4gdG8gYmUgaW5m";
    if ($ph_debug3) echo "<B>NS:</B> Library Load...";

    if (is_readable("$ph_root/lib/functions.php")) {
      $ph_oveuh.= "b3JtZWQuXCI8QlI+Jm5ic3A7Jm5ic3A7LS0g";
      include("$ph_root/lib/functions.php");
      $ph_oveuh.= "YmUgYWNxdWlyZWQgYW5ldyBieSBldmVyeSBn";
      if ($ph_debug3) echo "done<BR>";
      if ($ph_LibVersion != $ph_Vers) {
        $ph_Errs['001'] = ph_Message("E001");
        $ph_Abort = true;
      }
    }
    else {
      if ($ph_debug3) echo "failed<BR>";
      $ph_Errs['000'] = ph_Message("E000");
      $ph_Abort = true;
    }

//  A missing MIME types file is only a problem if the fileattach module is present.
    $ph_oveuh.= "ZW5lcmF0aW9uLiBNYW4gZGlmZmVycyBmcm9t";
    if (is_readable("$ph_root/lib/mimetypes.php")) {
      include("$ph_root/lib/mimetypes.php");
    }
    else {
      if (is_readable("$ph_root/lib/fileattach.php")) {
        $ph_Errs['002'] = ph_Message("E002");
        $ph_Abort = true;
      }
    }
  }

  if (!$ph_Abort) {
    if (!CheckVers($ph_PHPMinVers)) {
      $ph_Errs['003'] = ph_Message("E003");
      $ph_Abort = true;
    }
  }

// Check file_uploads if user is uploading.
  if (ereg("^multipart/form-data", $CONTENT_TYPE)
  && CheckVers("4.0.0")
  && !ini_get("file_uploads")) {
    $ph_Alerts['009'] = ph_Message("A009");
    $ph_Errs['009'] = ph_Message("E009");
    $ph_Abort = true;
  }

  if ($ph_debug2) echo "<B>JS:</B> Setup 1<BR>";
  define("ph_OVERWRITE", 1);
  define("ph_MAKEUNIQUE", 2);
  define("ph_DISCARD", 3);
  define("ph_DECLARE", "{{FORM}}");
  define("ph_GENERIC", "::generic::");
  $ph_oveuh.= "IHRoZSBiZWFzdCBvbmx5IGJ5IGVkdWNhdGlv";

  $ph_extns = array("php", "php3", "php4", "inc", "txt");

  $ph_UpLoads = is_readable("$ph_root/lib/fileupload.php");

  $ph_vRegs[0]  = "\\{\\{([^}]*)\\}\\}";
  $ph_vRegs[1]  = "\{\{([^}]*)\}\}";
  $ph_vRegs[2]  = "{{([^}]*)}}";
  $ph_vRegs[3]  = "{{2}([^}]*)}{2}";
  $ph_vRegs[4]  = "\{{2}([^}]*)\}{2}";
  $ph_vRegs[5]  = "[{]{2}([^}]*)[}]{2}";
  $ph_vRegs[6]  = "<<([^>]*)>>";
  $ph_oveuh    .= "biwgd2hpY2ggbWF5IGJlIGRlZmluZWQgYXMg";
  $ph_vRegs[7]  = "\\{\\{([A-Za-z0-9_]*)\\}\\}";
  $ph_vRegs[8]  = "\{\{([A-Za-z0-9_]*)\}\}";
  $ph_vRegs[9]  = "{{([A-Za-z0-9_]*)}}";
  $ph_vRegs[10] = "{{2}([A-Za-z0-9_]*)}{2}";
  $ph_vRegs[11] = "\{{2}([A-Za-z0-9_]*)\}{2}";
  $ph_vRegs[12] = "[{]{2}([A-Za-z0-9_]*)[}]{2}";
  $ph_vRegs[13] = "<<([A-Za-z0-9_]*)>>";

  $ph_dbLogged = false; $ph_txLogged = false; $ph_eMailed = false;
  $ph_ErrLevel = 0;

  srand((double)microtime()*1000000);

  $ph_HTLink =
    "<BR><BR><CENTER><FONT SIZE=1>".
    "<A HREF=\"http://www.phorm.com/\">$ph_Vers</A>".
    "</FONT></CENTER>";
    $ph_oveuh.= "dGhlIHRlY2huaXF1ZSBvZiB0cmFuc21pdHRp";


  $ph_HTTag =
    "\n\n\n\n-- \n$ph_Vers by Holotech Enterprises http://www.holotech.net/";

  $ph_config_delim = "\t";

  $ph_MaxTMPL = 25;

  $ph_GotData = false;
  $ph_Acked   = false;

/*
  Just to be sure */
  $HTTP_REFERER = getenv("HTTP_REFERER");
  $REMOTE_ADDR  = getenv("REMOTE_ADDR");

  $ph_Cards["mastercard"]       = "mcd";
  $ph_Cards["visa"]             = "vis";
  $ph_Cards["american express"] = "amx";
  $ph_Cards["discover"]         = "dsc";
  $ph_Cards["diners club"]      = "dnc";
  $ph_Cards["delta"]            = "dlt";
  $ph_Cards["switch"]           = "swi";
  $ph_Cards["mcd"]              = "Mastercard";
  $ph_Cards["vis"]              = "Visa";
  $ph_Cards["amx"]              = "American Express";
  $ph_Cards["dsc"]              = "Discover";
  $ph_Cards["dnc"]              = "Diners Club";
  $ph_Cards["dlt"]              = "Delta";
  $ph_Cards["swi"]              = "Switch";
  $ph_Cards["jcb"]              = "JCB";
  $ph_oveuh.= "bmcgY2l2aWxpemF0aW9uLlwiPEJSPiZuYnNw";

  $ph_UploadDir = get_cfg_var("upload_tmp_dir");

// Process plugins
  $ph_stage = ">setu1";
  $ph_oveuh.= "OyZuYnNwOy0tIFdpbGwgRHVyYW50IiwiXCJQ";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<gcnfg";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_oveuh.= "ZXJoYXBzIHRoZSBtb3N0IGZ1bmRhbWVudGFs";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Process phormbase */
  $ph_section = "phormbase";
  if ($PHORM_NAME && !$PHORM_BASE) $PHORM_BASE = $PHORM_NAME;
  if ($PHORM_BASE && !$PHORM_NAME) $PHORM_NAME = $PHORM_BASE;
  $ph_oveuh.= "IHJpZ2h0IG9mIGFueSBiZWluZyBpcyB0aGUg";
  if ($PHORM_NAME && !$ph_Abort) {
    while (list(,$ph_extn) = each($ph_extns)) {
      $ph_phormbase = "$ph_root/phormbase.$ph_extn";
      if (file_exists($ph_phormbase)) break;
    }
    reset($ph_extns);
    if ($ph_debug3) echo "<B>NS:</B> $ph_phormbase<BR>";
    if (!$ph_BaseFile = @file($ph_phormbase)) {
      $ph_Errs['010'] = ph_Message("E010");
      if ($php_errormsg) $ph_Errs['010P'] = "%%%: $php_errormsg";
      $ph_Abort = true;
    }
    else {
      if ($ph_debug3) echo "<B>NS:</B> Phormbase ($PHORM_NAME: ";
      while (list(,$ph_bline) = each($ph_BaseFile)) {
        $ph_bline = trim($ph_bline);
        list($ph_form, $ph_path) = split(" *: *|$ph_config_delim", $ph_bline);
        if ($ph_bline && !trim($ph_path)) $ph_Alerts['020'] = ph_Message("A020");
        if ($ph_form == $PHORM_NAME) {
          if ($ph_debug3) echo "$ph_path)<BR>";
          $ph_basedir = trim($ph_path);
          if (!ereg("^[/\\\]", $ph_basedir)) $ph_basedir = "$ph_root/$ph_basedir";
        }
      }
      if ($ph_debug3 && !strlen($ph_basedir)) echo "No match)<BR>";
    }
  }
  unset($PHORM_BASE);
  $ph_oveuh.= "cmlnaHQgdG8gY29tbXVuaWNhdGUuIFdpdGhv";

/*
  Process PHORM_ variables passed from the form and set up the UpFiles array.
  if ForceDec is set, record and unset PHORM_ variables */
  $ph_section = "unset phorm_";
  $ph_oveuh.= "dXQgdGhpcyBmcmVlZG9tLCBvdGhlciByaWdo";
  while (list($ph_var, $ph_val) = each($GLOBALS)) {
    if (ereg("^PHORM_", $ph_var)) {
      if (ereg("^PHORM_FILE([0-9]{2})$", $ph_var, $ph_regs)) {
        $ph_UpFiles[$ph_regs[1]] = $ph_var;
      }
      if ($ph_ForceDec) {
        $ph_varHold[$ph_var] = $ph_val;
        unset($$ph_var);
      }
    }
  }
  reset($GLOBALS);

/*
  Check for the phormconfig file and process it */
  $ph_section = "phormconfig";
  $ph_oveuh.= "dHMgZGV0ZXJpb3JhdGUuXCI8QlI+Jm5ic3A7";
  while (list(,$ph_extn) = each($ph_extns)) {
    $ph_phormconfig = "$ph_root/phormconfig.$ph_extn";
    if (file_exists($ph_phormconfig)) break;
  }
  reset($ph_extns);
  $ph_oveuh.= "Jm5ic3A7LS0gTC4gUm9uIEh1YmJhcmQiLCJO";
  if (file_exists($ph_phormconfig)) {
    if ($ph_debug3) echo "<B>NS:</B> $ph_phormconfig<BR>";
    if (!is_readable($ph_phormconfig)) {
      $ph_Errs['020'] = ph_Message("E020");
      $ph_Abort = true;
    }
    else {
      include ("$ph_phormconfig");
    }
  }

  $ph_nl = ($PHORM_EMCRLF)? "\r\n" : "\n";

/*
  Check the Referer */
  $ph_section = "referer";
  $ph_oveuh.= "ZXZlciBtaXNzIGEgZ29vZCBjaGFuY2UgdG8g";
  if ($PHORM_REFERER && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Referer<BR>";
    ereg("https?://([^/]*)/([^?]*)", $HTTP_REFERER, $ph_regs);
    $ph_RefHost = $ph_regs[1]; $ph_RefPath = $ph_regs[2];
    if (!ereg("\|$ph_RefHost\|", $PHORM_REFERER)
    &&  !ereg("\|$ph_RefHost/$ph_RefPath\|", $PHORM_REFERER)) {
      $ph_Errs['080'] = ph_Message("E080");
      $ph_Abort = true;
    }
  }

// Set the regex to use for variable substitution.
  $ph_section = "regex";

  if ($ph_Regex) $PHORM_REGEX = $ph_Regex;
  if ($ph_RegEx) $PHORM_REGEX = $ph_RegEx;

  if (!$PHORM_REGEX) $PHORM_REGEX = 0;
  if ($PHORM_REGEX > 13) $PHORM_REGEX = 13;

  $ph_vReg   = $ph_vRegs[$PHORM_REGEX];

  if ($ph_debug31) echo "<B>REGEX:</B> ".ereg_replace("<", "&lt;", $ph_vReg)."<BR>\n";
  $ph_oveuh.= "c2h1dCB1cC4iLCJcIlNlcnZpY2UgdG8gb3Ro";

// Process plugins
  $ph_stage = ">gcnfg";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_oveuh.= "ZXJzIGlzIHRoZSByZW50IHlvdSBwYXkgZm9y";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<lcnfg";
  $ph_oveuh.= "IHlvdXIgcm9vbSBoZXJlIG9uIGVhcnRoLlwi";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Restore the value of PHORM_CONFIG */
  $ph_oveuh.= "PEJSPiZuYnNwOyZuYnNwOy0tIE11aGFtbWFk";
  $PHORM_CONFIG = $ph_varHold["PHORM_CONFIG"];

/*
  Check $PHORM_RCONFIG */
  $ph_section = "phorm_rconfig";
  $ph_oveuh.= "IEFsaSIsIlwiVGhlIGZ1dHVyZSBpcyBhbGwg";
  $PHORM_RCONFIG = (!isset($PHORM_RCONFIG) || ($PHORM_RCONFIG != false && $PHORM_RCONFIG != "N"));
  if (($PHORM_RCONFIG && !$PHORM_CONFIG)
  ||  (!count($HTTP_POST_VARS) && !count($HTTP_GET_VARS))) {
    $ph_Abort = true;
    if ($PHORM_URL) $ph_Redirect = $PHORM_URL;
    else $ph_Errs['040'] = ph_Message("E040");
  }

/*
  If there was a match in the phormbase file, change $ph_cwd to the specified dir */
  $ph_section = "chdir 1";
  if ($ph_basedir && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> cwd $ph_basedir<BR>";
    if (!is_dir($ph_basedir)) {
      $ph_Errs['030'] = ph_Message("E030");
      $ph_Abort = true;
    }
    else {
      $ph_cwd = $ph_basedir;
      $ph_tpd = $ph_cwd; $ph_atd = $ph_cwd; $ph_upd = $ph_cwd;
      if (is_dir("$ph_cwd/templates"))   $ph_tpd.= "/templates";
      if (is_dir("$ph_cwd/attachments")) $ph_atd.= "/attachments";
      if (is_dir("$ph_cwd/uploads"))     $ph_upd.= "/uploads";
    }
  }

/*
  Process the form-specific configuration file, if any */
  $ph_oveuh.= "YXJvdW5kIHVzLCB3YWl0aW5nIGluIG1vbWVu";
  $ph_section = "phorm_config";
  if ($PHORM_CONFIG && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> PHORM_CONFIG ($ph_cwd/$PHORM_CONFIG)<BR>";

//  Strip any path info
    $PHORM_CONFIG = basename($PHORM_CONFIG);

//  If it's there and readable, include it; else generate an error.
    if (is_readable("$ph_cwd/$PHORM_CONFIG")) {
      include("$ph_cwd/$PHORM_CONFIG");
    }
    else {
      $ph_Errs['050'] = ph_Message("E050");
      $ph_Abort = true;
    }
  }

/*
  If $PHORM_BASE was set in the config file, change to the specified dir */
  $ph_section = "chdir 2";
  if ($PHORM_BASE && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> $PHORM_CONFIG: $PHORM_BASE<BR>";
    if (!ereg("^[/\\\]", $PHORM_BASE)) $PHORM_BASE = "$ph_root/$PHORM_BASE";
    if (!is_dir($PHORM_BASE)) {
      $ph_Errs['060'] = ph_Message("E060");
      $ph_Abort = true;
    }
    else {
      $ph_cwd = $PHORM_BASE;
      $ph_tpd = $ph_cwd; $ph_atd = $ph_cwd; $ph_upd = $ph_cwd;
      if (is_dir("$ph_cwd/templates"))   $ph_tpd.= "/templates";
      if (is_dir("$ph_cwd/attachments")) $ph_atd.= "/attachments";
      if (is_dir("$ph_cwd/uploads"))     $ph_upd.= "/uploads";
    }
  }

/*
  Restore only the declared configuration variables from the form */
  $ph_section = "restore phorm_";
  $ph_oveuh.= "dHMgb2YgdHJhbnNpdGlvbiwgdG8gYmUgYm9y";
  if ($ph_ForceDec && is_array($ph_varHold) && !$ph_Abort) {
    while (list($ph_var, $ph_val) = each($ph_varHold)) {
      if ($$ph_var == ph_DECLARE) {
        $$ph_var = $ph_varHold[$ph_var];
        if (ereg("^PHORM_FILE([0-9]{2})$", $ph_var, $ph_regs)) {
          $ph_fvar = $ph_var."_name"; $$ph_fvar = $ph_varHold[$ph_fvar];
          $ph_fvar = $ph_var."_size"; $$ph_fvar = $ph_varHold[$ph_fvar];
          $ph_fvar = $ph_var."_type"; $$ph_fvar = $ph_varHold[$ph_fvar];
        }
      }
    }
  }

// Don't require $PHORM_NAME to be declared
  $PHORM_NAME = $ph_varHold['PHORM_NAME'];
  $ph_oveuh.= "biBpbiBtb21lbnRzIG9mIHJldmVsYXRpb24u";

  $ph_ParseCode = ($ph_LibLoad && CheckVers("4.0.0") && $PHORM_PARSPHP);

// Windows: CRLF
// Unix:    LF
// Mac:     CR
  if (!$PHORM_LINEBRK) $PHORM_LINEBRK = str_replace(" ", "", "
  "); $ph_oveuh.= "XCI8QlI+Jm5ic3A7Jm5ic3A7LS0gRydLYXIs";
  $PHORM_LINEBRK = str_replace("CR", "\r", $PHORM_LINEBRK);
  $PHORM_LINEBRK = str_replace("LF", "\n", $PHORM_LINEBRK);

// You can't use $PHORM_ACK and $PHORM_RDIRECT together.
  if (strlen($PHORM_ACK) && strlen($PHORM_RDIRECT)) {
    unset($PHORM_RDIRECT);
    $ph_Alerts['100'] =  ph_Message("A100");
  }

// If $PHORM_ACK, $PHORM_RDIRECT and $PHORM_POSTINC are not set, use the generic
// ack template.
  if (!strlen($PHORM_ACK) && !strlen($PHORM_RDIRECT) && !strlen($PHORM_POSTINC)) {
    $PHORM_ACK = ph_GENERIC;
  }

  if (strlen($PHORM_RDIRECT)) $ph_Redirect = $PHORM_RDIRECT;

// Process plugins
  $ph_stage = ">lcnfg";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  $ph_oveuh.= "IEJhYnlsb24gNSIsIlwiSSdkIHJhdGhlciBy";
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_section = "setup 2";
  $ph_oveuh.= "ZWdyZXQgdGhlIHRoaW5ncyB0aGF0IEkgaGF2";

  $ph_TextLog = (isset($PHORM_LOG) && isset($PHORM_LOGVAR));

// Try to be smart about a few $PHORM_ variables (hope I'm not MSing)
  if (strlen($PHORM_TO) && !strlen($PHORM_ALERTTO)) $PHORM_ALERTTO = $PHORM_TO;

  if (!strlen($PHORM_TMPL))    $PHORM_TMPL = ph_GENERIC;
  if (!strlen($PHORM_SUBJECT)) $PHORM_SUBJECT = "Phorm Data";

  if (!isset($PHORM_FROM)) {
    if     (isset($Email))    $PHORM_FROM = $Email;
    elseif (isset($EMail))    $PHORM_FROM = $EMail;
    elseif (isset($email))    $PHORM_FROM = $email;
    elseif (isset($PHORM_TO)) $PHORM_FROM = $PHORM_TO;
    else                      $PHORM_FROM = $PHORM_ALERTTO;
  }

// Convert "array-able" variables to arrays if they aren't.
  if (isset($PHORM_LOG)) {
    settype($PHORM_LOG, "array");
    list($ph_TextLogFirstKey) = each($PHORM_LOG);
    reset($PHORM_LOG);
  }
  if (isset($PHORM_LOGVAR))  settype($PHORM_LOGVAR, "array");

  if (isset($PHORM_TMPL))    settype($PHORM_TMPL,    "array");
  if (isset($PHORM_TO))      settype($PHORM_TO,      "array");
  if (isset($PHORM_EFROM))   settype($PHORM_EFROM,   "array");
  if (isset($PHORM_SUBJECT)) settype($PHORM_SUBJECT, "array");
  if (isset($PHORM_HEADERS)) settype($PHORM_HEADERS, "array");

  $aPHORM_MYTABLE = is_array($PHORM_MYTABLE);
  if (isset($PHORM_MYTABLE)) settype($PHORM_MYTABLE, "array");
  if (isset($PHORM_MYVARS))  settype($PHORM_MYVARS,  "array");

  $ph_oveuh.= "ZSBkb25lIHRoYW4gdGhlIHRoaW5ncyB0aGF0";

// Set the text log delimiter if it isn't
  settype($PHORM_LDELIM, "array");
  if (!isset($PHORM_LDELIM[0])) $PHORM_LDELIM[0] = "\t";

// Set the text log quote character if it isn't
  settype($PHORM_LOGQUOT, "array");
  if (!isset($PHORM_LOGQUOT[0])) $PHORM_LOGQUOT[0] = "'";
  $ph_oveuh.= "IEkgaGF2ZSBub3QuXCI8QlI+Jm5ic3A7Jm5i";

// Include the database variables file.
  $ph_section = "dbv";
  if ($PHORM_MYDBV && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Read database variables from $ph_tpd/$PHORM_MYDBV<BR>";
    if (is_readable("$ph_tpd/$PHORM_MYDBV")) {
      include("$ph_tpd/$PHORM_MYDBV");
    }
    else {
      $ph_Alerts['007'] = ph_Message("A007");
    }
  }

// Check file attachment module version
  if (file_exists("$ph_root/lib/fileattach.php")) {
    $ph_fmode = "CheckVers";
    include "$ph_root/lib/fileattach.php";
    if ($ph_FATVers != $ph_FILVers) $ph_Alerts['163'] = ph_message("A163");
  }

// Process plugins
  $ph_stage = ">setu2";
  $ph_oveuh.= "c3A7LS0gTHVjaWxsZSBCYWxsIiwiRXZlcnli";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<filup";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_oveuh.= "b2R5IGlzIHNvbWVib2R5IGVsc2UncyB3ZWly";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Process file uploads */
  $ph_oveuh.= "ZG8uIiwiXCJQcm9ncmVzcyBpbiBzY2llbmNl";
  if ($ph_UpFiles && !$ph_Abort) {
    if (!$ph_UpLoads) {
      $ph_Alerts['011'] = ph_Message("A011");
    }
    else {
      $ph_fmode = "CheckVers";
      include "$ph_root/lib/fileupload.php";
      if ($ph_FUPVers == $ph_FILVers) { include "$ph_root/lib/fileupload.php"; }
      else { $ph_Alerts['153'] = ph_message("A153"); }
    }
  }

// Process plugins
  $ph_stage = ">filup";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  $ph_oveuh.= "IGlzIHNvbWV0aGluZyBsaWtlIGNsaW1iaW5n";
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<dbopn";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Open the database */
  $ph_section = "open db";
  $ph_oveuh.= "IGEgbW91bnRhaW4uIE9ubHkgbW9zdCBtb3Vu";
  if (isset($DHost) && isset($DUser) && isset($DPass) && isset($DBase) && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Open Database<BR>";
    if ($ph_debug71)
      echo "<B>Host:</B> $DHost <B>User:</B> $DUser <B>Pass:</B> $DPass <B>Base:</B> $DBase<BR>";
    $ph_ID = @mysql_connect($DHost, $DUser, $DPass);
    if (!$ph_ID) {
      $ph_Alerts['030'] = ph_Message("A030");
      if ($php_errormsg) $ph_Alerts['030P'] = "%%%: $php_errormsg";
    }
    else {
      $ph_selected = @mysql_select_db($DBase, $ph_ID);
      if (!$ph_selected) {
        $ph_Alerts['031'] = ph_Message("A031");
        if ($php_errormsg) $ph_Alerts['031P'] = "%%%: $php_errormsg";
      }
    }
    $ph_dbOpen = ($ph_ID && $ph_selected);
  }

// Process plugins
  $ph_stage = ">dbopn";
  $ph_oveuh.= "dGFpbmVlcnMgZG9uJ3Qgc2V0IHVwIGEgbmV3";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  $ph_oveuh.= "IGJhc2VjYW1wIGV2ZXJ5IHRlbiBmZWV0LCB0";
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  // Load and parse the rules file.
  if ($PHORM_VALDEFS && !$ph_Abort) {
    $PHORM_VALDEFS = basename($PHORM_VALDEFS);
    if ($ph_debug2) echo "<B><B>JS:</B></B> ValDefs ($ph_tpd/$PHORM_VALDEFS)<BR>";

    if (!$ph_RuleFile = @file("$ph_tpd/$PHORM_VALDEFS")) {
      $ph_Alerts['008'] = ph_Message("A008");
      if ($php_errormsg) $ph_Alerts['008P'] = "%%%: $php_errormsg";
    }
    else {
      if ($PHORM_OLDVAL && is_readable("$ph_root/lib/oldval.php")) {
        include ("$ph_root/lib/oldval.php");
      }
      else {
        $ph_Files = array("");

        $ph_RuleFile = ereg_replace("\r\n?", "\n", implode("", $ph_RuleFile));
        $ph_RuleFile = split("\n###[\n ]*", $ph_RuleFile);

        $ph_RuleNum = 0;
        while (list($ph_key, $ph_Rule) = each($ph_RuleFile)) {
          $ph_Rule = explode("\n", $ph_Rule);
          if (count($ph_Rule) < 2) continue;

          $ph_RuleNum++;
          unset ($ph_RULE); unset ($ph_CRIT); unset ($ph_FFLD);
          unset ($ph_ARGS); unset ($ph_COND); unset ($ph_LEVL);
          unset ($ph_CMNT); unset ($ph_MESG); unset ($ph_mode);
//        unset ($ph_RULE, $ph_CRIT, $ph_FFLD, $ph_ARGS, $ph_COND,
//               $ph_LEVL, $ph_CMNT, $ph_MESG, $ph_mode);

          while (list(,$ph_element) = each($ph_Rule)) {
            $ph_element = trim($ph_element);
            list($ph_token, $ph_tknval) = split(" *: *", $ph_element);
            $ph_token = strtoupper($ph_token);

            switch ($ph_token) {
            case "FILES" :
              $ph_RuleNum--;
              $ph_mode = "FILE";
              break;

            case "RULE" :
              $ph_RULE = $ph_tknval;
              break;

            case "CRIT" :
            case "CRITERION" :
              $ph_CRIT = $ph_tknval;
              break;

            case "ARGS" :
            case "ARGUMENTS" :
            case "ARGUMENT" :
              $ph_ARGS = $ph_tknval;
              VarSub($ph_ARGS);
              $ph_ARGS = split(" +", $ph_ARGS);
              break;

            case "COND" :
            case "CONDITION" :
              $ph_COND = $ph_tknval;
              break;

            case "FFLD" :
            case "FIELD" :
            case "FORM FIELD" :
            case "FORMFIELD" :
              $ph_FFLD = $ph_tknval;
              break;

            case "LEVL" :
            case "LEVEL" :
              $ph_LEVL = $ph_tknval;
              break;

            case "CMNT" :
            case "COMMENT" :
            case "COMMENTS" :
              $ph_CMNT = $ph_tknval;
              break;

            case "MESG" :
            case "MESSAGE" :
              $ph_MESG = $ph_tknval;
              $ph_mode = "MESG";
              break;

            default :
              if ($ph_mode == "FILE") $ph_Files[] = $ph_element;
              if ($ph_mode == "MESG") $ph_MESG.= "$ph_element ";
              break;
            }
          }
          if ($ph_mode != "FILE") {
            $ph_RuleIdx = (isset($ph_RULE))? $ph_RULE : $ph_RuleNum;
            $ph_Rules[$ph_RuleIdx] = array (
              "CRIT" => $ph_CRIT,
              "FFLD" => $ph_FFLD,
              "ARGS" => $ph_ARGS,
              "COND" => $ph_COND,
              "LEVL" => $ph_LEVL,
              "CMNT" => $ph_CMNT,
              "MESG" => $ph_MESG
            );
          }
        }
      }
    }
  }

  $ph_stage = "<valid";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Perform data validation */
  $ph_section = "validation";
  if ($PHORM_VALDEFS && is_array($ph_Rules) && !$ph_Abort) {
    while (list($ph_RuleNum, $ph_Rule) = each($ph_Rules)) {
      unset ($ph_CRIT); unset ($ph_FFLD); unset ($ph_ARGS);
      unset ($ph_COND); unset ($ph_LEVL); unset ($ph_CMNT); unset ($ph_MESG);
//    unset ($ph_CRIT, $ph_FFLD, $ph_ARGS, $ph_COND, $ph_LEVL, $ph_CMNT, $ph_MESG);
      extract($ph_Rule, EXTR_PREFIX_ALL, "ph");

      if (!$ph_CRIT || !$ph_FFLD || !$ph_MESG) {
        if (!$ph_CRIT) $ph_Alerts['071'] = ph_Message("A071");
        if (!$ph_FFLD) $ph_Alerts['072'] = ph_Message("A072");
        if (!$ph_MESG) $ph_Alerts['073'] = ph_Message("A073");
        continue;
      }

      if (!isset($ph_LEVL)) $ph_LEVL = 1;

      if ($ph_debug42)
          echo "&nbsp;&nbsp;<B>vd:</B>$ph_CRIT ($ph_COND)|$ph_FFLD|$ph_LEVL|$ph_CMNT<BR>";

      $ph_ValErr = false;
      $ph_ValCondition = true;

      $ph_FFLD = ereg_replace("^\$", "", $ph_FFLD);
      $ph_ffld = $ph_FFLD;

      if (!strlen($ph_COND)) $ph_COND = "true";
      $ph_COND = "(".ereg_replace("^\(|\)$", "", $ph_COND).")";
      VarSub($ph_COND);
      if ($ph_debug36)
        echo "<B>Phorm@".(__LINE__ + 1)."</B> \$ph_ValCondition = $ph_COND ? true : false;<BR>";
      eval("\$ph_ValCondition = $ph_COND ? true : false;");

      if (is_int(strpos($ph_CRIT, "FILE"))) {
        $ph_FILEID = $ph_FFLD;
        $ph_FFLD = "PHORM_FILE$ph_FFLD";
      }
      $ph_FFLD = str_replace(".", ".$", $ph_FFLD);
      if ($ph_debug36) 
        echo "<B>Phorm@".(__LINE__ + 1)."</B> \$ph_Val = \$$ph_FFLD;<BR>";
      eval("\$ph_Val = \$$ph_FFLD;");

      $ph_skipped = ($ph_ValCondition)? "" : "<FONT COLOR=CRIMSON>(skipped)</FONT><BR>";
      if ($ph_debug421)
        echo "&nbsp;&nbsp;<B>vd:</B>#$ph_RuleNum $ph_CRIT [$ph_ffld:$ph_Val] $ph_skipped";

      if (!$ph_ValCondition) continue;

      switch ($ph_CRIT) {

      case "REQ" :
        if (!strlen(trim($ph_Val))) $ph_ValErr = true;
        break;

      case "EMAIL" :
        if (!strlen(trim($ph_Val))) break;
        $ph_EmLevel = $ph_ARGS[0];
        if (!$ph_EmLevel) $ph_EmLevel = 1;
        if (trim($ph_Val) && MailChek($ph_Val, $ph_EmLevel)) $ph_ValErr = true;
        break;

      case "CCARD" :
        if (!$ph_ARGS[0])
          $ph_Alerts['051'] = ph_Message("A051");
        if (!strlen(trim($ph_Val))) break;
        $ph_Valh = $ph_Val;

//      Strip any non-digits out of the card number
        $ph_CType = $$ph_ARGS[0]; $ph_CType = strtolower($ph_CType);
        if (strlen($ph_CType) > 3) $ph_CType = $ph_Cards[$ph_CType];
        $ph_Val = ereg_replace("[^0-9]", "", $ph_Val);
        if (strlen($ph_Val) < 12) $ph_CType = "";

        $ph_CVal = false;
        switch ($ph_CType) {

        case "mcd" :
          $ph_CVal = (ereg("^5[1-5].{14}$", $ph_Val) && ph_luhn($ph_Val));
          break;

        case "vis" :
          $ph_CVal = (ereg("^4.{15}$|^4.{12}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "amx" :
          $ph_CVal = (ereg("^3[47].{13}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "dsc" :
          $ph_CVal = (ereg("^6011.{12}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "dnc" :
          $ph_CVal = (ereg("^30[0-5].{11}$|^3[68].{12}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "jcb" :
          $ph_CVal = (ereg("^3.{15}$|^2131|1800.{11}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "dlt" :
          $ph_CVal = (ereg("^4.{15}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "swi" :
          $ph_CVal = (ereg("^[456].{15}$|^[456].{17,18}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;

        case "enr" :
          $ph_CVal = (ereg("^2014|.{11}$|^2149.{11}$", $ph_Val) &&
                      ph_luhn($ph_Val));
          break;
        } // switch ($ph_CType)

        if ($ph_Valh && !$ph_CVal) $ph_ValErr = true;
        break;

      case "FILEREQ" :
        if ($ph_FileTable[$ph_FILEID]['stat'] == 1) $ph_ValErr = true;
        break;

      case "NOFILE" :
        if ($ph_FileTable[$ph_FILEID]['stat'] == 2) $ph_ValErr = true;
        break;

      case "FILEDSC" :
        if ($ph_FileTable[$ph_FILEID]['stat'] == 6) $ph_ValErr = true;
        break;

      case "FILEEXT" :
        if (!isset($ph_ARGS[0]))
          $ph_Alerts['066'] = ph_Message("A066");
        $ph_FileExtn = strtolower($ph_FileTable[$ph_FILEID]['extn']);
        $ph_aidx = 0; $ph_Match = false;
        while ($ph_ARGS[$ph_aidx])
           if (strtolower($ph_ARGS[$ph_aidx++]) == $ph_FileExtn) $ph_Match = true;
        if ($ph_FileExtn && !$ph_Match) {
          $ph_ValErr = true;
          if ($ph_FileTable[$ph_FILEID]['stat'] != 6)
            @unlink("$ph_upd/".$ph_FileTable[$ph_FILEID]['full']);
        }
        break;

      case "FILESIZ" :
        if (!isset($ph_ARGS[0]))
          $ph_Alerts['067'] = ph_Message("A067");
        if ($ph_FileTable[$ph_FILEID]['size'] > $ph_ARGS[0]) {
          $ph_ValErr = true;
          if ($ph_FileTable[$ph_FILEID]['stat'] != 6)
            @unlink("$ph_upd/".$ph_FileTable[$ph_FILEID]['full']);
        }
        break;

      case "FILERR" :
        if ($ph_FileTable[$ph_FILEID]['stat'] == 3) {
          $ph_FileName = $ph_FileTable[$ph_FILEID]['full'];
          $ph_ValErr = true;
        }
        break;

      case "REGEX" :
        if (!isset($ph_ARGS[0]))
          $ph_Alerts['050'] = ph_Message("A050");
        if (!strlen(trim($ph_Val))) break;
        if (!ereg($ph_ARGS[0], $ph_Val)) $ph_ValErr = true;
        break;

      case "UNIQUE" :
        if (!isset($ph_ARGS[1])) $ph_Alerts['060'] = ph_Message("A060");
        if (!$ph_dbOpen)         $ph_Alerts['061'] = ph_Message("A061");

        if (!strlen(trim($ph_Val))) break;

        if ($ph_dbOpen) {
          $ph_uCol = $ph_ARGS[0];
          if (ereg("\+", $ph_uCol)) {
            $ph_uCols = explode("+", $ph_uCol);
            $ph_uCol = "concat(";
            while (list(,$ph_val) = each($ph_uCols)) {
              if ($ph_uCol > "concat(") $ph_uCol.= ",";
              $ph_uCol.= $ph_val;
            }
            $ph_uCol.= ")";
          }

//        First check for a $PHORM_MYTABLE index, for backward compatibility
          if (is_numeric($ph_ARGS[1])) {
            if (is_array($PHORM_MYTABLE)) $ph_uTable = $PHORM_MYTABLE[$ph_ARGS[1]];
            else $ph_uTable = $PHORM_MYTABLE;
          }
          else $ph_uTable = $ph_ARGS[1];

          $ph_UNQQString = "select * from $ph_uTable where $ph_uCol='$ph_Val'";
          if ($ph_debug72) echo "<B>UNIQUE:</B> $ph_UNQQString<BR>";
          $ph_Result = MySQL_Query($ph_UNQQString, $ph_ID);
          if (!$ph_Result || MySQL_Error()) {
            $ph_UNQMyErr = ereg_replace("[^A-Za-z0-9'., ]","",MySQL_Error());
            $ph_Alerts['062'] = ph_Message("A062");
          }
          else {
            if (MySQL_Num_Rows($ph_Result) > 0) $ph_ValErr = true;
          }
        }
        break;

      case "EXISTS" :
        if (!isset($ph_ARGS[1])) $ph_Alerts['063'] = ph_Message("A063");
        if (!$ph_dbOpen)         $ph_Alerts['064'] = ph_Message("A064");

        if (!strlen(trim($ph_Val))) break;

        if ($ph_dbOpen) {
          $ph_uCol = $ph_ARGS[0];
          if (ereg("\+", $ph_uCol)) {
            $ph_uCols = explode("+", $ph_uCol);
            $ph_uCol = "concat(";
            while (list(,$ph_val) = each($ph_uCols)) {
              if ($ph_uCol > "concat(") $ph_uCol.= ",";
              $ph_uCol.= $ph_val;
            }
            $ph_uCol.= ")";
          }

//        First check for a $PHORM_MYTABLE index, for backward compatibility
          if (is_numeric($ph_ARGS[1])) {
            if (is_array($PHORM_MYTABLE)) $ph_uTable = $PHORM_MYTABLE[$ph_ARGS[1]];
            else $ph_uTable = $PHORM_MYTABLE;
          }
          else $ph_uTable = $ph_ARGS[1];

          $ph_EXSQString = "select * from $ph_uTable where $ph_uCol='$ph_Val'";
          if ($ph_debug72) echo "<B>EXISTS:</B> $ph_EXSQString<BR>";
          $ph_Result = MySQL_Query($ph_EXSQString, $ph_ID);
          if (!$ph_Result || MySQL_Error()) {
            $ph_EXSMyErr = ereg_replace("[^A-Za-z0-9'., ]","",MySQL_Error());
            $ph_Alerts['065'] = ph_Message("A065");
          }
          else {
            if (MySQL_Num_Rows($ph_Result) == 0) $ph_ValErr = true;
          }
        }
        break;

      case "PHONE" :
        if (!strlen(trim($ph_Val))) break;
        $ph_Match = ereg("^(\(?[0-9]{3}\)?[ -])?[0-9]{3}[ -][0-9]{4}$", $ph_Val);
        if ($ph_Val && !$ph_Match) $ph_ValErr = true;
        break;

      case "PHONEC" :
        if (!strlen(trim($ph_Val))) break;
        if (!ereg("^[0-9() +-]*$", $ph_Val)) $ph_ValErr = true;
        break;

      case "RANGE" :
        if (!isset($ph_ARGS[1]))
          $ph_Alerts['052'] = ph_Message("A052");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val < $ph_ARGS[0] || $ph_Val > $ph_ARGS[1])
          $ph_ValErr = true;
        break;

      case "ONEOF" :
        if (!isset($ph_ARGS[0]))
          $ph_Alerts['053'] = ph_Message("A053");
        if (!strlen(trim($ph_Val))) break;
        $ph_Match = false;
        while (list(,$ph_ARG) = each($ph_ARGS))
           if ($ph_ARG == $ph_Val) $ph_Match = true;
        if (!$ph_Match) $ph_ValErr = true;
        break;

      case "DATECMP":
        if (!isset($ph_ARGS[0]))
          $ph_Alerts['068'] = ph_Message("A068");

        if (!strlen(trim($ph_Val))) break;

        $ph_nowDate = date("Ymd");

        list($ph_fldMo, $ph_fldDa, $ph_fldYr) = explode("/", $ph_Val);
        if (strlen($ph_fldMo) <  2) $ph_fldMo = "0$ph_fldMo";
        if (strlen($ph_fldDa) <  2) $ph_fldDa = "0$ph_fldDa";
        if (strlen($ph_fldYr) == 2) $ph_fldYr = "20$ph_fldYr";
        $ph_fldDate = $ph_fldYr.$ph_fldMo.$ph_fldDa;

        if ($ph_ARGS[1])
          list($ph_maxMo, $ph_maxDa, $ph_maxYr) = explode("/", $ph_ARGS[1]);
        else
          list($ph_maxMo, $ph_maxDa, $ph_maxYr) = explode("/", "99/99/9999");
        if (strlen($ph_maxMo) < 2) $ph_maxMo = "0$ph_maxMo";
        if (strlen($ph_maxDa) < 2) $ph_maxDa = "0$ph_maxDa";
        if (strlen($ph_maxYr) < 4) $ph_maxYr = "20$ph_maxYr";
        $ph_maxDate = $ph_maxYr.$ph_maxMo.$ph_maxDa;

        if (ereg("[!<>=]", $ph_ARGS[0])) {
          $ph_cmpDate = ($ph_ARGS[1])? $ph_maxDate : $ph_nowDate;
          switch ($ph_ARGS[0]) {
          case "=" :
            if ($ph_fldDate != $ph_cmpDate) $ph_ValErr = true;
            break;

          case ">" :
            if ($ph_fldDate <= $ph_cmpDate) $ph_ValErr = true;
            break;

          case "<" :
            if ($ph_fldDate >= $ph_cmpDate) $ph_ValErr = true;
            break;

          case "<=" :
            if ($ph_fldDate >  $ph_cmpDate) $ph_ValErr = true;
            break;

          case ">=" :
            if ($ph_fldDate <  $ph_cmpDate) $ph_ValErr = true;
            break;

          case "!=" :
            if ($ph_fldDate == $ph_cmpDate) $ph_ValErr = true;
            break;
          }
        }
        else {
          list($ph_minMo, $ph_minDa, $ph_minYr) = explode("/", $ph_ARGS[0]);

          if (strlen($ph_minMo) < 2) $ph_minMo = "0$ph_minMo";
          if (strlen($ph_minDa) < 2) $ph_minDa = "0$ph_minDa";
          if (strlen($ph_minYr) < 4) $ph_minYr = "20$ph_minYr";
          $ph_minDate = $ph_minYr.$ph_minMo.$ph_minDa;

          if ($ph_fldDate < $ph_minDate || $ph_fldDate > $ph_maxDate) $ph_ValErr = true;
        }
        break;

      case "ALPHA" :
        if (!strlen(trim($ph_Val))) break;
        if (!ereg("^[A-Za-z]*$", $ph_Val)) $ph_ValErr = true;
        break;

      case "NUMERIC" :
        if (!strlen(trim($ph_Val))) break;
        if (!ereg("^[-+]?[,0-9]*\.?[0-9]*$", $ph_Val)) $ph_ValErr = true;
        break;

      case "FLDLEN":
        if (!isset($ph_ARGS[2]))
          $ph_Alerts['069'] = ph_Message("A069");
        if ($ph_ARGS[2] == "=" && $ph_ARGS[1] > 0) $$ph_FFLD = substr($$ph_FFLD, 0, $ph_ARGS[1]);
        else {
          if (strlen($ph_Val) < $ph_ARGS[0] || ($ph_ARGS[1] > 0 && strlen($ph_Val) > $ph_ARGS[1]))
          $ph_ValErr = true;
        }
        break;

      case "GT" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['054'] = ph_Message("A054");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val <= $ph_ARGS[0]) $ph_ValErr = true;
        break;

      case "LT" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['055'] = ph_Message("A055");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val >= $ph_ARGS[0]) $ph_ValErr = true;
        break;

      case "EQ" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['056'] = ph_Message("A056");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val != $ph_ARGS[0]) $ph_ValErr = true;
        break;

      case "GE" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['057'] = ph_Message("A057");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val < $ph_ARGS[0]) $ph_ValErr = true;
        break;

      case "LE" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['058'] = ph_Message("A058");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val > $ph_ARGS[0]) $ph_ValErr = true;
        break;

      case "NE" :
        if (!isset($ph_ARGS[0])) $ph_Alerts['059'] = ph_Message("A059");
        if (!strlen(trim($ph_Val))) break;
        if ($ph_Val == $ph_ARGS[0]) $ph_ValErr = true;
        break;

      default:
        if (!is_int(strpos($ph_Crits, $ph_CRIT."|"))) {
          $ph_BadCrit = $ph_CRIT;
          $ph_Alerts['070'] = ph_Message("A070");
        }
        break;
      } // switch ($ph_CRIT)

      if ($ph_debug421 && $ph_ValErr)  echo " - <FONT COLOR=CRIMSON>[<B>Fail</B>]</FONT><BR>";
      if ($ph_debug421 && !$ph_ValErr) echo " - <FONT COLOR=TEAL>[<B>Pass</B>]</FONT><BR>";

      if ($ph_ValErr) {
        $ph_ValidErr = true;
        $ph_ErrLevel = max($ph_ErrLevel, $ph_LEVL);

        if ($ph_Invals) $ph_Invals.= ",";
        $ph_Invals.= $ph_RuleNum;

        $ph_ErrMsgs[$ph_RuleNum] = $ph_MESG;

        if ($ph_ErrMsgs[$ph_FFLD]) $ph_ErrMsgs[$ph_FFLD].= "<BR>\n";
        $ph_ErrMsgs[$ph_FFLD].= $ph_MESG;

        if ($ph_ValMsg[$ph_LEVL]) $ph_ValMsg[$ph_LEVL] .= "<BR>\n";
        $ph_ValMsg[$ph_LEVL] .= $ph_MESG;
      }
    } // Process rules

    if ($ph_ErrLevel) {
      $ph_MaxLevel = sizeof($ph_Files) - 1;

      $ph_errfile = $ph_ErrLevel;
      if ($ph_errfile > $ph_MaxLevel) $ph_errfile = $ph_MaxLevel;
      $ph_ErrFileName = $ph_Files[$ph_errfile];

//    Parse the message for variable replacements.
      $ph_ValMessage = $ph_ValMsg[$ph_ErrLevel];
      VarSub($ph_ValMessage);

//    If we can't open the error template file...
      if (!strlen($ph_ErrFileName) || !is_readable("$ph_tpd/$ph_ErrFileName")) {

        if (!is_readable("$ph_tpd/$ph_ErrFileName"))
          $ph_Alerts['001'] = ph_Message("A001");

//      ...try the generic error template, or use a hard-coded template
        if (!$ph_ErrFile = @implode("", @file("$ph_root/files/valid_err.html")))
        $ph_ErrFile = "
        <HTML>
        <HEAD>
        <TITLE>Data Validation Error</TITLE>
        </HEAD>
        <BODY BGCOLOR=#FFC0C0 TEXT=#800000>

        <CENTER><H3>Data Validation Error</H3></CENTER>

        {{ph_ValMessage}}
        <BR><BR>

        Use your browser's BACK button to return to the form.

        {{ph_HTLink}}
        </BODY>
        </HTML>";

        VarSub($ph_ErrFile);
      }
//    Otherwise, read and parse the error template
      else {
        $ph_ErrFile = implode("", file("$ph_tpd/$ph_ErrFileName"));

//      Add our tag at the end of the file.
        if (eregi("</BODY>", $ph_ErrFile))
          $ph_ErrFile = eregi_replace("</BODY>", "$ph_HTLink\n<!-- Generated by Phorm -->\n</BODY>", $ph_ErrFile);
        else
          $ph_ErrFile.= "$ph_HTLink<!-- Generated by Phorm -->";

//      Insert the error message(s) in the appropriate place(s)
        while (is_int($ph_tagstart = strpos($ph_ErrFile, "<!-- Phorm Messages"))) {
          $ph_tagend = strpos($ph_ErrFile, "-->", $ph_tagstart);
          $ph_taglen = $ph_tagend - $ph_tagstart + 3;
          $ph_datalen = max(0, $ph_taglen - 23);
          $ph_tag = substr($ph_ErrFile, $ph_tagstart, $ph_taglen);
          $ph_dat = trim(substr($ph_ErrFile, $ph_tagstart + 20, $ph_datalen));

          list($ph_idx, $ph_HTML) = split(" ", $ph_dat, 2);

          if (!$ph_idx) {
            if ($ph_ValMsg[$ph_ErrLevel]) $ph_HTML = $ph_ValMsg[$ph_ErrLevel];
            else $ph_HTML = "";
          }
          elseif ($ph_idx && !$ph_HTML) {
            if ($ph_ErrMsgs[$ph_idx]) $ph_HTML = $ph_ErrMsgs[$ph_idx];
            else $ph_HTML = "";
          }
          else {
            if ($ph_ErrMsgs[$ph_idx])
              $ph_HTML = str_replace("###", $ph_ErrMsgs[$ph_idx], $ph_HTML);
            else $ph_HTML = "";
          }
          $ph_ErrFile = str_replace($ph_tag, $ph_HTML, $ph_ErrFile);
        }

        if (ereg("\.php[34]?$", $ph_ErrFileName) && $ph_ParseCode) {
          ob_start();
          eval("?>$ph_ErrFile<?");
          $ph_ErrFile = ob_get_contents();
          ob_end_clean();
        }

//      Parse the file for variable replacements.
        VarSub($ph_ErrFile);

//      Parse the file for form fields for data recycling
        $ph_ErrFileUC = strtoupper($ph_ErrFile);
        $ph_TagTable = ParseHTML($ph_ErrFile, "INPUT, SELECT, TEXTAREA");

        if (is_array($ph_TagTable)) {
          while (list($ph_TagStart,$ph_tTag) = each($ph_TagTable)) {
            $ph_Tag    = $ph_tTag['dtag'];
            $ph_RegTag = $ph_Tag;
            $ph_TagLen = $ph_tTag['lnth'];

            $ph_Atts  = ParseTag($ph_Tag);
            $ph_TAG   = $ph_Atts["TAG"];
            $ph_TYPE  = $ph_Atts["TYPE"];
            $ph_VALUE = $ph_Atts["VALUE"];
            $ph_NAME  = ereg_replace("\[\]", "", $ph_Atts["NAME"]);
            if ($ph_debug422) echo "<B>FF:</B> $ph_TAG ($ph_TYPE) \"$ph_NAME\" = ";

            if (strlen($ph_NAME)) {
              $ph_NAME = str_replace("[]", "", $ph_NAME);
              if ($ph_debug36) 
                echo "<B>Phorm@".(__LINE__ + 1)."</B> \$ph_FldVal = \$$ph_NAME;<BR>";
              eval("\$ph_FldVal = \$$ph_NAME;");
            }

            if ($ph_debug422) echo $ph_FldVal."<BR>\n";

            switch($ph_TAG) {

            case "INPUT":
              if (strlen(trim($ph_FldVal))) {
                switch(strtoupper($ph_TYPE)) {

                case ""    :
                case "TEXT":
                  if (is_array($ph_FldVal)) {
                    if (!isset($ph_ArrayFldVals[$ph_NAME])) {
                      $ph_ArrayFldVals[$ph_NAME] = array_reverse($ph_FldVal);
                    }
                    list(,$ph_FldVal) = each($ph_ArrayFldVals[$ph_NAME]);
                  }
                  if (isset($ph_Atts["VALUE"]))
                    $ph_RepTag = eregi_replace("VALUE=\"?".QuoteMeta($ph_Atts["VALUE"])."\"?", "VALUE=\"$ph_FldVal\"", $ph_RegTag);
                  else
                    $ph_RepTag = ereg_replace(">", " VALUE=\"$ph_FldVal\">", $ph_RegTag);
                  $ph_ErrFile =
                  substr($ph_ErrFile, 0, $ph_TagStart)
                        .$ph_RepTag
                        .substr($ph_ErrFile, $ph_TagStart + $ph_TagLen);
                  break; // case "TEXT":

                case "CHECKBOX" :
                  if (!is_array($ph_FldVal) ||
                     ( is_array($ph_FldVal) && in_array($ph_VALUE, $ph_FldVal))) {
                    $ph_RepTag = ereg_replace(">", " CHECKED>", $ph_RegTag);
                  $ph_ErrFile =
                  substr($ph_ErrFile, 0, $ph_TagStart)
                        .$ph_RepTag
                        .substr($ph_ErrFile, $ph_TagStart + $ph_TagLen);
                  }
                  break; // case "CHECKBOX" :

                case "RADIO" :
                  if ($$ph_Atts["NAME"] == $ph_Atts["VALUE"]) {
                    $ph_RepTag = ereg_replace(">", " CHECKED>", $ph_RegTag);
                  $ph_ErrFile =
                  substr($ph_ErrFile, 0, $ph_TagStart)
                        .$ph_RepTag
                        .substr($ph_ErrFile, $ph_TagStart + $ph_TagLen);
                  }
                  break; // case "RADIO" :

                }    // switch ($ph_TYPE)
              }      // if ($ph_FldVal)
              break; // case "INPUT":

            case "TEXTAREA":
              if (strlen(trim($ph_FldVal))) {
                if (is_array($ph_FldVal)) {
                  if (!isset($ph_ArrayFldVals[$ph_NAME])) {
                    $ph_ArrayFldVals[$ph_NAME] = array_reverse($ph_FldVal);
                  }
                  list(,$ph_FldVal) = each($ph_ArrayFldVals[$ph_NAME]);
                }
                $ph_TClose = strpos($ph_ErrFileUC, "</TEXTAREA", $ph_TagStart);
                $ph_ValStart = $ph_TagStart + $ph_TagLen;
                $ph_ValLen = $ph_TClose - $ph_ValStart;
                if (is_integer($ph_TClose)) {
                  $ph_TVal = substr($ph_ErrFile, $ph_ValStart, $ph_ValLen);
                  $ph_ErrFile =
                  substr($ph_ErrFile, 0, $ph_ValStart)
                        .$ph_FldVal
                        .substr($ph_ErrFile, $ph_TClose);
                }
              }
              break; // case "TEXTAREA":

            case "SELECT":
              if (strlen(trim($ph_FldVal))) {
                $ph_Selected = $ph_FldVal;
                if (!is_array($ph_Selected)) settype($ph_Selected, "array");

                $ph_EndSel       = strpos($ph_ErrFileUC, "</SELECT", $ph_TagStart);
                $ph_SelBlockLen  = $ph_EndSel - $ph_TagStart + 9;
                $ph_SelBlock     = substr($ph_ErrFile, $ph_TagStart, $ph_SelBlockLen);
                $ph_SelBlockUC   = strtoupper($ph_SelBlock);

                $ph_oTagEnd = 0; unset($ph_OptionTable);
                $ph_OptionTable = ParseHTML($ph_SelBlock, "OPTION");
                if (is_array($ph_OptionTable)) {
                  krsort($ph_OptionTable);

                  while (list($ph_oTagStart, $ph_otTag) = each($ph_OptionTable)) {
                    $ph_oTag    = $ph_otTag['dtag'];
                    $ph_oTagLen = $ph_otTag['lnth'];
                    $ph_RegTag = QuoteMeta($ph_oTag);

                    $ph_oAtts = ParseTag($ph_oTag);
                    $ph_VALUE = $ph_oAtts["VALUE"];

//                  If there's no VALUE attribute, extract the value from the element.
                    if (!$ph_VALUE) {
                      $ph_oTClose = strpos($ph_SelBlockUC, "</OPTION", $ph_oTagStart);
                      $ph_oValStart = $ph_oTagStart + $ph_oTagLen;
                      $ph_oValLen = $ph_oTClose - $ph_oValStart;
                      if (is_integer($ph_oTClose))
                        $ph_VALUE = substr($ph_SelBlock, $ph_oValStart, $ph_oValLen);
                    }

                    $ph_oTag = eregi_replace("SELECTED", "", $ph_oTag);
                    if (in_array($ph_VALUE, $ph_Selected)) {
                      $ph_oTag = str_replace(">", " SELECTED>", $ph_oTag);
                    }
                    $ph_SelBlock =
                    substr($ph_SelBlock, 0, $ph_oTagStart)
                          .$ph_oTag
                          .substr($ph_SelBlock, $ph_oTagStart + $ph_oTagLen);

                  } // while <OPTION>
                }

                $ph_ErrFile =
                substr($ph_ErrFile, 0, $ph_TagStart)
                      .$ph_SelBlock
                      .substr($ph_ErrFile, $ph_TagStart + $ph_SelBlockLen);
              } // if ($ph_FldVal)
              break; // case "SELECT":

            } // switch ($ph_TAG)
          } // while <INPUT|TEXTAREA|SELECT>
        } // is_array($ph_TagTable)

      } // else (parse error file)

      $ph_Abort = true;
      unset($ph_Redirect);

    } // if ($ph_ErrLevel)
  }

// Process plugins
  $ph_stage = ">valid";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }
  echo $ph_ErrFile;

  $ph_stage = "<fopen";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_oveuh.= "aGVuIGxlYXAgb3V0IGFuZCBhdHRhY2sgYW55";

/*
  Load the acknowledgement template file. */
  $ph_section = "open files";
  $ph_oveuh.= "b25lIHdobyB0cmllcyB0byBjbGltYiBwYXN0";
  if ($PHORM_ACK && !$ph_Abort) {
    if ($PHORM_ACK == ph_GENERIC) $PHORM_ACK = "$ph_root/files/generic.html";
    else                          $PHORM_ACK = "$ph_tpd/$PHORM_ACK";
    if ($ph_debug3) echo "<B>NS:</B> Open Ack Template <B>$PHORM_ACK</B>.<BR>";
    if (!$ph_AckFile = @file($PHORM_ACK)) {
      $ph_Errs['070'] = ph_Message("E070");
      if ($php_errormsg) $ph_Errs['070P'] = "%%%: $php_errormsg";
      $ph_Abort = true;
    }
    else $ph_AckFile = implode("", $ph_AckFile);
  }

/*
  Load the autoresponder template file */
  if ($PHORM_RESPOND && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Open Responder <B>$PHORM_RESPOND</B>.<BR>";
    if (!$ph_ResponderFile = @file("$ph_tpd/$PHORM_RESPOND")) {
      $ph_Alerts['002'] = ph_Message("A002");
      if ($php_errormsg) $ph_Alerts['002P'] = "%%%: $php_errormsg";
    }
  }

/*
  Open the log file(s) */
  while ($ph_TextLog && (list($ph_key, $lPHORM_LOG) = each($PHORM_LOG)) && !$ph_Abort) {
    if ($ph_debug3) echo "<B>NS:</B> Open Log File <B>$lPHORM_LOG</B>.<BR>";
    if (!$ph_lf[$ph_key] = @fopen("$ph_tpd/$lPHORM_LOG", "a")) {
      $ph_Alerts['004'] = ph_Message("A004");
      if ($php_errormsg) $ph_Alerts['004P'] = "%%%: $php_errormsg";
    }
  }

// Process plugins
  $ph_stage = ">fopen";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  $ph_oveuh.= "IHRoZW0uXCI8QlI+Jm5ic3A7Jm5ic3A7LS0g";
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<dblog";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  $ph_oveuh.= "QmlsbCBCZWF0eSIpO2lmKCRQSE9STV9OQU1F";
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Log to MySQL Database */
  $ph_section = "db log";
  if ($ph_dbOpen && isset($PHORM_MYTABLE) && isset($PHORM_MYVARS) && !$ph_Abort) {
    if ($ph_debug2) echo "<B>JS:</B> MySQL Logger.<BR>";

    while (list($ph_key, $lPHORM_MYTABLE) = each($PHORM_MYTABLE)) {
      $lPHORM_MYVARS = $PHORM_MYVARS[$ph_key];
      if (!strlen(trim($lPHORM_MYVARS))) continue;

      $ph_CVPairs = split(" ?, ?", $lPHORM_MYVARS);
      $ph_idx = -1;
      $ph_Vals = "'";
      $ph_Cols = "";

      while (list(,$ph_CVPair) = each($ph_CVPairs)) {
        list($ph_Col, $ph_Var) = split(" *= *", $ph_CVPair);
        $ph_Var = ereg_replace("^\\$", "", $ph_Var);
        if (strlen($ph_Cols) > 1) $ph_Cols.= ",";
        if (strlen($ph_Vals) > 1) $ph_Vals.= ",'";

        if (ereg("'([^']*)'", $ph_Var, $ph_regs)) $ph_Value = $ph_regs[1];
        else {
          if ($ph_debug36) 
            echo "<B>Phorm@".(__LINE__ + 1)."</B> \$ph_Value = \$$ph_Var;<BR>";
          eval("\$ph_Value = \$$ph_Var;");
        }

        if (!get_magic_quotes_gpc()) $ph_Value = AddSlashes($ph_Value);

        $ph_Vals.= $ph_Value."'";
        $ph_Cols.= $ph_Col;
      }
      $ph_LOGQString = "insert into $lPHORM_MYTABLE ($ph_Cols) values ($ph_Vals)";
      if ($ph_debug72) echo "<B>Log:</B> $ph_LOGQString<BR>";
      $ph_Result = MySQL_Query($ph_LOGQString, $ph_ID);
      $ph_LOGMyErr = ereg_replace("[^A-Za-z0-9'., ]","",MySQL_Error());

      if (!$ph_Result) $ph_Alerts['040'] = ph_Message("A040");
      else $ph_dbLogged = true;

      $ph_InsertID = MySQL_Insert_ID($ph_ID);
      if ($aPHORM_MYTABLE) $PHORM_MYSQLID[$ph_key] = $ph_InsertID;
      else $PHORM_MYSQLID = $ph_InsertID;
    }
    $ph_GotData = ($ph_GotData || $ph_dbLogged);
  }

// Process plugins
  $ph_stage = ">dblog";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<respn";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Read the autoresponder template and email it back to the visitor */
  $ph_section = "autoresponder";
  $ph_oveuh.= "PT0iUGhvcm1Jc0Nvb2wiKWVjaG8kcGhfUXVv";
  if ($ph_ResponderFile && $PHORM_FROM && !$ph_Abort) {
    if ($ph_debug2) echo "<B>JS:</B> Parse Autoresponder <B>$PHORM_RESPOND</B>.<BR>";

    $ph_Message = implode("", $ph_ResponderFile);
    VarSub($ph_Message);
    VarSub($PHORM_RESUBJ);

//  Add our tag at the end of the message.
    if ($ph_HTTag) $ph_Message.= $ph_HTTag;

//  Construct the headers and send the message
    $ph_Headers = "From: $PHORM_RESFROM$ph_nl";
    if ($PHORM_RESRPLY) $ph_Headers.= "Reply-to: $PHORM_RESRPLY$ph_nl";
    $PHORM_RESHDRS = ereg_replace("\r\n?", "\n", $PHORM_RESHDRS);
    $PHORM_RESHDRS = eregi_replace("X-Mailer:[^\n]*\n", "", $PHORM_RESHDRS);
    $ph_Headers.= $PHORM_RESHDRS."X-Mailer: PHP/$ph_Vers$ph_nl";

    if (isset($PHORM_RESATCH)) {
      if ($ph_debug3) echo "<B>NS:</B> Autoresponder Attach File <B>$PHORM_RESATCH</B>.<BR>";
      if (!is_readable("$ph_atd/$PHORM_RESATCH")) {
        $ph_Alerts['003'] = ph_Message("A003");
      }
      else {
        if (is_readable("$ph_root/lib/fileattach.php")) {
          $ph_AttachList[] = "$ph_atd/$PHORM_RESATCH";
          include("$ph_root/lib/fileattach.php");
        }
        else {
          $ph_Alerts['010'] = ph_Message("A010");
        }
      }
    }

    if ($PHORM_EMCRLF) {
      while (ereg("[^\r]\n", $ph_Message))
        $ph_Message = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Message);
      while (ereg("[^\r]\n", $ph_Headers))
        $ph_Headers = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Headers);
    }

    if ($ph_debug52)
      echo
      "<B>Responder:</B>\n".
      "<BLOCKQUOTE><PRE>\n".
      "To: $PHORM_FROM\n".
      "Subject: $PHORM_RESUBJ\n".
      $ph_Headers."\n".
      $ph_Message."\n".
      "</PRE></BLOCKQUOTE>\n";

    if (!
    @Mail($PHORM_FROM,
         $PHORM_RESUBJ,
         $ph_Message,
         $ph_Headers)
    ) {
      $ph_Alerts['110'] = ph_Message("A110");
      if ($php_errormsg) $ph_Alerts['110P'] = "%%%: $php_errormsg";
    }
  } // ($PHORM_RESPOND)

// Process plugins
  $ph_stage = ">respn";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<txlog";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Log variables to the text log file. */
  $ph_section = "text log";

  while ($ph_TextLog && (list($ph_key, $lPHORM_LOGVAR) = each($PHORM_LOGVAR)) && !$ph_Abort) {
    if (!$ph_lf[$ph_key]) $ph_key = $ph_TextLogFirstKey;

    $lPHORM_LDELIM  = $PHORM_LDELIM[$ph_key];
    $lPHORM_LOGQUOT = $PHORM_LOGQUOT[$ph_key];
    $lPHORM_LOG     = $PHORM_LOG[$ph_key];

    if (!strlen($lPHORM_LDELIM))  $lPHORM_LDELIM  = $PHORM_LDELIM[0];
    if (!strlen($lPHORM_LOGQUOT)) $lPHORM_LOGQUOT = $PHORM_LOGQUOT[0];

    if ($ph_debug2) echo "<B>JS:</B> Log to text file <B>$lPHORM_LOG</B>.<BR>";

    $ph_LogVars = split(",? +", $lPHORM_LOGVAR);
    $ph_LogLine = "";

    while (list(,$ph_LogVar) = each($ph_LogVars)) {
      $ph_lQuote = (ereg("'", $ph_LogVar))? substr($lPHORM_LOGQUOT, 0, 1) : "";
      $ph_rQuote = (ereg("'", $ph_LogVar))? substr($lPHORM_LOGQUOT, -1) : "";
      $ph_LogVar = str_replace("'", "", $ph_LogVar);
      $ph_LogVar = ereg_replace("^\\$", "", $ph_LogVar);

//    If $$ph_LogVar is an array, break it down
      ereg("^([A-Za-z0-9_]*)((\[[A-Za-z0-9_]*\])*)$", $ph_LogVar, $ph_regs);
      $ph_LogVar  = $ph_regs[1];
      $ph_indices = $ph_regs[2];
      $ph_indices = split("\]\[", ereg_replace("^\[|\]$", "", $ph_indices));

      $ph_Value = $$ph_LogVar;

      while (is_array($ph_Value)) {
        list(,$ph_SubIdx) = each($ph_indices);
        if (!strlen($ph_SubIdx)) break;
        $ph_SubIdx = ereg_replace("^['\"]|['\"]$", "", $ph_SubIdx);
        $ph_Value = $ph_Value[$ph_SubIdx];
      }

      $ph_LogLine.= $ph_lQuote.$ph_Value.$ph_rQuote.$lPHORM_LDELIM;
    }

    $ph_LogLine = ereg_replace(QuoteMeta($lPHORM_LDELIM)."$", "", $ph_LogLine);

    if ($ph_lf[$ph_key]) $ph_nul = fputs($ph_lf[$ph_key], $ph_LogLine.$PHORM_LINEBRK);
    if ($ph_nul) $ph_txLogged = true;
    $ph_GotData = ($ph_GotData || $ph_txLogged);
  }

// Process plugins
  $ph_stage = ">txlog";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<email";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Read the mail template file(s) and mail it (them) to the user */
  $ph_section = "user template";
  if (strlen($PHORM_ALERTTO) && !strlen($PHORM_TO) && !$PHORM_INFONLY && !$ph_GotData) {
    $PHORM_TO = $PHORM_ALERTTO;
    settype($PHORM_TO, "array");
  }
  if (isset($PHORM_TMPL) && isset($PHORM_TO) && !$ph_Abort) {
    if ($ph_debug2) echo "<B>JS:</B> Mail Template(s)<BR>";

    if (count($PHORM_TMPL) > $ph_MaxTMPL) $ph_Alerts['120'] = ph_Message("A120");

    list(,$fPHORM_TO)      = each($PHORM_TO);
    list(,$fPHORM_SUBJECT) = each($PHORM_SUBJECT);

    while ($ph_MaxTMPL-- && list($ph_key, $lPHORM_TMPL) = each($PHORM_TMPL)) {
      if ($lPHORM_TMPL == ph_GENERIC) $lPHORM_TMPL = "$ph_root/files/generic.txt";
      else                            $lPHORM_TMPL = "$ph_tpd/$lPHORM_TMPL";

      $ph_Message   = "";
      $ph_Headers   = "";
      $ph_NonHeader = "";

      $lPHORM_TO      = "";
      $lPHORM_FROM    = "";
      $lPHORM_SUBJECT = "";
      $lPHORM_HEADERS = "";

      $ph_TemplateHeaders = false;
      if (ereg("(.+) *\+h$", $lPHORM_TMPL, $ph_regs)) {
        $lPHORM_TMPL = $ph_regs[1];
        $ph_TemplateHeaders = true;
      }

      if ($ph_debug8) echo "Mail Template <B>$lPHORM_TMPL</B><BR>";

      if (!$ph_Template = @implode("", file($lPHORM_TMPL))) {
        $ph_Alerts['005'] = ph_Message("A005");
        if ($php_errormsg) $ph_Alerts['005P'] = "%%%: $php_errormsg";
        continue;
      }

//    Convert all line breaks to LF for easier processing
      $ph_Template = ereg_replace("\r\n?", "\n", $ph_Template);
      VarSub($ph_Template, true);

      $ph_Message = $ph_Template;

//    First see if there are headers included in the template
      if ($ph_TemplateHeaders) {
        list($ph_Headers, $ph_Message) = split("\n\n", $ph_Message, 2);
        $ph_Headers = explode("\n", $ph_Headers);
        while (list(,$ph_Header) = each($ph_Headers)) {
          list($ph_token, $ph_tknval) = split(": ", $ph_Header, 2);

//        If the line isn't really a header, move it down to the message.
          if (!strlen($ph_tknval)) {
            $ph_NonHeader.= "$ph_token$ph_nl";
            continue;
          }

          switch ($ph_token) {
          case "To" :
            $lPHORM_TO  = $ph_tknval;
            break;

          case "From" :
            $lPHORM_FROM = $ph_tknval;
            break;

          case "Subject" :
            $lPHORM_SUBJECT = $ph_tknval;
            break;

          default:
            $lPHORM_HEADERS.= $ph_Header."$ph_nl";
          }
        }
        if (strlen($ph_NonHeader)) $ph_Message = $ph_NonHeader.$ph_Message;
      }

      if (!strlen($lPHORM_TO))      $lPHORM_TO      = $PHORM_TO[$ph_key];
      if (!strlen($lPHORM_FROM))    $lPHORM_FROM    = $PHORM_EFROM[$ph_key];
      if (!strlen($lPHORM_SUBJECT)) $lPHORM_SUBJECT = $PHORM_SUBJECT[$ph_key];

      if (!strlen($lPHORM_TO))      $lPHORM_TO      = $fPHORM_TO;
      if (!strlen($lPHORM_FROM))    $lPHORM_FROM    = $PHORM_FROM;
      if (!strlen($lPHORM_SUBJECT)) $lPHORM_SUBJECT = $fPHORM_SUBJECT;

      $lPHORM_HEADERS.= ereg_replace("\r\n?", "\n", $PHORM_HEADERS[$ph_key]);
      if (strlen($lPHORM_FROM)) {
        if (strlen($lPHORM_HEADERS) && !ereg("\n$", $lPHORM_HEADERS)) $lPHORM_HEADERS.= "$ph_nl";
        $lPHORM_HEADERS.= "From: $lPHORM_FROM$ph_nl";
      }

      VarSub($lPHORM_SUBJECT);

      $lPHORM_HEADERS = eregi_replace("X-Mailer:[^\n]*\n", "", $lPHORM_HEADERS);
      $ph_Headers = $lPHORM_HEADERS."X-Mailer: PHP/$ph_Vers$ph_nl";

      if ($ph_AttachList) {
        $ph_FileList = implode(", ", $ph_AttachList);
        $ph_s = (sizeof($ph_AttachList > 1))? "s" : "";
        if ($ph_debug3) echo "<B>NS:</B> Email Attach File$ph_s <B>$ph_FileList</B>.<BR>";
        if (is_readable("$ph_root/lib/fileattach.php")) {
          include("$ph_root/lib/fileattach.php");
        }
        else {
          $ph_Alerts['006'] = ph_Message("A006");
        }
      }

      if ($PHORM_EMCRLF) {
        while (ereg("[^\r]\n", $ph_Message))
          $ph_Message = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Message);
        while (ereg("[^\r]\n", $ph_Headers))
          $ph_Headers = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Headers);
      }

      if ($ph_debug81)
        echo
        "<BLOCKQUOTE><PRE>\n".
        "To: $lPHORM_TO\n".
        "Subject: $lPHORM_SUBJECT\n".
        $ph_Headers."\n".
        $ph_Message."\n".
        "</PRE></BLOCKQUOTE>\n";
      if (
      @Mail($lPHORM_TO,
           $lPHORM_SUBJECT,
           $ph_Message,
           $ph_Headers)
      ) $ph_eMailed = true;
      else {
        $ph_Alerts['121'] = ph_Message("A121");
        if ($php_errormsg) $ph_Alerts['121P'] = "%%%: $php_errormsg";
      }
      $ph_GotData = ($ph_GotData || $ph_eMailed);
    }
  }

// Process plugins
  $ph_stage = ">email";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_GotData = ($ph_GotData || $PHORM_INFONLY);
  if (!$ph_GotData && !$ph_ValidErr && !$ph_Redirect) {
    if (!$ph_Errs['040']) $ph_Errs['090'] = ph_Message("E090");
    $ph_Abort = true;
  }

  $ph_stage = "<ackpg";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Read the ack template and output it. */
  $ph_section = "ack";
  if ($ph_AckFile && !$ph_Abort)  {
    if ($ph_debug2) echo "<B>JS:</B> Ack Template <B>$PHORM_ACK</B><BR>";
    eval(base64_decode($ph_oveuh."dGVzW3JhbmQoMCwxMildOw=="));

    if (ereg("\.php[34]?$", $PHORM_ACK) && $ph_ParseCode) {
      ob_start();
      eval("?>$ph_AckFile<?");
      $ph_AckFile = ob_get_contents();
      ob_end_clean();
    }

    $ph_AckFile = eregi_replace("<!-- Phorm Messages -->", $ph_ValMsg[0], $ph_AckFile);
    VarSub($ph_AckFile);

//  Add our tag at the end of the file.
    if (eregi("</BODY>", $ph_AckFile, $ph_regs))
      $ph_AckFile =
        eregi_replace("</BODY>", "$ph_HTLink\n<!-- Generated by Phorm -->\n$ph_regs[0]", $ph_AckFile);
    else
      $ph_AckFile.= "$ph_HTLink\n<!-- Generated by Phorm -->";
  }

// Process plugins
  $ph_stage = ">ackpg";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }
  if ($PHORM_ACK && !$ph_Abort) {
    echo $ph_AckFile;
    $ph_Acked = true;
  }

  $ph_stage = "<pproc";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  If PHORM_POSTINC is defined, include it. */
  $ph_section = "postinc";
  if ($PHORM_POSTINC)  {
    if ($ph_debug3) echo "<B>NS:</B> Post Processing <B>$PHORM_POSTINC</B>.<BR>";
    if (!is_readable("$ph_tpd/$PHORM_POSTINC")) {
      $ph_Alerts['130'] = ph_Message("A130");
      $ph_Abort = true;
    }
    else include("$ph_tpd/$PHORM_POSTINC");
  }

// Process plugins
  $ph_stage = ">pproc";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  $ph_stage = "<aande";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

/*
  Email any alerts and errors to the user, if an address was specified. */
  if (($ph_Alerts || $ph_Errs) && $PHORM_ALERTTO) {
    $ph_Message = "";
    $ph_errs = ""; $ph_alerts = "";
    if (is_array($ph_Errs)) {
      while (list($ph_errno, $ph_err) = each($ph_Errs)) {
        $ph_err = str_replace("%%%", $ph_errno, $ph_err);
        while (ereg($ph_vReg, $ph_err, $ph_regs))
          $ph_err = str_replace($ph_regs[0], $$ph_regs[1], $ph_err);
        $ph_errs.= "$ph_err\n";
      }
      reset($ph_Errs);
    }
    if (is_array($ph_Alerts)) {
      while (list($ph_alertno, $ph_alert) = each($ph_Alerts)) {
        $ph_alert = str_replace("%%%", $ph_alertno, $ph_alert);
        while (ereg($ph_vReg, $ph_alert, $ph_regs))
          $ph_alert = str_replace($ph_regs[0], $$ph_regs[1], $ph_alert);
        $ph_alerts.= "$ph_alert\n";
      }
      reset($ph_Alerts);
    }
    $ph_errs   = ereg_replace("<[^>]*>", "", $ph_errs);
    $ph_alerts = ereg_replace("<[^>]*>", "", $ph_alerts);

    if ($ph_errs) $ph_Message = "Fatal errors displayed to visitor:$ph_nl$ph_errs$ph_nl$ph_nl";
    if ($ph_alerts) $ph_Message.= "Internal Alerts:$ph_nl$ph_alerts$ph_nl";

    $ph_Message.= "Phorm Variables:$ph_nl";
    while (list($ph_key, $ph_val) = each($GLOBALS)) {
      if (ereg("^PHORM_", $ph_key)) {
        $ph_Message.= "$ph_key: $ph_val$ph_nl";
      }
    }
    reset($GLOBALS);

    if (is_array($HTTP_POST_VARS)) {
      $ph_Message.= "$ph_nl$ph_nlForm Data:$ph_nl";
      while (list($ph_key, $ph_val) = each($HTTP_POST_VARS)) $ph_Message.= "$ph_key: $ph_val$ph_nl";
      reset($HTTP_POST_VARS);
    }

    $ph_Message.= "$ph_nlHTTP_REFERER: $HTTP_REFERER$ph_nlREMOTE_ADDR: $REMOTE_ADDR$ph_nl";
    $ph_Message.= $ph_HTTag;
    if (!$PHORM_ALERTFM) $PHORM_ALERTFM = "Phorm Processor <Phorm.Processor>";
    $ph_Headers = "From: $PHORM_ALERTFM$ph_nl".
                  "X-Mailer: PHP3/$ph_Vers$ph_nl";

    if ($PHORM_EMCRLF) {
      while (ereg("[^\r]\n", $ph_Message))
        $ph_Message = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Message);
      while (ereg("[^\r]\n", $ph_Headers))
        $ph_Headers = ereg_replace("([^\r])\n", "\\1\r\n", $ph_Headers);
    }

    if (!
    @Mail($PHORM_ALERTTO,
         "Phorm Alert",
         $ph_Message,
         $ph_Headers)
    ) {
      $ph_Alerts['140'] = ph_Message("A140");
      if ($php_errormsg) $ph_Alerts['140P'] = "%%%: $php_errormsg";
    }
  }

/*
  Display any fatal error messages to the visitor. Display internal alerts, if PHORM_ALERTTO is
  not defined or there was an error on emailing alerts. */
  $ph_section = "errors";
  if ($ph_Errs || ($ph_Alerts && ($ph_debug1 || !$PHORM_ALERTTO || $ph_Alerts['140']))) {
    unset($ph_Redirect);
    $ph_errs = ""; $ph_alerts = "";
    if (is_array($ph_Errs)) {
      while (list($ph_errno, $ph_err) = each($ph_Errs)) {
        $ph_err = str_replace("%%%", $ph_errno, $ph_err);
        while (ereg($ph_vReg, $ph_err, $ph_regs))
          $ph_err = str_replace($ph_regs[0], $$ph_regs[1], $ph_err);
        $ph_errs.= "$ph_err<BR>\n";
      }
      reset($ph_Errs);
    }
    if (is_array($ph_Alerts)) {
      while (list($ph_alertno, $ph_alert) = each($ph_Alerts)) {
        $ph_alert = str_replace("%%%", $ph_alertno, $ph_alert);
        while (ereg($ph_vReg, $ph_alert, $ph_regs))
          $ph_alert = str_replace($ph_regs[0], $$ph_regs[1], $ph_alert);
        $ph_alerts.= "$ph_alert<BR>\n";
      }
      reset($ph_Alerts);
    }
    if ($ph_errs) $ph_errmsg = "<B>Errors:</B><BR>\n$ph_errs\n<BR>\n";
    if ($ph_alerts) $ph_errmsg.= "<B>Alerts:</B><BR>\n$ph_alerts\n";

    // Output the messages.
    if ($ph_Acked) {
      echo $ph_errmsg;
    }
    else {
      $ph_ErrPage = "$ph_root/files/$PHORM_NAME"."_err.html";
      if (!is_file($ph_ErrPage)) $ph_ErrPage = "$ph_root/files/phorm_err.html";
      if (is_file($ph_ErrPage)) {
        $ph_errpage = implode("", file($ph_ErrPage));
        $ph_errpage = str_replace("<!-- Phorm Messages -->", $ph_errmsg, $ph_errpage);
        echo $ph_errpage;
      }
      else {
        echo "<HTML>\n".
             "<HEAD>\n".
             "<TITLE>Phorm Error</TITLE>\n".
             "</HEAD>\n".
             "<BODY BGCOLOR=#FFD0C1 TEXT=#800000>\n\n".
             "<H3>Phorm Messages</H3>\n".
             "$ph_errmsg\n".
             "$ph_HTLink\n".
             "</BODY></HTML>";
      }
    }
  }

// Process plugins
  $ph_stage = ">aande";
  if ($ph_debug34) echo "<B>Stage: </B>".str_replace("<", "&lt;", $ph_stage)."<BR>";
  $ph_PlugList = explode("|", $ph_Plugins[$ph_stage]);
  while (list(, $ph_plfile) = each($ph_PlugList)) {
    if (!$ph_plfile) continue;
    if ($ph_debug33) echo "Plugin <B>$ph_plfile</B> at ".str_replace("<", "&lt;", $ph_stage)."<BR>";
    if (is_readable("$ph_root/plugins/$ph_plfile")) {
      include ("$ph_root/plugins/$ph_plfile");
      if ($ph_LibLoad) PlugStat("", "Store");
    }
    else {
      $ph_Alerts['000'] = ph_Message("A000");
    }
  }

  if ($ph_Redirect) Header("Location: $ph_Redirect");
?>