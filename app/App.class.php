<?php
/**
 * app-robot:/App.class.php
 *
 * We call this innovative application system "Pacifista".
 *
 * @creation  2017-03-21
 * @version   1.0
 * @package   app-robot
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**
 * App
 *
 * @creation  2017-03-21
 * @version   1.0
 * @package   app-robot
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class App
{
	/** trait.
	 *
	 */
	use OP_CORE;

	/** Get route table.
	 *
	 */
	static private function _Route($argv)
	{
		$route = [];
		if( file_exists($argv[1]) ){
			$route['path'] = $argv[1];
		}else{
			$route['path'] = false;
			Notice::Set("Does not found end-point. ($argv[1])");
		}
		return $route;
	}

	/** Construct
	 *
	 */
	static function Construct()
	{
		//	...
	}

	/** Destruct.
	 *
	 */
	static function Destruct()
	{
		while( $notice = Notice::Get() ){
			var_dump($notice);
		}
	}

	/** Execute
	 *
	 */
	static function Execute($argv)
	{
		//	...
		$route = self::_Route($argv);

		//	...
		if(!$path = $route['path']){
			return;
		}

		//	Get current working directory.
		$cwd = getcwd();

		//	Change working directory.
		chdir( dirname($path) );

		//	...
		try {
			include( basename($path) );
		} catch ( Throwable $e ) {
			Notice::Set($e);
		}

		//	Recovery working directory.
		chdir($cwd);
	}
}