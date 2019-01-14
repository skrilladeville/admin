const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  //token: state => state.user.token,
  avatar: state => state.app.avatar,
  name: state => state.auth.name,
  role: state => state.auth.role,
  permission: state => state.auth.permission,

  //catalog getter
  getProducts: state => state.products,
  getVendors:state=> state.vendors,
  getCategories:state=>state.categories,
      

}
export default getters



