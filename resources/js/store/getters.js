const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  //token: state => state.user.token,
  avatar: state => state.app.avatar,
  name: state => state.auth.name,
  email: state => state.auth.email,
  role: state => state.auth.role,
  permission: state => state.auth.permission,
  user_id: state  => state.auth.id,
  //online Store getter
  getCarts:state=>state.onlineStore.carts,
  getCartCount:state=>state.onlineStore.cart_count,
  getIslegalAge:state=>state.onlineStore.isLegalAge,
  //products
  getProducts:state=>state.products.products,
  //vendors
  getVendors:state=>state.vendors.vendors,
  //labs
  getLabs:state=>state.labs.labs,
  //categories
  getCategories:state=>state.categories.categories,
  //sales
  getOrders: state => state.orders.orders,
  getTransactions: state => state.transactions.transactions,
  getShipments: state => state.shipments.shipments,
  getShipmentMethods: state => state.shipmentMethods.shipmentMethods




      

}
export default getters



