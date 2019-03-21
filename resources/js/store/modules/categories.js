
export default {
    state: {       
        categories:[]
      },
        
    
    mutations: {
        SET_CATEGORY:function(state,payload){  
            console.log('naka abot dri') 
            payload.forEach(element=>{
                element.products=element.products.length
                element.marijuana=`${element.marijuana_products.length} marijuana` 
                element.nonmarijuana=`${element.nonmarijuana_products.length} non marijuana`
                if(element.product_cat_id==0){
                    state.categories.push(element)
                    let subCats=payload.filter(e=>e.product_cat_id == element.id)
                    subCats.forEach(sub=>{
                        state.categories.push(sub)
                    })
                }
            })


    
           // state.categories.push(payload)
        },

        
        
        ADD_CAT:function(state,payload){
     
            payload.products=payload.products.length
            payload.marijuana=`${payload.marijuana_products.length} marijuana` 
            payload.nonmarijuana=`${payload.nonmarijuana_products.length} non marijuana`
            console.log(payload)
            state.categories.push(payload)
        },
        UPDATE_CAT:function(state,payload){
            console.log(payload.index-1)
            console.log(state.categories)
                    state.categories.forEach(el=>{
                        if(el.id==payload.id){
                            el.name=payload.name
                            el.description=payload.description
                            el.product_cat_id=payload.product_cat_id
                        }
                    })
                

                   
        },
        DELETE_CATEGORY:function(state,payload){
         console.log(payload)
            state.categories.splice(payload-1, 1)  
        }
    },
    actions: {
        
    }
};