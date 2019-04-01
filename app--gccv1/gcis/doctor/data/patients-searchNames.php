<?php
$sqlDB['table'] = 'patient_profiles';

if( $page['term'] ){
	$whereFirst = ' WHERE lastname LIKE "'.$page['term'].'%"';
	if( $page['fname'] )
		$whereFirst = ' WHERE lastname="'.$page['term'].'" AND firstname LIKE "'.$page['fname'].'%"';
}

$sql = queryAndTell( "SELECT * FROM ".$sqlDB['table'].$whereFirst." LIMIT 8" );

//print_r( $sql );
/*`id`
`firstname`
`lastname`
`birthday`
`home_phone`
`cell_phone`
`email`
`health_card`
`emg_contact`
`emg_contact_phone`
`archive`
`date_joined`
`last_update`*/

/*if( $page['fname'] != '' )
	foreach( $sql as $key => $data )
		$sql[$key]['lastname'] = sprintf( '%s, %s',$data['lastname'],$data['firstname'] );*/

$label = ( $page['fname'] != '' ) ? 'firstname' : 'lastname';

$fields = array( 
	'id' => 'id',
	'label' => $label,
	'value' => $label,
);

$page['mode'] = 'normal';