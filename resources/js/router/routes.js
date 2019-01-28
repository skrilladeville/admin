import Login from '../components/login/Login'
import Layout from '../components/layout/Layout'

/* Dashboard */
import Dashboard from '../pages/dashboard/index'
// import DashboardBranchAdmin from '../pages/dashboard/DashboardBranchAdmin'
// import DashboardDoctor from '../pages/dashboard/DashboardDoctor'
// import DashboardPatient from '../pages/dashboard/DashboardPatient'

import Contact from '../pages/contact/Contact'
import MyAccount from '../components/myaccount/MyAccount'

/* Users Folder */
import ManageUsers from '../pages/users/manageusers/index'
import RolesPermissions from '../pages/users/rolespermissions/index'

/* CMS Folder */
import Feedback from '../pages/cms/feedback'
import AddFeedback from '../pages/cms/addFeedback'
import Survey from '../pages/cms/Survey'
import Widgets from '../pages/cms/Widgets'

/* Prescription Folder */
import PrescriptionList from '../pages/prescription/PrescriptionList'
import AddPrescription from '../pages/prescription/AddPrescription'
import PrescriptionArchive from '../pages/prescription/PrescriptionArchive'

/* Bookings Folder*/
import AddBooking from '../pages/bookings/AddBooking'
import ViewBooking from '../pages/bookings/ViewBooking'
import CalendarSetup from '../pages/bookings/CalendarSetup'
import BookingArchive from '../pages/bookings/BookingArchive'

/* Catalog Folder */
import ManageProducts from '../pages/catalog/ManageProducts'
import Attributes from '../pages/catalog/Attributes'
import Categories from '../pages/catalog/categories'
import AddPricePreset from '../pages/catalog/addPricePreset'
import PricePresets from '../pages/catalog/PricePresets'
import Vendors from '../pages/catalog/vendors'
import AddVendor from '../pages/catalog/addVendor'
import AddLab from '../pages/catalog/addLab'
import Labs from '../pages/catalog/labs'

/* Sales Folder */
import BillingAgreements from '../pages/sales/BillingAgreements'
import CreditMemos from '../pages/sales/CreditMemos'
import RecurringProfiles from '../pages/sales/RecurringProfiles'
import SalesInvoices from '../pages/sales/SalesInvoices'
import SalesTransactions from '../pages/sales/SalesTransaction'
import Shipments from '../pages/sales/Shipments'
import TermsOfCondition from '../pages/sales/TermsOfCondition'
import SalesOrders from '../pages/sales/SalesOrder'
import SalesTax from '../pages/sales/SalesTax'

/* Reports Folder */
import CustomerReport from '../pages/reports/CustomerReport'
import ProductReport from '../pages/reports/ProductReport'
import Reviews from '../pages/reports/Reviews'
import SalesReport from '../pages/reports/SalesReport'
import SearchTerm from '../pages/reports/SearchTerm'
import ShoppingCard from '../pages/reports/ShoppingCard'
import Tags from '../pages/reports/Tags'

/* System Folder */
import Configuration from '../pages/system/Configuration'
import CustomVariables from '../pages/system/CustomVariables'
import ManageCurrency from '../pages/system/ManageCurrency'
import ManageStore from '../pages/system/ManageStores'
//import MyAccount from '../pages/system/MyAccount'
import Notifications from '../pages/system/Notifications'
import OrderStatus from '../pages/system/OrderStatus'
import Tools from '../pages/system/Tools'
import TransactionEmails from '../pages/system/TransactionEmails'


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
	// {
	// 	path: '/patients',
	// 	meta: {requiresAuth: true, title: 'Patients', icon: 'el-icon-edit-outline', permission: 'patient add' },
	// 	children: [
	// 		{
	// 			path: 'new',
	// 			name: 'add-patient',
	// 			meta: {requiresAuth: true, title: 'Add Patient', permission: 'patient add' },
	// 		},
	// 		{
	// 			path: 'view',
	// 			name: 'view-patients',
	// 			meta: {requiresAuth: true, title: 'View Patients', permission: 'patient view' },
	// 		},
	// 		{
	// 			path: 'archive',
	// 			name: 'patient-archive',
	// 			meta: {requiresAuth: true, title: 'Patient Archive', permission: 'patient archive' },
	// 		}
	// 	]
	// },
	{
		path: '/prescription',
		component: Layout,
		meta: {requiresAuth: true, title: 'Prescription', icon: 'el-icon-edit-outline', permission: 'prescription rx list' },
		children: [
			{
				path: 'rx-list',
				name: 'prescription-rx-list',
				component: PrescriptionList,
				meta: {requiresAuth: true, title: 'Rx Request List', permission: 'prescription rx list' },
			},
			{
				path: 'new',
				name: 'add-prescription',
				component: AddPrescription,
				meta: {requiresAuth: true, title: 'Create Prescription', permission: 'prescription create' },
			},
			{
				path: 'archive',
				name: 'prescription-archive',
				component: PrescriptionArchive,
				meta: {requiresAuth: true, title: 'Prescription Archive', permission: 'prescription archive' },
			}
		]
	},
	{
		path: '/bookings',
		component: Layout,
		meta: {requiresAuth: true, title: 'Bookings', icon: 'el-icon-edit-outline', permission: 'booking create' },
		children: [
			{
				path: 'new',
				name: 'Add Booking',
				component: AddBooking,
				meta: {requiresAuth: true, title: 'Create Booking', permission: 'booking create' },
			},
			{
				path: 'view',
				name: 'view-booking',
				component: ViewBooking,
				meta: {requiresAuth: true, title: 'View Booking', permission: 'booking view' },
			},
			{
				path: 'calendar-setup',
				name: 'calendar-setup',
				component: CalendarSetup,
				meta: {requiresAuth: true, title: 'Calendar Setup', permission: 'booking setup calendar' },
			},
			{
				path: 'archive',
				name: 'archive',
				component: BookingArchive,
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
				component: ManageProducts,
				meta: {requiresAuth: true, title: 'Manage Products', permission: 'product list' },
			},
			{
				path: 'manage-categories',
				component: Categories,
				name: 'catalog.manageCategories',
				meta: {requiresAuth: true, title: 'Manage Categories', permission: 'product categories' },
			},
			{
				path: 'vendors',
				component: Vendors,
				name: 'catalog.vendors',
				meta: {requiresAuth: true, title: 'Vendors', permission: 'product vendors' },

			},
			{
				path: 'addVendors',
				component: AddVendor,
				name: 'catalog.addvendors',
				meta: {requiresAuth: true, title: 'Add Vendor', permission: 'add vendor' },

			},
			{
				path: 'pricePreset',
				component: PricePresets,
				name: 'catalog.preset-list',
				meta: {requiresAuth: true, title: 'Price Presets List', permission: 'preset list' },

			},
			{
				path: 'addPricePreset',
				component: AddPricePreset,
				name: 'add pricepreset',
				meta: {requiresAuth: true, title: 'Add Price Preset', permission: 'add price preset' },

			},
			{
				path: 'lab',
				component: Labs,
				name: 'labs',
				meta: {requiresAuth: true, title: 'lab list', permission: 'lab list' },

			},
			{
				path: 'addLab',
				component: AddLab,
				name: 'add lab',
				meta: {requiresAuth: true, title: 'add Lab', permission: 'add lab' },

			},
			{
				path: 'attributes',
				name: 'catalog.attributes',
				component: Attributes,
				meta: {requiresAuth: true, title: 'Attributes', permission: 'product attributes' },
			}
		]
	},
	{
		path: '/sales',
		component: Layout,
		meta: {requiresAuth: true, title: 'Sales', icon: 'el-icon-goods', permission: 'sales orders' },
		children: [
			{
				path: 'orders',
				name: 'sales.orders',
				component: SalesOrders,
				meta: {requiresAuth: true, title: 'Orders', permission: 'sales orders' },
			},
			{
				path: 'invoices',
				name: 'sales.invoices',
				component: SalesInvoices,
				meta: {requiresAuth: true, title: 'Invoices', permission: 'sales invoices' },
			},
			{
				path: 'shipments',
				name: 'sales.shipments',
				component: Shipments,
				meta: {requiresAuth: true, title: 'Shipments', permission: 'sales shipments' },
			},
			{
				path: 'transactions',
				name: 'sales.transactions',
				component: SalesTransactions,
				meta: {requiresAuth: true, title: 'Transactions', permission: 'sales transactions' },
			},
			{
				path: 'credit-memos',
				name: 'sales.creditMemos',
				component: CreditMemos,
				meta: {requiresAuth: true, title: 'Credit Memos', permission: 'sales credit memos' },
			},
			{
				path: 'billing-agreements',
				name: 'sales.billingAgreements',
				component: BillingAgreements,
				meta: {requiresAuth: true, title: 'Billing Agreements', permission: 'sales billing agreements' },
			},
			{
				path: 'terms-of-conditions',
				name: 'sales.termsCondition',
				component: TermsOfCondition,
				meta: {requiresAuth: true, title: 'Terms of Conditions', permission: 'sales terms of condition' },
			},
			{
				path: 'recurring-profiles',
				name: 'sales.recurringProfiles',
				component: RecurringProfiles,
				meta: {requiresAuth: true, title: 'Recurring Profiles', permission: 'sales recurring profiles' },
			},
			{
				path: 'tax',
				name: 'sales.tax',
				component: SalesTax,
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
				path: 'feedback/add',
				component: AddFeedback,
				name: 'add feedback',
				meta: {requiresAuth: true, title: 'Add Feedback', permission: 'add feedback' },

			},
			{
				path: 'survey',
				name: 'survey',
				component: Survey,
				meta: {requiresAuth: true, title: 'Survey', permission: 'cms survey' },
			},
			{
				path: 'widgets',
				name: 'widgets',
				component: Widgets,
				meta: {requiresAuth: true, title: 'Widgets', permission: 'cms widgets' },
			}
		]
	},
	{
		path: '/reports',
		component: Layout,
		meta: {requiresAuth: true, title: 'Reports', icon: 'el-icon-document', permission: 'reports sales' },
		children: [
			{
				path: 'sales',
				name: 'sales',
				component: SalesReport,
				meta: {requiresAuth: true, title: 'Sales', permission: 'reports sales' },
			},
			{
				path: 'shopping-card',
				name: 'shopping-card',
				component: ShoppingCard,
				meta: {requiresAuth: true, title: 'Shopping Card', permission: 'reports shopping card' },
			},
			{
				path: 'product',
				name: 'product',
				component: ProductReport,
				meta: {requiresAuth: true, title: 'Product', permission: 'reports product' },
			},
			{
				path: 'customers',
				name: 'customers',
				component: CustomerReport,
				meta: {requiresAuth: true, title: 'Customers', permission: 'reports customers' },
			},
			{
				path: 'tags',
				name: 'tags',
				component: Tags,
				meta: {requiresAuth: true, title: 'Tags', permission: 'reports tags' },
			},
			{
				path: 'reviews',
				name: 'reviews',
				component: Reviews,
				meta: {requiresAuth: true, title: 'Reviews', permission: 'reports reviews' },
			},
			{
				path: 'search-term',
				name: 'search-term',
				component: SearchTerm,
				meta: {requiresAuth: true, title: 'Search Term', permission: 'reports search term' },
			}
		]
	},
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
				component: Tools,
				meta: {requiresAuth: true, title: 'Tools', permission: 'system tools' },
			},
			{
				path: 'notifications',
				name: 'notifications',
				component: Notifications,
				meta: {requiresAuth: true, title: 'Notifications', permission: 'system notifications' },
			},
			{
				path: 'manage-currency',
				name: 'manage-currency',
				component: ManageCurrency,
				meta: {requiresAuth: true, title: 'Manage Currency', permission: 'system manage currency' },
			},
			{
				path: 'transaction-emails',
				name: 'transaction-emails',
				component: TransactionEmails,
				meta: {requiresAuth: true, title: 'Transaction Emails', permission: 'system transaction emails' },
			},
			{
				path: 'custom-variables',
				name: 'custom-variables',
				component: CustomVariables,
				meta: {requiresAuth: true, title: 'Custom Variables', permission: 'system custom variables' },
			},
			{
				path: 'manage-store',
				name: 'manage-store',
				component: ManageStore,
				meta: {requiresAuth: true, title: 'Manage Store', permission: 'system manage store' },
			},
			{
				path: 'order-status',
				name: 'order-status',
				component: OrderStatus,
				meta: {requiresAuth: true, title: 'Order Status', permission: 'system order status' },
			},
			{
				path: 'configuration',
				name: 'configuration',
				component: Configuration,
				meta: {requiresAuth: true, title: 'Configuration', permission: 'system configuration' },
			},
		]
	},
];
