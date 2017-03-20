<?php
/**
 * app-robot:/app/bootstrap.php
 *
 * @creation  2017-03-21
 * @version   1.0
 * @package   app-robot
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

//	...
if(!file_exists(_BOOTSTRAP_) ){
	//	Did not exists op:/Bootstrap.php.
	echo "Does not found onepice-framework's core's Bootstrap.php file.";
}else{
	//	Include onepiece-framework's Bootstrap.php.
	include(_BOOTSTRAP_);

	//	Setup error hadler.
	include($_OP[OP_ROOT].'/Error.php');
}
