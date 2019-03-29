import Login from '../components/login/Login'
import Layout from '../components/layout--v2/Layout'

/* Dashboard */
import Dashboard from '../pages/dashboard/index'
// import DashboardBranchAdmin from '../pages/dashboard/DashboardBranchAdmin'
// import DashboardDoctor from '../pages/dashboard/DashboardDoctor'
// import DashboardPatient from '../pages/dashboard/DashboardPatient'

import Contact from '../pages/contact/ContactForm'
import MyAccount from '../pages/myaccount/MyAccount'

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


/* Online Store */
import LayoutStore from '../components/onlineStoreLayout/LayoutStore'
import StoreHome from '../pages/onlineStore/onlineStore'
import Shop from '../pages/onlineStore/shop'
import About from '../pages/onlineStore/about'
import Checkout from '../pages/onlineStore/checkout'
import BillingInfo from '../pages/onlineStore/billingInfo'

/* Pos */
import LayoutPOS from '../components/posLayout/LayoutPos'
import posHome from '../pages/pos/posHome'

import posStart from '../pages/pos/posStart'
import posTrans from '../pages/pos/posTrans'
import posHomeTrans from '../pages/pos/posHomeTrans'

import posLogin  from '../pages/pos/loginpos'


/* Catalog Folder */
import ManageProducts from '../pages/catalog/ManageProducts'
import Attributes from '../pages/catalog/Attributes'
import Categories from '../pages/catalog/categories'
import AddPricePreset from '../pages/catalog/addPricePreset'
import AddProduct from '../pages/catalog/addProduct'
import EditProduct from '../pages/catalog/editProduct'
import Products from '../pages/catalog/products'
import ProductDetails from '../pages/catalog/productDetails'
import PricePresets from '../pages/catalog/PricePresets'
import Vendors from '../pages/catalog/vendors'
import AddVendor from '../pages/catalog/addVendor'
import EditVendor from '../pages/catalog/editVendor'
import AddLab from '../pages/catalog/addLab'
import EditLab from '../pages/catalog/editLab'
import Labs from '../pages/catalog/labs'
import EditPricePreset from '../pages/catalog/editPricePreset'

/* Sales Folder */
import BillingAgreements from '../pages/sales/BillingAgreements'
import CreditMemos from '../pages/sales/CreditMemos'
import RecurringProfiles from '../pages/sales/RecurringProfiles'
import SalesInvoices from '../pages/sales/SalesInvoices'
import SalesTransactions from '../pages/sales/SalesTransaction'
import Shipments from '../pages/sales/Shipments'
import ShipmentMethods from '../pages/sales/ShipmentMethods'
import TermsAndCondition from '../pages/sales/TermsAndCondition'
import OrderList from '../pages/sales/OrderList'
import SalesTax from '../pages/sales/SalesTax'
import Sales from '../pages/sales/Sales'
import ViewOrder from '../pages/sales/ViewOrder'
import EditShipmentMethod from '../pages/sales/EditShipmentMethod'
import AddShipmentMethod from '../pages/sales/AddShipmentMethod'
import EditTaxTier from '../pages/sales/EditTaxTier'
import NewTaxTier from '../pages/sales/NewTaxTier'

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

// GCCv1
import GCCv1page from '../pages/GCCv1/index'

import Reporter from '../pages/reports--v2/index'

export default [
	// parametric route for GCCv1 requests
	{ 
		path: '/gccv1/:role',
		component: Layout,
		hidden: true,
		children: [
			{
				path: ':pagename',
				component: GCCv1page,
				meta: { requiresAuth: true }
			}
		]
	},
	{
		path: '/reports/:role',
		component: Layout,
		hidden: true,
		children: [
			{
				path: ':pagename',
				component: Reporter,
				meta: { requiresAuth: true, title: 'Balita' }
			}
		]
	},
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
		path: '/pos',
		name: 'POS',
		component: LayoutPOS,
		hidden: true,
		meta: {requiresGuest: true, title: 'POS' },
		children:[
			{
				path: 'login',
				name: 'pos login',
				component: posLogin,
				meta: {requiresGuestPOS: true, title: 'POS'},
			},
			{
				path: 'terminal/:terminalId',
				name: 'pos terminal',
				component: posHome,
				meta: {requiresGuestPOS: true, title: 'POS'},
				children:[

						{
						path: '',
						name: 'POS home trans',
						component: posHomeTrans,
						meta: {requireAuthPOS: true, title: 'POS'},
						},
						{
							path: 'trans/:transid/order/:orderid',
							name: 'POS  trans',
							component: posTrans,
							meta: {requireAuthPOS: true, title: 'POS'},
							}
				]
			},
			{
				path: 'home',
				name: 'POS start',
				component: posStart,
				meta: {requireAuthPOS: true, title: 'POS'},
				
			},
		]
	},
	{
		path: '/onlineStore',
		name: 'online store',
		component: LayoutStore,
		hidden: true,
		meta: {requiresGuest: true, title: 'Online Store' },
		children:[
			{
				path: '',
				name: 'Store Home',
				component: StoreHome,
				meta: {requiresGuest: true, title: 'Online Store'},
			},
			{
				path: 'shop',
				name: 'Shop',
				component: Shop,
				meta: {requiresGuest: true, title: 'Shop'},
			},
			{
				path: 'about',
				name: 'About',
				component: About,
				meta: {requiresGuest: true, title: 'About'},
			},
			{
				path: 'checkout',
				name: 'checkout',
				component: Checkout,
				meta: {requiresGuest: true, title: 'Checkout'},
				
			},

		]
	}
	,
	{
		path: '/dashboard',
		component: Layout,
		meta: {requiresAuth: true, title: 'Dashboard', icon: 'fa fa-home', permission: 'dashboard' },
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
		meta: {requiresAuth: true, title: 'Users', icon: 'fa fa-users', permission: 'manage users' },
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
		path: 'doctor-patients',
		meta: {requiresAuth: true, title: 'Patients', icon: 'fa fa-plus-circle', permission: 'patient add' },
		children: [
			{
				path: '/gccv1/doctor/intake-form-creation',
				name: 'add-patient',
				meta: {requiresAuth: true, title: 'Add New Patient', permission: 'patient add' },
			},
			{
				path: '/gccv1/doctor/patient-list',
				name: 'view-patients',
				meta: {requiresAuth: true, title: 'Patient List', permission: 'patient view' },
			},
			{
				path: '/gccv1/doctor/patient-archive',
				name: 'patient-archive',
				meta: {requiresAuth: true, title: 'Patient Archive', permission: 'patient archive' },
			}
		]
	},
	{
		path: 'doctor-rx',
		meta: {requiresAuth: true, title: 'Prescription', icon: 'fa fa-prescription', permission: 'prescription rx list' },
		children: [
			{
				path: '/gccv1/doctor/rx-refill-request',
				name: 'prescription-rx-list',
				meta: {requiresAuth: true, title: 'Refill Rx Request List', permission: 'prescription rx list' },
			},
			{
				path: '/gccv1/doctor/rx-create--v2',
				name: 'add-prescription',
				meta: {requiresAuth: true, title: 'Create Prescription', permission: 'prescription create' },
			},
			{
				path: '/gccv1/doctor/rx-list',
				name: 'prescription-archive',
				component: PrescriptionArchive,
				meta: {requiresAuth: true, title: 'View Prescription List', permission: 'prescription archive' },
			},
			{
				path: '/gccv1/doctor/rx-archive',
				name: 'xprescription-archive',
				meta: {requiresAuth: true, title: 'Prescription Archive', permission: 'prescription archive' },
			}
		]
	},
	{
		path: '/bookings',
		component: Layout,
		meta: {requiresAuth: true, title: 'Bookings', icon: 'fa fa-clock', permission: 'booking create' },
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
		path: 'doctor-care',
		meta: { title: 'Continuous Care', icon: 'fa fa-leaf' },
		children: [
			{
				path: '/gccv1/doctor/feedback',
				meta: { title: 'Feedback' }
			},
			{
				path: '/gccv1/doctor/survey',
				meta: { title: 'Survey' }
			}
		]
	},

	{
		path: '/catalog',
		component: Layout,
		meta: {requiresAuth: true, title: 'Catalog', icon: 'fa fa-cannabis', permission: 'product list' },
		children: [
			{
				path: 'manage-products',
				component:Products,
				name: 'catalog.manageProducts',

				meta: {requiresAuth: true, title: 'Products', permission: 'product list' },
			},
			{
			path: 'add-product',
				component:AddProduct,
				hidden:true,
				name: 'catalog.addProduct',
				meta: {requiresAuth: true, title: 'Add Product', permission: 'add product' },
			},
			{
				path: 'product/details/:id',
					component:ProductDetails,
					hidden:true,
					name: 'catalog.productDetails',
					meta: {requiresAuth: true, title: 'Product Details', permission: 'Product Details' },
				},
			{
				path: 'product/edit/:id',
					component:EditProduct,
					hidden:true,
					name: 'catalog.editProduct',
					meta: {requiresAuth: true, title: 'Edit Product', permission: 'edit product' },
				},
			{
				path: 'manage-categories',
				component: Categories,
				name: 'catalog.manageCategories',
				meta: {requiresAuth: true, title: 'Categories', permission: 'product categories' },
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
				hidden:true,
				name: 'catalog.addvendors',
				meta: {requiresAuth: true, title: 'Add Vendor', permission: 'add vendor' },

			},
			{
				path: 'vendors/edit/:id',
				component: EditVendor,
				hidden:true,
				name: 'catalog.editvendors',
				meta: {requiresAuth: true, title: 'Update Vendor', permission: 'update vendor' },

			},
			{
				path: 'pricePreset',
				component: PricePresets,
				name: 'catalog.preset-list',
				meta: {requiresAuth: true, title: 'Price Presets', permission: 'preset list' },

			},
			{
				path: 'addPricePreset',
				component: AddPricePreset,
				hidden:true,
				name: 'add pricepreset',
				meta: {requiresAuth: true, title: 'Add Price Preset', permission: 'add price preset' },

			},
			{
				path: 'pricePresets/edit/:id',
				component: EditPricePreset,
				hidden:true,
				name: 'edit pricepreset',
				meta: {requiresAuth: true, title: 'Edit Price Preset', permission: 'edit price preset' },

			},
			
			{
				path: 'lab',
				component: Labs,
				name: 'labs',
				meta: {requiresAuth: true, title: 'labs', permission: 'lab list' },

			},
			{
				path: 'addLab',
				component: AddLab,
				hidden:true,
				name: 'add lab',
				meta: {requiresAuth: true, title: 'add Lab', permission: 'add lab' },

			},
			{
				path: 'lab/edit/:id',
				component: EditLab,
				hidden:true,
				name: 'edit lab',
				meta: {requiresAuth: true, title: 'edit Lab', permission: 'edit lab' },

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
		meta: {requiresAuth: true, title: 'Sales', icon: 'fa fa-dollar-sign', permission: 'sales orders' },
		children: [
			{
				path: 'sales',
				name: 'sales.sales',
				component: Sales,
				meta: {requiresAuth: true, title: 'Sales', permission: 'sales orders' },
			},
			{
				path: 'orders',
				name: 'sales.orders',
				component: OrderList,
				meta: {requiresAuth: true, title: 'Orders', permission: 'sales orders' },
			},
			{
				path: 'order/:id',
				name: 'sales.order',
				component: ViewOrder,
				hidden: true,
				meta: {requiresAuth: true, title: 'Order', permission: 'sales orders' },
			},
			{
				path: 'shipments',
				name: 'sales.shipments',
				component: Shipments,
				meta: {requiresAuth: true, title: 'Shipments', permission: 'sales shipments' },
			},
			{
				path: 'shipment-methods',
				name: 'sales.shipment-methods',
				component: ShipmentMethods,
				meta: {requiresAuth: true, title: 'Shipment Methods', permission: 'sales shipments' },
			},
			{
				path: 'edit-shipment-method/:id',
				name: 'sales.edit-shipment-method',
				hidden: true,
				component: EditShipmentMethod,
				meta: {requiresAuth: true, title: 'Edit Shipment Method', permission: 'sales shipments' },
			},
			{
				path: 'add-shipment-method',
				name: 'sales.add-shipment-method',
				hidden: true,
				component: AddShipmentMethod,
				meta: {requiresAuth: true, title: 'Add Shipment Method', permission: 'sales shipments' },
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
				path: 'terms-and-conditions',
				name: 'sales.termsCondition',
				component: TermsAndCondition,
				meta: {requiresAuth: true, title: 'Terms and Conditions', permission: 'sales terms of condition' },
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
			},
			{
				path: 'edit-tax-tier',
				name: 'sales.edit-tax-tier',
				component: EditTaxTier,
				hidden: true,
				meta: {requiresAuth: true, title: 'Edit Tax Tier', permission: 'sales tax' },
			},
			{
				path: 'new-tax-tier',
				name: 'sales.new-tax-tier',
				component: NewTaxTier,
				hidden: true,
				meta: {requiresAuth: true, title: 'Edit Tax Tier', permission: 'sales tax' },
			}
		]
	},
	{
		path: '/cms',
		component:Layout,
		meta: {requiresAuth: true, title: 'CMS', icon: 'fa fa-file-prescription', permission: 'cms feedback' },
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
		path: 'reports',
		meta: { title: 'Reports', icon: 'fa fa-chart-bar' },
		children: [
			{
				path: '/reports/admin/sales',
				meta: { title: 'Sales' },
			},
			{
				path: '/reports/admin/products',
				meta: { title: 'Products' },
			},
			{
				path: '/reports/admin/inventory',
				meta: { title: 'Inventory' },
			},
			{
				path: '/reports/admin/patients',
				meta: { title: 'Patients' },
			},
			{
				path: '/reports/admin/state-compliance',
				meta: { title: 'State Compliance' },
			},
			{
				path: '/reports/admin/shopping-carts',
				meta: { title: 'Shopping Carts' },
			},
			{
				path: '/reports/admin/expenses',
				meta: { title: 'Expenses' },
			},
			{
				path: '/reports/admin/registers',
				meta: { title: 'Registers' },
			},
			{
				path: '/reports/admin/marketing-statistics',
				meta: { title: 'Marketing Statistics' },
			}
		]
	},
	/* {
		path: '/reports',
		component: Layout,
		meta: {requiresAuth: true, title: 'Reports', icon: 'fa fa-chart-pie', permission: 'reports sales' },
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
	}, */
	{
		path: '/contact',
		component: Layout,
		meta: {requiresAuth: true, title: 'Contact', icon: 'fa fa-reply', permission: 'contact' },
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
		meta: {requiresAuth: true, title: 'System', icon: 'fa fa-cog', permission: 'system my account' },
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
