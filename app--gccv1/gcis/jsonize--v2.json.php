<?php
/*
 * JSON payload generator for API with datatables and searches
 *
 * since v2 (2019/01/04)
 * --using ezSQL library for db queries
 * --using json_encode() to format JSON
 */
$page['contentType'] = 'json';

include(__DIR__. '/../config.php');
include('includes/functions.php');
include('includes/init.php');

$pagename = isset( $_REQUEST['pagename'] ) ? $_REQUEST['pagename'] : $pagename;
$page['mode'] = isset( $_REQUEST['edit'] ) ? 'edit' : '';
$page['term'] = isset( $_REQUEST['term'] ) ? $_REQUEST['term'] : '';
$page['fname'] = isset( $_REQUEST['fname'] ) ? $_REQUEST['fname'] : '';


if( userIsLoggedIn() ){
	$data['dataFile'] = $user['role'].'/data/'.$pagename.'.php';

	$tableData = array();
	@include($data['dataFile']);
}
//print_r( $_REQUEST );

// Prepare data for Datatables Editor
if( isset( $_POST['action'] ) ){
	//print_r( $_POST );
	switch( $_POST['action'] ){
		case 'edit':
			if( is_array( $_POST['data'] ) ){
				foreach( $_POST['data'] as $DT_RowId => $postdata ){
					$row['DT_RowId'] = $DT_RowId;
					foreach( $postdata as $col => $val ){
						$row[$col] = $val;
						if( $col != 'id' )
							$pairs[] = sprintf( "%s='%s'",$col,$val );
					}
					//$pairs[] = "archive=1";
					$pairset = implode( ',',$pairs );
					
					$userID = $postdata['id'];
					$queries[] = "UPDATE ".$sqlDB['table']." SET $pairset WHERE id=$userID";
					unset( $pairs );
				}
				$query = implode( ';',$queries );
				$sql = $db->multi_query( $query );
				$tableData[] = $row;
			}
			break;
		case 'remove':
			if( is_array( $_POST['data'] ) ){
				foreach( $_POST['data'] as $pdkey => $postdata ){
					$userID = $postdata['id'];
					$queries[] = "UPDATE ".$sqlDB['table']." SET ".$sqlSET['remove']." WHERE id=$userID";
				}
				$query = implode( ';',$queries );
				$sql = $db->multi_query( $query );
				$tableData = array();
			}
			//print_r( $queries );
			break;
	}
} else
	if( is_array( $sql ) )
		foreach( $sql as $key => $val ){
			foreach( $fields as $field => $coln ){
				if( $fields[0] )
					$field = $coln;
					
				$row[$field] = $val[$coln];
			}
			$tableData[] = $row;
		}
		

header("Content-type: application/json; charset=utf-8");

// we accept fakeData
if( is_array( $fakeData ) )
	$tableData = $fakeData;

$tableDataCount = count( $tableData );
//print_r( $tableData );

if( is_array( $tableData ) )
	if( $page['mode'] == 'edit' ){
		//$i = 1;
		foreach( $tableData as $key => $data ){
			$i++;
			if( !isset($data['DT_RowId']) )
				$datapair = array( "DT_RowId" => "row_".$i );
			
			/*foreach( $data as $key => $value )
				$datapair[$key] = array( "DT_RowId" => $value );*/

			
			/*echo "\t\t".'{'.implode( ',',$datapair ).'}';
			echo ( ($i-1) == $tableDataCount ) ? '' : ',';
			echo "\n";*/
			if( !empty( $datapair ) )
				$tableData[$key] = array_merge( $datapair,$tableData[$key] );
			unset( $datapair );
		}
		/*echo "\t".'],'."\n";
		echo "\t".'"options":[],'."\n";
		echo "\t".'"files":[]'."\n";*/
		
	} elseif( $page['mode'] == 'normal' ){
		// regular JSON format
	} else {
		/*echo '['."\n";*/
		// remove key names for datatables
		foreach( $tableData as $data ){
			/*echo "\t\t".'["'.implode( '","',$data ).'"]';
			echo ( ($key+1) == $tableDataCount ) ? '' : ',';
			echo "\n";*/
			/*foreach( $data as $value )
				$k[] = $value;
			
			$n[] = $k;
			unset( $k );*/
			
			$n[] = array_values( $data );
		}
		/*echo "\t".']'."\n";*/
		$tableData = $n;
	}

if( $page['mode'] != 'normal' )
	$tableData = array( 'data' => $tableData );
echo json_encode( $tableData,JSON_PRETTY_PRINT );
?>