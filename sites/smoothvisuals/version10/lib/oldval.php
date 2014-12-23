<?
/* Phorm Validation Rule Parsing Plugin */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 * Copyright (c) 2003 Holotech Enterprises (phorm@holotech.net)
 * You may freely distribute this program as-is, without modifications,
 * as part of a valid Phorm distribution. If you are not sure whether
 * you have a valid distribution, you can obtain one from
 * http://www.phorm.com/. You may use this program freely, and modify
 * it for your own purposes.
 *
 * The purpose of this module is to parse rules files created in the
 * old format.
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

  if (isset($PHP_SELF) && !eregi("^phorm.php", basename($PHP_SELF))) return;

  if (is_array($HTTP_POST_VARS))
    while (list($ph_var) = each($HTTP_POST_VARS))
      if (ereg("^ph_", $ph_var)) unset($$ph_var);

  if (is_array($HTTP_GET_VARS))
    while (list($ph_var) = each($HTTP_GET_VARS))
      if (ereg("^ph_", $ph_var)) unset($$ph_var);

  $ph_RuleNum = 0; $ph_fidx = 1; $ph_ptr = 0;
  while (list(,$ph_vlin) = each($ph_RuleFile)) {
    $ph_vlin = trim($ph_vlin);
    if (!strlen($ph_vlin)) continue;
    $ph_ValCondition = true;
    $ph_Crit = "";

    switch($ph_vlin) {

    case "FILES" :
      $ph_FILES = true;
      break;

    case "RULES" :
      $ph_FILES = false;
      break;

    default:
      if ($ph_FILES) {
        $ph_Files[$ph_fidx++] = $ph_vlin;
        break;
      }

//    If we've made it this far, we're in the RULES section.
//    Parse the line for Criterion, Variable, Level and Comments
      list ($ph_Criterion, $ph_Var, $ph_MsgLevel, $ph_Comment) =
        split($ph_config_delim, $ph_vlin, 4);
      $ph_RuleNum++;

//    If there is a condition, extract it
      $ph_ValCond = "";
      if (ereg("[^ ]{1,7}( *(\(.*\)))", $ph_Criterion, $ph_regs)) {
        $ph_ValCond = $ph_regs[2];
        $ph_Criterion = str_replace($ph_regs[1], "", $ph_Criterion);
      }

//    If there are any arguments, the actual Criterion will be in Args[0].
      $ph_Args = split(" +", $ph_Criterion);
      $ph_Crit = $ph_Args[0];
      unset($ph_Args[0]);

      if (isset($ph_Args[1])) {
        $ph_Args = implode("||", $ph_Args);
        VarSub($ph_Args);
        $ph_Args = explode("||", $ph_Args);
        if (!isset($ph_Args[0])) unset($ph_Args);
      }

      if ($ph_Crit == "+") {
        $ph_FldCat.= "$ph_Var.";
        $ph_RuleNum--;
        continue;
      }

      if ($ph_FldCat) {
        $ph_Var = $ph_FldCat.$ph_Var;
        $ph_FldCat = "";
      }

      if ($ph_Crit != "+") {
//      Load the message
        $ph_Msg = ""; $ph_mlin = "";
        while(!ereg("^###", $ph_mlin) && list(,$ph_mlin) = each($ph_RuleFile)) {
          if ($ph_debug41) echo "&nbsp;<B>vm:</B>".strreplace("<", "&lt;", $ph_mlin)."<BR>";
          if (!ereg("^###", $ph_mlin)) $ph_Msg.= $ph_mlin;
        }
        $ph_Msg = trim($ph_Msg);
      }

      $ph_Rules[$ph_RuleNum] = array (
        "CRIT" => $ph_Crit,
        "FFLD" => $ph_Var,
        "ARGS" => $ph_Args,
        "COND" => $ph_ValCond,
        "LEVL" => $ph_MsgLevel,
        "CMNT" => $ph_Comment,
        "MESG" => $ph_Msg
      );
    }
  }

  unset($ph_RuleFile);
?>