
export default {
    state: {       
        labs:[]
      },
        
    
    mutations: {
        SET_LAB:function(state,payload){  
            console.log('naka abot dri') 
            state.labs.push(payload)
        },
        DELETE_LAB:function(state,payload){
            state.labs.splice(payload-1, 1)  
        }
    },
    actions: {
        
    }
};