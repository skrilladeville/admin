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
    },
    mutations:{
        ['SET_SHIPMENT_METHODS'](state, payload){
            state.shipmentMethods.push(payload);
        },
        ['SET_ACTIVE'](state, payload){
            state.shipmentMethods[payload-1].is_active = !state.shipmentMethods[payload-1].is_active;
        }
    }
}