export default {
    state:{
        data:[]
    },
    actions:{
        ['SET_ORDERS']({commit}, payload){
            commit('SET_ORDERS', payload)
        }
    },
    mutations:{
        ['SET_ORDERS'](state, payload){
            state.data.push(payload);
        }
    }
}