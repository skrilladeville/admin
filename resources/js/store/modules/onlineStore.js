export default {
    state: {
        carts:[],
        cart_count:0

      },
        
    
    mutations: {
        ADD_TO_CART:function(state,payload){
          state.carts.push(payload)
        },
        REMOVE_CART:function(state,payload){
          state.carts.splice(payload,1)
        },
        UPDATE_CART:function(state, payload){
          console.log(payload)
         state.carts[payload.index]=payload.obj
        },
        ADD_CART_COUNT:function(state,payload){
          console.log(payload)
          state.cart_count=parseInt(state.cart_count)+parseInt(payload)
          console.log(state.cart_count)
        },
        REMOVE_CART_COUNT:function(state,payload){
          state.cart_count=parseInt(state.cart_count) - parseInt(payload)
        },
        

    },
    actions: {
        
    }
};