<?php
$names = array( 'Booking','Invoice','Store' );
$purposes = array( 'John McKinley has accepted you as patient','You have a new invoice from Mary Litlamb.','There are 17 new items for sale at the store.' );
$ampm = array( 'A','P' );

for( $i = 0; $i<100; $i++ ){
	$nameKey = array_rand($names);
	if( $names[$nameKey] == 'Store' ){
		$purpose = 'There are '.rand(2,64).' new items for sale at the store.';
	} else
		$purpose = $purposes[$nameKey];
	
	$fakeData[] = array( 
		'date' => rand(1,12).'/'.rand(1,30).'/20'.rand(19,20).' '.rand(1,12).':'.rand(0,5).rand(0,9).$ampm[array_rand($ampm)].'M',
		'cat' => $names[$nameKey],
		'event' => $purpose
	);
}

/*$fakeData = array( 
	array( 
		'date' => '11/25/2018 9:30AM',
		'cat' => 'Booking',
		'event' => 'John McKinley has accepted you as patient'
	),
	array( 
		'date' => '11/24/2018 9:30AM',
		'cat' => 'Invoice',
		'event' => 'You have a new invoice from Mary Litlamb.'
	),
	array( 
		'date' => '12/06/2018 12:30PM',
		'cat' => 'Booking',
		'event' => 'You have been referred to Mary Litlamb by John McKinley.'
	),
	array( 
		'date' => '01/06/2019 8:40AM',
		'cat' => 'Store',
		'event' => 'There are 17 new items for sale at the store.'
	),
	array( 
		'date' => '01/16/2019 1:20PM',
		'cat' => 'Store',
		'event' => 'There are 4 new items for sale at the store.'
	)
);*/