

var isLegalAge=localStorage.getItem("isAgeValid");
if(isLegalAge==null){
  isLegalAge=false
}


export default {
    state: {
        carts:[],
        cart_count:0,
        isLegalAge:isLegalAge

      },
        
    
    mutations: {

        SEARCH:function(state,payload){
          this.state.carts.filter(el=>el.strain==payload)
        },
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
        SET_LEGAL_AGE:function(state,payload){
          localStorage.setItem("isAgeValid", payload);
          state.isLegalAge=payload
        }
        

    },
    actions: {
        
    }
};