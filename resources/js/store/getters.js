const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  //token: state => state.user.token,
  avatar: state => state.app.avatar,
  name: state => state.auth.name,
  role: state => state.auth.role,
  permission: state => state.auth.permission,
  user_id: state  => state.auth.id,
  //online Store getter
  getCarts:state=>state.onlineStore.carts,
  getCartCount:state=>state.onlineStore.cart_count,
  getIslegalAge:state=>state.onlineStore.isLegalAge,
  getOrders: state => state.orderTable.orders

      

}
export default getters



