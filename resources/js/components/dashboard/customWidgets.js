const customWidgets = Array();

customWidgets['super-admin'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8,
    templateName: 'notifications'
},{
  title: 'Sales Report',
    widgetType: 'chart',
    showTitle: 1,
    size: 16,
    templateName: 'salesReport'
}],
[{
    title: 'Gross Sales',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8,
    templateName: 'statistics'
},{ 
  title: 'Expenses',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8,
    templateName: 'statistics'
},{
  title: 'Balance',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8,
    templateName: 'statistics'
}],
[{
    title: 'Top Sales of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8,
    templateName: 'topSales'
},{ 
  title: 'Top Categories of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8,
    templateName: 'topCategories'

},{
  title: 'Number of Customers',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8,
    templateName: 'statistics'
}],
[{
    title: 'New Members',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24,
    templateName: 'statistics'
  }]
]

customWidgets['branch-admin'] = [
[{
    title: 'Top Sales of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8,
    templateName: 'topSales'
},{ 
    title: 'Top Categories of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8,
    templateName: 'topCategories'

},{
    title: 'Number of Customers',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8,
    templateName: 'statistics'
}],
[{
    title: 'New Members',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24,
    templateName: 'statistics'
    }]
]
    

customWidgets['patient'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8,
    templateName: 'notifications'
},{
    title: 'Inner Col',
    widgetType: '',
    showTitle: 0,
    size: 8,
    inner_widgets: [
        {
            title: 'Next Appointment',
            widgetType: '',
            showTitle: 1,
            size: 8,
            templateName: 'nextAppointment'
        },{
            title: 'Recent Prescription',
            widgetType: '',
            showTitle: 1,
            size: 8,
            templateName: 'recentPrescription'
        }
    ]
},{
    title: 'My Profile',
    widgetType: 'my-profile',
    showTitle: 1,
    size: 8,
    templateName: 'myProfile'
}],
[{
    title: 'My Appointments',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24,
    templateName: 'bookings'
}]
]

customWidgets['doctor'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8,
    templateName: 'notifications'
},{
    title: 'Inner Col',
    widgetType: '',
    showTitle: 0,
    size: 8,
    inner_widgets: [
        {
            title: 'New Patients',
            widgetType: '',
            showTitle: 1,
            size: 8,
            templateName: 'statistics'
        },{
            title: 'Appointments Completed',
            widgetType: '',
            showTitle: 1,
            size: 8,
            templateName: 'statistics'
        }
    ]
},{
    title: 'Next Appointment',
    widgetType: '',
    showTitle: 1,
    size: 8,
    templateName: 'nextAppointment'
}],
[{
    title: 'My Appointments',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24,
    templateName: 'bookings',
    url: '/api/bookings'
},{
    title: 'My Patients',
    widgetType: 'datatable',
    showTitle: 1,
    templateName: 'patientsTable',
    size: 24
}]
]

    



  export default customWidgets;
