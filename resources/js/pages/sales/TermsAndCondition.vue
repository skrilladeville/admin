<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
           <h2>Terms And Conditions</h2>
           <br>
            <h5>Payment</h5>
              <p>All payments are due upon receipt. If a payment is not received or payment method is declined, the buyer forfeits the ownership of any items purchased. If no payment is received, no items will be shipped.</p>
              <br>
            <h5>Shipping Policies</h5>
              <p>Shipping will be paid for by the buyer in the amount agreed upon by the seller at the time of purchase. If an item is lost during shipping, the total cost of item, including shipping, will be refunded to the buyer by the seller. Shipping costs may double if shipping internationally. If an item is damaged during shipping, seller will not be held responsible.</p>
              <br>
            <h5>  Refund/Return Policy</h5>
               <p>Items are entitled to be refunded or returned based on complaint. If an item is damaged during shipping, a replacement item will be sent free of charge. If an item is unsatisfactory, a written explanation is needed before the item may be considered for a refund. Buyer must take into account the description of the item before requesting a refund. If the item matches the description by the seller and the buyer is unsatisfied, seller is not responsible for refund. Exchanges are granted on a case-by-case basis.</p>
               <br>
            <h5>Cancellation</h5>
                <p>An item may be cancelled up until payment has been processed. Once payment has been processed, the buyer is responsible for payment.</p>
                <br>
            <h5>Complaints</h5>
              <p>Any complaints about items or sellers may be sent to our support team: support@wesellyourstuff.com or (888) 555-0198. There is no guarantee of a resolution. Each case will be looked at individually, and the seller will be in contact as well.</p>
              <br>
              <h5>Legalities</h5>
             <p>The seller is not responsible for any health or safety concerns once the buyer has received the item. If any harm is incurred from the items purchased by the buyer, the seller shares no responsibility.</p>
             <br>
              <p>These terms and conditions are subject to change.</p>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'TermsAndCondition',
  components: { },
  data() {
    return {
    }
  },
  created() {
  },
  methods: {
  }
}
</script>

<style scoped>
</style>
