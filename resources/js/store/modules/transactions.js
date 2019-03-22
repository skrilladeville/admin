export default {
    state:{
        data:[]
    },
    actions:{
        ['SET_TRANSACTIONS']({commit}, payload){
            commit('SET_TRANSACTIONS', payload)
        }
    },
    mutations:{
        ['SET_TRANSACTIONS'](state, payload){
            state.data.push(payload);
        }
    }
}