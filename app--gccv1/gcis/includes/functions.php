<?php
function soIfso( $so = false,$else = false ){
	return $so ? $so : $else;
}

/*
 * the missing $EZSQL_ERROR global variable in ezSQL
 * from Wordpress wp-db.php print_error() on line 1350
 */
function ezSQLerror( $ezSQL ){
	global $EZSQL_ERROR;

	if ( $ezSQL ) {
		if ( $ezSQL->suppress_errors )
			return false;

		//if ( $ezSQL->use_mysqli )
			$str = mysqli_error( $ezSQL->dbh );
	} else
		return array( 'query' => $ezSQL->last_query, 'error_str' => 'Bad database connection.' );

	$errs = array( 'query' => $ezSQL->last_query, 'error_str' => $str );
	$EZSQL_ERROR[] = $errs;
	
	if( $str )
		return $errs;
}

/*
 * Find what's gone from a list by e.g. comparing $_POST with db result
 */
function cancelOutSame( $listThen = array(),$listNow = array() ){
	if( is_array( $listThen ) ){
		foreach( $listThen as $key => $repRes )
			if( $repRes['id'] )
				$repList['IDsThen'][] = $repRes['id'];
	}	else return;

	if( is_array( $listNow ) ){
		foreach( $listNow as $key => $repeaterItem )
			// something gone that was there before?
			if( $repeaterItem['id'] )
				$repList['IDsNow'][] = $repeaterItem['id'];
	}	else return;

	return array_diff( $repList['IDsThen'],$repList['IDsNow'] );
}

/** from Wordpress includes/formatting.php
 * Verifies that an email is valid.
 *
 * Does not grok i18n domains. Not RFC compliant.
 *
 * @since 0.71
 *
 * @param string $email      Email address to verify.
 * @param bool   $deprecated Deprecated.
 * @return string|bool Either false or the valid email address.
 */
function is_email( $email, $deprecated = false ) {
	global $page;
	
	if ( ! empty( $deprecated ) )
		_deprecated_argument( __FUNCTION__, '3.0.0' );

	// Test for the minimum length the email can be
	if ( strlen( $email ) < 3 ) {
		/**
		 * Filters whether an email address is valid.
		 *
		 * This filter is evaluated under several different contexts, such as 'email_too_short',
		 * 'email_no_at', 'local_invalid_chars', 'domain_period_sequence', 'domain_period_limits',
		 * 'domain_no_periods', 'sub_hyphen_limits', 'sub_invalid_chars', or no specific context.
		 *
		 * @since 2.8.0
		 *
		 * @param bool   $is_email Whether the email address has passed the is_email() checks. Default false.
		 * @param string $email    The email address being checked.
		 * @param string $context  Context under which the email was tested.
		 */
		$page['errors'][] = 'Your email address is too short.';
		return;
	}

	// Test for an @ character after the first position
	if ( strpos( $email, '@', 1 ) === false ) {
		/** This filter is documented in wp-includes/formatting.php */
		$page['errors'][] = 'Your email address needs an "@" character.';
		return;
	}

	// Split out the local and domain parts
	list( $local, $domain ) = explode( '@', $email, 2 );

	// LOCAL PART
	// Test for invalid characters
	if ( !preg_match( '/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\.-]+$/', $local ) ) {
		/** This filter is documented in wp-includes/formatting.php */
		$page['errors'][] = 'Your email address contains invalid characters.';
		return;
	}

	// DOMAIN PART
	// Test for sequences of periods
	if ( preg_match( '/\.{2,}/', $domain ) ) {
		/** This filter is documented in wp-includes/formatting.php */
		$page['errors'][] = 'Your email domain address has sequences of periods.';
		return;
	}

	// Test for leading and trailing periods and whitespace
	if ( trim( $domain, " \t\n\r\0\x0B." ) !== $domain ) {
		/** This filter is documented in wp-includes/formatting.php */
		$page['errors'][] = 'Your email address has invalid periods and spaces.';
		return;
	}

	// Split the domain into subs
	$subs = explode( '.', $domain );

	// Assume the domain will have at least two subs
	if ( 2 > count( $subs ) ) {
		/** This filter is documented in wp-includes/formatting.php */
		$page['errors'][] = 'Your email domain address requires two subs.';
		return;
	}

	// Loop through each sub
	foreach ( $subs as $sub ) {
		// Test for leading and trailing hyphens and whitespace
		if ( trim( $sub, " \t\n\r\0\x0B-" ) !== $sub ) {
			/** This filter is documented in wp-includes/formatting.php */
			$page['errors'][] = 'Your email domain address has leading or trailing hyphens or whitespace.';
			return;
		}

		// Test for invalid characters
		if ( !preg_match('/^[a-z0-9-]+$/i', $sub ) ) {
			/** This filter is documented in wp-includes/formatting.php */
			$page['errors'][] = 'Your email domain address has invalid characters.';
			return;
		}
	}

	// Congratulations your email made it!
	/** This filter is documented in wp-includes/formatting.php */
	return true;
}

/*
 * Server-side form validation. Our last line of defense.
 * Match $_POST data against db records
 */
function validateFormData( $data = array() ){
	global $page;
	
	//print_r( $_POST );
	if( empty( $data ) )
		$data = $_POST;
	
	// check for empty but required data
	foreach( $data as $key => $val )
		if( empty( $val ) && $data[$key] && !in_array( $key,$page['formDataOptional'] ) ){
			$page['errors'][] = 'Please provide your '.labelize( $key ).'.';
			return;
		}
	
	// 
	if( $page['formDataRequired'] && in_array( 'i_agree',$page['formDataRequired'] ) )
		if( empty( $data['i_agree'] ) ){
			$page['errors'][] = 'Please check "I Agree" if you wish to proceed.';
			return;
		}
	
	if( isset( $data['password_confirmation'] ) )
		if( $data['password_confirmation'] != $data['password'] ){
			$page['errors'][] = 'Please retype your password correctly in the Confirm Password box.';
			return;
		}
	
	if( $data['email'] == $data['email'] ){
		if( isset( $data['password'] ) )
			if( $data['password'] != $data['password'] ){
				$page['errors'][] = 'The email is already taken.';
				return;
			}
	}
	
	if( isset( $data['username'] ) ){
		if( $data['username'] != $data['username'] ){
			$query = "SELECT * FROM gcis_users WHERE username='".$data['username']."' LIMIT 1";
			$result = queryAndTell( $query );
			if( $result ){
					$page['errors'][] = 'The username is already taken.';
					return;
				}
			}
	}

	// Congratulations, Hacker! You passed all barriers and reached this point.
	return true;
}

/*
 * Do a mysqli query and pass any error messages to the page
 */
function queryAndTell( $query = '',$successMsg = '' ){
	global $ezSQL,$EZSQL_ERROR,$page;

	//echo $query;
	/* ezSQL
	 * instead of native mySQLi
	 * $result = mysqli_query( $db,$query );
	 */
	if( $query )
		//$result;

	/* NOTE: Call to a member function get_results() on null
		 global $ezSQL must be set before $ezSQL = new ezSQLmysqli is instantiated
	 */
	if( $result = $ezSQL->get_results( $query,ARRAY_A ) ){
		//$row = mysqli_fetch_all( $result,MYSQLI_ASSOC );
		$row = $result;
		//print_r( $row );
		
		if( $row ){
			if( $successMsg )
				$page['help'][] = $successMsg;
			return ( array )$row;
		}
	} elseif ( $EZSQL_ERROR )
			foreach( $EZSQL_ERROR as $key => $err )
				$page['errors'][] = $query . '<br><br>' . $err['error_str'];

	//$page['errors'][] = $query . '<br><br>' . $db->error;}
}

/*
 * Overwrite applicable column values with data on hand
 */
function prepareColumnEdits( $availableData = array(),$sampleRow = array() ){
	global $ezSQL;
	
	//echo 'av: ';print_r( $availableData );
	//if( empty( $resultSample ) )
	$columns = $sampleRow ? $sampleRow : $availableData ;
	
	//print_r( $columns );
	// get applicable columns and fill them with default values
	foreach( $columns as $columnName => $columnValue ){
		//	NOTE: Do not put if( empty ) here since $avaiableData may be able to fill it downstream
		
		// route ids to where pairs
		if( $columnName == 'id' || preg_match( "/_id$/",$columnName ) )
			$wherePairs[$columnName] = $columnValue;
		elseif( in_array( $columnName,array( 'date_modified','date_created','date_added' ) ) && empty( $columnValue ) )
			$columnEdit[$columnName] = SERVER_TIME;
		else
			$columnEdit[$columnName] = $ezSQL->escape( $columnValue );
	}
	//echo 'ce-def: ';print_r( $columns );
	
	// overwrite column values with available data
	if( !empty( $sampleRow ) ){
		foreach( $columnEdit as $columnName => $columnValue )
			if( $availableData[$columnName] )
				$columnEdit[$columnName] = $availableData[$columnName];
			elseif( !$columnValue )
				unset( $columnEdit[$columnName] );
		
		// NOTE: some where pairs are needed for inserts
		if( is_array( $wherePairs ) ){
			foreach( $wherePairs as $whereName => $whereValue )
				if( $availableData[$whereName] )
					$columnEdit[$whereName] = $wherePairs[$whereName] = $availableData[$whereName];
		
			// if no id, move all wheres to whats
			if( !$wherePairs['id'] ){
				foreach( $wherePairs as $whereName => $whereValue )
					if( $whereValue )
						$columnEdit[$whereName] = $whereValue;
				unset( $wherePairs );
			}
		}
	}
	
	// just in case. We never edit the primary key.
	unset( $columnEdit['id'] );
	
	if( $columnEdit )
		$columnEdits['what'] = $columnEdit;
	if( $wherePairs )
		$columnEdits['where'] = $wherePairs;
	//echo 'ed: ';print_r( $columnEdits );
	
	return( $columnEdits );
}

/*
 * Updates an existing table row or adds new row if no row id exists
 */
function updateOrInsert( $DBTable = '',$resultItem = array(),$options = array() ){
	global $ezSQL,$EZSQL_ERROR,$page;
	
	$opts = array( 
		'rowSample' => array()//, // sample result from $DBTable to get column names from
	);
	$opt = array_merge( $opts,$options );
	
	if( !validateFormData( $resultItem ) )
		return;
	
	if( $resultItem['secondary_id'] )
		foreach( $resultItem['secondary_id'] as $key => $idval )
			$resultItem[$key] = $idval;
	
	if( $pce = prepareColumnEdits( $resultItem,$opt['rowSample'] ) ){
		$what = $pce['what'];
		$where = $pce['where'];
	}

	//echo 'pce: ';print_r( $pce );
	// UPDATE
	if( $where['id'] ){
		//echo 'upd table '.$DBTable.': ';
		foreach( $what as $name => $repformval )
			$pairs[] = sprintf( '%s="%s"',$name,$repformval );
		
		$pairset = implode( ',',$pairs );

		foreach( $where as $here => $there )
			if( $there )
				$wheres[] = sprintf( "%s='%s'",$here,$there );
		$whereset = implode( ' AND ',$wheres );

		$query = "UPDATE $DBTable SET $pairset WHERE $whereset";
		//echo $query;
		
		$actionDone = labelize( $DBTable ).' Updated';
	} elseif( $resultItem ) {
		// INSERT
		//echo 'ins table '.$DBTable.': ';

		//print_r( $resultItem );
		foreach( $what as $name => $repformval ){
			$columns[] = $name;
			$values[] = '"'.$repformval.'"';
		}

		$query = "INSERT INTO ".$DBTable." (".implode( ',',$columns ).") VALUES (".implode( ',',$values ).")";
		$actionDone = 'New '.labelize( $DBTable ).' Created';
	}

	//echo $query.'<br>';
	if( $ezSQL->query( $query ) ){
		//$db->query($query_user);
		$actionDone = $actionDone ? $actionDone."<br/>" : '';
		$page['help'][] = $actionDone." <em>Please review the information.</em>";
		
		return $ezSQL->insert_id;
	} elseif ( $EZSQL_ERROR )
			foreach( $EZSQL_ERROR as $key => $err )
				$page['errors'][] = $query . '<br><br>' . $err['error_str'];
		//$page['errors'][] = $db->error;
}

/*
 * Autofills and saves data submitted by forms.
 */
function autoFillForm( $DBTable = '',$wherePairs = array(),$options = array() ){
	global $user,$page;
	
	//echo 'autoFillForm: '.$DBTable;
	$opts = array( 
		'LIMIT' => 1, // 'no' for no limit
		'processItems' => array() // force focus on selected $_POST items
	);
	
	if( is_array( $options ) )
		$opt = array_merge( $opts,$options );
	//echo '$opt: ';print_r( $opt );
	
	// we need the email to be valid before doing a query
	if( isset( $_POST['email'] ) && !is_email( $_POST['email'] ) )
		return;
	
	// check if data exists
	if( $DBTable ){
		if( count( $wherePairs ) > 0 ){
			foreach( $wherePairs as $colName => $rowValue ){
				if( $rowValue )
					$wherePairStrings[] = sprintf( "%s='%s'",$colName,$rowValue );
				
				// detect user_id, rx_id
				if( preg_match( "/_id$/",$colName ) ){
					$_POST['secondary_id'][$colName] = $rowValue;
					$constantID[$colName] = $rowValue;
				}
			}
			if( $wherePairStrings )
				$whereClause = " WHERE ".implode( ' AND ',$wherePairStrings );
		}
		
		if( $opt['LIMIT'] == 'no' )
			$limit = '';
		elseif( $opt['LIMIT'] > 1 )
			$limit = 'LIMIT '.$opt['LIMIT'];
		else
			$limit = 'LIMIT 1';
		
		$query = "SELECT * FROM ".$DBTable.$whereClause.boltIn( $limit );		
		$result = queryAndTell( $query );
		//echo 'queryAndTell: '.$DBTable.$query;print_r( $result );
		
		// If empty result, We just want the column names
		if( !$result ){
			$searchNotFound = true;
			unset( $whereClause );
			/* "SHOW COLUMNS FROM ".$DBTable shows only the first column
			   NOTE: SELECT needs the table to have at least one row */
			$limit = 'LIMIT 1';
			$result = queryAndTell( "SELECT * FROM ".$DBTable." $limit" );
			if( !$result[0] ){
				$page['errors'][] = 'Table ' . $DBTable . ' is empty. <br/><em>Could not get field names without a sample row.</em>';
				return;
			}
		}
		
		//echo 'r0: ';print_r( $result[0] );
		// Get rid of the 'id' to prevent an UPDATE query downstream
		$resultSample = array_fill_keys( array_keys( $result[0] ),null );
		//echo 'rsamp: ';print_r( $resultSample );
		
		unset( $_POST['id'] );
		if( $searchNotFound ){
			$result[0] = $resultSample;
		}
		elseif( $result[0]['id'] )
			$_POST['id'] = $result[0]['id'];
	}
	
	//echo 'res: ';print_r( $result );

	// SAVE
	//echo 'p: ';print_r( $_POST );
	if( isset( $_POST['save'] ) ){
		//echo 'SAVING: ';
		if( $user['id'] )
			$_POST['user_id'] = $user['id'];
		
		$option['rowSample'] = $resultSample;
		
		// use the secondary where param as insert value downstream
		if( is_array( $resultSample ) ){
			foreach( $resultSample as $col => $val )
				if( is_array( $constantID ) )
					foreach( $constantID as $con => $ID )
						if( $col == $con ){
							$secID['name'] = $col;
							$secID['value'] = $ID;
						}
			
			//echo 'secid: ';print_r( $secID );
		}
		$af = $_POST;
		
		//echo $DBTable.': ';print_r( $result );
		if( is_array( $_POST['repeater-list'] ) && in_array( 'repeater-list',$opt['processItems'] ) ){
			foreach( $_POST['repeater-list'] as $key => $repeaterItem ){
				$repeaterItem[$secID['name']] = $secID['value'];
					
				//echo 'ri: ';print_r( $repeaterItem );
				if( $insertID = updateOrInsert( $DBTable,$repeaterItem,$option ) )
					$af['repeater-list'][$key]['id'] = $insertID;
			}
		} else	
			/* Not sure why I looped through $result which can cause multiple inserts
				 if LIMIT > 1 in the queryAndTell above
			 */
			foreach( $result as $key => $resultItem ){
				// overwrite data input items
				if( is_array( $_POST ) && is_array( $opt['dataInput'] ) )
					$dataInputP = array_merge( $_POST,$opt['dataInput'] );
				if( is_array( $dataInputP ) && is_array( $wherePairs ) )
					$dataInput = array_merge( $dataInputP,$wherePairs );
				//echo '$dataInput: ';print_r( $dataInput );
				
				if( $insertID = updateOrInsert( $DBTable,$dataInput,$option ) )
					$result['id'] = $insertID;
				//echo 'id2: '.$insertID;
			}
		
		$af['result'] = $result;

		//echo $DBTable.': ';print_r( $af );
		return $af;
	} elseif( !$searchNotFound ) {
		if( $limit == 'LIMIT 1' )
	 		return $result[0];
		else
			return $result;
	}
}