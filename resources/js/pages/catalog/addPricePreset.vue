<template>
   <div class="app-container">
<el-card>
    <div slot="header" class="clearfix">
    <span>Add Price Presets</span>
    <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'catalog.preset-list'}">Back To List</router-link></el-button>
  </div>
  
    
<el-form ref="form" :model="form" label-width="120px" label-position="top" size="small">
  <el-form-item label="name">
    <el-input v-model="form.name"></el-input>
  </el-form-item>
    <el-row :gutter="20">
    <el-col :span="6">
  <el-form-item label="Price Type">
    <el-select @change="clearPrices" v-model="form.price_type" placeholder="please select a price type">
      <el-option label="piece" value="piece"></el-option>
      <el-option label="weight" value="weight"></el-option>
    </el-select>
  </el-form-item>
    </el-col>
  <el-col :span="6">

  <el-form-item label="Custom Price">
      <el-checkbox @change="clearPrices" label="Use Custom Price" v-model="form.is_custom_prices" name="type"></el-checkbox>
  </el-form-item>
  </el-col>
  <el-col :span="12">
    <el-form-item label="Dynamic Preset">
      <el-checkbox label="Any changes made to this preset will affect ALL products using this preset pricing." v-model="form.is_dynamic_preset" name="type"></el-checkbox>
  </el-form-item>
  </el-col>

      </el-col>
    </el-row>


  <el-form-item  label="Price" v-if="!form.is_custom_prices && form.price_type == 'piece'">
 <div v-for="(perPiece,index) in form.prices" :key="index">
<el-input v-model="perPiece.piece_price" type="number"></el-input>
      </div>
      
  </el-form-item>

  <div  v-if="!form.is_custom_prices && form.price_type == 'weight'">
      <template >
      
      <div v-for="(perPiece,index) in form.prices" :key="index">

  
      <el-row>
    <el-col :span="12">
            <el-form-item label="Gram Price">
            <el-input v-model="perPiece.gram_price" type="number"></el-input>
            </el-form-item>
      </el-col>

      <el-col :span="12">
            <el-form-item label="Eight Price">
            <el-input v-model="perPiece.eight_price" type="number"></el-input>
            </el-form-item>
      </el-col>
      </el-row>
      <el-row>
      <el-col :span="12">
            <el-form-item label="Quarter Price">
            <el-input v-model="perPiece.quarter_price" type="number"></el-input>
            </el-form-item>
      </el-col>
      <el-col :span="12">
            <el-form-item label="Half Price">
            <el-input v-model="perPiece.half_price" type="number"></el-input>
            </el-form-item>
      </el-col>
      
</el-row>
<el-row>
          <el-col :span="12">
            <el-form-item label="Ounce Price">
            <el-input v-model="perPiece.ounce_price" type="number"></el-input>
            </el-form-item>
      </el-col>
            <el-col :span="12">
            <el-form-item label="Joint Price">
            <el-input v-model="perPiece.joint_price" type="number"></el-input>
            </el-form-item>
      </el-col>
</el-row>
    </div>
</template>
  </div>

          <el-form-item label="Prices" v-if="form.is_custom_prices && form.price_type == 'piece' || form.is_custom_prices && form.price_type == 'weight'">
  <table v-if="form.is_custom_prices && form.price_type == 'piece'">

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
            
        <tr><el-button @click="addPriceForm">Add</el-button></tr>
         </tbody>


     </table>

      <table v-if="form.is_custom_prices && form.price_type == 'weight'">

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
          </el-form-item>

    <el-button type="success" @click="onSubmit" round style="margin-top: 20px;">Submit</el-button>
    

</el-form>



           



                
               



</el-card>

   </div>
    
</template>

<style scoped>

td{
    margin: 10px !important;
    text-align: center !important;
}

th{

}
    
</style>

<script>
export default {
    data(){
        return{
            labelPosition: 'right',
form:{
            name:'',
            price_type:"piece",
            is_dynamic_preset:false,
            is_custom_prices:false,
            
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

        }
        
    },
    methods:{
        onSubmit(){
            axios.post('/api/catalog/pricePreset/create',this.form)
                .then(res=>{
                    console.log(res)
                    console.log('naka abot')

                    this.form.prices.forEach(price=>{
                        price.price_preset_id=res.data.id
                    })
                      axios.post('/api/catalog/prices/create',{prices:this.form.prices}).then(response=>{
                      console.log(response)
                          this.$noty.success('Price Preset Save Successfully!');
                          this.form.name="";
                          this.$router.push({name:'catalog.preset-list'})
                  }).catch(err=>console.log(err)) 
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