export default {
    state:{
        shipments:[]
    },
    actions:{
        ['SET_SHIPMENTS']({commit}, payload){
            commit('SET_SHIPMENTS', payload)
        },
        ['SET_SHIPMENT_STATUS']({commit}, payload){
            commit('SET_SHIPMENT_STATUS', payload)
        },
    },
    mutations:{
        ['SET_SHIPMENTS'](state, payload){
            state.shipments.push(payload);
        },
        ['SET_SHIPMENT_STATUS'](state, payload){
            state.shipments[payload-1].status='Cancelled'; //cancel
        }
    }
}