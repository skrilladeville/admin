<?php
$nav = array(
	array(
		'link' => 'dashboard', 
		'title' => 'Dashboard',
		'icon' => 'fas fa-home'
		),
	array( 
		'link' => 'intake-form-creation', 
		'title' => 'Intake Form',
		'icon' => 'fas fa-plus-circle'
	),
	array(
		'link' => 'continuous-care',
		'title' => 'Continuous Care',
		'icon' => 'fas fa-leaf',
		'subnav' => array( 
			array(
				'link' => 'feedback',
				'title' => 'Feedback' 
			),
			array(
				'link' => 'survey',
				'title' => 'Survey' 
			)
		)
	),
	array(
		'link' => 'prescription-creation',
		'title' => 'Prescription',
		'icon' => 'fas fa-prescription',
		'subnav' => array( 
			array(
				'link' => 'refill-request',
				'title' => 'Rx Refill Request' 
			)
		)
	),
	array(
		'link' => 'booking',
		'title' => 'Booking',
		'icon' => 'fas fa-clock',
		'subnav' => array( 
			array(
				'link' => 'patient-sched-list',
				'title' => 'View Booking' 
			),
			array(
				'link' => 'patient-sched-creation',
				'title' => 'Add Booking' 
			),
			array(
				'link' => 'booking-archive',
				'title' => 'Booking Archive' 
			)
		)
	),
	array(
		'link' => 'my-account',
		'title' => 'My Account',
		'icon' => 'fas fa-briefcase-medical'
	),
	array( 
		'link' => 'contact', 
		'title' => 'Contact',
		'icon' => 'fas fa-envelope'
	)/*,
	array( 
		'link' => 'online-store', 
		'title' => 'Online Store',
		'icon' => 'fas fa-shopping-cart'
	)*/
);

navigate($nav);
?>