<?php
include_once "lib/ezSQL/shared/ez_sql_core.php";
include_once "lib/ezSQL/lib/ez_sql_mysqli.php";

/**
 * Customize ezSQL
 *
 * Created mainly to catch errors
 *
 * NOTE: an actual db connection is made only in function query 
   so errors are generated downstream only, not during class construct
 */
class ezSQLmysqli extends ezSQL_mysqli
{
	public function __construct($dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $charset='') {
		parent::__construct( $dbuser,$dbpassword,$dbname,$dbhost,$charset );
	}
	
	public function connect($dbuser='', $dbpassword='', $dbhost='localhost', $charset='') {
		parent::connect( $dbuser,$dbpassword,$dbname,$dbhost,$charset );
		
		global $page;
		if( mysqli_connect_errno() )
			$page['errors'][] =  'Bad db connection:<br><em>' . mysqli_connect_error() . '</em>';
	}
	
	/*public function query($query, $use_prepare=false) {
		parent::query( $query, $use_prepare );
		
		global $page;
		$page['errors'][] = 'Queried w ezSQL';
	}*/
	
	function register_error( $err_str ){
		parent::register_error( $err_str);

		global $page;
		$page['errors'][] = $this->last_query . '<br><br>' . $err_str;
	}
}