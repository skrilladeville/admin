export default {
    state:{
        transactions:[]
    },
    actions:{
        ['SET_TRANSACTIONS']({commit}, payload){
            commit('SET_TRANSACTIONS', payload)
        }
    },
    mutations:{
        ['SET_TRANSACTIONS'](state, payload){
            state.transactions.push(payload);
        }
    }
}