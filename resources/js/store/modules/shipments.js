export default {
    state:{
        data:[]
    },
    actions:{
        ['SET_SHIPMENTS']({commit}, payload){
            commit('SET_SHIPMENTS', payload)
        }
    },
    mutations:{
        ['SET_SHIPMENTS'](state, payload){
            state.data.push(payload);
        }
    }
}