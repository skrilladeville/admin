<?php
$nav = array(
	array(
		'link' => 'dashboard', 
		'title' => 'Dashboard',
		'icon' => 'fas fa-home'
		),
	array(
		'link' => 'patient',
		'title' => 'Patient',
		'icon' => 'fas fa-heartbeat',
		'subnav' => array( 
			array(
				'link' => 'intake-form-creation',
				'title' => 'Add New Patient' 
			),
			array(
				'link' => 'patient-list',
				'title' => 'Patient List' 
			),
			array(
				'link' => 'patient-archive',
				'title' => 'Patient Archive' 
			)
		)
	),
	array(
		'link' => 'prescription-creation',
		'title' => 'Prescription',
		'icon' => 'fas fa-prescription',
		'subnav' => array( 
			array(
				'link' => 'rx-refill-request',
				'title' => 'Refill Rx Request List' 
			),
			array(
				'link' => 'rx-create--v2',
				'title' => 'Create Prescription' 
			),
			array(
				'link' => 'rx-list',
				'title' => 'View Prescription List' 
			),
			array(
				'link' => 'rx-archive',
				'title' => 'Prescription Archive' 
			)
		)
	),
	array(
		'link' => 'booking',
		'title' => 'Booking',
		'icon' => 'fas fa-clock',
		'subnav' => array( 
			array(
				'link' => 'sched-list',
				'title' => 'View Booking' 
			),
			array(
				'link' => 'sched-creation',
				'title' => 'Add Booking' 
			),
			array(
				'link' => 'sched-setup',
				'title' => 'Setup Calendar' 
			),
			array(
				'link' => 'sched-archive',
				'title' => 'Booking Archive' 
			)
		)
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
		'link' => 'contact', 
		'title' => 'Contact',
		'icon' => 'fas fa-envelope'
	),
	array(
		'link' => 'my-account--v2', // my-account for v1
		'title' => 'My Account',
		'icon' => 'fas fa-briefcase-medical'
	)
);

navigate($nav);
?>