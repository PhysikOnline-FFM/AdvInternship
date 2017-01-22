<?php
/**
 * Includes the new template system
 *
 * @author Bastian Krones
 * @date 03.01.2017
 */

/**
 * Load all required files and load the ilias global user infos
 */
require '/home/elearning-www/public_html/elearning/ilias-5.1/Customizing/global/include/advIntership/templates/template.class.php';
require '/home/elearning-www/public_html/elearning/ilias-5.1/Customizing/global/include/advIntership/databases/database.class.php';

global $ilUser;							// fetches all logged-in user-data
$lang 		= 'en';						// globale language
$semester 	= 'WS16/17';				// current semester	

/**
 * Connect to "fpraktikum"-database and "ilias"-database
 */
$db = new Database($ilUser, $semester);	// TODO: change semester value from static to variable (getting semester automatically)

/**
 * Initialize template-system
 */
$tpl = new Template();					// Initializes the template-system, language-param: "de" or "en"
$tpl->load("register");					// Loads the register-template
$lang = $tpl->loadLanguage($lang);		// Sets system-language to "de" for german or "en" for english

/**
 * assign placeholders {%VARIABLE}
 */
$tpl->assign("REGISTER_HEADLINE", $lang["REGISTER_HEADLINE"]);
$tpl->assign("USER_FIRSTNAME", $ilUser->getFirstname());
$tpl->assign("REGISTER_HELP_BUTTON_VALUE", $lang["REGISTER_HELP_BUTTON_VALUE"]);
$tpl->assign("REGISTER_INTRO_1", $lang["REGISTER_INTRO_1"]);
$tpl->assign("REGISTER_INTRO_2", $lang["REGISTER_INTRO_2"]);
$tpl->assign("USER_LOGIN", $ilUser->getLogin());
$tpl->assign("USER_SEMESTER", $semester);
$tpl->assign("REGISTER_FORM_USER", $lang["REGISTER_FORM_USER"]);
$tpl->assign("REGISTER_FORM_SEMESTER", $lang["REGISTER_FORM_SEMESTER"]);
$tpl->assign("REGISTER_FORM_COURSE", $lang["REGISTER_FORM_COURSE"]);
$tpl->assign("REGISTER_FORM_PARTNER", $lang["REGISTER_FORM_PARTNER"]);
$tpl->assign("REGISTER_FORM_PARTNER_WANT_PARTNER", $lang["REGISTER_FORM_PARTNER_WANT_PARTNER"]);

$html = $tpl->display();				// Displays the template