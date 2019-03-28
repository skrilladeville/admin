export default {
    state:{
        orders:[]
    },
    actions:{
        ['SET_ORDERS']({commit}, payload){
            commit('SET_ORDERS', payload)
        },
        ['SET_FULFILLMENT']({commit}, payload){
            commit('SET_FULFILLMENT', payload)
        },
    },
    mutations:{
        ['SET_ORDERS'](state, payload){
            state.orders.push(payload);
        },
        ['SET_FULFILLMENT'](state, payload){
            console.log(payload)
            state.orders[payload.index-1].fulfillment = payload.value;
        }
    }
}