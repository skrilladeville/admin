<template>
    
      <router-view/>

</template>

<script>
import axios from 'axios'
import Event from 'vue-tables-2'
import path from 'path'
import router from './order-router.js'
import ViewOrder from './ViewOrder'
import OrderList from './OrderList'
import SalesOrder from './SalesOrder'

export default {
  router,
  name: 'MainOrders',
components: { ViewOrder, OrderList, SalesOrder},
}