<?php
namespace ois;

use o\Model;
/**
 * This file includes just global constants and actions.
 * Created on 2.10.2006
 *
 * @author    Kalmer Piiskop
 * @copyright Copyright &copy; 2007, Kalmer Piiskop <kalmer.piiskop@eesti.ee>
 * @uses MODEL    for translations of system strings
 * @uses O_FOLDER for core things
 * @uses Slug     for the slugified alias for Facebook
 */

/*
 * the folder where the site resides locally, needed by subfolders
*/
define('SITE_FOLDER', 'ois');

/*
 * the subfolders, needed by <code>Human</code>
*/
define('BASE_FOLDER'             , 'C:\\Users\\ergos\\OneDrive\\Programeerimine\\Eclipse\\');
define('CACHE_FOLDER'            , BASE_FOLDER . 'cache');
define('IMAGES_FOLDER'           , 'assets\\images\\');
define('FC_PICS_FOLDER'          , IMAGES_FOLDER . 'fc\\');
define('GALLERY_FOLDER'          , IMAGES_FOLDER . 'gallery\\');
define('INQUIRY_LOGOS_FOLDER'    , IMAGES_FOLDER . 'inquiry_logos\\');
define('JS_FOLDER'               , 'o\\assets\\js\\');
define('O_FOLDER'                , BASE_FOLDER . 'o\\');

define('ORIGINALS_FOLDER'        , sprintf(
	'%1$soriginals_%2$s\\',
	BASE_FOLDER, // 1
	SITE_FOLDER  // 2
));

define('PICTOGRAMS_FOLDER'       , IMAGES_FOLDER . 'pictograms\\');
define('PREVIEWS_FOLDER'         , 'filesOfObjects\\previews\\');
define('ROOT_FOLDER'             , BASE_FOLDER . 'ois\\');
define('MAGPIE_CACHE_DIR'        , ROOT_FOLDER . 'cache');

require_once O_FOLDER . 'haldus\\kasutajad\\Human.php'; // needed for Facebook-login

if (!isset($_SESSION))
{
	session_start();
}

setlocale(LC_TIME, 'et_EE.UTF-8');
ini_set('display_errors', 1);

if (defined('E_DEPRECATED'))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else
{
	error_reporting(E_ALL & ~E_STRICT);
}

date_default_timezone_set('Europe/Tallinn');

/*
 * database constants, needed for translations
 */
define('DB_ENGINE', 'mysql');
define('DB_USER'  , 'nomek');
define('DB_PASS'  , '12345');
define('DB_HOST'  , 'localhost');
define('DB_NAME'  , 'ois');

/*
 * languages, needed for translations
 */
define('DEFAULT_LANGUAGE', 1876);
define('DEFAULT_LOCALE'  , 'en_US');

if (isset($_GET['idOfLanguage']))
{
	$_SESSION['language'] = $_GET['idOfLanguage'];
}

define('DEVELOPER'  , 1);

/*
 * error type constants, needed for translations
 */
define('ERROR_TYPE_ECHO_JSON', 'JSON');
define('ERROR_TYPE_SEND_MAIL', 'only sending the error report and exit');
define('ERROR_TYPE_SEND_MESSAGE', 'only sending the error report');

define(
	'ERROR_TYPE_DATABASE_ERROR_ROLLBACK_EXIT',
	'error by querying, rollback and exit the application'
);

/*
 * internet connection, needed for translations
 */
define('OFFLINE', FALSE);

/*
 * aliases
 */
define('DOMAIN', 'http://localhost/ois/');

ini_set('include_path', sprintf(
	'%1$s%2$s%3$s',
	ini_get('include_path'),        // 1
	PATH_SEPARATOR,                 // 2
'.:..:..\\..:\\Users\\ergos\\OneDrive\\Programeerimine\\Eclipse\\o\\' // 3
));

if (isset($_POST['suffix']))
{
	$suffix = $_POST['suffix'];
}
else
{

	require_once O_FOLDER . 'Support.php';

	$suffix = \o\Support::generateRandMd5Uid();
}

$_SESSION['suffix'] = $suffix;

require_once O_FOLDER . 'Model.php';

define('ALIAS_FACEBOOK'    , \o\Model::translateSystemString('facebook'));

define(
	'ALIAS_FEEDBACK_FORM',
	\o\Model::translateSystemString('formOfFeedback')
);

define('ALIAS_HUMAN'       , \o\Model::translateSystemString('human'));
define('ALIAS_HUMAN_INSERT', \o\Model::translateSystemString('insertHuman'));
define('ALIAS_HUMAN_LIST'  , \o\Model::translateSystemString('listOfHumans'));
define('ALIAS_HUMAN_UPDATE', \o\Model::translateSystemString('updateHuman'));
define(
	'ALIAS_OF_HUMAN_COMPONENTS',
	\o\Model::translateSystemString('humanComponents')
);
define('ALIAS_OF_USER_LIST', \o\Model::translateSystemString('userList'));

define(
	'ALIAS_INCIDENT_DELETE',
	\o\Model::translateSystemString('deletionOfIncident')
);

define(
	'ALIAS_NESTED_SET_DELETE',
	\o\Model::translateSystemString('deletionOfNestedSet')
);

define(
	'ALIAS_OF_FORM_OF_UPLOAD',
	\o\Model::translateSystemString('formForUpload')
);

define('ALIAS_OF_HIERARCHY' , \o\Model::translateSystemString('hierarchy'));

define(
	'ALIAS_OF_LOGIN_FORM_BUTTON',
	\o\Model::translateSystemString('loginFormButton')
);

define('ALIAS_OF_LANGUAGES' , \o\Model::translateSystemString('languages'));

define('ALIAS_OF_LOGIN'     , \o\Model::translateSystemString('login'));
define('ALIAS_OF_LOGIN_FORM', \o\Model::translateSystemString('loginForm'));
define('ALIAS_OF_LOGOUT'    , \o\Model::translateSystemString('logout'));

define('ALIAS_OF_MENUS', \o\Model::translateSystemString('menus'));

define('ALIAS_OF_PAGE'       , \o\Model::translateSystemString('page'));
define('ALIAS_OF_PAGE_BUTTON', \o\Model::translateSystemString('pageButton'));

define(
	'ALIAS_OF_PAGE_COMPONENTS',
	\o\Model::translateSystemString('pageComponents')
);

define('ALIAS_OF_PAGE_INSERT', \o\Model::translateSystemString('pageInsert'));
define('ALIAS_OF_PAGE_UPDATE', \o\Model::translateSystemString('pageUpdate'));
define('ALIAS_OF_PAGES'      , \o\Model::translateSystemString('pages'));

define(
	'ALIAS_OF_NEWS_BUTTONS',
	\o\Model::translateSystemString('newsButtons')
);
define(
	'ALIAS_OF_PAGE_NEWS_COMPONENTS',
	\o\Model::translateSystemString('pageNewsComponents')
);
define(
	'ALIAS_PAGE_NEWS_FORM',
	\o\Model::translateSystemString('aliasPageNewsForm')
);
define(
	'ALIAS_PAGE_NEWS_INSERT',
	\o\Model::translateSystemString('aliasPageNewsInsert')
);
define('ALIAS_PAGE_NEWS_LIST', \o\Model::translateSystemString('listOfNews'));
define(
	'ALIAS_PAGE_NEWS_UPDATE',
	\o\Model::translateSystemString('aliasPageNewsUpdate')
);

define(
	'ALIAS_PUPIL_DELETE',
	\o\Model::translateSystemString('deletionOfPupil')
);

define(
	'ALIAS_OF_REQUISITES_BUTTON',
	\o\Model::translateSystemString('requisitesButton')
);

define(
	'ALIAS_OF_REQUISITES_COMPONENTS',
	\o\Model::translateSystemString('requisitesComponents')
);

define(
	'ALIAS_OF_REQUISITES',
	\o\Model::translateSystemString('requisitesForm')
);

define(
	'ALIAS_OF_REQUISITES_UPDATE',
	\o\Model::translateSystemString('requisitesUpdate')
);

define(
	'ALIAS_SCHOOL_CARDS_LIST',
	\o\Model::translateSystemString('schoolCardsList')
);

define('ALIAS_OF_SLUGS'      , \o\Model::translateSystemString('slugs'));

define(
	'ALIAS_OF_SYSTEM_MENU_ITEM_COMPONENTS',
	\o\Model::translateSystemString('systemMenuItemComponents')
);
define(
	'ALIAS_SYSTEM_MENU_ITEM_DELETE',
	\o\Model::translateSystemString('deletionOfSystemMenuItem')
);
define(
	'ALIAS_SYSTEM_MENU_ITEM_FORM',
	\o\Model::translateSystemString('systemMenuItemForm')
);
define(
	'ALIAS_SYSTEM_MENU_ITEM_INSERT',
	\o\Model::translateSystemString('systemMenuItemInsert')
);
define(
	'ALIAS_SYSTEM_MENU_ITEM_UPDATE',
	\o\Model::translateSystemString('systemMenuItemUpdate')
);

define(
	'ALIAS_OF_SYSTEM_STRING',
	\o\Model::translateSystemString('systemString')
);
define(
	'ALIAS_OF_SYSTEM_STRINGS',
	\o\Model::translateSystemString('systemStrings')
);
define(
	'ALIAS_OF_SYSTEM_STRING_COMPONENTS',
	\o\Model::translateSystemString('systemStringComponents')
);
define(
	'ALIAS_OF_SYSTEM_STRING_UPDATE',
	\o\Model::translateSystemString('systemStringUpdate')
);

define(
	'ALIAS_WARRANT_LIST' ,
	\o\Model::translateSystemString('listOfWarrants')
);

/*
 * addresses
 */
require_once O_FOLDER . 'Slug.php';

define('ACCESS'               , '');
define('ALBUMS'               , 'ice.design.oy');
define('FACEBOOK'             , DOMAIN . \o\Slug::slugify(array (
	'original' => ALIAS_FACEBOOK
)));
define('LATITUDE_FOR_ESTONIA' , 58.893296052957055);
define('LONGITUDE_FOR_ESTONIA', 25.15869140625);
define(
	'RSS_FEED',
	'http://www.disainikeskus.ee/et/uudised?format=feed&type=rss'
);
define('TENNISETRENN'         , 'http://localhost/tennisetrenn.ee/');

/*
 * filenames
 */
define('LOGO', 'logo-icedesign.gif');

/*
 * MySQL formatting
*/
define('TIMESTAMP_FORMAT', 'YmdHis');

/*
 * events
 */

define('EKTMVVV_2012'    , 18);
define('TTSP_2012'       , 20);
define('EKÕTEMEV_SV_2013', 21);
define('EKÕTEMEV_VV_2013', 23);

/*
 * FB
 */
define('FB_ADMINS' , 'piiskop');
define('FB_API_KEY', '749826108394754');
define('FB_BADGE'  , '1434792903437105.11111.510908628');
define('FB_SECRET' , '42beb3114329ca7327480bb5bd10eedf');

/*
 * the maximum length of fields
 */
define('MAXIMAL_LENGTH_OF_SUBJECT', 50);
define('PAGE_NAME_MAXLENGTH'      , '40');
define('NAME_MAXLENGTH'           , '255');

/*
 * function result types
 */
define('UNSUCCESSFUL_VALIDATION'   , 'unsuccessful validation');
define('UNSUCCESSFUL_QUERYING'     , 102);
define('UNSUCCESSFUL_UPLOADING'    , 103);
define('EMPTY_RESULT'              , 104);
define('SUCCESS'                   , 105);
define('UNSUCCESSFUL_QUERYING_NODE', 106);
define('ZERO_SIZE'                 , 107);
define('NOT_IMAGE'                 , 108);
define('UNSUCCESSFUL_REMOVING'     , 109);
define('HAS_BINDINGS'              , 111);

/*
 * labels
 */
define('HEADER_CONTACTS', \o\Model::translateSystemString('headerContacts'));

define('LABEL_DELETION', \o\Model::translateSystemString('labelDeletion'));

define(
	'LABEL_EMAIL_ADDRESS',
	\o\Model::translateSystemString('titleEmailAddress')
);
define(
	'TITLE_EMAIL_ADDRESS',
	\o\Model::translateSystemString('titleEmailAddress')
);

define(
	'TITLE_INCIDENTCOMPETITIONS',
	\o\Model::translateSystemString('titleIncidentCompetitions')
);

define('ALT_LANGUAGE'  , \o\Model::translateSystemString('altLanguage'));
define('TITLE_LANGUAGE', \o\Model::translateSystemString('titleLanguage'));

define(
	'LABEL_NESTED_SET_INSERTING',
	\o\Model::translateSystemString('labelNestedSetInserting')
);

define(
	'LABEL_PHONE_NUMBER',
	\o\Model::translateSystemString('labelPhoneNumber')
);
define(
	'TITLE_PHONE_NUMBER',
	\o\Model::translateSystemString('titlePhoneNumber')
);

define(
	'LABEL_REQUISITES_UPDATING',
	\o\Model::translateSystemString('labelOfRequisitesUpdate')
);

define(
	'LABEL_SHOW_PAGE_FORM_UPDATE',
	Model::translateSystemString('labelShowPageFormUpdate') // 1
);
define(
	'LABEL_HIDE_PAGE_FORM_UPDATE',
	Model::translateSystemString('labelHidePageFormUpdate') // 1
);

define(
	'LABEL_HIDE_PAGE_NEWS_FORM_UPDATE',
	Model::translateSystemString('labelHidePageNewsFormUpdate') // 1
);
define(
	'LABEL_SHOW_PAGE_NEWS_FORM_UPDATE',
	Model::translateSystemString('labelShowPageNewsFormUpdate') // 1
);

define('TITLE_PASSWORD', \o\Model::translateSystemString('titlePassword'));

define('TITLE_SCHOOLCARD', \o\Model::translateSystemString('titleSchoolCard'));

define(
	'LABEL_SHOW_SYSTEM_MENU_ITEM_FORM_INSERT',
	Model::translateSystemString('labelShowSystemMenuItemFormInsert') // 1
);
define(
	'LABEL_HIDE_SYSTEM_MENU_ITEM_FORM_INSERT',
	Model::translateSystemString('labelHideSystemMenuItemFormInsert') // 1
);
define(
	'LABEL_SHOW_SYSTEM_MENU_ITEM_FORM_UPDATE',
	Model::translateSystemString('labelShowSystemMenuItemFormUpdate') // 1
);
define(
	'LABEL_HIDE_SYSTEM_MENU_ITEM_FORM_UPDATE',
	Model::translateSystemString('labelHideSystemMenuItemFormUpdate') // 1
);

define(
	'LABEL_SHOW_SYSTEM_STRING_FORM_UPDATE',
	\o\Model::translateSystemString('labelShowSystemStringFormUpdate') // 1
);
define(
	'LABEL_HIDE_SYSTEM_STRING_FORM_UPDATE',
	\o\Model::translateSystemString('labelHideSystemStringFormUpdate') // 1
);

define('TITLE_TITLE', \o\Model::translateSystemString('titleTitle'));

define(
	'LABEL_VISIBLE',
	\o\Model::translateSystemString('labelOfVisible')
);

define('TITLE_VOTES', \o\Model::translateSystemString('titleVotes'));

/*
 * mailing
 */
define('SMTP_SERVER', 'mail.centrum.neti.ee');

/*
 * menus
 */
define('MENU_FOR_SOUNDTRACK', 41);

/*
 * namespace
 */
define('PROJECT', 'icedesign');

/*
 * nested set ID's'
 */
define('NESTED_SET_ROOT'                         , 1);
define('NESTED_SET_MENUS'                        , 2);
define('NESTED_SET_CARD'                         , '1,2,3,38');
define('NESTED_SET_COMPETITIONS'                 , 9);
define('NESTED_SET_COURTS'                       , 18);
define('NESTED_SET_MENU_PUBLIC'                  , 10);
define('NESTED_SET_MENU_FOR_COMPETING'           , 114);
define('NESTED_SET_MENU_FOR_HELP_TO_ARRANGE'     , 118);
define('NESTED_SET_MENU_FOR_INTRO'               , 8);
define('NESTED_SET_MENU_FOR_LEARNING_TENNIS'     , 115);
define('NESTED_SET_MENU_FOR_LOGGED_IN'           , 3);
define('NESTED_SET_MENU_FOR_MAIN_ADMINISTRATOR'  , 11111111);
define('NESTED_SET_MENU_FOR_MULTIMEDIA'          , 24);
define('NESTED_SET_MENU_FOR_PLAYING'             , 116);
define('NESTED_SET_MENU_FOR_REGISTERED_USER'     , 45);
define('NESTED_SET_MENU_FOR_STRINGING_AND_STUFF' , 117);
define('NESTED_SET_MENU_FOR_SUPPORT_WITH_OBJECTS', 119);
define('NESTED_SET_MENU_MAIN_BUTTONS'            , 113);
define('NESTED_SET_SUPPORTERS'                   , 49);
define('NESTED_SET_TENNIS_PUPILS'                , 102);
define('NESTED_SET_MENU_WE'                      , 17);

define('MAIN_MENU', serialize(array (
	NESTED_SET_MENU_FOR_COMPETING            => 'competing',
	NESTED_SET_MENU_FOR_HELP_TO_ARRANGE      => 'helpToArrange',
	NESTED_SET_MENU_FOR_LEARNING_TENNIS      => 'learningTennis',
	NESTED_SET_MENU_FOR_PLAYING              => 'iWantToPlay',
	NESTED_SET_MENU_FOR_STRINGING_AND_STUFF  => 'stringingAndStuff',
	NESTED_SET_MENU_FOR_SUPPORT_WITH_OBJECTS => 'supportWithObjects'
)));

/*
 * numbers
 */
define('LIMIT'         , 10);
define('MAX_ROW_LENGTH', 40);

/*
 * pages
*/
define('ID_OF_OPENING_PAGE'            , 0);
define('ID_OF_MAIN_PAGE'               , 1);
define('PAGE_SCHOOL_CARD'              , 16);
define('ID_OF_PAGE_FOR_EAOTC_2012'     , 34);
define('ID_OF_PAGE_FOR_TSAD_2012'      , 41);
define('ID_OF_PAGE_FOR_EATCIC_2013'    , 42);
define('ID_OF_PAGE_FOR_EATCOC_2013'    , 59);
define('ID_OF_PAGE_FOR_PUTTSSPRAY_2013', 58);
define('PUTTSSPRAY_2013'               , 23);

/*
 * common realms
 */
define('REGION_MARKETING'         , 3);
define('EKTMV'                    , 4);
define('REGION_TENNISETRENN'      , 34);
define('MAIN_ADMINISTRATION_GROUP', 37);

/*
 * the reminders
 */
define('COMPETITION_REMINDING_INTERVAL'              , (20));
define('FIRST_REMINDER_OF_COMPETITIONS'              , (33 * 24 * 60 * 60));
define('FIRST_REMINDER_OF_SCHOOL_CARD'               , (33 * 24 * 60 * 60));
define('FIRST_REMINDER_OF_SCHOOL_CARD_AFTER_EXPIRING', 1);
define('REMINDING_INTERVAL'                          , (24 * 60 * 60));
define('INTERVAL_BETWEEN_EMAILS'                     , (20));
define('REMINDING_INTERVAL_FOR_VOTING'               , (20));

/*
 * roles
 */
define('MAIN_ADMIN'     , 'M');
define('REGIONAL_ADMIN' , 'A');
define('REGIONAL_USER'  , 'R');
define('REGISTERED_USER', 'U');

/*
 * session parameters
 */
define('REGION_ID'    , 'Region_ID');
define('FC_PLAYER_PIC', 'FC_Player_Pic_Name');
define('NODE_ID'      , 'Node_ID');
define('ACTION'       , 'Action');

/*
 * sizes
*/
define('WIDTH_O_FC_PLAYER_PICS', 100);
define('WIDTH_OF_PROGRESSBAR'  , 128);

/*
 * system string slugs
 */
define('HIERARCHY'     , 68);
define('PAGES'         , 69);
define('SYSTEM_STRINGS', 70);
define('USERS'         , 71);

/*
 * units
 */
define('SECOND' , \o\Model::translateSystemString('second'));
define('SECONDS', \o\Model::translateSystemString('seconds'));
define('MINUTE' , \o\Model::translateSystemString('minute'));
define('MINUTES', \o\Model::translateSystemString('minutes'));
define('HOUR'   , \o\Model::translateSystemString('hour'));
define('HOURS'  , \o\Model::translateSystemString('hours'));
define('DAY'    , \o\Model::translateSystemString('day'));
define('DAYS'   , \o\Model::translateSystemString('days'));

/*
 * validation type constants
 */
define('INVALID_MISSING', \o\Model::translateSystemString('missing'));
define('VALIDATING_TYPE_DIFFERENT', 'verifying that the values are different');
define('VALIDATING_TYPE_EMAIL'    , 'email');
define('VALIDATING_TYPE_IMAGE'    , 'image mime type');
define('VALIDATING_TYPE_INTEGER'  , 'integer');
define('VALIDATING_TYPE_LINK'     , 'link');

define(
	'VALIDATING_TYPE_NO_BOUND_OBJECTS_TO_NESTED_SET',
	'nothing and nobody bound to this nested set'
);

define(
	'VALIDATING_TYPE_NO_BOUND_OBJECTS_TO_PUPIL',
	'nothing and nobody bound to this pupil'
);

define('VALIDATING_TYPE_NUMERIC' , 'numeric');
define('VALIDATING_TYPE_REQUIRED', 'required');

define(
	'VALIDATING_TYPE_UNIQUE_COURT',
	'every court name or designation must be unique'
);

define(
	'VALIDATING_TYPE_UNIQUE_FC_PLAYER',
	'every Fed Cup player must have a unique name'
);

define(
	'VALIDATING_TYPE_NO_BOUND_OBJECTS_TO_COMPETITION',
	'no more objects are bound to the competition'
);

/*
 * The magic quotes must be turned off in order to use
 * mysql_real_escape_string correctly.
 */
if (get_magic_quotes_gpc())
{

	function undoMagicQuotes($array, $topLevel = TRUE)
	{
		$newArray = array ();

		foreach ($array as $key => $value)
		{

			if (!$topLevel)
			{
				$key = stripslashes($key);
			}

			if (is_array($value))
			{
				$newArray[$key] = undoMagicQuotes($value, FALSE);
			}
			else
			{
				$newArray[$key] = stripslashes($value);
			}

		}

		return $newArray;
	}

	$_GET = undoMagicQuotes($_GET);
	$_POST = undoMagicQuotes($_POST);
	$_COOKIE = undoMagicQuotes($_COOKIE);
	$_REQUEST = undoMagicQuotes($_REQUEST);
}
