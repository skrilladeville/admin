<script>
import { Line, HorizontalBar } from 'vue-chartjs'

export default {
    name: 'Chart',
    extends: Line,
    mounted () {
        // Overwriting base render method with actual data.
        this.renderChart({
       labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sales",
            data: [32, 25, 45, 30, 60, 40, 72, 52, 80, 60, 92, 70],
            lineTension: 0,
            fill: false,
            // borderDash: [5, 5],
            borderColor: "#37BC9B",
            pointBorderColor: "#37BC9B",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 3,
            pointRadius: 6,
        }]
        },{
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
                labels: {
                    boxWidth: 10,
                    fontSize: 14
                },
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        lineWidth: 2,
                        color: "rgba(0, 0, 0, 0.05)",
                        zeroLineWidth: 2,
                        zeroLineColor: "rgba(0, 0, 0, 0.05)",
                        drawTicks: false,
                    },
                    ticks: {
                        fontSize: 14,
                    }
                }],
                yAxes: [{
                    display: false,
                    ticks: {
                        min: 0,
                        max: 100
                    }
                }]
            },
            title: {
                display: false,
                text: 'Chart.js Line Chart - Legend'
            }
        })
    }
}
</script>