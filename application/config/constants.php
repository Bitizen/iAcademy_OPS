<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Custom Defines
|--------------------------------------------------------------------------
|
| These are variables that serve as Lookup Tables.
|  
|	To be used as follows:
|
|		$courses = unserialize (COURSE_LIST);
|       echo $courses[1];
|		
|	Result:
|
|		BSBA Financial Management
|
*/

define('COURSE_LIST', serialize( array(
	'NA'
	, 'BSBA Financial Management'
	, 'BA Multimedia Arts and Design'
	, 'BSBA Marketing and Advertising'
	, 'BS Animation'
	, 'BSCS Software Engineering'
	, 'BS Game Development'
	, 'BSIT Web Development'
	, 'Bachelor of Fashion Design and Technology')));

define('ADMINISTRATOR_POSITION', serialize( array(
	'NA'
	, 'Dean'
	, 'Secretary')));

define('ALUMNUS_EMPLOYMENT_STATUS', serialize( array(
	'NA'
	, 'Employed'
	, 'Unemployed (Seeking for a Job)'
	, 'Unemployed (Not Seeking for a Job')));

define('INTERN_STATUS', serialize( array(
	'NA'
	, 'Available'
	, 'Currently On-The-Job'
	, 'Completed Internship 1'
	, 'Completed Internship 2'
	, 'Employed')));

define('INDUSTRY_LIST', serialize( array(
	'NA'
	, 'Adevertising / Design and Marketing'
	, 'Aerospace & Defense'
	, 'Automobiles & Parts'
	, 'Business Process Outsourcing'
	, 'Chemicals'
	, 'Construction & Materials'
	, 'Education / Training'
	, 'Electronic & Electrical Equipment'
	, 'Financials'
	, 'Telecommunications'
	, 'Travel & Leisure'
	, 'Food & Beverage'
	, 'General Industries'
	, 'Health Care'
	, 'Hotal / Resort / Restaurant'
	, 'Human Resources'
	, 'BPO'
	, 'Industrial Engineering'
	, 'Industrial Transportation'
	, 'Media'
	, 'Oil & Gas'
	, 'Personal & Household Goods'
	, 'Retail'
	, 'Software & Computer Services'
	, 'Technology Hardware & Equipment')));

/* End of file constants.php */
/* Location: ./application/config/constants.php */