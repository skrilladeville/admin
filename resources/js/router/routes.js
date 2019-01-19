import Login from '../components/login/Login'
import ProfileWrapper from '../components/profile/ProfileWrapper'
import Profile from '../components/profile/Profile'
import EditProfile from '../components/profile/edit-profile/EditProfile'
import EditPassword from '../components/profile/edit-password/EditPassword'
import Layout from '../components/layout/Layout'
import Dashboard from '../components/dashboard/index'
import Contact from '../components/contact/ContactForm'
import MyAccount from '../components/myaccount/MyAccount'
import ManageUsers from '../pages/users/manageusers/index'
import Categories from '../pages/catalog/categories'
import Feedback from '../pages/cms/feedback'
import RolesPermissions from '../pages/users/rolespermissions/index'

export default [
	{
		path: '/',
		name: 'index',
		component: Login,
		meta: {}
	},
	{
		path: '/login',
		name: 'login',
		component: Login,
		hidden: true,
		meta: {requiresGuest: true, title: 'Login' }
	},
	{
		path: '/dashboard',
		component: Layout,
		meta: {requiresAuth: true, title: 'Dashboard', icon: 'el-icon-menu', permission: 'dashboard' },
		children: [
			{
				path: '',
				name: 'Dashboard',
				component: Dashboard,
				meta: {requiresAuth: true, title: 'Dashboard', permission: 'dashboard' },
			}
		]
	},
	{
		path: '/users',
		component: Layout,
		meta: {requiresAuth: true, title: 'Users', icon: 'el-icon-view', permission: 'manage users' },
		children: [
			{
				path: 'manage-users',
				name: 'manage.users',
				component: ManageUsers,
				meta: {requiresAuth: true, title: 'Manage Users', permission: 'manage users' },
			},
			{
				path: 'roles-permissions',
				name: 'roles.permissions',
				component: RolesPermissions,
				meta: {requiresAuth: true, title: 'Roles/Permissions', permission: 'roles permission' },
			},
			// {
			// 	path: 'edit-profile',
			// 	name: 'users.list',
			// 	component: EditProfile,
			// 	meta: {requiresAuth: true, title: 'Edit Profile' },
			// },
			// {
			// 	path: 'edit-password',
			// 	name: 'users.editPassword',
			// 	component: EditPassword,
			// 	meta: {requiresAuth: true, title: 'Update Password' },
			// }
		]
	},

	{
		path: '/patients',
		meta: {requiresAuth: true, title: 'Patients', icon: 'el-icon-edit-outline', permission: 'patient add' },
		children: [
			{
				path: 'new',
				name: 'add-patient',
				meta: {requiresAuth: true, title: 'Add Patient', permission: 'patient add' },
			},
			{
				path: 'view',
				name: 'view-patients',
				meta: {requiresAuth: true, title: 'View Patients', permission: 'patient view' },
			},
			{
				path: 'archive',
				name: 'patient-archive',
				meta: {requiresAuth: true, title: 'Patient Archive', permission: 'patient archive' },
			}
		]
	},
	{
		path: '/prescription',
		meta: {requiresAuth: true, title: 'Prescription', icon: 'el-icon-edit-outline', permission: 'prescription rx list' },
		children: [
			{
				path: 'rx-list',
				name: 'prescription-rx-list',
				meta: {requiresAuth: true, title: 'Rx Request List', permission: 'prescription rx list' },
			},
			{
				path: 'new',
				name: 'add-prescription',
				meta: {requiresAuth: true, title: 'Create Prescription', permission: 'prescription create' },
			},
			{
				path: 'archive',
				name: 'prescription-archive',
				meta: {requiresAuth: true, title: 'Prescription Archive', permission: 'prescription archive' },
			}
		]
	},
	{
		path: '/bookings',
		meta: {requiresAuth: true, title: 'Bookings', icon: 'el-icon-edit-outline', permission: 'booking create' },
		children: [
			{
				path: 'new',
				name: 'Add Booking',
				meta: {requiresAuth: true, title: 'Create Booking', permission: 'booking create' },
			},
			{
				path: 'view',
				name: 'view-booking',
				meta: {requiresAuth: true, title: 'View Booking', permission: 'booking view' },
			},
			{
				path: 'calendar-setup',
				name: 'calendar-setup',
				meta: {requiresAuth: true, title: 'Calendar Setup', permission: 'booking setup calendar' },
			},
			{
				path: 'archive',
				name: 'archive',
				meta: {requiresAuth: true, title: 'Booking Archive', permission: 'booking archive' },
			}
		]
	},
	{
		path: '/catalog',
		component: Layout,
		meta: {requiresAuth: true, title: 'Catalog', icon: 'el-icon-picture', permission: 'product list' },
		children: [
			{
				path: 'manage-products',
				name: 'catalog.manageProducts',
				meta: {requiresAuth: true, title: 'Manage Products', permission: 'product list' },
			},
			{
				path: 'manage-categories',
				component: Categories,
				name: 'catalog.manageCategories',
				meta: {requiresAuth: true, title: 'Manage Categories', permission: 'product categories' },
			},
			{
				path: 'attributes',
				name: 'catalog.attributes',
				meta: {requiresAuth: true, title: 'Attributes', permission: 'product attributes' },
			}
		]
	},
	{
		path: '/sales',
		meta: {requiresAuth: true, title: 'Sales', icon: 'el-icon-goods', permission: 'sales orders' },
		children: [
			{
				path: 'orders',
				name: 'sales.orders',
				meta: {requiresAuth: true, title: 'Orders', permission: 'sales orders' },
			},
			{
				path: 'invoices',
				name: 'sales.invoices',
				meta: {requiresAuth: true, title: 'Invoices', permission: 'sales invoices' },
			},
			{
				path: 'shipments',
				name: 'sales.shipments',
				meta: {requiresAuth: true, title: 'Shipments', permission: 'sales shipments' },
			},
			{
				path: 'transactions',
				name: 'sales.transactions',
				meta: {requiresAuth: true, title: 'Transactions', permission: 'sales transactions' },
			},
			{
				path: 'credit-memos',
				name: 'sales.creditMemos',
				meta: {requiresAuth: true, title: 'Credit Memos', permission: 'sales credit memos' },
			},
			{
				path: 'billing-agreements',
				name: 'sales.billingAgreements',
				meta: {requiresAuth: true, title: 'Billing Agreements', permission: 'sales billing agreements' },
			},
			{
				path: 'terms-of-conditions',
				name: 'sales.termsCondition',
				meta: {requiresAuth: true, title: 'Terms of Conditions', permission: 'sales terms of condition' },
			},
			{
				path: 'recurring-profiles',
				name: 'sales.recurringProfiles',
				meta: {requiresAuth: true, title: 'Recurring Profiles', permission: 'sales recurring profiles' },
			},
			{
				path: 'tax',
				name: 'sales.tax',
				meta: {requiresAuth: true, title: 'Tax', permission: 'sales tax' },
			}
		]
	},
	{
		path: '/cms',
		component:Layout,
		meta: {requiresAuth: true, title: 'CMS', icon: 'el-icon-edit-outline', permission: 'cms feedback' },
		children: [
			{
				path: 'feedback',
				component: Feedback,
				name: 'feedback',
				meta: {requiresAuth: true, title: 'Feedback', permission: 'cms feedback' },
			},
			{
				path: 'survey',
				name: 'survey',
				meta: {requiresAuth: true, title: 'Survey', permission: 'cms survey' },
			},
			{
				path: 'widgets',
				name: 'widgets',
				meta: {requiresAuth: true, title: 'Widgets', permission: 'cms widgets' },
			}
		]
	},
	{
		path: '/reports',
		meta: {requiresAuth: true, title: 'Reports', icon: 'el-icon-document', permission: 'reports sales' },
		children: [
			{
				path: 'sales',
				name: 'sales',
				meta: {requiresAuth: true, title: 'Sales', permission: 'reports sales' },
			},
			{
				path: 'shopping-card',
				name: 'shopping-card',
				meta: {requiresAuth: true, title: 'Shopping Card', permission: 'reports shopping card' },
			},
			{
				path: 'product',
				name: 'product',
				meta: {requiresAuth: true, title: 'Product', permission: 'reports product' },
			},
			{
				path: 'customers',
				name: 'customers',
				meta: {requiresAuth: true, title: 'Customers', permission: 'reports customers' },
			},
			{
				path: 'tags',
				name: 'tags',
				meta: {requiresAuth: true, title: 'Tags', permission: 'reports tags' },
			},
			{
				path: 'reviews',
				name: 'reviews',
				meta: {requiresAuth: true, title: 'Reviews', permission: 'reports reviews' },
			},
			{
				path: 'search-tem',
				name: 'search-tem',
				meta: {requiresAuth: true, title: 'Search Term', permission: 'reports search term' },
			}
		]
	},
	// {
	// 	path: '/feedback',
	// 	meta: {requiresAuth: true, title: 'Feedback', icon: 'el-icon-edit-outline', permission: 'feedback' },
	// 	children: [
	// 		{
	// 			path: 'feedback',
	// 			name: 'feedback',
	// 			meta: {requiresAuth: true, title: 'Feedback', permission: 'feedback' },
	// 		}
	// 	]
	// },
	// {
	// 	path: '/survey',
	// 	meta: {requiresAuth: true, title: 'Survey', icon: 'el-icon-edit-outline', permission: 'survey' },
	// 	children: [
	// 		{
	// 			path: 'survey',
	// 			name: 'survey',
	// 			meta: {requiresAuth: true, title: 'Survey', permission: 'survey' },
	// 		}
	// 	]
	// },
	{
		path: '/contact',
		component: Layout,
		meta: {requiresAuth: true, title: 'Contact', icon: 'el-icon-edit-outline', permission: 'contact' },
		children: [
			{
				path: 'contact',
				name: 'contact',
				component: Contact,
				meta: {requiresAuth: true, title: 'Contact', permission: 'contact' },
			}
		]
	},
	{
		path: '/system',
		component: Layout,
		meta: {requiresAuth: true, title: 'System', icon: 'el-icon-setting', permission: 'system my account' },
		children: [
			{
				path: 'my-account',
				name: 'my-account',
				component: MyAccount,
				meta: {requiresAuth: true, title: 'My Account', permission: 'system my account' },
			},
			{
				path: 'tools',
				name: 'tools',
				meta: {requiresAuth: true, title: 'Tools', permission: 'system tools' },
			},
			{
				path: 'notifications',
				name: 'notifications',
				meta: {requiresAuth: true, title: 'Notifications', permission: 'system notifications' },
			},
			{
				path: 'manage-currency',
				name: 'manage-currency',
				meta: {requiresAuth: true, title: 'Manage Currency', permission: 'system manage currency' },
			},
			{
				path: 'transaction-emails',
				name: 'transaction-emails',
				meta: {requiresAuth: true, title: 'Transaction Emails', permission: 'system transaction emails' },
			},
			{
				path: 'custom-variables',
				name: 'custom-variables',
				meta: {requiresAuth: true, title: 'Custom Variables', permission: 'system custom variables' },
			},
			{
				path: 'manage-store',
				name: 'manage-store',
				meta: {requiresAuth: true, title: 'Manage Store', permission: 'system manage store' },
			},
			{
				path: 'order-status',
				name: 'order-status',
				meta: {requiresAuth: true, title: 'Order Status', permission: 'system order status' },
			},
			{
				path: 'configuration',
				name: 'configuration',
				meta: {requiresAuth: true, title: 'Configuration', permission: 'system configuration' },
			},
		]
	},
];
