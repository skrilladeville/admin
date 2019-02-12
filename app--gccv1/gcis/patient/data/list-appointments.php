<?php
$names = array( 'Tiger','Nixon','Garrett','Winters','Ashton','Cox','Cedric','Kelly','Airi','Satou' );
$purposes = array( 'Consultation about what to do next.','Ask advice on dosage.','Regular blood pressure and other check ups.','Follow up on x-ray results.','Side effects treatment.' );
$ampm = array( 'A','P' );

for( $i = 0; $i<100; $i++ ){
	$fakeData[] = array( 
		'date' => rand(1,12).'/'.rand(1,30).'/20'.rand(19,20).' '.rand(1,12).':'.rand(0,5).rand(0,9).$ampm[array_rand($ampm)].'M',
		'cat' => $names[array_rand($names)] . ' ' . $names[array_rand($names)],
		'event' => $purposes[array_rand($purposes)]
	);
}