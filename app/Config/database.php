<?php
class DATABASE_CONFIG {
	//initalize variable as null
	var $default = null;

	//set up connection details to use in Live production server
	var $stage =
	array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql.cmgr.org',
		'login' => 'itamarkestenbaum',
		'password' => 'chloe1985',
		'database' => 'harpoon',
	);

	// and details to use on your local machine for testing and development
	var $dev =
	array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'harpoon',
	);

	function __construct() {
		if (isset($_SERVER['SERVER_NAME'])) {
			switch ($_SERVER['SERVER_NAME']) {
				case 'cmgr':
					$this->default = $this->dev;
					break;
				case 'dev.cmgr.org':
					$this->default = $this->stage;
					break;
				case 'stage.cmgr.org':
					$this->default = $this->stage;
					break;
			}
		} else // we are likely baking, use our local db
		{
			$this->default = $this->dev;
		}
	}
}

// class DATABASE_CONFIG {

// 	public $default = array(
// 		'datasource' => 'Database/Mysql',
// 		'persistent' => false,
// 		'host' => 'localhost',
// 		'login' => 'root',
// 		'password' => 'root',
// 		'database' => 'harpoon',
// 	);
// 	public $test = array(
// 		'datasource' => 'Database/Mysql',
// 		'persistent' => false,
// 		'host' => 'localhost',
// 		'login' => 'user',
// 		'password' => 'password',
// 		'database' => 'test_database_name',
// 	);
// }
