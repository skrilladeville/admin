<script language="javascript">
if(typeof jQuery!=='undefined'){
	console.log('jQuery Loaded');
}
else{
	console.log('not loaded yet');
}
  $(document).ready(function() {

	$('#calendar').fullCalendar({
	  header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay,listWeek'
	  },
	  defaultDate: new Date(),
	  navLinks: true, // can click day/week names to navigate views
	  editable: true,
	  eventLimit: true, // allow "more" link when too many events
	  events: [
		{
		  title: 'All Day Event',
		  start: '2018-12-01',
		},
		{
		  title: 'Long Event',
		  start: '2018-12-07',
		  end: '2018-12-10'
		},
		{
		  id: 999,
		  title: 'Repeating Event',
		  start: '2018-12-09T16:00:00'
		},
		{
		  id: 999,
		  title: 'Repeating Event',
		  start: '2018-12-16T16:00:00'
		},
		{
		  title: 'Conference',
		  start: '2018-12-11',
		  end: '2018-12-13'
		},
		{
		  title: 'Meeting',
		  start: '2018-12-12T10:30:00',
		  end: '2018-12-12T12:30:00'
		},
		{
		  title: 'Lunch',
		  start: '2018-12-12T12:00:00'
		},
		{
		  title: 'Meeting',
		  start: '2018-12-12T14:30:00'
		},
		{
		  title: 'Happy Hour',
		  start: '2018-12-12T17:30:00'
		},
		{
		  title: 'Dinner',
		  start: '2018-12-12T20:00:00'
		},
		{
		  title: 'Birthday Party',
		  start: '2018-12-13T07:00:00'
		},
		{
		  title: 'Click for Google',
		  url: 'http://google.com/',
		  start: '2018-12-28'
		}
	  ]
	});

  });

</script>