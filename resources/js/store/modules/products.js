



export default {
    state: {       
        products:[]
      },
        
    
    mutations: {
        SET_PRODUCTS:function(state,payload){  
            console.log('naka abot dri')
            let filterProd=state.products.filter(el=>el.id==payload.id)
            if(filterProd.length==0){
                state.products.push(payload)
            }

        }
    },
    actions: {
        
    }
};