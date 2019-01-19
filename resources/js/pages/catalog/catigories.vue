<template>
    <div class="content"> 
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header bg-success">
                <h6 class="text-white">Categories List</h6>  
                 
                </div>
                <div class="card-body">

    <vue-good-table
      :columns="columns"
      :rows="rows"
  :groupOptions="{
  	enabled: true
  }"
        :search-options="{
    enabled: true
  }"
      styleClass="vgt-table condensed"
      :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 30,}"
      >
     <template slot="table-row" slot-scope="props">
    <span v-if="props.column.field == 'action'">
      <button class="btn btn-success btn-sm">view</button>
    </span>
    <span v-else>
      {{props.formattedRow[props.column.field]}}
    </span>
  </template>

    <template slot="table-column" slot-scope="props">
     <span v-html="props.column.label"/>
  </template>
      
      </vue-good-table>

                </div>
            </div>
        </div>

           




        
    </div>




    
</template>

<style scoped>

.content{
    margin-top: 100px;
    margin-left: 20px;
    margin-right: 20px;
}
</style>

<script>
import { VueGoodTable } from 'vue-good-table';

export default {
 name: 'product-categories',
    components: {
        VueGoodTable,
    },
    data(){

      return{
          columns: [
        {
          label: 'Category Name',
          field: 'cat_name',
        },
        {
          label: 'Total Products',
          field: 'total_products',
    
        },
        {
          label: 'Marijuana / Non Marijuana',
          field: 'isMarijuana',

        },
    
        {
          label: 'Description',
          field: 'description',
         
        },
   
               {
          label: 'Action',
          field: 'action',
       
        },
    
      ],
    rows: [{
            mode: 'span', // span means this header will span all columns
            label: 'Flowers', // this is the label that'll be used for the header
            html: false, // if this is true, label will be rendered as html
            children: [
                
              { cat_name: 'Flowers', total_products: 118, isMarijuana: '117 Marijuana / 1 Non Marijuana', description: ""},
            
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
            
            ]
          },
          {
            mode: 'span', // span means this header will span all columns
            label: 'Flowers', // this is the label that'll be used for the header
            html: false, // if this is true, label will be rendered as html
            children: [
                
              { cat_name: 'Flowers', total_products: 118, isMarijuana: '117 Marijuana / 1 Non Marijuana', description: ""},
            
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
            
            ]
          },
          {
            mode: 'span', // span means this header will span all columns
            label: 'Flowers', // this is the label that'll be used for the header
            html: false, // if this is true, label will be rendered as html
            children: [
                
              { cat_name: 'Flowers', total_products: 118, isMarijuana: '117 Marijuana / 1 Non Marijuana', description: ""},
            
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
            
            ]
          },
          {
            mode: 'span', // span means this header will span all columns
            label: 'Flowers', // this is the label that'll be used for the header
            html: false, // if this is true, label will be rendered as html
            children: [
                
              { cat_name: 'Flowers', total_products: 118, isMarijuana: '117 Marijuana / 1 Non Marijuana', description: ""},
            
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
              { cat_name: 'Prepack', total_products: 55, isMarijuana: '1 Marijuana / 0 Non Marijuana', description: ""},
            
            ]
          }],
        
      }  
      
    },

    computed:{


          
        

    }
}


</script>


