<?php
$tpl->assign("REGISTER_HEADLINE", $lang["REGISTER_HEADLINE"]);
$tpl->assign("USER_FIRSTNAME", $ilUser->getFirstname());
$tpl->assign("REGISTER_HELP_BUTTON_VALUE", $lang["REGISTER_HELP_BUTTON_VALUE"]);
$tpl->assign("REGISTER_INTRO_1", $lang["REGISTER_INTRO_1"]);
$tpl->assign("REGISTER_INTRO_2", $lang["REGISTER_INTRO_2"]);
$tpl->assign("USER_LOGIN", $ilUser->getLogin());
$tpl->assign("USER_SEMESTER", SEMESTER);
$tpl->assign("REGISTER_FORM_USER", $lang["REGISTER_FORM_USER"]);
$tpl->assign("REGISTER_FORM_SEMESTER", $lang["REGISTER_FORM_SEMESTER"]);
$tpl->assign("REGISTER_FORM_COURSE", $lang["REGISTER_FORM_COURSE"]);
$tpl->assign("REGISTER_FORM_PARTNER", $lang["REGISTER_FORM_PARTNER"]);
$tpl->assign("REGISTER_FORM_PARTNER_WANT_PARTNER", $lang["REGISTER_FORM_PARTNER_WANT_PARTNER"]);