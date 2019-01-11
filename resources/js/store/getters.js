const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  //token: state => state.user.token,
  avatar: state => state.app.avatar,
  name: state => state.auth.name,
  role: state => state.auth.role,
  permission: state => state.auth.permission
}
export default getters
