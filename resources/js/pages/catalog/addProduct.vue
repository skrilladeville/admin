<template>
   <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Add Product</span>
    <el-button  style="float: right;" type="success" round>Back to list</el-button>
  </div>
  <el-form label-position="top" size="small">
      <p>Overview</p>
      <el-form-item label="Name">
          <el-input></el-input>
      </el-form-item>
      <el-row :gutter="10">
          <el-col :span="6">
              <el-form-item label="Symbol">
   <el-input></el-input>
              </el-form-item>

          </el-col>
          <el-col :span="18">
              <el-form-item label="SKU">
 <el-input></el-input>
              </el-form-item>
          </el-col>
      </el-row>
      <el-row :gutter="10">
          <el-col :span="6">
              <el-form-item label="Category">
              
             <el-select style="width:100%;"  v-model="form.category_id" placeholder="please select a price type">
       <template v-for="cat in categories">
 <el-option :label="cat.name" :value="cat.id" v-if="cat.product_cat_id == 0" :key="cat.id"></el-option>
   <el-option style="padding-left:40px;" :label="cat.name" :value="cat.id" v-if="cat.product_cat_id != 0" :key="cat.id"></el-option>
    
       </template>          
        <!-- <el-option v-for="cat in categories" :v-if="cat.product_cat_id != 0" :key="cat.id" `:label="cat.name" :value="cat.id"></el-option> -->
     
    </el-select>
              
              </el-form-item>
          </el-col>
          <el-col :span="18">
        <el-form-item label="Strain">
    <el-radio-group  v-model="form.strain" size="medium">
                    
      <el-radio-button label="None" ></el-radio-button>
      <el-radio-button label="Indica"></el-radio-button>
      <el-radio-button label="Sativa"></el-radio-button>
      <el-radio-button label="Hybrid"></el-radio-button>
    </el-radio-group>
              </el-form-item>

          </el-col>
      </el-row>
      <el-row :gutter="10">
          <el-col :span="6">
              <el-form-item label="Marijuana Product">
      <el-switch v-model="form.is_marijuana"
  inactive-text="">
</el-switch>
              </el-form-item>
        
          </el-col>
          <el-col :span="18">
              <el-form-item label="Product Type" v-if="form.is_marijuana">
             <el-select style="width:100%;"  v-model="form.product_type" placeholder="please select a price type">
      <el-option label="piece" value="piece"></el-option>
      <el-option label="weight" value="weight"></el-option>
    </el-select>
              </el-form-item>
          </el-col>
      </el-row>

      <el-form-item label="Product Image">
<el-input  type="file"></el-input>
      </el-form-item>

      <p>Prices</p>
<hr style="width:100%;">
<el-form-item label="Measurement">
    <el-radio-group @change="clearPrices"  v-model="measurement" size="medium">
      <el-radio-button label="Weight" ></el-radio-button>
      <el-radio-button label="Weight Range"></el-radio-button>
      <el-radio-button label="Per Unit"></el-radio-button>
      <el-radio-button label="Per Unit Range"></el-radio-button>
    </el-radio-group>
    </el-form-item>

       <el-form-item v-if="measurement == 'Per Unit'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="range in per_unit_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
    </el-select>
     </el-form-item>

      <el-form-item  label="Price" v-if="measurement == 'Per Unit'">
 <div v-for="(perPiece,index) in form.prices" :key="index">
<el-input v-model="perPiece.piece_price" type="number"></el-input>
      </div>
      
  </el-form-item>

   <el-form-item v-if="measurement == 'Weight'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="range in per_weight_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
</el-select>
</el-form-item>

  <div  v-if="measurement == 'Weight'">
      <template >
      
      <div v-for="(perPiece,index) in form.prices" :key="index">

  
      <el-row :gutter="5">
    <el-col :span="2">
            <el-form-item label="1g">
            <el-input v-model="perPiece.gram_price" type="number"></el-input>
            </el-form-item>
      </el-col>

      <el-col :span="2">
            <el-form-item label="1/8oz">
            <el-input v-model="perPiece.eight_price" type="number"></el-input>
            </el-form-item>
      </el-col>
    
      <el-col :span="2">
            <el-form-item label="1/4oz">
            <el-input v-model="perPiece.quarter_price" type="number"></el-input>
            </el-form-item>
      </el-col>
      <el-col :span="2">
            <el-form-item label="1/2oz">
            <el-input v-model="perPiece.half_price" type="number"></el-input>
            </el-form-item>
      </el-col>
      

          <el-col :span="2">
            <el-form-item label="1oz">
            <el-input v-model="perPiece.ounce_price" type="number"></el-input>
            </el-form-item>
      </el-col>
            <el-col :span="2">
            <el-form-item label="Pre-Roll">
            <el-input v-model="perPiece.joint_price" type="number"></el-input>
            </el-form-item>
      </el-col>
</el-row>
    </div>
</template>
  </div>

      <el-form-item v-if="measurement == 'Per Unit Range'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="range in per_unit_range_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
    </el-select>
     </el-form-item>

  <table v-if="measurement == 'Per Unit Range'">

         <tr>
             <th>count</th>
             <th>price</th>
             <th></th>
             <th>Show on digital display</th>

         </tr>


         <tbody>
           <br>
             <tr v-for="(perPiece,index) in form.prices" :key="index">
                 <td> <el-input
    placeholder="0.0"
    v-model="perPiece.count"
    /></td>
                 <td> <el-input
    placeholder="0.0"
    v-model="perPiece.piece_price"
    /></td>
    <td> <el-button type="danger" icon="el-icon-delete" @click="deletePriceForm(index)" circle></el-button></td>
    <td>  <el-switch v-model="perPiece.show_on_digital"></el-switch></td>
    

             </tr>
      <br>
            
        <tr><el-button  @click="addPriceForm">Add</el-button></tr>
         </tbody>


     </table>
     <el-form-item v-if="measurement == 'Weight Range'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="weight_range in weight_range_presets" :key="weight_range.id" :label="weight_range.name" :value="weight_range.id"></el-option>
      
    </el-select>
     </el-form-item>
    
      <table  v-if="measurement == 'Weight Range'">

         <tr>
             <th>from</th>
             <th>to</th>
             <th>price</th>
             <th></th>
             <th>Show on digital display</th>

         </tr>


         <tbody>
           <br>
             <tr v-for="(perPiece,index) in form.prices" :key="index">
                 <td> <el-input
    placeholder="0.0"
    v-model="perPiece.from"
    /></td>
    <td> <el-input
    placeholder="0.0"
    v-model="perPiece.to"
    /></td>
    
    <td><el-input
    placeholder="0.0"
    v-model="perPiece.range_price"
    /></td>
    <td> <el-button type="danger" icon="el-icon-delete" @click="deletePriceForm(index)" circle></el-button></td>
    <td>  <el-switch v-model="perPiece.show_on_digital"></el-switch></td>
    

    </tr>
      <br>
            
        <tr><el-button @click="addPriceForm">Add</el-button></tr>
         </tbody>


     </table>



  </el-form>


  

      </el-card>


  </div>



    




    
</template>

<style scoped>
.el-form-item__label{
    font-size: 40px;
}

</style>

<script>


export default {

    data(){

      return{

measurement:'Weight',
preset_weight_range:'',
weight_range_presets:[],
per_unit_range_presets:[],
per_unit_presets:[],
per_weight_presets:[],

        form:{
        strain: '',
         is_marijuana:true,
         product_type:'',
         category_id:'',
         prices:[{
            from:0,
            to:0,
            price_preset_id:0,
            count:0,
            range_price:0,
            piece_price:0,
            gram_price:0,
            eight_price:0,
            quarter_price:0,
            half_price:0,
            ounce_price:0,
            joint_price:0,
            show_on_digital:true
                }],       
        },

        categories:[],
        parents:[{
          name:'0',
          product_cat_id:0,
          description:'',

        }],
        centerDialogVisible: false,
         
      }  
      
    },

    computed:{
       
    },
    created(){
    
           axios.get('/api/catalog/category/all')
            .then(res=>{
              //this.categories=res.data

              res.data.forEach(element => {
                  if(element.product_cat_id==0){
                      this.categories.push(element)
                      let subCats=res.data.filter(e=>e.product_cat_id == element.id)
                      subCats.forEach(sub=>{
                           this.categories.push(sub)
                      })
                  }
              });
            })

            axios.get('/api/catalog/pricePreset')
                .then(res=>{
                    let weight_range_presets=res.data.filter(e=> e.price_type=='weight'
                    ).filter(e=>e.is_custom_prices ==1);
                    this.weight_range_presets=weight_range_presets;

                    let unit_range_presets=res.data.filter(e=> e.price_type=='piece'
                    ).filter(e=>e.is_custom_prices ==1);
                    this.per_unit_range_presets=unit_range_presets

                    let per_weight_presets=res.data.filter(e=> e.price_type=='weight'
                    ).filter(e=>e.is_custom_prices ==0);
                    this.per_weight_presets=per_weight_presets

                    let per_unit_presets=res.data.filter(e=> e.price_type=='piece'
                    ).filter(e=>e.is_custom_prices ==0);
                    this.per_unit_presets=per_unit_presets

           })

    },


    methods:{
        getPreset(id){
            console.log("sadsad"+id)
            axios.get('/api/catalog/pricePreset/getPrices/'+id)
                .then(res=>{
                    console.log(res.data)

                    //convert 1/0 to boolean
                    res.data.forEach(e=>{
                        if(e.show_on_digital==1)
                            e.show_on_digital=true
                        else
                            e.show_on_digital=false
                        
                    })
                    this.form.prices=res.data


                })
        },
    addPriceForm(){
            this.form.prices.push({
            from:0,
            to:0,
            price_preset_id:0,
            count:0,
            range_price:0,
            piece_price:0,
            gram_price:0,
            eight_price:0,
            quarter_price:0,
            half_price:0,
            ounce_price:0,
            joint_price:0,
            show_on_digital:true
            })
        },
 
        deletePriceForm(index){
            this.form.prices.splice(index,1)
        },
        clearPrices(){
            this.preset_weight_range=''
            this.form.prices=[{
            from:0,
            to:0,
            price_preset_id:0,
            count:0,
            range_price:0,
            piece_price:0,
            gram_price:0,
            eight_price:0,
            quarter_price:0,
            half_price:0,
            ounce_price:0,
            joint_price:0,
            show_on_digital:true
                }];
        }
    }
}


</script>


