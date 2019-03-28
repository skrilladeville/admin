export default {
    state:{
        shipmentMethods:[]
    },
    actions:{
        ['SET_SHIPMENT_METHODS']({commit}, payload){
            commit('SET_SHIPMENT_METHODS', payload)
        },
        ['SET_ACTIVE']({commit}, payload){
            commit('SET_ACTIVE', payload)
        },
        ['ADD_NEW_SHIPMENT_METHOD']({commit}, payload){
            commit('ADD_NEW_SHIPMENT_METHOD', payload)
        },
        ['DELETE_SHIPMENT_METHOD']({commit}, payload){
            commit('DELETE_SHIPMENT_METHOD', payload)
        },
    },
    mutations:{
        ['SET_SHIPMENT_METHODS'](state, payload){
            state.shipmentMethods.push(payload);
        },
        ['SET_ACTIVE'](state, payload){
            state.shipmentMethods[payload-1].is_active = !state.shipmentMethods[payload-1].is_active;
        },
        ['DELETE_SHIPMENT_METHOD'](state, payload){
            state.shipmentMethods.splice(payload-1);
        }
    }
}