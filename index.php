<?php

/****************************************************************************
// * TripsMarket - Travel Business Partner                                   *
// * Copyright (c) tripsmarket.com. All Rights Reserved                      *
// **************************************************************************
//  * Email: info@tripsmarket.com                                            *
//  * Website: http://www.tripsmarket.com/                                   *
// **************************************************************************
//  * This script is property of TripsMarket you are not allowed to rebuild  *
//  * customize, resell, use on multiple domains, change ownership for your *
//  * interest, or copy codes from any part of this script, we will take    *
//  * legal action against anyone who broke our terms, respect this product *
//  * Thank you.                                                            *
// *************************************************************************/

error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);

	ini_set('date.timezone', 'Europe/Istanbul');

     require_once __DIR__.'/vendor/autoload.php';
	define('ENVIRONMENT', 'development');

    if (defined('ENVIRONMENT'))
    {
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

	$system_path = 'application/system';

	$application_folder = 'application';

	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	$system_path = rtrim($system_path, '/').'/';

	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}


	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	define('EXT', '.php');

	define('BASEPATH', str_replace("\\", "/", $system_path));

	define('FCPATH', str_replace(SELF, '', __FILE__));

	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter.php';