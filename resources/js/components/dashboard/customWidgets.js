const customWidgets = Array();

customWidgets['super-admin'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8
},{
  title: 'Sales Report',
    widgetType: 'chart',
    showTitle: 1,
    size: 16
}],
[{
    title: 'Gross Sales',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
},{ 
  title: 'Expenses',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
},{
  title: 'Balance',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
}],
[{
    title: 'Top Sales of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8
},{ 
  title: 'Top Categories of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8
},{
  title: 'Number of Customers',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
}],
[{
    title: 'New Members',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24
  }]
]

customWidgets['branch-admin'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8
},{
    title: 'Sales Report',
    widgetType: 'chart',
    showTitle: 1,
    size: 16
}],
[{
    title: 'Gross Sales',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
},{ 
    title: 'Expenses',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
},{
    title: 'Balance',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
}],
[{
    title: 'Top Sales of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8
},{ 
    title: 'Top Categories of the Month',
    widgetType: 'table',
    showTitle: 1,
    size: 8
},{
    title: 'Number of Customers',
    widgetType: 'statistics',
    showTitle: 1,
    size: 8
}],
[{
    title: 'New Members',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24
    }]
]

customWidgets['patient'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8
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
        },{
            title: 'Recent Prescription',
            widgetType: '',
            showTitle: 1,
            size: 8,
        }
    ]
},{
    title: 'My Account',
    widgetType: 'my-account',
    showTitle: 1,
    size: 8
}],
[{
    title: 'My Appointments',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24
}]
]

customWidgets['doctor'] = [
[{
    title: 'Notifications',
    widgetType: 'notification-card',
    showTitle: 1,
    size: 8
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
        },{
            title: 'Appointments Completed',
            widgetType: '',
            showTitle: 1,
            size: 8,
        }
    ]
},{
    title: 'Next Appointment',
    widgetType: 'my-account',
    showTitle: 1,
    size: 8
}],
[{
    title: 'My Appointments',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24
},{
    title: 'My Patients',
    widgetType: 'datatable',
    showTitle: 1,
    size: 24
}]
]

    



  export default customWidgets;
