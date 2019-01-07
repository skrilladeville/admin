import Login from '../components/login/Login.vue';
import ProfileWrapper from '../components/profile/ProfileWrapper.vue';
import Profile from '../components/profile/Profile.vue';
import EditProfile from '../components/profile/edit-profile/EditProfile.vue';
import EditPassword from '../components/profile/edit-password/EditPassword.vue';
import Layout from '../components/layout/Layout.vue';
import Dashboard from '../components/dashboard/index.vue';
import ManageUsers from '../pages/users/manageusers/index.vue';
import RolesPermissions from '../pages/users/rolespermissions/index.vue';

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
		meta: {requiresAuth: true, title: 'Dashboard', icon: 'el-icon-menu' },
		children: [
			{
				path: '',
				name: 'Dashboard',
				component: Dashboard,
				meta: {requiresAuth: true, title: 'Dashboard' },
			}
		]
	},
	{
		path: '/users',
		component: Layout,
		meta: {requiresAuth: true, title: 'Users', icon: 'el-icon-view' },
		children: [
			{
				path: 'manage-users',
				name: 'manage.users',
				component: ManageUsers,
				meta: {requiresAuth: true, title: 'Manage Users' },
			},
			{
				path: 'roles-permissions',
				name: 'roles.permissions',
				component: RolesPermissions,
				meta: {requiresAuth: true, title: 'Roles/Permissions' },
			}
		]
	},
	{
		path: '/catalog',
		meta: {requiresAuth: true, title: 'Catalog', icon: 'el-icon-picture' },
		children: [
			{
				path: 'manage-products',
				name: 'catalog.manageProducts',
				meta: {requiresAuth: true, title: 'Manage Products' },
			},
			{
				path: 'manage-categories',
				name: 'catalog.manageCategories',
				meta: {requiresAuth: true, title: 'Manage Categories' },
			},
			{
				path: 'attributes',
				name: 'catalog.attributes',
				meta: {requiresAuth: true, title: 'Attributes' },
			}
		]
	},
	{
		path: '/sales',
		meta: {requiresAuth: true, title: 'Sales', icon: 'el-icon-goods' },
		children: [
			{
				path: 'orders',
				name: 'sales.orders',
				meta: {requiresAuth: true, title: 'Orders' },
			},
			{
				path: 'invoices',
				name: 'sales.invoices',
				meta: {requiresAuth: true, title: 'Invoices' },
			},
			{
				path: 'shipments',
				name: 'sales.shipments',
				meta: {requiresAuth: true, title: 'Shipments' },
			},
			{
				path: 'transactions',
				name: 'sales.transactions',
				meta: {requiresAuth: true, title: 'Transactions' },
			},
			{
				path: 'credit-memos',
				name: 'sales.creditMemos',
				meta: {requiresAuth: true, title: 'Credit Memos' },
			},
			{
				path: 'billing-agreements',
				name: 'sales.billingAgreements',
				meta: {requiresAuth: true, title: 'Billing Agreements' },
			},
			{
				path: 'terms-of-conditions',
				name: 'sales.termsCondition',
				meta: {requiresAuth: true, title: 'Terms of Conditions' },
			},
			{
				path: 'recurring-profiles',
				name: 'sales.recurringProfiles',
				meta: {requiresAuth: true, title: 'Recurring Profiles' },
			},
			{
				path: 'tax',
				name: 'sales.tax',
				meta: {requiresAuth: true, title: 'Tax' },
			}
		]
	},
	{
		path: '/cms',
		meta: {requiresAuth: true, title: 'CMS', icon: 'el-icon-edit-outline' },
		children: [
			{
				path: 'feedback',
				name: 'feedback',
				meta: {requiresAuth: true, title: 'Feedback' },
			},
			{
				path: 'survey',
				name: 'survey',
				meta: {requiresAuth: true, title: 'Survey' },
			},
			{
				path: 'widgets',
				name: 'widgets',
				meta: {requiresAuth: true, title: 'Widgets' },
			}
		]
	},
	{
		path: '/reports',
		meta: {requiresAuth: true, title: 'Reports', icon: 'el-icon-document' },
		children: [
			{
				path: 'sales',
				name: 'sales',
				meta: {requiresAuth: true, title: 'Sales' },
			},
			{
				path: 'shopping-card',
				name: 'shopping-card',
				meta: {requiresAuth: true, title: 'Shopping Card' },
			},
			{
				path: 'product',
				name: 'product',
				meta: {requiresAuth: true, title: 'Product' },
			},
			{
				path: 'customers',
				name: 'customers',
				meta: {requiresAuth: true, title: 'Customers' },
			},
			{
				path: 'tags',
				name: 'tags',
				meta: {requiresAuth: true, title: 'Tags' },
			},
			{
				path: 'reviews',
				name: 'reviews',
				meta: {requiresAuth: true, title: 'Reviews' },
			},
			{
				path: 'search-tem',
				name: 'search-tem',
				meta: {requiresAuth: true, title: 'Search Term' },
			}
		]
	},
	{
		path: '/system',
		meta: {requiresAuth: true, title: 'System', icon: 'el-icon-setting' },
		children: [
			{
				path: 'my-account',
				name: 'my-account',
				meta: {requiresAuth: true, title: 'My Account' },
			},
			{
				path: 'tools',
				name: 'tools',
				meta: {requiresAuth: true, title: 'Tools' },
			},
			{
				path: 'notifications',
				name: 'notifications',
				meta: {requiresAuth: true, title: 'Notifications' },
			},
			{
				path: 'manage-currency',
				name: 'manage-currency',
				meta: {requiresAuth: true, title: 'Manage Currency' },
			},
			{
				path: 'transaction-emails',
				name: 'transaction-emails',
				meta: {requiresAuth: true, title: 'Transaction Emails' },
			},
			{
				path: 'custom-variables',
				name: 'custom-variables',
				meta: {requiresAuth: true, title: 'Custom Variables' },
			},
			{
				path: 'manage-store',
				name: 'manage-store',
				meta: {requiresAuth: true, title: 'Manage Store' },
			},
			{
				path: 'order-status',
				name: 'order-status',
				meta: {requiresAuth: true, title: 'Order Status' },
			},
			{
				path: 'configuration',
				name: 'configuration',
				meta: {requiresAuth: true, title: 'Configuration' },
			}
		]
	}
];
