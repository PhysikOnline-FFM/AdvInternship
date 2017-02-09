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
require_once('settings.php');
require_once(SYSTEM_PATH . '/templates/template.class.php');
require_once(SYSTEM_PATH . '/databases/database.class.php');

/**
 * Connect to "fpraktikum" and "ilias"-database
 */
$db = new Database($ilUser, SEMESTER);	// TODO: change semester value from static to variable (getting semester automatically)

/**
 * Initialize template-system
 */
$tpl = new Template();					// Initializes the template-system, language-param: "de" or "en"
$tpl->load("register");					// Loads the register-template (register.tpl)
$lang = $tpl->loadLanguage(LANG);		// Sets system-language to "de" for german or "en" for english

/**
 * assign placeholders {%VARIABLE}
 */
require_once(SYSTEM_PATH . '/templates/assignment.php'); // relation between {%VARIABLE} with its replacement
$html = $tpl->display();				// Displays the template