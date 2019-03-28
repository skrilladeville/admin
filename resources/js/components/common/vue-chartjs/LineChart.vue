<script>
/* reuseable chart component
 * https://vue-chartjs.org/guide/#chart-with-props
 */
import {
  Line,
  mixins
} from 'vue-chartjs'

export default {
  name: 'LineChart',
  extends: Line,
  mixins: [mixins.reactiveProp],
  props: ['chartData', 'options'],
  data() {
    return {
      /* options: { //Chart.js options
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              display: true
            }
          }],
          xAxes: [{
            gridLines: {
              display: false
            }
          }]
        },
        legend: {
          display: true
        },
        responsive: true,
        maintainAspectRatio: false
      } */
    }
  },
  mounted() {
    this.renderChart(this.chartdata, this.options)
  }
}
</script>