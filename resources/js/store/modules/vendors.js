export default {
    state: {       
        vendors:[]
      },
        
    
    mutations: {
        SET_VENDOR:function(state,payload){  
            console.log('naka abot dri oh') 
            state.vendors.push(payload)
        },
        DELETE_VENDOR:function(state,payload){
            state.vendors.splice(payload-1, 1)
        }
    },
    actions: {
        
    }
};