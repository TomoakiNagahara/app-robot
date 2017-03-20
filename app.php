<?php
/**
 * app-robot:/app.php
 *
 * @creation  2017-03-21
 * @version   1.0
 * @package   app-robot
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**
 * Please set onepiece-framework's core's Bootstrap.php file path.
 */
$_bootstrap_file_path = '/www/op/7/core/Bootstrap.php';

/**
 * Boot web application process.
 */
try {
	/**
	 * Setup of onpiece-framework's Bootstrap.php file path.
	 */
	define('_BOOTSTRAP_', $_bootstrap_file_path, true);

	/**
	 * Initialize onepiece-frameworks's core and application environment.
	 */
	include(__DIR__.'/app/bootstrap.php');

	/**
	 * Include App class.
	 */
	if( file_exists(__DIR__.'/app/App.class.php') ){
			include(__DIR__.'/app/App.class.php');
	}

	/**
	 * Include configuration file. (public)
	 */
	if( file_exists(__DIR__.'/app/config.php') ){
			include(__DIR__.'/app/config.php');
	}

	/**
	 * Include configuration file. (private)
	 */
	if( file_exists(__DIR__.'/app/_config.php') ){
			include(__DIR__.'/app/_config.php');
	}

	/** Pre process Application.
	 *
	 */
	App::Construct();

	/** Execute Application.
	 *
	 */
	App::Execute($argv);

	/** Finish Application.
	 *
	 */
	App::Destruct();

} catch ( Throwable $e ){
	/**
	 * Error has occurred.
	 */
	exit( $e->getMessage() );
}