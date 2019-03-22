<template>
    <div style="margin-top:20px;">
       
            
             <el-col :md="24">

                 <h4><b>Billing Information</b></h4>
        <el-form label-position="top" size="mini">
       
            <el-form-item style="margin-bottom:0px;" label="First Name">
                <el-input></el-input>
            </el-form-item >
               <el-form-item style="margin-bottom:0px;" label="Last Name">
                <el-input></el-input>
            </el-form-item>
               <el-form-item style="margin-bottom:0px;" label="Email">
                <el-input type="email"></el-input>
            </el-form-item>
               <el-form-item style="margin-bottom:0px;" label="Address">
                <el-input></el-input>
            </el-form-item>
               <el-form-item style="margin-bottom:0px;" label="Address 2">
                <el-input></el-input>
            </el-form-item>
                 <el-form-item style="margin-bottom:0px;" label="City">
                <el-input></el-input>
            </el-form-item>
              <el-form-item style="margin-bottom:0px;" label="State">
                <el-input></el-input>
            </el-form-item>
            <el-form-item style="margin-bottom:0px;" label="Zip/PostCode">
                <el-input></el-input>
            </el-form-item>
            <el-form-item style="margin-bottom:0px;" label="Country">
                <el-input></el-input>
            </el-form-item>
            <el-form-item style="margin-bottom:0px;" label="Telephone">
                <el-input></el-input>
            </el-form-item>
            <el-form-item>
          <el-button style="float:right; margin-top:10px;" type="warning">Continue</el-button>
            </el-form-item>

  
             
        </el-form>
                
            </el-col>
    
    </div>
</template>

<script>
export default {
    created(){


}
,
mounted(){
      try {
let element = document.getElementById("blade");
element.classList.remove("fixed-navbar");
let gcsicss=document.getElementById("gcis")
let robustcss=document.getElementById("robust")
let robustjs=document.getElementById("robustjs")
gcsicss.remove()
//robust.remove()
//robustjs.remove()
  } catch (error) {
   console.log('error occur') 
  }

}
}
</script>

