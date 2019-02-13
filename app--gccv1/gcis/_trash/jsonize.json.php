<?php
/*
 * JSON payload generator as API
 */
include('../config.php');
include('includes/init.php');

$pagename = isset($_REQUEST['pagename']) ? $_REQUEST['pagename'] : '';
$page['mode'] = isset($_REQUEST['edit']) ? 'edit' : '';

if( userIsLoggedIn() ){
	$data['dataFile'] = $user['role'].'/data/'.$pagename.'.php';

	$tableData = array();
	@include($data['dataFile']);
}

// Prepare data for datatables
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
	if( $sql )
		while($user = mysqli_fetch_assoc($sql)) : 
			foreach( $fields as $field )
				$row[$field] = $user[$field];
			$tableData[] = $row;
		endwhile;

header("Content-type: application/json; charset=utf-8");

/*
 * Not using json-encode() yet for full control of tabs and line breaks
 * use JSON_PRETTY_PRINT option if using json_encode()
 */
?>
{
	"data":[
<?php
// we accept fakeData
if( is_array( $fakeData ) )
	$tableData = $fakeData;

$tableDataCount = count( $tableData );
//print_r( $tableData );

$i = 1;
if( is_array( $tableData ) )
	if( $page['mode'] == 'edit' ){
		foreach( $tableData as $key => $data ){
			$i++;
			if( !isset($data['DT_RowId']) )
				$datapair[] = sprintf( '"DT_RowId":"row_%s"',$i );
			
			foreach( $data as $key => $value )
				$datapair[] = sprintf( '"%s":"%s"',$key,$value );

			
			echo "\t\t".'{'.implode( ',',$datapair ).'}';
			echo ( ($i-1) == $tableDataCount ) ? '' : ',';
			echo "\n";
			unset( $datapair );
		}
		echo "\t".'],'."\n";
		echo "\t".'"options":[],'."\n";
		echo "\t".'"files":[]'."\n";
	} else {
		foreach( $tableData as $key => $data ){
			echo "\t\t".'["'.implode( '","',$data ).'"]';
			echo ( ($key+1) == $tableDataCount ) ? '' : ',';
			echo "\n";
		}
		echo "\t".']'."\n";
	}
?>
}