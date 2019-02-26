<template>
   <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Add Product</span>
    <router-link :to="{name:'catalog.manageProducts'}"><el-button  style="float: right;" type="success" round>Back to list</el-button></router-link>
  </div>
  <el-form label-position="top" size="small">
      <p>Overview</p>
      <el-form-item label="Name">
          <el-input v-model="form.name"></el-input>
      </el-form-item>
      <el-row :gutter="10">
          <el-col :span="6">
              <el-form-item label="Symbol">
   <el-input v-model="form.symbol"></el-input>
              </el-form-item>

          </el-col>
          <el-col :span="18">
              <el-form-item label="SKU">
 <el-input v-model="form.sku"></el-input>
              </el-form-item>
          </el-col>
      </el-row>
      <el-row :gutter="10">
          <el-col :span="6">
              <el-form-item label="Category">
              
             <el-select style="width:100%; margin-top:18px;"  v-model="form.product_category_id" placeholder="please select a price type">
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
             <el-select style="width:100%;"  v-model="form.product_type_id" placeholder="please select a price type">
<el-option value="" selected="selected">Select product type</el-option>
<el-option value="1" label="Usable marijuana"></el-option>
<el-option value="2" label="Cannabinoid edibles"></el-option>
<el-option value="3" label="Cannabinoid topicals"></el-option>
<el-option value="4" label="Cannabinoid tinctures"></el-option>
<el-option value="5" label="Cannabinoid capsules"></el-option>
<el-option value="6" label="Cannabinoid suppositories"></el-option>
<el-option value="7" label="Cannabinoid transdermal patches"></el-option>
<el-option value="8" label="Cannabinoid product other than product listed above"></el-option>
<el-option value="9" label="Cannabinoid concentrate in solid form"></el-option>
<el-option value="10" label="Cannabinoid concentrate in liquid form"></el-option>
<el-option value="11" label="Cannabinoid extract in solid form"></el-option>
<el-option value="12" label="Cannabinoid extract in liquid form"></el-option>
<el-option value="13" label="Immature marijuana plants"></el-option>
<el-option value="14" label="Seeds"></el-option>
    </el-select>
              </el-form-item>
          </el-col>
      </el-row>

      <el-form-item label="Product Image">
        <input type="file" class="form-control" @change="imageChange" accept="image/x-png,image/gif,image/jpeg">

      </el-form-item>

      <p>Prices</p>
<hr style="width:100%;">
<el-form-item label="Measurement">
    <el-radio-group @change="clearPrices"  v-model="form.price_measurement" size="medium">
      <el-radio-button label="Weight" ></el-radio-button>
      <el-radio-button label="Weight Range"></el-radio-button>
      <el-radio-button label="Per Unit"></el-radio-button>
      <el-radio-button label="Per Unit Range"></el-radio-button>
    </el-radio-group>
    </el-form-item>
        <el-row v-if="form.price_measurement == 'Per Unit'" :gutter="10">
            <el-col :md="6">
    <el-form-item  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">

      <el-option  v-for="range in per_unit_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
    </el-select>
     </el-form-item>

            </el-col>
            <el-col :md="6">
        <el-form-item  label="Price">
 <div v-for="(perPiece,index) in form.prices" :key="index">
<el-input v-model="perPiece.piece_price" type="number">
                   <template slot="prepend">
        $
    </template>
</el-input>
      </div>
        
  </el-form-item> 
            </el-col>
        </el-row>
   
    <div v-if="form.price_measurement == 'Per Unit'">
    <el-row :gutter="10">

      <el-col :span="4">

          <el-form-item label="Net Weight">
              <el-input :disabled="form.is_each" v-model="form.net_weight" type="number">
                      <template slot="append">
        g
    </template>
              </el-input>
          </el-form-item>
            
      </el-col>

<el-col :span="4">
<el-form-item label="Is Each">
<el-switch
style="display: block"
  v-model="form.is_each"
  >
</el-switch>
</el-form-item>

    </el-col>
    </el-row>
                
         </div>
    

      

   <el-form-item v-if="form.price_measurement == 'Weight'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="range in per_weight_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
</el-select>
</el-form-item>

  <div  v-if="form.price_measurement == 'Weight'">
      <template >
      
      <div v-for="(perPiece,index) in form.prices" :key="index">

  
      <el-row :gutter="5">
    <el-col :span="3">
            <el-form-item label="1g">
            <el-input v-model="perPiece.gram_price" type="number">
                <template slot="prepend">
        $
    </template>
            </el-input>
            </el-form-item>
      </el-col>

      <el-col :span="3">
            <el-form-item label="1/8oz">
            <el-input v-model="perPiece.eight_price" type="number">
                <template slot="prepend">
        $
    </template>
            </el-input>
            </el-form-item>
      </el-col>
    
      <el-col :span="3">
            <el-form-item label="1/4oz">
            <el-input v-model="perPiece.quarter_price" type="number">
                <template slot="prepend">
        $
    </template>
            </el-input>
            </el-form-item>
      </el-col>
      <el-col :span="3">
            <el-form-item label="1/2oz">
            <el-input v-model="perPiece.half_price" type="number">
                <template slot="prepend">
        $
    </template>
            </el-input>
            </el-form-item>
      </el-col>
      

          <el-col :span="3">
            <el-form-item label="1oz">
            <el-input v-model="perPiece.ounce_price" type="number">
                <template slot="prepend">
        $
    </template>
            </el-input>
            </el-form-item>
      </el-col>
            <el-col :span="3">
            <el-form-item label="Pre-Roll">
            <el-input v-model="perPiece.joint_price" type="number"> <template slot="prepend">
        $
    </template></el-input>
            </el-form-item>
      </el-col>
</el-row>
    </div>
</template>
  </div>

      <el-form-item v-if="form.price_measurement == 'Per Unit Range'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="range in per_unit_range_presets" :key="range.id" :label="range.name" :value="range.id"></el-option>
      
    </el-select>
     </el-form-item>

  <table v-if="form.price_measurement == 'Per Unit Range'">

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
    ><template slot="append">
        pcs
    </template></el-input></td>
                 <td> <el-input
    placeholder="0.0"
    v-model="perPiece.piece_price"
    > <template slot="prepend">
        $
    </template></el-input></td>
    <td> <el-button type="danger" icon="el-icon-delete" @click="deletePriceForm(index)" circle></el-button></td>
    <td>  <el-switch v-model="perPiece.show_on_digital"></el-switch></td>
    

             </tr>
      <br>
            
        <tr><el-button  @click="addPriceForm">Add</el-button></tr>
         </tbody>
     </table>
        <div v-if="form.price_measurement == 'Per Unit Range'">
    <el-row :gutter="10">

      <el-col :span="4">

          <el-form-item label="Net Weight">
              <el-input :disabled="form.is_each" v-model="form.net_weight" type="number">
 <template slot="append">
        g
    </template>
              </el-input>
          </el-form-item>
            
      </el-col>

<el-col :span="4">
<el-form-item label="Is Each">
<el-switch
style="display: block"
  v-model="form.is_each"
  >
</el-switch>
</el-form-item>

    </el-col>
    </el-row>
                
         </div>
     <el-form-item v-if="form.price_measurement == 'Weight Range'"  label="Presets">
<el-select v-model="preset_weight_range" @change="getPreset(preset_weight_range)" placeholder="please select preset">
  
      <el-option  v-for="weight_range in weight_range_presets" :key="weight_range.id" :label="weight_range.name" :value="weight_range.id"></el-option>
      
    </el-select>
     </el-form-item>
    
      <table  v-if="form.price_measurement == 'Weight Range'">

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
    >  <template slot="append">
        g
    </template></el-input></td>
    <td> <el-input
    placeholder="0.0"
    v-model="perPiece.to"
    > <template slot="append">
        g
    </template></el-input></td>
    
    <td><el-input
    placeholder="0.0"
    v-model="perPiece.range_price"
    > <template slot="prepend">
        $
    </template></el-input></td>
    <td> <el-button type="danger" icon="el-icon-delete" @click="deletePriceForm(index)" circle></el-button></td>
    <td>  <el-switch v-model="perPiece.show_on_digital"></el-switch></td>
    

    </tr>
      <br>
            
        <tr><el-button @click="addPriceForm">Add</el-button></tr>
         </tbody>


     </table>


<p>Other Information</p>
<hr style="width:100%;">

<el-switch
style="display: block"
  v-model="form.is_self_distributed"
  inactive-text="Self Distributed">
</el-switch><br>
<el-switch
style="display: block"
  v-model="form.is_lab_results"
  inactive-text="Lab Results">
  
</el-switch>

<el-card style="margin-top:10px;" v-if="form.is_lab_results">

      <el-form-item>
    <el-col :md="6">
    <el-form-item label="Lab">
    <el-select v-model="formLab.lab_id"  placeholder="please select lab">
      <el-option  v-for="lab in labs" :key="lab.id" :label="lab.name" :value="lab.id"></el-option>
    </el-select>
    </el-form-item>
      
    </el-col>
  
    <el-col :md="11">
      <el-form-item label="Test Date">
         <el-date-picker
      v-model="formLab.test_date"
      type="datetime"
      
      placeholder="Select date and time"
     >
    </el-date-picker>
      </el-form-item>
    </el-col>
  </el-form-item>

<el-row :gutter="10">
   <el-col :md="6">
    <el-form-item label="Measurement">
    <el-radio-group v-model="formLab.lab_mesurement" size="medium">
      <el-radio-button label="%"></el-radio-button>
      <el-radio-button label="Mg"></el-radio-button>
    </el-radio-group>
    </el-form-item>
</el-col>

    <el-col :span="2">
            <el-form-item label="Indica">
            <el-input  v-model="formLab.indica" type="number" style="padding-top:18px;"></el-input>
            </el-form-item>
      </el-col>

      <el-col :span="2">
            <el-form-item label="Sativa">
            <el-input v-model="formLab.sativa" type="number" style="padding-top:18px;"></el-input>
            </el-form-item>
      </el-col>
    
      <el-col :span="2">
            <el-form-item label="THC">
            <el-input v-model="formLab.thc" type="number" style="padding-top:18px;"></el-input>
            </el-form-item>
      </el-col>
      <el-col :span="2">
            <el-form-item label="CBD">
            <el-input v-model="formLab.cbd" type="number" style="padding-top:18px;"></el-input>
            </el-form-item>
      </el-col>


          <el-col :span="2">
            <el-form-item label="CBN">
            <el-input v-model="formLab.cbn" type="number" style="padding-top:18px;"></el-input>
            </el-form-item>
      </el-col>





</el-row>


  </el-card>
  
<br>
<el-switch
style="display: block"
  v-model="form.is_show_on_weedmaps"
  inactive-text="Show On Weedmaps">
</el-switch>


<el-card style="margin-top:10px;" v-if="form.price_measurement != 'Weight' && form.is_show_on_weedmaps">
 <el-row :gutter="5">
    <el-col :span="2">
            <el-form-item label="1g">
            <el-input v-model="weed_map_price.one_g" type="number"></el-input>
            </el-form-item>
      </el-col>

      <el-col :span="2">
            <el-form-item label="2g">
            <el-input v-model="weed_map_price.two_g" type="number"></el-input>
            </el-form-item>
      </el-col>
    
      <el-col :span="2">
            <el-form-item label="1/8oz">
            <el-input v-model="weed_map_price.eight_oz" type="number"></el-input>
            </el-form-item>
      </el-col>
      <el-col :span="2">
            <el-form-item label="1/4oz">
            <el-input v-model="weed_map_price.four_oz" type="number"></el-input>
            </el-form-item>
      </el-col>


          <el-col :span="2">
            <el-form-item label="1/2oz">
            <el-input v-model="weed_map_price.half_oz" type="number"></el-input>
            </el-form-item>
      </el-col>
            <el-col :span="2">
            <el-form-item label="1oz">
            <el-input v-model="weed_map_price.one_oz" type="number"></el-input>
            </el-form-item>
      </el-col>
</el-row>
</el-card>

    
<br>
<el-switch
style="display: block"
  v-model="form.is_show_on_potify"
  inactive-text="Show On Potify">
</el-switch><br>
<el-switch
style="display: block"
  v-model="form.is_print_label"
  inactive-text="Print Label">
</el-switch><br>

<el-form-item label="Tag">
  <el-tag
  :key="index"
  v-for="(tag,index) in form.tags"
  closable
  :disable-transitions="false"
  @close="handleClose(index)">
  {{tag.name}}
</el-tag>
<el-input
  class="input-new-tag"
  v-if="inputVisible"
  v-model="inputValue"
  ref="saveTagInput"
  size="mini"
  @keyup.enter.native="handleInputConfirm"
  @blur="handleInputConfirm"
>
</el-input>
<el-button v-else class="button-new-tag" size="small" @click="showInput">+ New Tag</el-button>
</el-form-item>

<el-form-item label="Description">

    <el-input v-model="form.description" type="textarea"></el-input>
</el-form-item>

<el-button @click="saveProduct" type="success" size="small">Save</el-button>




  </el-form>

    <template v-if="errors.length">
        <el-col :md="12">
    

              <el-alert style="margin: 10px;"
    v-for="error in errors"
    :title="error"
    type="error"
    :key="error" :closable="false">
  </el-alert>
    </el-col>

  </template>


  


  

      </el-card>


  </div>



    




    
</template>

<style scoped>

</style>

<script>


export default {

    data(){

      return{
          errors:[],
        inputVisible: false,
        inputValue: '',
        preset_weight_range:'',
        weight_range_presets:[],
        per_unit_range_presets:[],
        per_unit_presets:[],
        per_weight_presets:[],
        fileList2: [],
        labs:[],

        weed_map_price:{
        product_id:0,
        one_g:0,
        two_g:0,
        eight_oz:0,
        four_oz:0,
        half_oz:0,
        one_oz:0,
        },

        formLab:{
        product_id:0,
        test_date:'',
        lab_id:null,
        cbn:'',
        cbd:'',
        thc:'',
        sativa:'',
        indica:'',
        lab_mesurement:'%'
        },


        form:{
            name:'',
            symbol:'',
            sku:'',
            image:'',
        strain: 'None',
         is_marijuana:true,
         product_type_id:'',
         product_category_id:'',
         price_measurement:'Weight',
         is_self_distributed:false,
        is_lab_results:false,
        lab_mesurement:'',
        is_show_on_weedmaps:false,
        is_show_on_potify:false,
        is_print_label:true,
        net_weight:'',
        is_each:false,
        tags:[],
        description:'',
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

        axios.get('/api/catalog/lab')
            .then(response => {
              this.labs = response.data
              console.log(response)
            })
            .catch(error => {
              console.log(error)
            })
    
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

      imageChange(e){
        console.log(e.target.files[0])
        let fileReader= new FileReader()
        fileReader.readAsDataURL(e.target.files[0]) 


        fileReader.onload=(e)=>{
          this.form.image=e.target.result
        }


      },

    saveProduct(){
        this.errors=[];
        if(this.form.name==''){
            this.errors.push('name must not empty');
        }

        if(this.form.is_marijuana){

            if(this.form.product_category_id == ''){
              this.errors.push('category type must not empty');  
            }
        }
   if(this.form.symbol==''){
            this.errors.push('symbol must not empty');
        }

       if(this.form.sku==''){
            this.errors.push('sku must not empty');
        }




















        if(this.errors.length==0){
            console.log('nka abot dri')
            console.log(this.form)
        axios.post('/api/catalog/product/create',this.form)
            .then(res=>{
                console.log(res.data)

            //save prices
            this.form.prices.forEach(price=>{
                        price.product_id=res.data.id
                    })
                      axios.post('/api/catalog/prices/create',{prices:this.form.prices}).then(response=>{
                      console.log(response)                   
                  }).catch(err=>console.log(err))


            //save tags
            if(this.form.tags.length > 0){
            this.form.tags.forEach(tag=>{
                tag.product_id=res.data.id
            })
            console.log(this.form.tags)
            axios.post('/api/catalog/tags/create',{tags:this.form.tags})
                .then(res=>{
                    console.log(res)
                }).catch(err=>console.log(err))
            }

            if(this.form.is_lab_results)
            {
            this.formLab.product_id=res.data.id
            axios.post('/api/catalog/labResult/create',this.formLab)
                .then(res=>console.log(res))   
            }

            if(this.form.is_show_on_weedmaps && this.form.price_measurement!="Weight")
                {
            this.weed_map_price.product_id=res.data.id
            axios.post('/api/catalog/weedMapPrice/create',this.weed_map_price)
                .then(res=>{
                    console.log(res)
                })

                }
           

            
            



    

     this.$noty.success('Product Save Successfully!');


                this.$router.push({name:'catalog.manageProducts'})
            })

        }
         
    },

handleClose(index) {
        this.form.tags.splice(index, 1);
      },

      showInput() {
        this.inputVisible = true;
        this.$nextTick(_ => {
          this.$refs.saveTagInput.$refs.input.focus();
        });
      },

      handleInputConfirm() {
        let inputValue = this.inputValue;
        if (inputValue) {
          this.form.tags.push({name:inputValue});
        }
        this.inputVisible = false;
        this.inputValue = '';
      },


         handleRemove(file, fileList) {
        console.log(file, fileList);
      },
      handlePreview(file) {
        console.log(file);
      },
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
    },

    
    
}


</script>


